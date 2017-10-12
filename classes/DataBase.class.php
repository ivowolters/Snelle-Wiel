<?php
class DataBase {
	private $sHostname;
	private $sDbName;
	private $sUsername;
	private $sPassword;
	private $sConn;
	private $sQuery;
	private $sResult;
	
	function __construct() {
		$this->StartConn();
	}
	
	function startConn() {
		$this->sHostname = "localhost";
		$this->sUsername = "pensioen_amkleding";
		$this->sPassword = "Sp@HuhEd7#w2";
		$this->sDbName = "pensioen_amkleding";
		$this->sConn = mysqli_connect($this->sHostname, $this->sUsername, $this->sPassword, $this->sDbName);
		if ($this->sConn->connect_error) {
			die("Connection failed: " . $this->sConn->connect_error);
		}
	}
	
	function setQuery($query) {
		$this->sQuery = $query;
	}
	
	function executeQuery() {
		$this->sResult = mysqli_query($this->sConn, $this->sQuery);
	}

	function getResult() {
		return $this->sResult;
	}

	function getInsertedId() {
	    return $this->sConn->insert_id;
    }

    function getError() {
        $this->sConn->error;
    }

	function __destruct() {
		$this->sConn->close();
	}
}