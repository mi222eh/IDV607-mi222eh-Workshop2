<?php

class editMemberController{
    private $createMemberView;
    private $memberView;
    private $memberCatalogue;
    
        /*
    <-----Controller----->
    
    Description:
    Handles editing members
    
    Constructor parameters:
    -MemberView from View
    -Membercatalogue from model
    -CreateMemberView from View
    */
    
    function __construct(MemberView $memberView, Membercatalogue $memberCatalogue, CreateMemberView $createMemberView){
        $this->memberView = $memberView;
        $this->memberCatalogue = $memberCatalogue;
        $this->createMemberView = $createMemberView;
    }
    
    function doEdit(){
        $id = $this->memberView->getEditId();
        $name = $this->createMemberView->getName();
        $ssn = $this->createMemberView->getSsn();
        try{
            $this->memberCatalogue->editMemberById($id, $name, $ssn);
        }
        catch(Exception $e){
            header("location: ?");
        }
        header("location: ?");
    }
    
    function prepareEdit(){
        $id = $this->memberView->getEditId();
        $this->memberCatalogue->toWatch($id);
    }
}