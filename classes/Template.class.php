<?php
class Template {
	
	function __construct() {
	}
	
	function showListItem($aListItems) {
		include BaseClass::$oVariables->sTemplateFolder . "markup/table.php";
	}
}