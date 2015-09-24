<?php

class ContainerView {
    
    
    private $memberCatalogue;
    private $memberCompactView;
    private $memberVerboseView;
    private $navigationView;
    
    function __construct($memberCatalogue, $memberCompactView, $memberVerboseView, $navigationView){
        $this->memberCatalogue = $memberCatalogue;
        $this->memberCompactView = $memberCompactView;
        $this->memberVerboseView = $memberVerboseView;
        $this->navigationView = $navigationView;
    }
    
    public function response() {
        $ret = '';
        if($this->navigationView->doesUserWantToWatchVerbose()){
            $ret .= $this->memberVerboseView->response($this->memberCatalogue);
        }
        elseif($this->navigationView->doesUserWantToCreateNewMember()){
            
        }
        else {
            $ret .= $this->memberCompactView->response($this->memberCatalogue);
        }
       return $ret;
    }
    
    public function doesTheUserWantToCreate() {
        
    }
    
    public function doesTheUserWantToEdit() {
        
    }
    
    public function doesTheUserWantToErase() {
        
    }

}