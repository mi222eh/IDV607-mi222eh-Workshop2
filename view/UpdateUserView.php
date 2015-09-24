<?php

class UpdateUserView{
    
    function response(){
        //ATT GÖRA: Generera skapa medlem formulär
        $ret = '<form method="POST" action="">
                    <fieldset>
                        <legend>Skapa ny användare</legend>
                        Namn: <input type="text">' . $this->getName() . $ret .= '</input><br>
                        Personnr: <input type="number"></input><br>
                        <input type="submit" value="Skapa"></input>
                    </fieldset>
                </form>';
        return $ret;
    }
}