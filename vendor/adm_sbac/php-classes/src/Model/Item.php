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
        
        $results = $sql->query("INSERT INTO item VALUES(DEFAULT,:titulo,:origem,:data_aq,:data_publ,:autor,:cod_tomb,:editora,:foto,:status_item) ", array(
            ":titulo"=>$this->gettitulo(),
            ":origem"=>$this->getorigem(),
            ":data_aq"=>date("Y-m-d",strtotime($this->getdata_aq())),
            ":autor"=>$this->getautor(),
            ":cod_tomb"=>$this->getcod_tomb(),
            ":editora"=>$this->geteditora(),
            ":data_publ"=>date("Y-m-d",strtotime($this->getdata_publ())),
            ":foto"=>$this->getfoto(),
            ":status_item"=>'1'
        ));

        
        //$this->setData($results[0]);

    }

    public function update($id_item){

        

        $sql = new Sql();
        
        $results = $sql->query("UPDATE item  SET titulo = :titulo, origem = :origem, data_aq = :data_aq
        , autor = :autor, cod_tomb = :cod_tomb, editora = :editora, data_publ = :data_publ, url_img = :url_img WHERE item_id  = :id", array(
           ":titulo"=>$this->gettitulo(),
           ":origem"=>$this->getorigem(),
           ":data_aq"=>date("Y-m-d",strtotime($this->getdata_aq())),
           ":autor"=>$this->getautor(),
           ":cod_tomb"=>$this->getcod_tomb(),
           ":editora"=>$this->geteditora(),
           ":data_publ"=>date("Y-m-d",strtotime($this->getdata_publ())),
           ":url_img"=>$this->geturl_img(),
           ":id"=>$id_item
        ));
        
        //$this->setData($results[0]);

    }

    public function delet($id_item){

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

    public function searchItem(){

        $sql = new Sql();
        $busca = null;

        if($this->gettitulo()){

            $busca .= " AND titulo LIKE '%".trim($this->gettitulo())."%'";

        }
        
        if($this->getcod_tomb()){

            $busca .= " AND cod_tomb = '".$this->getcod_tomb()."'";

        }

        return $sql->select("SELECT * FROM item WHERE status_item = 1 $busca ORDER BY item_id");

    }

    public function verifyCodTomb($codTomb){

        $sql = new Sql();

        return $sql->numRow("SELECT * FROM item WHERE cod_tomb = $codTomb AND status_item = 1");

    }


    public function getPages($page = 1, $alunosForPages = 6){


        $start = ($page - 1) * $alunosForPages;

        $sql = new Sql();

        $results = $sql->select("SELECT  SQL_CALC_FOUND_ROWS * FROM leitor LIMIT $start, $alunosForPages");

        $resultTotal = $sql->select(" SELECT COUNT(*) AS nrtotal FROM leitor LIMIT $start, $alunosForPages");

        return [
            "data"=>$results,
            "total"=>(int)$resultTotal[0]['nrtotal'],
            "pages"=>ceil($resultTotal[0]['nrtotal'] / $alunosForPages)
        ];

    }

}