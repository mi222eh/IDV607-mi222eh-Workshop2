<?php

class MembersDAL{
    
    function __contruct(){
    }
    
    function getMembers(){
        
        if(filesize('members.users') > 0){
            $str = file_get_contents('members.users');
            return unserialize($str);
        }
        
        return null;
    }
    
    function saveMembers($members) {
        $str = serialize($members);
        file_put_contents('members.users', $str);
    }
}