<?php

namespace SBAC\Model;

use \SBAC\DB\Sql;
use \SBAC\Model;
use \SBAC\Mailer;
use \SBAC\Model\User;

class Aluno extends Model{


    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM leitor WHERE status_leitor = 1 ORDER BY leitor_id");

    }

    public function save(){
    

        $sql = new Sql();
        
        $results = $sql->query("INSERT INTO leitor VALUES(DEFAULT,:nome,:matricula,:email,:sexo,:status_leitor,:turma,:telefone) ", array(
            ":nome"=>$this->getnome(),
            ":matricula"=>$this->getmatricula(),
            ":email"=>$this->getemail(),
            ":sexo"=>$this->getsexo(),
            ":status_leitor"=>'1',
            ":turma"=>$this->getturma(),
            ":telefone"=>$this->gettelefone()
        ));
        
        //$this->setData($results[0]);

    }

    public function update($id_leitor){
    

        $sql = new Sql();
        
        $results = $sql->query("UPDATE leitor  SET nome_leitor = :nome, matricula_leitor = :matricula, email_leitor = :email
        , sexo = :sexo, turma = :turma, telefone_leitor = :telefone WHERE leitor_id = :id", array(
            ":nome"=>$this->getnome(),
            ":matricula"=>$this->getmatricula(),
            ":email"=>$this->getemail(),
            ":sexo"=>$this->getsexo(),
            ":turma"=>$this->getturma(),
            ":telefone"=>$this->gettelefone(),
            ":id"=>$id_leitor
        ));
        
        //$this->setData($results[0]);

    }

    public function delet($id_leitor){

        $sql = new Sql();

        $sql->query(" UPDATE leitor SET status_leitor = 0 WHERE leitor_id = :id",[
            ":id"=>$id_leitor
        ]);

    }

    public function get(int $id_leitor){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM leitor WHERE leitor_id = :id", [
            ":id"=>$id_leitor
        ]);

        if(count($results) > 0 ){

            $this->setData($results[0]);

        }

    }

    public static function getAluno(int $id_leitor){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM leitor WHERE leitor_id = :id", [
            ":id"=>$id_leitor
        ]);

        if(count($results) > 0 ){

            return $results;

        }

    }

    public function searchAluno(){

        $sql = new Sql();
        $busca = null;

        if($this->getnome()){

            $busca .= " AND nome_leitor LIKE '%".trim($this->getnome())."%'";

        }
        
        if($this->getmatricula()){

            $busca .= " AND matricula_leitor = '".$this->getmatricula()."'";

        }

        return $sql->select("SELECT * FROM leitor WHERE status_leitor = 1 $busca ORDER BY leitor_id");

    }

    public function verifyMatricula($matricula){

        $sql = new Sql();

        return $sql->numRow("SELECT * FROM leitor WHERE matricula_leitor = $matricula AND status_leitor = 1");

    }


    public function getPages($page = 1, $alunosForPages = 6){


        $start = ($page - 1) * $alunosForPages;

        $sql = new Sql();

        $results = $sql->select("SELECT COUNT(*) FROM leitor LIMIT $start, $alunosForPages");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $alunosForPages)
        ];

    }


}