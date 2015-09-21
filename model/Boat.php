<?php

class Boat {

    private $length;
    private $type;
    
    function __construct($length, $type){
        $this->length = $length;
        $this->type = $type;
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
}