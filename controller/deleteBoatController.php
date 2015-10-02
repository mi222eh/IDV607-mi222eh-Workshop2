<?php

class deleteBoatController{
    
    private $memberCat;
    private $memberView;
    
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