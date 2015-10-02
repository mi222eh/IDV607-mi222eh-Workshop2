<?php

class MemberCatalogue {
    
    private $members = array();
    private $DAL;
    private $toBeViewed;
    
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
    
    public function add($name, $ssn) {
        $id = 0;
        foreach($this->members as $member){
            if($member->getId() > $id){
                $id = $member->getId();
            }
        }
        $id++;
        
        $member = new Member($id, $name, $ssn);
        
        $this->members[] = $member;
        $this->saveMembers();
    }
    
    public function getMembers(){
        return $this->members;
    }
    
    public function getMemberById($id){
        foreach($this->members as $member){
            if($member->getId() == $id){
                return $member;
            }
        }
    }
    
    public function saveMembers(){
        $this->DAL->saveMembers($this->members);
    }
    
    public function deleteMember($id){
        foreach($this->members as $key=>$member){
            if($member->getId() == $id){
                unset($this->members[$key]);
            }
        }
        $this->saveMembers();
    }
    
    public function toWatch($id){
        $this->toBeViewed = $this->getMemberById($id);
    }
    
    public function getToBeViewed(){
        return $this->toBeViewed;
    }
    
    public function editMemberById($id, $name, $ssn){
        $member = $this->getMemberById($id);
        $member->setName($name);
        $member->setSsn($ssn);
        
        $this->saveMembers();
    }
    
    public function addBoatToMemberId($type, $length, $id){
        $member = $this->getMemberById($id);
        $member->addBoat($type, $length);
        
        $this->saveMembers();
    }
    
    function deleteBoatByMemberId($memberId, $boatId){
        $member = $this->getMemberById($memberId);
        $member->deleteBoat($boatId);
        
        $this->saveMembers();
    }
    
    function setBoatToWatch($memberId, $boatId){
        $member = $this->getMemberById($memberId);
        $member->setToWatch($memberId);
        $this->toBeViewed = $member;
    }
    
    public function editBoatByMemberId($id, $type, $length, $boatId){
        $member = $this->getMemberById($id);
        
        $member->editBoatById($boatId, $type, $length);
        
        $this->saveMembers();
    }
    
}