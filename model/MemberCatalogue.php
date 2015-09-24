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
            $this->members = array();
        }
        
        $this->DAL = $DAL;
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