<?php

class Member{
    private $id;
    private $name;
    private $personalNumber;
    private $boats = array();
    private $boatToWatch;
    
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
    function addBoat($type, $length){
        $id = 0;
        foreach($this->boats as $boat){
            if($boat->getId() > $id){
                $id = $boat->getId();
            }
        }
        $id++;
        
        $this->boats[] = new Boat($length, $type, $id);
    }
    function getBoats(){
        return $this->boats;
    }
    
    public function deleteBoat($id) {
        foreach($this->boats as $key=>$boat){
            if($boat->getId() == $id){
                unset($this->boats[$key]);
            }
        }
    }
    function getNumberOfBoats(){
        return count($this->boats);
    }
    
    function setName($name){
        $this->name = $name;
    }
    
    function setSsn($ssn){
        $this->personalNumber = $ssn;
    }
    
    function setToWatch($id){
        foreach($this->boats as $boat){
            if($boat->getId() == $id){
                $this->boatToWatch = $boat;
            }
        }
    }
    
    function getBoatById($id){
        foreach($this->boats as $boat){
            if($boat->getId() == $id){
                return $boat;
            }
        }
    }
    
    function getToWatch(){
        return $this->boatToWatch;
    }
    
    function editBoatById($boatId, $type, $length){
        $boat = $this->getBoatById($boatId);
        
        $boat->setType($type);
        $boat->setLength($length);
    }
}
