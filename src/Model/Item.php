<?php

namespace SBAC\Model;

use \SBAC\DB\Sql;
use \SBAC\Model;
use \SBAC\Mailer;
use \SBAC\Model\User;

class Item extends Model{

    
    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM item WHERE status_item = 1 ORDER BY item_id");

    }

    public function save(){
    

        // echo  "title:".$this->gettitulo()."<br>".
        // "origem:".$this->getorigem()."<br>".
        // "data_aq:".date("Y-m-d",strtotime($this->getdata_aq()))."<br>".
        // "autor:".$this->getautor()."<br>".
        // "cod_tomb:".$this->getcod_tomb()."<br>".
        // "editora:".$this->geteditora()."<br>".
        // "data_publ:".$this->getdata_publ()."<br>".
        // "foto:".$this->getfoto();exit;

        

        $sql = new Sql();

        $num = $this->verifyCodTomb($this->getcod_tomb());

        //echo $num;exit;

        if($num > 0){
            return false;
        }

        //echo "3213";exit;
    
       // try{

            $results = $sql->query("INSERT INTO item VALUES(DEFAULT,:titulo,:origem,:data_aq,:data_publ,:autor,:cod_tomb,:editora,:foto,:descricao,:status_item) ", array(
                ":titulo"=>$this->gettitulo(),
                ":origem"=>$this->getorigem(),
                ":data_aq"=>date("Y-m-d",strtotime($this->getdata_aq())),
                ":autor"=>$this->getautor(),
                ":cod_tomb"=>$this->getcod_tomb(),
                ":editora"=>$this->geteditora(),
                ":data_publ"=>date("Y-m-d",strtotime($this->getdata_publ())),
                ":foto"=>$this->getfoto(),
                ":descricao"=>$this->getdescricao(),
                ":status_item"=>'1'
            ));

        // }catch(\Exception $e){

        //     return false;
            
        // }

        return true;
        
        //$this->setData($results[0]);

    }

    public function update($id_item){

        //echo $this->getdescricao();exit;

        $sql = new Sql();
        
        $results = $sql->query("UPDATE item  SET titulo = :titulo, origem = :origem, data_aq = :data_aq
        , autor = :autor, cod_tomb = :cod_tomb, editora = :editora, data_publ = :data_publ, url_img = :url_img, descricao_item = :descricao_item WHERE item_id  = :id", array(
           ":titulo"=>$this->gettitulo(),
           ":origem"=>$this->getorigem(),
           ":data_aq"=>date("Y-m-d",strtotime($this->getdata_aq())),
           ":autor"=>$this->getautor(),
           ":cod_tomb"=>$this->getcod_tomb(),
           ":editora"=>$this->geteditora(),
           ":data_publ"=>date("Y-m-d",strtotime($this->getdata_publ())),
           ":url_img"=>$this->geturl_img(),
           ":descricao_item"=>$this->getdescricao(),
           ":id"=>$id_item
        ));
        
        //$this->setData($results[0]);

    }

    public function delete($id_item){

        $sql = new Sql();

        $sql->query(" UPDATE item SET status_item = 0 WHERE item_id = :id",[
            ":id"=>$id_item
        ]);

    }

    public function get(int $id_item){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM item WHERE item_id = :id", [
            ":id"=>$id_item
        ]);

        if(count($results) > 0 ){

            $this->setData($results[0]);

        }

    }

    public static function getItem(int $id_item){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM item WHERE item_id = :id", [
            ":id"=>$id_item
        ]);

        if(count($results) > 0 ){

            return $results;

        }

    }


    public function verifyCodTomb($codTomb){

        $sql = new Sql();

        return $sql->numRow("SELECT * FROM item WHERE cod_tomb = $codTomb AND status_item = 1");

    }


    public function getPages($page = 1, $itemsForPages = 2){


        $start = ($page - 1) * $itemsForPages;

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM emprestimo,item WHERE  status_item = 1 LIMIT $start, $itemsForPages");

        $resultTotal = $sql->select("SELECT COUNT(*) as nrtotal FROM item WHERE status_item = 1 ");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $itemsForPages) + 1
        ];

    }

    public function searchItem($page = 1, $itensForPages = 2){


        $start = ($page - 1) * $itensForPages;

        $sql = new Sql();

        $busca = null;

        if($this->gettitulo()){

            $busca .= " AND titulo LIKE '%".trim($this->gettitulo())."%'";

        }
        
        if($this->getcod_tomb()){

            $busca .= " AND cod_tomb = '".$this->getcod_tomb()."'";

        }

        $results = $sql->select("SELECT * FROM item WHERE status_item = 1 $busca LIMIT $start,$itensForPages");

        $resultTotal = $sql->select("SELECT COUNT(*) as nrtotal FROM item WHERE status_item = 1 $busca");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $itensForPages) + 1
        ];

    }

}