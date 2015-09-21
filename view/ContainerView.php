<?php

class ContainerView {
    private static $GETMember = 'member';
    private static $GETBoats = 'boats';
    private static $GETBoat = 'boat';
    
    private $memberCatalogue;
    private $memberCompactView;
    private $memberVerboseView;
    
    function __construct($memberCatalogue, $memberCompactView, $memberVerboseView){
        $this->memberCatalogue = $memberCatalogue;
        $this->memberCompactView = $memberCompactView;
        $this->memberVerboseView = $memberVerboseView;
    }
    
    public function response() {
        $ret;
        $ret = $this->memberCompactView->response($this->memberCatalogue);
        //$ret = $this->memberVerboseView->response($this->memberCatalogue);
       return $ret;
    }
    
    public function doesTheUserWantToCreate() {
        
    }
    
    public function doesTheUserWantToEdit() {
        
    }
    
    public function doesTheUserWantToErase() {
        
    }
}