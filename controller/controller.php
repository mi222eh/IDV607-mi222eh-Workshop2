<?php

class controller{
    private $memberCatalogue;
    private $containerView;
    
    public function __construct($memberCatalogue, $containerView) {
        $this->memberCatalogue = $memberCatalogue;
        $this->containerView = $containerView;
    }
    
    public function doAction() {
        if($this->containerView->doesUserWantToWatchVerboseList()){
            $this->containerView->setUserWantToGoToVerboseView();
        }
        
        else if($this->containerView->doesTheUserWantToCreate()){
            
            $this->containerView->setUserWanToGoToCreateNewMember();
        }
        else if(false) {
            
        }
        else if(false) {
            
        }
        else {
            
        }

    }
}