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
    function __construct(CreateBoatView $createBoatView, Membercatalogue $memberCatalogue, MemberView $memberView){
        $this->createBoatView = $createBoatView;
        $this->memberCatalogue = $memberCatalogue;
        $this->memberView = $memberView;
    }
    
    function doEditBoat(){
        $boatId = $this->memberView->getEditBoatId();
        $type = $this->createBoatView->getType();
        $length = $this->createBoatView->getLength();
        $id = $this->memberView->getEditId();
    
        try{
            $this->memberCatalogue->editBoatByMemberId($id, $type, $length, $boatId);
        }
        catch(Exception $e){
            header("location: ?");
        }
        header("location: ?");
    }
    
    function prepareEdit(){
        $id = $this->memberView->getEditId();
        $boatId = $this->memberView->getEditBoatId();
        try{
            $this->memberCatalogue->setBoatToWatch($id, $boatId);
        }
        catch(Exception $e){
            
        }
    }
}