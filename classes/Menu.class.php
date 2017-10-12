<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 11-10-2017
 * Time: 14:31
 */
class Menu
{
    private $aMenuItems;

    function __construct()
    {
        $this->aMenuItems = array();
        $this->setMenu();
    }

    function setMenu(){
        $this->addItem("Planning", "", 1, false);
        $this->addItem("Chauffeurs", "chauffeurs", 1, true);
    }

    function addItem($name, $link, $auth, $dialog){
        $array = array();
        $array['name'] = $name;
        $array['link'] = BaseClass::$oVariables->sDomainOnly . $link;
        $array['authority'] = $auth;
        $array['dialog'] = $dialog;
        array_push($this->aMenuItems, $array);
    }

    function show(){

        foreach($this->aMenuItems as $key => $value){
            include BaseClass::$oVariables->sMarkupFolder . "menu_item.php";
        }
    }
}