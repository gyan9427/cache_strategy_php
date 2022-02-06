<?php

namespace App\Utilities;

class VarCache{
    var $_name;

    public function __construct($name){
        $this->_name ='cache/'.$name;
    }

    public function set($value){
        $file_handle = fopen($this->_name.'.php','w');
        fwrite($file_handle,$value);
        fclose($file_handle);
    }

    public function get(){

        if($this->isValid()){
            return file_get_contents($this->_name.'.php');
        }

    }

    public function isValid(){
        return file_exists($this->_name.'.php');
    }
}