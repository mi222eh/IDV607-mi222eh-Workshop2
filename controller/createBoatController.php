<?php

class createBoatController{
    private $createBoatView;
    private $memberView;
    private $memberCat;
    
    function __construct($memberCat, $createBoatView, $memberView){
        $this->createBoatView = $createBoatView;
        $this->memberCat = $memberCat;
        $this->memberView = $memberView;
    }
    
    function doAddBoat(){
        if($this->createBoatView->doesUserWantToCreateNewBoat()){
            $memberiD = $this->memberView->getEditId();
            $type = $this->createBoatView->getType();
            $length = $this->createBoatView->getLength();
            
            $this->memberCat->addBoatToMemberId($type, $length, $memberiD);
            header("location: ?");
        }
    }
}