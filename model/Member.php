<?php

class Member{
    private $id;
    private $name;
    private $telephoneNumber;
    
    function __contruct($id, $name, $telephoneNumber){
        $this->id = $id;
        $this->name = $name;
        $this->telephoneNumber = $telephoneNumber;
        
    }
    public function changeName($name) {
        $this->name = $name;
    }
}
