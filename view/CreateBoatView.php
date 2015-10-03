<?php

class CreateBoatView{
    
    //Sailboat, Motorsailer, kayak/Canoe, Other
    
    private static $type_sailboat = 'Segelbåt';
    private static $type_motorsailer = 'Motorbåt med segel';
    private static $type_canoe = 'Kanot';
    private static $type_other = 'Annat';
    
    private static $length = 'POST::LENGTH';
    private static $type = 'POST::TYPE';
    private static $createNewBoat = 'POST::CREATEBOAT';
    private static $edit = 'POST::EDITBOAT';
    
    /*
    <-----Create Boat View----->
    
    Description:
    Input for creating or editing boat
    
    Constructor parameters:
    Nothing
    */
    
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
    
    //Typ: <input type="text" id="'. self::$type .'" name="'. self::$type .'"></input><br>
    
    function generateCreateNewBoat(){
        $ret = '<form method="POST">
                    <fieldset>
                        <legend>Skapa ny båt</legend>
                        Typ: '. 
                        $this->getDropDownList()
                        .'
                        Längd: <input type="number" id="'. self::$length .'" name="'. self::$length .'"></input><br>
                        <input type="submit" value="Skapa båt" id="'. self::$createNewBoat .'" name="'. self::$createNewBoat .'"></input>
                    </fieldset>
                </form>';
        return $ret;
    }
    
    //Typ: <input type="text" value="'. $boat->getType() .'" id="'. self::$type .'" name="'. self::$type .'"></input><br>
    
    function generateEditBoat($memberCat){
        $member = $memberCat->getToBeViewed();
        $boat = $member->getToWatch();
        
        $ret = '<form method="POST">
                    <fieldset>
                        <legend>Redigera båt</legend>
                        Typ: '.
                        $this->getEditDropDownList($boat)
                        .'
                        Längd: <input type="number" value="'. $boat->getLength() .'"  id="'. self::$length .'" name="'. self::$length .'"></input><br>
                        <input type="submit" value="Redigera båt" id="'. self::$edit .'" name="'. self::$edit .'"></input>
                    </fieldset>
                </form>';
        return $ret;
    }
    
    
    
    private function getDropDownList(){
        return '<select name="'. self::$type .'" id="'. self::$type .'">
                    <option value="'. self::$type_canoe .'">'. self::$type_canoe .'</option>
                    <option value="'. self::$type_motorsailer .'">'. self::$type_motorsailer .'</option>
                    <option value="'. self::$type_sailboat .'">'. self::$type_sailboat .'</option>
                    <option value="'. self::$type_other .'">'. self::$type_other .'</option>
                </select><br>
        
    ';
    }
    
    private function getEditDropDownList($boat){
        $type = $boat->getType();
        return '<select name="'. self::$type .'" id="'. self::$type .'">
                    <option value="'. self::$type_canoe .'" '. $this->isSelected($type, self::$type_canoe) .'>'. self::$type_canoe .'</option>
                    <option value="'. self::$type_motorsailer .'" '. $this->isSelected($type, self::$type_motorsailer) .'>'. self::$type_motorsailer .'</option>
                    <option value="'. self::$type_sailboat .'" '. $this->isSelected($type, self::$type_sailboat) .'>'. self::$type_sailboat .'</option>
                    <option value="'. self::$type_other .'" '. $this->isSelected($type, self::$type_other) .'>'. self::$type_other .'</option>
                </select><br>
    ';
    }
    
    private function isSelected($string1, $string2){
        if($string1 == $string2){
            return 'selected';
        }
        return '';
    }
    
    function didUserClickEdit(){
        return isset($_POST[self::$edit]);
    }
    
}