<?php

class createMemberController{
    private $memberCatalogue;
    private $createView;
    
    function __construct(MemberCatalogue $memberCatalogue, CreateMemberView $createMemberView){
        $this->memberCatalogue = $memberCatalogue;
        $this->createView = $createMemberView;
    }
    
    function doCreate(){
        $name = $this->createView->getName();
        $ssn = $this->createView->getSsn();
        
        $this->memberCatalogue->add($name, $ssn);
        
        header("location: ?");
    }
}