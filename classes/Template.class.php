<?php
class Template {
	public $sMainTemplate;
	public $sHeader;
	public $aContent;
	public $aLeftSideBar;
	public $aRightSideBar;
	public $aFooter;
	
	function __construct() {
		$this->aContent = array();
		$this->aLeftSideBar = array();
		$this->aRightSideBar = array();
		$this->aFooter = array();
	}

	function setMainTemplate($template) {
	    $this->sMainTemplate = BaseClass::$oVariables->sTemplateFolder . "/markup/_" . $template . ".php";
    }
	
	function add($object, $place){
		switch($place){
			case "content":
				array_push($this->aContent, $object);
				break;
			case "left_sidebar":
				array_push($this->aLeftSideBar, $object);
				break;
			case "right_sidebar":
				array_push($this->aRightSideBar, $object);
				break;
		}
	}
	
	function remove() {
		
	}
	
	function show() {
	    if(file_exists($this->sMainTemplate)) {
            include $this->sMainTemplate;
        }
	}
}