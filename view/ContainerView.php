<?php

class ContainerView {
    
    //Models
    private $memberCatalogue;
    
    //Views
    private $memberCompactView;
    private $memberVerboseView;
    private $navigationView;
    private $createMemberView;
    
    //Status
    private $userWantToGoToVerboseView = false;
    private $userWantToGoToCompactView = false;
    private $userWantToGoToCreateNewMember = false;
    private $userWantToCreateMember = false;
    
    
    function __construct($memberCatalogue, $memberCompactView, $memberVerboseView, $navigationView, $createMemberView){
        $this->memberCatalogue = $memberCatalogue;
        $this->memberCompactView = $memberCompactView;
        $this->memberVerboseView = $memberVerboseView;
        $this->navigationView = $navigationView;
        $this->createMemberView = $createMemberView;
    }
    
    public function response() {
        $ret = '';
        if($this->userWantToGoToVerboseView){
            $ret .= $this->memberVerboseView->response($this->memberCatalogue);
        }
        else if($this->userWantToGoToCreateNewMember){
            $ret .= $this->createMemberView->response();
        }
        else {
            $ret .= $this->memberCompactView->response($this->memberCatalogue);
        }
       return $ret;
    }
    
    public function doesTheUserWantToCreate() {
        return $this->navigationView->doesUserWantToGoToCreateNewMember();
    }
    
    public function doesUserWantToWatchVerboseList(){
        return $this->navigationView->doesUserWantToWatchVerbose();
    }
    
    public function doesUserWantToWatchCompactList(){
        return $this->navigationView->doesUserWantToWatchCompact();
    }
    
    public function doesTheUserWantToEdit() {
        //NOTHING
    }
    
    public function doesTheUserWantToErase() {
        //NOTHING
    }
    
    public function setUserWantToGoToVerboseView() {
        $this->userWantToGoToVerboseView = true;
    }
    
    public function setUserWantToGoToCompactView(){
        $this->userWantToGoToCompactView = true;
    }
    
    public function setUserWanToGoToCreateNewMember(){
        $this->userWantToGoToCreateNewMember = true;
    }
}