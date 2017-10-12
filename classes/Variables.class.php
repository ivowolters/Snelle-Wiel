<?php
class Variables {
	public $sIpAddress;
	public $sDomainOnly;
	public $sCurrentUrl;
	private $sLocation;
	public $aExtentions;
	public $sExtentions;
	public $sTemplateFolder;
	public $sIncFolder;
	public $sMarkupFolder;

	function __construct(){
		$this->setIp();
		$this->setDomain();
		$this->setFolders();
	}
	
	function setIp(){
		$this->sIpAddress  = $_SERVER['REMOTE_ADDR'];
	}
	
	function setDomain() {
	    $this->sLocation = "/snelle-wiel/";
		$this->sDomainOnly = "http://" . $_SERVER['HTTP_HOST'] . $this->sLocation;
        $this->sExtentions = str_replace("$this->sLocation", "", $_SERVER['REQUEST_URI']);
        $this->sCurrentUrl = $this->sDomainOnly . $this->sExtentions;
		$this->aExtentions = explode('/', $this->sExtentions);
	}
	
	function setFolders() {
		$this->sTemplateFolder = "template-2017/";
        $this->sIncFolder = "inc/";
        $this->sMarkupFolder = $this->sTemplateFolder . "markup/";
	}
}