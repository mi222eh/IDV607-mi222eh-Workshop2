<?php

class deleteMemberController{
    private $memberView;
    private $memberCatalogue;
    function __construct($memberView, $memberCatalogue){
        $this->memberView = $memberView;
        $this->memberCatalogue = $memberCatalogue;
    }
    
    function doErase(){
        $id = $this->memberView->getEraseId();
        
        $this->memberCatalogue->deleteMember($id);
        
        header("location: ?");
    }
}