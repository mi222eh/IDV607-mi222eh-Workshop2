<?php

class MemberListView{
    
    private static $member = "member";
    
    function response($memberCatalogue, $isVerbose){
        $ret = '';
        if($isVerbose){
            $ret .= $this->renderVerboseList($memberCatalogue);
        }
        else{
            $ret .= $this->renderCompactList($memberCatalogue);
        }
        
        return $ret;
    }
    
    function renderVerboseList($memberCatalogue){
        $members = $memberCatalogue->getMembers();
        $ret = '';
        $ret .= '<ul>';
        foreach($members as $member){
            $ret .= '<div class="memberContainer">';
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
            $ret .= $this->generateLinks($member);
            $ret .='</ul>';
            $ret .= '</div>';
        }
        
        if(empty($memberCatalogue->getMembers())){
            $ret .='Det finns inga medlemmar din jävla nolla :)';
        }

        
        $ret .='</ul>';
        
        return $ret;
    }
    
    function renderCompactList($memberCatalogue){
        $ret = '<ul>';
        foreach($memberCatalogue->getMembers() as $member){
            $ret .= '<div class="memberContainer">';
            
            $ret .= '<li><h2>Namn: '. $member->getName() .'</h2></li>';
            
            $ret .= '<li>Id: '. $member->getId() . '</li>';
            
            $ret .= '<li>Antal båtar: '. $member->getNumberOfBoats() . '</li>';
            
            $ret .= $this->generateLinks($member);
            
            $ret .= '</div>';
        
        }
        
        if(empty($memberCatalogue->getMembers())){
            $ret .='Det finns inga medlemmar din jävla nolla :)';
        }
        
        $ret .='</ul>';
        
        return $ret;
    }
    
    private function generateLinks($member){
        $ret = '';
        
        $ret .= '<a href="?'. self::$member .'='. $member->getId().'">Detaljer</a>';
        
        return $ret;
    }
    
    public function userWantToWatchMember(){
        return isset($_GET[self::$member]);
    }
    
    public function getMemberId(){
        return ($_GET[self::$member]);
    }
}