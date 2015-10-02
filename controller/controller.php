<?php

class controller{
    private $memberCatalogue;
    private $containerView;
    private $createController;
    private $memberListView;
    private $deleteMemberController;
    private $createBoatController;
    private $deleteBoatController;
    private $editBoatController;
    
    /*
    Main 
    */
    public function __construct($memberCatalogue, 
    $containerView, 
    $createController, 
    $memberListView, 
    $deleteMemberController, 
    $editMemberController, 
    $createBoatController, 
    $deleteBoatController, 
    $editBoatController) {
        $this->memberCatalogue = $memberCatalogue;
        $this->containerView = $containerView;
        $this->createController = $createController;
        $this->memberListView = $memberListView;
        $this->deleteMemberController = $deleteMemberController;
        $this->editMemberController = $editMemberController;
        $this->createBoatController = $createBoatController;
        $this->deleteBoatController = $deleteBoatController;
        $this->editBoatController = $editBoatController;
    }
    
    public function doAction() {
        if($this->containerView->doesUserWantToWatchVerboseList()){
            $this->containerView->setUserWantToGoToVerboseView();
        }
        
        else if($this->containerView->doesTheUserWantToCreate()){
            $this->containerView->setUserWantToGoToCreateNewMember();
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
            elseif($this->containerView->doesUserWantToDeleteBoat()){
                $this->deleteBoatController->doDelete();
            }
            elseif($this->containerView->doesUserWantToAddBoat()){
                $this->createBoatController->doAddBoat();
            }
            elseif($this->containerView->doesUserWantToEditBoat()){
                if($this->containerView->didUserClickEditBoat()){
                   $this->editBoatController->doEditBoat(); 
                }
                else{
                    $this->editBoatController->prepareEdit();
                }
            }
            else{
                $this->editMemberController->prepareEdit();
            }
        }
    }
}