<?php

class Boat {
    private $size;
    private $type;
    private $image;
    
    function __construct($size, $type, $image){
        $this->size = $size;
        $this->type = $type;
        $this->image = $image;
    }
    
    function setSize($size){
        $this->size = $size;
    }
    
    function setType($type){
        $this->type = $type;
    }
    
    function setImage($image) {
        $this->image = $image;
    }
    
    function getSize() {
        return $this->size;
    }
    
    function getType() {
        return $this->type;
    }
    
    function getImage() {
        return $this->image;
    }
}