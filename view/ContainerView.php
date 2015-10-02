<?php

class ContainerView {
    
    //Models
    private $memberCatalogue;
    
    //Views
    private $memberListView;
    private $navigationView;
    private $createMemberView;
    private $memberView;
    private $createBoatView;
    
    //Status
    private $userWantToGoToVerboseView = false;
    private $userWantToGoToCompactView = false;
    private $userWantToGoToCreateNewMember = false;
    private $userWantToCreateMember = false;
    private $userWantToAddBoat = false;
    
    
    function __construct($memberCatalogue,$memberListView, $navigationView, $createMemberView, $memberView, $createBoatView){
        $this->memberCatalogue = $memberCatalogue;
        $this->memberListView = $memberListView;
        $this->navigationView = $navigationView;
        $this->createMemberView = $createMemberView;
        $this->memberView = $memberView;
        $this->createBoatView = $createBoatView;
    }
    
    public function response() {
        $ret = '';
        
        if($this->userWantToGoToCreateNewMember){
            $ret .= $this->createMemberView->response(false, $this->memberCatalogue);
        }
        else if($this->doesUserWantToWatchMember()){
            $ret .= $this->memberView->response($this->memberCatalogue);
        }
        else if($this->doesTheUserWantToEdit()){
            if($this->doesUserWantToAddBoat()){
                $ret .= $this->createBoatView->response(false, $this->memberCatalogue);
            }
            elseif($this->doesUserWantToEditBoat()){
                $ret .= $this->createBoatView->response(true, $this->memberCatalogue);
            }
            else{
                $ret .= $this->createMemberView->response(true, $this->memberCatalogue);
            }
        }
        else{
            $ret .= $this->memberListView->response($this->memberCatalogue, $this->userWantToGoToVerboseView);
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
    
    public function doesUserWantToWatchMember(){
        return $this->memberListView->userWantToWatchMember();
    }
    
    public function doesTheUserWantToEdit() {
        return $this->memberView->userWantToEdit();
    }
    
    public function doesTheUserWantToErase() {
        return $this->memberView->userWantToErase();
    }
    
    public function doesTheUserPressEdit(){
        return $this->createMemberView->didUserClickEdit();
    }
    
    public function setUserWantToGoToVerboseView() {
        $this->userWantToGoToVerboseView = true;
    }
    
    public function setUserWantToGoToCompactView(){
        $this->userWantToGoToCompactView = true;
    }
    
    public function setUserWantToGoToCreateNewMember(){
        $this->userWantToGoToCreateNewMember = true;
    }
    
    public function didUserClickCreateMember(){
        return $this->createMemberView->doesUserWantToCreateNewMember();
    }
    
    public function doesUserWantToAddBoat(){
        return $this->memberView->userWantToAddBoat();
    }
    
    public function doesUserWantToDeleteBoat(){
        return $this->memberView-> userWantToDeleteBoat();
    }
    
    public function doesUserWantToEditBoat(){
        return $this->memberView->userWantToEditBoat();
    }
    
    public function didUserClickEditBoat(){
        return $this->createBoatView->didUserClickEdit();
    }
}