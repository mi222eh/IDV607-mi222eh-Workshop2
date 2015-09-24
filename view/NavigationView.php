<?php

class NavigationView {
    private static $GETVerbose = 'verbose';
    private static $GETCompact = 'compact';
    private static $GETCreateNewMember = 'newMember';
    
    public function doesUserWantToWatchCompact(){
        return isset($_GET[self::$GETCompact]);
    }
    public function doesUserWantToWatchVerbose(){
        return isset($_GET[self::$GETVerbose]);
    }
    
    public function generateLinks(){
        $ret = '';
        $ret .='<ul>';
        $ret .='<li><a href="?'. self::$GETCompact .'=JA">Kompakt lista</a></li> ';
        $ret .='<li><a href="?'. self::$GETVerbose .'=JA">Utförlig lista</a></li> ';
        $ret .='<li><a href="?'. self::$GETCreateNewMember .'=JA">Skapa ny medlem</a></li> ';
        $ret .='</ul>';
        
        return $ret;
    }
    function doesUserWantToGoToCreateNewMember(){
        return isset($_GET[self::$GETCreateNewMember]);
    }
}