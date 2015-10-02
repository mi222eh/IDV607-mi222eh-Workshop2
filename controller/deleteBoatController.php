<?php

class deleteBoatController{
    
    private $memberCat;
    private $memberView;
    /*
    <-----Delete Boat Controller----->
    
    Description:
    Deletes a boat
    
    Constructor parameters:
    -Membercatalogue from model
    -MemberView from View
    */
    function __construct($memberCat, $memberView){
     $this->memberCat = $memberCat;
     $this->memberView = $memberView;
    }
    
    function doDelete(){
        $id = $this->memberView->getEditId();
        $boatId = $this->memberView->getDeleteBoatId();
        
        $this->memberCat->deleteBoatByMemberId($id, $boatId);
        header("location: ?");
    }
}