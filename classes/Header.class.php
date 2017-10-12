<?php
class Header {
	private $aHeader;
	
	function __construct() {
		$this->aHeader = array();
        $this->addLine("<meta name='viewport' content='width=device-width, initial-scale=1.0'>\n");
		$this->addCss("bootstrap.css");
		$this->addCss("main-style.css");
	}

	function addLine($line){
	    array_push($this->aHeader, $line);
    }

	function addCss($css){
		$this->addLine("<link rel='stylesheet' type='text/css' href='" . BaseClass::$oVariables->sDomainOnly . BaseClass::$oVariables->sTemplateFolder . "css/" . $css . "' />\n");
	}

	function setTitle($title){
	    $this->addLine("<title>".$title." | Snelle Wiel</title>");
    }
	
	function show() {
		foreach ($this->aHeader as $key => $value){
			echo $value;
		}
	}
}