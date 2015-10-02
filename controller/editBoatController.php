<?php

class editBoatController{
    private $createBoatView;
    private $memberCatalogue; 
    private $memberView;
    /*
    <-----Edit Boat Controller----->
    
    Description:
    Edits or prepares a boat
    
    Constructor parameters:
    -Membercatalogue from model
    -MemberView from View
    -CreateBoatView from View
    */
    function __construct($createBoatView, $memberCatalogue, $memberView){
        $this->createBoatView = $createBoatView;
        $this->memberCatalogue = $memberCatalogue;
        $this->memberView = $memberView;
    }
    
    function doEditBoat(){
        $boatId = $this->memberView->getEditBoatId();
        $type = $this->createBoatView->getType();
        $length = $this->createBoatView->getLength();
        $id = $this->memberView->getEditId();
    
        $this->memberCatalogue->editBoatByMemberId($id, $type, $length, $boatId);
        
        header("location: ?");
    }
    
    function prepareEdit(){
        $id = $this->memberView->getEditId();
        $boatId = $this->memberView->getEditBoatId();
        $this->memberCatalogue->setBoatToWatch($id, $boatId);
    }
}