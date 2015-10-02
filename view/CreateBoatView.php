<?php

class CreateBoatView{
    private static $length = 'POST::LENGTH';
    private static $type = 'POST::TYPE';
    private static $createNewBoat = 'POST::CREATEBOAT';
    private static $edit = 'POST::EDITBOAT';
    
    function response($editMode, $memberCat){
        $ret ='';
        if($editMode){
            $ret .= $this->generateEditBoat($memberCat);
        }
        else{
            $ret .= $this->generateCreateNewBoat();
        }
        return $ret;
            
    }
    function doesUserWantToCreateNewBoat(){
        return isset($_POST[self::$createNewBoat]);
    }
    
    function getLength(){
        return $_POST[self::$length];
    }
    
    function getType(){
        return $_POST[self::$type];
    }
    
    function generateCreateNewBoat(){
        $ret = '<form method="POST">
                    <fieldset>
                        <legend>Skapa ny båt</legend>
                        Typ: <input type="text" id="'. self::$type .'" name="'. self::$type .'"></input><br>
                        Längd: <input type="number" id="'. self::$length .'" name="'. self::$length .'"></input><br>
                        <input type="submit" value="Skapa båt" id="'. self::$createNewBoat .'" name="'. self::$createNewBoat .'"></input>
                    </fieldset>
                </form>';
        return $ret;
    }
    
    function generateEditBoat($memberCat){
        $boat = $memberCat->getToBeViewed()->getToBeViewedBoat();
        
        $ret = '<form method="POST">
                    <fieldset>
                        <legend>Redigera båt</legend>
                        Typ: <input type="text" value="'. $boat->getType() .'" id="'. self::$type .'" name="'. self::$type .'"></input><br>
                        Längd: <input type="number" value="'. $boat->getLength() .'"  id="'. self::$length .'" name="'. self::$length .'"></input><br>
                        <input type="submit" value="Uppdatera båt" id="'. self::$edit .'" name="'. self::$edit .'"></input>
                    </fieldset>
                </form>';
        return $ret;
    }
    
    function didUserClickEdit(){
        return isset($_POST[self::$edit]);
    }
    
}