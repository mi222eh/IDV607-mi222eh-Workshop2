<?php

class MemberCatalogue {
    
    private $members = array();
    private $DAL;
    
    public function __construct(){
        /*
        $DAL = new MembersDAL();
        $this->members = $DAL->getMembers();
        $this->DAL = $DAL;
        */
        
        $this->add(new Member(rand(), 'BENGAN', 19760405, $boats));
        $this->add(new Member(rand(), 'Lars', 1337, $boats));
        $this->add(new Member(rand(), 'Lars', 1337, $boats));
        
        $this->members[0]->addBoat(new Boat(12, "Gummiplåt"));
        $this->members[1]->addBoat(new Boat(13, "Yacht"));
        $this->members[2]->addBoat(new Boat(14, "Träfloppa"));
        $this->members[0]->addBoat(new Boat(14, "MUAHAHAHAHAHA"));
    }
    
    public function add($member) {
        array_push($this->members, $member);
    }
    
    public function getMembers(){
        return $this->members;
    }
}