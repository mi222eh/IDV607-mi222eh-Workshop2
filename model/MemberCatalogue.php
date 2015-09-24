<?php

class MemberCatalogue {
    
    private $members = array();
    private $DAL;
    
    public function __construct(){
        
        $DAL = new MembersDAL();
        $members = $DAL->getMembers();
        if($members !== null){
            $this->members = $members;
        }
        else{
            $this->member = array();
        }
        
        $this->DAL = $DAL;
        
        $this->add(new Member(rand(), 'Bengan', 19760405, null));
        $this->add(new Member(rand(), 'Lars', 1337, null));
        $this->add(new Member(rand(), 'Lars', 1337, null));
        
        $this->members[0]->addBoat(new Boat(12, "Gummiplåt"));
        $this->members[1]->addBoat(new Boat(13, "Yacht"));
        $this->members[2]->addBoat(new Boat(14, "Träfloppa"));
        $this->members[0]->addBoat(new Boat(14, "MUAHAHAHAHAHA"));
    }
    
    public function add($member) {
        
        $this->members[] = $member;
        $this->saveMembers();
    }
    
    public function getMembers(){
        return $this->members;
    }
    
    public function getMemberById($id){
        
    }
    
    public function saveMembers(){
        $this->DAL->saveMembers($this->members);
    }
}