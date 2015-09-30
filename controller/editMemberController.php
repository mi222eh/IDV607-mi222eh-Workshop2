<?php

class editMemberController{
    private $createMemberView;
    private $memberView;
    private $memberCatalogue;
    function __construct($memberView, $memberCatalogue, $createMemberView){
        $this->memberView = $memberView;
        $this->memberCatalogue = $memberCatalogue;
        $this->createMemberView = $createMemberView;
    }
    
    function doEdit(){
        $id = $this->memberView->getEditId();
        $name = $this->createMemberView->getName();
        $ssn = $this->createMemberView->getSsn();
        
        $this->memberCatalogue->editMemberById($id, $name, $ssn);
        
        header("location: ?");
    }
    
    function prepareEdit(){
        $id = $this->memberView->getEditId();
        $this->memberCatalogue->toWatch($id);
    }
}