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
    <-----Controller----->
    
    Description:
    Handles user input
    
    Constructor parameters:
    -Every controller from controllers
    -Membercatalogue from model
    -ContainerView from View
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
    
    /*
        Handles user input
    */
    public function doAction() {
        
        //Check intention: Verbose list
        if($this->containerView->doesUserWantToWatchVerboseList()){
            $this->containerView->setUserWantToGoToVerboseView();
        }
        
        //Check intention: Create member
        else if($this->containerView->doesTheUserWantToCreate()){
            $this->containerView->setUserWantToGoToCreateNewMember();
            if($this->containerView->didUserClickCreateMember()){
                $this->createController->doCreate();
            }
        }
        
        //Check intention: Watch member
        else if($this->containerView->doesUserWantToWatchMember()) {
            $this->memberCatalogue->toWatch($this->memberListView->getMemberId());
        }
        else if($this->containerView->doesTheUserWantToErase()){
            $this->deleteMemberController->doErase();
        }
        
        //Check intention: Edit member
        else if($this->containerView->doesTheUserWantToEdit()){
            
            //Check intention: Edit member (clicked)
            if($this->containerView->doesTheUserPressEdit()){
                $this->editMemberController->doEdit();
            }
            
            //Check intention: Delete boat
            elseif($this->containerView->doesUserWantToDeleteBoat()){
                $this->deleteBoatController->doDelete();
            }
            
            //Check intention: Add boat
            elseif($this->containerView->doesUserWantToAddBoat()){
                $this->createBoatController->doAddBoat();
            }
            
            //Check intention: Edit boat
            elseif($this->containerView->doesUserWantToEditBoat()){
                
                //Check intention: Edit boat (clicked)
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