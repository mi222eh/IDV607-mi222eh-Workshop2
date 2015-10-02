<?php

class MemberView{
    
    private static $editMember = "editmember";
    private static $deleteMember = "deletemember";
    private static $newBoat = "newboat";
    
    function response($memberCatalogue){
        
        $member = $memberCatalogue->getToBeViewed();
        
        $ret = '';
        
        $ret .= '<div class="memberContainer">';
        
        $ret .= '<h2>'. $member->getName() .'</h2>';
        
        $ret .= '<ul>';
        
        $ret .= '<li>MedlemsId: '. $member->getId() .'</li>';
        $ret .= '<li>Pnr: ' . $member->getPersonalNumber() . '</li>';
        $ret .= '</ul>';
        
        $ret .= '<h3>Båtar</h3>';
        $ret .= '<ul>';
        
        foreach($member->getBoats() as $boat) {
            $ret .= '<li>' . $boat->getLength() .' </li>';
            $ret .= '<li>' . $boat->getType() .' </li>';
        }
        
        if(empty($member->getBoats())){
            $ret .= '<p>Medlemmen har inga båtar!</p>';
        }
        $ret .= '</ul>';
        
        $ret .= '<a href="?'. self::$editMember .'='. $member->getId().'">Redigera medlem</a>';
        $ret .= '<a href="?'. self::$deleteMember .'='. $member->getId().'">Ta bort medlem</a>';
        
        
        //ny båt här
        $ret .='<a href="?'. self::$editMember .'='. $member->getId() .'&'. self::$newBoat .'">Lägg till ny båt</a>';
        
        $ret .= '</div>';
        
        return $ret;
    }
    
    function userWantToErase(){
        return isset($_GET[self::$deleteMember]);
    }
    
    function userWantToEdit(){
        return isset($_GET[self::$editMember]);
    }
    
    function userWantToAddBoat(){
        return isset($_GET[self::$newBoat]);
    }
    
    function getEraseId(){
        return $_GET[self::$deleteMember];
    }
    
    function getEditId(){
        return $_GET[self::$editMember];
    }
}