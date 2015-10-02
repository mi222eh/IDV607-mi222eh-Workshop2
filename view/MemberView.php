<?php

class MemberView{
    
    private static $editMember = "editmember";
    private static $deleteMember = "deletemember";
    private static $newBoat = "newboat";
    private static $deleteBoat = "deleteBoat";
    private static $editBoat = "editBoat";
    
    function response($memberCatalogue){
        
        $member = $memberCatalogue->getToBeViewed();
        
        $ret = '';
        
        $ret .= '<div class="memberContainer">';
        
        $ret .= '<h1>'. $member->getName() .'</h1>';
        
        $ret .= '<ul>';
        
        $ret .= '<li>MedlemsId: '. $member->getId() .'</li>';
        $ret .= '<li>Pnr: ' . $member->getPersonalNumber() . '</li>';
        $ret .= '</ul>';
        
        $ret .= '<h2>Båtar</h2>';
        $ret .= '<ul>';
        $boatnr = 0;
        foreach($member->getBoats() as $boat) {
            $boatnr++;
            $ret .= '<div class="boatContainer">';
            $ret .= '<li><h3>Båt '. $boatnr . '</h3></li>';
            $ret .= '<li>Typ: ' . $boat->getType() .' </li>';
            $ret .= '<li>Längd: ' . $boat->getLength() .' meter</li>';
            $ret .='<a href="?'. self::$editMember .'='. $member->getId() .'&'. self::$editBoat .'='. $boat->getId() .'">Redigera båt</a>';
            $ret .='<a href="?'. self::$editMember .'='. $member->getId() .'&'. self::$deleteBoat .'='. $boat->getId() .'">Ta bort båt</a>';
            $ret .= '</div>';
        }
        
        if(empty($member->getBoats())){
            $ret .= '<p>Medlemmen har inga båtar!</p>';
        }
        $ret .= '</ul>';
        
        $ret .= '<a href="?'. self::$editMember .'='. $member->getId().'">Redigera medlem</a>';
        $ret .= '<a href="?'. self::$deleteMember .'='. $member->getId().'">Ta bort medlem</a>';
        
        
        //ny båt här
        $ret .='<br /><a href="?'. self::$editMember .'='. $member->getId() .'&'. self::$newBoat .'">Lägg till ny båt</a>';
        
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
    
    function getDeleteBoatId(){
        return $_GET[self::$deleteBoat];
    }
    
    function userWantToDeleteBoat(){
        return isset($_GET[self::$deleteBoat]);
    }
    
    function userWantToEditBoat(){
        return isset($_GET[self::$editBoat]);
    }
    
    function getEditBoatId(){
        return $_GET[self::$editBoat];
    }
}