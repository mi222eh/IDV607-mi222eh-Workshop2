<?php

class Boat {

    private $length;
    private $type;
    private $id;
    
    function __construct($length, $type, $id){
        $this->length = $length;
        $this->type = $type;
        $this->id = $id;
    }
    
    function setLength($length){
        $this->length = $length;
    }
    
    function getLength() {
        return $this->length;
    }
    
    function setType($type){
        $this->type = $type;
    }
    
    function getType() {
        return $this->type;
    }
    function getId(){
        return $this->id;
    }
}