<?php

class deleteMemberController{
    private $memberView;
    private $memberCatalogue;
    
     /*<-----Delete Member Controller----->
    
    Description:
    Handles deleted members
    
    Constructor parameters:
    -MemberView from View
    -Membercatalogue from model
    */
    
    function __construct(MemberView $memberView, MemberCatalogue $memberCatalogue){
        $this->memberView = $memberView;
        $this->memberCatalogue = $memberCatalogue;
    }
    
    function doErase(){
        $id = $this->memberView->getEraseId();
        
        $this->memberCatalogue->deleteMember($id);
        
        header("location: ?");
    }
}