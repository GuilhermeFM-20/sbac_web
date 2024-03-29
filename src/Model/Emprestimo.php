<?php

namespace SBAC\Model;

use \SBAC\DB\Sql;
use \SBAC\Model;
use \SBAC\Mailer;
use \SBAC\Model\User;
use \SBAC\Model\Aluno;


class Emprestimo extends Model{

    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM emprestimos a,item b,leitor c WHERE a.status_empr = 1  AND a.item_id = b.item_id AND  a.leitor_id = c.leitor_id ORDER BY a.id_emp");

    }

    public function save($item_id,$leitor_id){


       // echo date("Y-m-d",strtotime($this->getdata_devol()));exit;

        $sql = new Sql();

        $num = $sql->numRow("SELECT * FROM `emprestimos` WHERE (item_id = :item_id OR leitor_id = :leitor_id) AND status_empr = 1 AND status_devo = 0",array(
            ":item_id"=>$item_id,
            ":leitor_id"=>$leitor_id
        ));
        
        if(!$num){

            $results = $sql->query("INSERT INTO emprestimos VALUES(DEFAULT ,:data_emp,:data_dev,:item_id,:bib_id,:leitor_id,:status_devolucao,:status_empr) ", array(
                ":data_emp"=>date("Y-m-d"),
                ":data_dev"=>date("Y-m-d",strtotime($this->getdata_devol())),
                ":item_id"=>$item_id,
                ":bib_id"=>$_SESSION['User']['bibliotecario_id'],
                ":leitor_id"=>$leitor_id,
                ":status_devolucao"=>0,
                ":status_empr"=>1
            ));


        }else{

            return true;     

        }
        
        //$this->setData($results[0]);

    }

    public function update($empr_id){
    
        $sql = new Sql();
        
        $sql->query("UPDATE emprestimos  SET dat_dev = :data_devo WHERE id_emp = :id", array(
            ":data_devo"=>date('Y-m-d',strtotime($this->getdata_devol())),
            ":id"=>$empr_id
        ));
        
        //$this->setData($results[0]);

    }

    public function delete($id_empr){

        $sql = new Sql();

        $sql->query(" UPDATE emprestimos SET status_empr = 0 WHERE id_emp = :id",[
            ":id"=>$id_empr
        ]);

    }

    public static function verifyLoan(){

        $sql = new Sql();

        $date = date('Y-m-d');

        $results = $sql->numRow(" SELECT * FROM emprestimos WHERE dat_dev <= '$date' AND status_devo = 0 AND status_empr = 1");

        return $results;

    }

    public function returnItem($empr_id){

        $sql = new Sql();

        $sql->query(" UPDATE emprestimos SET status_devo = 1  WHERE id_emp = :id",[
            ":id"=>$empr_id
        ]);

    }
    

    public function searchItens($page = 1, $itensForPages = 6){

        $start = ($page - 1) * $itensForPages;

        $sql = new Sql();

        $busca = null;

        if($this->gettitulo()){

            $busca .= " AND b.titulo LIKE '%".trim($this->gettitulo())."%'";

        }
        if($this->getcod_tomb()){

            $busca .= " AND b.cod_tomb = '".$this->getcod_tomb()."'";

        }
        if($this->getnome()){

            $busca .= " AND c.nome_leitor LIKE '%".trim($this->getnome())."%'";

        }
        if($this->getmatricula()){

            $busca .= " AND c.matricula_leitor = '".$this->getmatricula()."'";

        }
        if($this->getencerrados() == 'Sim'){

            $busca .= " AND a.status_devo = 0 AND a.dat_dev <= '".date('Y-m-d')."'";

        }

        //$results =  $sql->select("SELECT * FROM leitor WHERE status_leitor = 1 $busca LIMIT $start,$itensForPages");
        $results = $sql->select("SELECT * FROM emprestimos a,item b,leitor c WHERE a.status_empr = 1  AND a.item_id = b.item_id AND  a.leitor_id = c.leitor_id $busca LIMIT $start,$itensForPages");

        $resultTotal = $sql->select("SELECT COUNT(*) AS nrtotal FROM emprestimos a,item b,leitor c WHERE a.status_empr = 1  AND a.item_id = b.item_id AND  a.leitor_id = c.leitor_id $busca ");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $itensForPages) + 1
        ];

    }

    public function searchEmprestimo(){

        //echo $this->getdataI();exit;

        $sql = new Sql();

        $busca = null;

        if($this->getdataI()){

            $busca .= " AND a.dat_dev >= '".$this->getdataI()."'";

        }

        if($this->getdataF()){

            $busca .= " AND a.dat_dev <= '".$this->getdataF()."'";

        }

        if($this->gettitulo()){

            $busca .= " AND b.titulo LIKE '%".trim($this->gettitulo())."%'";

        }
        if($this->getcod_tomb()){

            $busca .= " AND b.cod_tomb = '".$this->getcod_tomb()."'";

        }
        if($this->getnome()){

            $busca .= " AND c.nome_leitor LIKE '%".trim($this->getnome())."%'";

        }
        if($this->getmatricula()){

            $busca .= " AND c.matricula_leitor = '".$this->getmatricula()."'";

        }
        if($this->getencerrados() == 'Sim'){

            $busca .= " AND a.status_devo = 0 AND a.dat_dev <= '".date('Y-m-d')."'";

        }

        //$results =  $sql->select("SELECT * FROM leitor WHERE status_leitor = 1 $busca LIMIT $start,$itensForPages");
        return $sql->select("SELECT * FROM emprestimos a,item b,leitor c WHERE a.status_empr = 1  AND a.item_id = b.item_id AND  a.leitor_id = c.leitor_id $busca ");
    

    }

    public static function getEmpr(int $empr_id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM emprestimos a,item b,leitor c WHERE a.status_empr = 1  AND a.item_id = b.item_id AND  a.leitor_id = c.leitor_id  
        AND id_emp = :id ORDER BY a.id_emp",[
            ":id"=>$empr_id
        ]);

        if(count($results) > 0 ){

            return $results;

        }

    }

    public function getPages($page = 1, $itensForPages = 4){

        $start = ($page - 1) * $itensForPages;

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM emprestimos a,item b,leitor c WHERE a.status_empr = 1  AND a.item_id = b.item_id AND  a.leitor_id = c.leitor_id LIMIT $start,$itensForPages");

        $resultTotal = $sql->select("SELECT COUNT(*) AS nrtotal FROM emprestimos a,item b,leitor c WHERE a.status_empr = 1  AND a.item_id = b.item_id AND  a.leitor_id = c.leitor_id ");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $itensForPages) + 1
        ];

    }

    public static function submitEmail(){

        $sql = new Sql();

        $date = date('Y-m-d');

        $results = $sql->select(" SELECT * FROM emprestimos b,leitor a WHERE b.leitor_id = a.leitor_id AND b.dat_dev <= '$date' AND b.status_devo = 0 AND b.status_empr = 1 GROUP BY b.id_emp");

        //print_r($results);exit;

        foreach($results as $values){

            //print_r(self::getEmpr($values['id_emp'])[0]);exit;

            $email = new Mailer($values['email_leitor'],$values['nome_leitor'],'Prazo de devolu��o encerrado!','mailer',array(
                "empr"=>self::getEmpr($values['id_emp'])[0]
            ));


           $email->send();

        }


    }

    public function searchItemEmpr($page = 1, $itensForPages = 2){


        $start = ($page - 1) * $itensForPages;

        $sql = new Sql();

        $busca = null;

        if($this->gettitulo()){

            $busca .= " AND titulo LIKE '%".trim($this->gettitulo())."%'";

        }
        
        if($this->getcod_tomb()){

            $busca .= " AND cod_tomb = '".$this->getcod_tomb()."'";

        }

        $results = $sql->select("SELECT * FROM item WHERE status_item = 1 AND item_id NOT IN (SELECT item_id FROM emprestimos WHERE status_empr = 1 AND status_devo = 0) $busca LIMIT $start,$itensForPages");

        $resultTotal = $sql->select("SELECT COUNT(*) as nrtotal FROM item WHERE status_item = 1 AND item_id NOT IN (SELECT item_id FROM emprestimos WHERE status_empr = 1  AND status_devo = 0)  $busca");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $itensForPages) + 1
        ];

    }

    public function searchAlunoEmpr($page = 1, $alunosForPages = 6){


        $start = ($page - 1) * $alunosForPages;

        $sql = new Sql();

        $busca = null;

        if($this->getnome()){

            $busca .= " AND nome_leitor LIKE '%".trim($this->getnome())."%'";

        }
        
        if($this->getmatricula()){

            $busca .= " AND matricula_leitor = '".$this->getmatricula()."'";

        }

        $results =  $sql->select("SELECT * FROM leitor WHERE status_leitor = 1 AND leitor_id NOT IN (SELECT leitor_id FROM emprestimos WHERE status_empr = 1 AND status_devo = 0)  $busca LIMIT $start,$alunosForPages");

        $resultTotal = $sql->select("SELECT COUNT(*) as nrtotal FROM leitor WHERE status_leitor = 1 AND leitor_id NOT IN (SELECT leitor_id FROM emprestimos WHERE status_empr = 1 AND status_devo = 0)  $busca");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $alunosForPages) + 1
        ];

    }

    

}