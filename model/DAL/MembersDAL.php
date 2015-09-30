<?php

class MembersDAL{
    
    private $directory = "members.users";
    
    function __contruct(){
     
    }
    
    function getMembers(){
        
        if(filesize($this->directory) > 0){
            $str = file_get_contents($this->directory);
            return unserialize($str);
        }
        
        return null;
    }
    
    function saveMembers($members) {
        $str = serialize($members);
        file_put_contents($this->directory, $str);
    }
}