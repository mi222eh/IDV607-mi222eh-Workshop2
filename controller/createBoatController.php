<?php
/*

*/

class createBoatController{
    private $createBoatView;
    private $memberView;
    private $memberCat;
    
    /*
    <-----Create Boat Controller----->
    
    Description:
    Handles creating new boats
    
    Constructor parameters:
    -Membercatalogue from model
    -CreateBoatViewView from View
    -MemberView from View
    */
    
    function __construct(Membercatalogue $memberCat, CreateBoatView $createBoatView, MemberView $memberView){
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