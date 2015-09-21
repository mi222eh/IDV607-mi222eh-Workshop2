<?php

class BoatsDAL{
    
    private $location;
    
    function __contruct(){
        $this->location = 'data/members.users';
    }
    
    function getMembers(){
        $str = file_get_contents($this->location);
        return unserialize($str);
    }
    
    function saveMembers($members){
        $str = serialize($members);
        file_put_contents($this->location, $str);
    }
    
}