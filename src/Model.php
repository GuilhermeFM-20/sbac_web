<?php

namespace SBAC;

class Model{

    const MSG = "UserMsg";

    private $values = [];

    public function __call($name, $args){

        $method = substr($name,0,3);

        $fieldName = substr($name,3,strlen($name));

        switch($method){

            case "get":
                return isset($this->values[$fieldName])? $this->values[$fieldName] : NULL;
            break;

            case "set":
                $this->values[$fieldName] = $args[0];
            break;

        }

    }

    public function setData($data = array()){

        foreach($data as $key => $value){

            $this->{"set".$key}($value);

        }

    }

    public function getValues(){

        return $this->values;

    }
    
	public static function setMessage($msg,$tipo){

		$_SESSION[Model::MSG] = array('msg'=>$msg,'tipo'=>$tipo);

	}

	public static function getMessage(){

		$msg = (isset($_SESSION[Model::MSG]) && $_SESSION[Model::MSG] != array()) ? $_SESSION[Model::MSG] : array();

		Model::clearMessage();

		return $msg;

	}

	public static function clearMessage(){

		$_SESSION[Model::MSG] = array('msg'=>'','tipo'=>'');

	}

}
