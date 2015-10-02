<?php

class MembersDAL{
    
    private $directory = "members.users";
    /*
    <-----Members Data Access Layer----->
    
    Description:
    Handles loading and saving of members
    
    Constructor parameters:
    -Nothing
    */
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