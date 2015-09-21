<?php

class MemberCompactView{
    function response($memberCatalogue){
        $ret = '<ul>';
        foreach($memberCatalogue->getMembers() as $member){
            $ret .= '<li><h2>Namn: '. $member->getName() .'</h2></li>';
            
            $ret .= '<li><p>Id: '. $member->getId() . '</p></li>';
            
            $ret .= '<li><p>Antal båtar: '. $member->getNumberOfBoats() . '</p></li>';
        }
        
        $ret .='</ul>';
        
        return $ret;
    }
}