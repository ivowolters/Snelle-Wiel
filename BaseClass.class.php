<?php
class BaseClass {
    public static $oVariables;
    public static $oHeader;
    public static $oTemplate;
    public static $oMenu;

	function __construct () {
		self::$oVariables = new Variable();
        self::$oTemplate = new Template();
        self::$oHeader = new Header();
        self::$oMenu = new Menu();

        $this->getObject(self::$oVariables->aExtentions[0]);
	}

	function getObject($str){
        try {
            $str = strtolower($str);
            $file = "views/" . $str . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                throw new exception();
            }
        } catch(exception $e) {
            if($str == ""){
                include "views/home.php";
            } else {
                include "views/404.php";
            }
        }
    }
}
