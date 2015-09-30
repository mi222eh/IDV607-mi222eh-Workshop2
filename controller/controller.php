<?php

class controller{
    private $memberCatalogue;
    private $containerView;
    private $createController;
    private $memberListView;
    private $deleteMemberController;
    
    public function __construct($memberCatalogue, $containerView, $createController, $memberListView, $deleteMemberController, $editMemberController) {
        $this->memberCatalogue = $memberCatalogue;
        $this->containerView = $containerView;
        $this->createController = $createController;
        $this->memberListView = $memberListView;
        $this->deleteMemberController = $deleteMemberController;
        $this->editMemberController = $editMemberController;
        }
    
    public function doAction() {
        if($this->containerView->doesUserWantToWatchVerboseList()){
            $this->containerView->setUserWantToGoToVerboseView();
        }
        
        else if($this->containerView->doesTheUserWantToCreate()){
            $this->containerView->setUserWanToGoToCreateNewMember();
            if($this->containerView->didUserClickCreateMember()){
                $this->createController->doCreate();
            }
        }
        else if($this->containerView->doesUserWantToWatchMember()) {
            $this->memberCatalogue->toWatch($this->memberListView->getMemberId());
        }
        else if($this->containerView->doesTheUserWantToErase()){
            $this->deleteMemberController->doErase();
        }
        
        else if($this->containerView->doesTheUserWantToEdit()){
            
            if($this->containerView->doesTheUserPressEdit()){
                $this->editMemberController->doEdit();
            }
            else{
                $this->editMemberController->prepareEdit();
            }
        }
        
        else {
            
        }
    }
}