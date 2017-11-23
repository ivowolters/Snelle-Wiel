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
		$this->sUsername = "pensioen_snelle-wiel";
		$this->sPassword = "bYRSVELBf5";
		$this->sDbName = "pensioen_snellewiel";
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

    function showQuery(){
	    echo $this->sQuery;
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

    function closeConn(){
        $this->sConn->close();
    }
}