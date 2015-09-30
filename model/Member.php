<?php

class Member{
    private $id;
    private $name;
    private $personalNumber;
    private $boats = array();
    
    function __construct($id, $name, $personalNumber){
        $this->id = $id;
        $this->name = $name;
        $this->personalNumber = $personalNumber;
        
        if(isset($boats)){
            $this->boats = $boats;
        }
        
    }
    public function changeName($name) {
        $this->name = $name;
    }
    
    public function changePersonalNumber($personalNumber) {
        $this->personalNumber = $personalNumber;
    }
    
    function getId() {
        return $this->id;
    }
    function getPersonalNumber(){
        return $this->personalNumber;
    }
    
    function getName(){
        return $this->name;
    }
    function addBoat(Boat $boat){
        $this->boats[] = $boat;
    }
    function getBoats(){
        return $this->boats;
    }
    
    public function deleteBoat($id) {
        //$this->boats[]->$id; //hur deleta från array??　Jag vet i fan - BG
    }
    function getNumberOfBoats(){
        return count($this->boats);
    }
    
    function setName($name){
        $this->name;
    }
    
    function setSsn($ssn){
        $this->personalNumber = $ssn;
    }
}
