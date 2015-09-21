<?php

class MemberVerboseView{
    
    function response($memberCatalogue){
        $members = $memberCatalogue->getMembers();
        $ret;
        $ret -= '<ul>';
        foreach($members as $member){
            $number = 1;
            $ret .='<li><h2>Namn: ' . $member->getName() . '</h2></li>
            <li>Personnr: '. $member->getPersonalNumber() .'</li>
            <li>MedlemsId: '. $member->getId() .'</li>';
            $ret .='<ul>';
            foreach($member->getBoats() as $boat){
                $ret .='<li>
                            <h3>Båt: ' . $number . '</h3>
                        </li>';
                $ret .='<li>
                            Typ: ' . $boat->getType() . 
                        '</li>';
                $ret .='<li>
                            Längd: ' . $boat->getLength() . 
                        '</li>';
                        
                $number++;
            }
            $ret .='</ul>';
        }
        
        $ret .='</ul>';
        
        return $ret;
    }
     
}