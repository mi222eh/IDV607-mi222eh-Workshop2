<?php

class MemberView{
    
    private static $editMember = "editmember";
    private static $deleteMember = "deletemember";
    
    function response($memberCatalogue){
        
        $member = $memberCatalogue->getToBeViewed();
        
        $ret = '';
        
        $ret .= '<h2>'. $member->getName() .'</h2>';
        
        $ret .= '<ul>';
        
        $ret .= '<li>MedlemsId: '. $member->getId() .'</li>';
        $ret .= '<li>PersonNr: ' . $member->getPersonalNumber() . '</li>';
        $ret .= '</ul>';
        
        $ret .= '<h3>Båtar</h3>';
        $ret .= '<ul>';
        
        foreach($member->getBoats() as $boat) {
            $ret .= '<li>' . $boat;
            $ret .= '<li>';
        }
        
        if(empty($member->getBoats())){
            $ret .= '<p>Medlemmen har inga båtar!</p>';
        }
        $ret .= '</ul>';
        
        $ret .= '<a href="?'. self::$editMember .'='. $member->getId().'">Redigera</a>';
        $ret .= '<a href="?'. self::$deleteMember .'='. $member->getId().'">Ta bort</a>';
        
        return $ret;
    }
    
    function userWantToErase(){
        return isset($_GET[self::$deleteMember]);
    }
    
    function userWantToEdit(){
        return isset($_GET[self::$editMember]);
    }
    
    function getEraseId(){
        return $_GET[self::$deleteMember];
    }
    
    function getEditId(){
        return $_GET[self::$editMember];
    }
}