<?php

class CreateUserView{
    private static $name = 'POST::NAME';
    private static $ssn = 'POST::SSN';
    private static $createNew = 'POST::CREATE';
    function response(){
        $ret = '<form method="POST" action="">
                    <fieldset>
                        <legend>Skapa ny användare</legend>
                        Namn: <input type="text" id="'. self::$name .'"></input><br>
                        Personnr: <input type="number" id="'. self::$ssn .'"></input><br>
                        <input type="submit" value="Skapa" id="'. self::$createNew .'"></input>
                    </fieldset>
                </form>';
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
}