<?php

class CreateMemberView{
    private static $name = 'POST::NAME';
    private static $ssn = 'POST::SSN';
    private static $createNew = 'POST::CREATEMEMBER';
    private static $edit = 'POST::EDITMEMBER';
    
    function response($editMode, $memberCat){
        $ret ='';
        if($editMode){
            $ret .= $this->generateEditMember($memberCat);
        }
        else{
            $ret .= $this->generateCreateNewMember();
        }
        return $ret;
            
    }
    function doesUserWantToCreateNewMember(){
        return isset($_POST[self::$createNew]);
    }
    
    function getName(){
        return $_POST[self::$name];
    }
    
    function getSsn(){
        return $_POST[self::$ssn];
    }
    
    function generateCreateNewMember(){
        $ret = '<form method="POST">
                    <fieldset>
                        <legend>Skapa ny användare</legend>
                        Namn: <input type="text" id="'. self::$name .'" name="'. self::$name .'"></input><br>
                        Pnr: <input type="number" id="'. self::$ssn .'" name="'. self::$ssn .'"></input><br>
                        <input type="submit" value="Skapa medlem" id="'. self::$createNew .'" name="'. self::$createNew .'"></input>
                    </fieldset>
                </form>';
        return $ret;
    }
    
    function generateEditMEmber($memberCat){
        $member = $memberCat->getToBeViewed();
        
        $ret = '<form method="POST">
                    <fieldset>
                        <legend>Redigera användare</legend>
                        Namn: <input type="text" value="'. $member->getName() .'" id="'. self::$name .'" name="'. self::$name .'"></input><br>
                        Personnr: <input type="number" value="'. $member->getPersonalNumber() .'"  id="'. self::$ssn .'" name="'. self::$ssn .'"></input><br>
                        <input type="submit" value="Uppdatera medlem" id="'. self::$edit .'" name="'. self::$edit .'"></input>
                    </fieldset>
                </form>';
        return $ret;
    }
    
    function didUserClickEdit(){
        return isset($_POST[self::$edit]);
    }
}