<?php
class Conf {

	var $smtphost;
	var $dbhost;
	var $dbport;
	var $dbname;
	var $dbuser;
	var $version;

	function __construct() {

		$this->dbhost	= '[[softdbhost]]';
		$this->dbport 	= '3306';
		if(defined('ENVIRNOMENT') && ENVIRNOMENT == 'test'){
		$this->dbname    = 'test_[[softdb]]';		
		}else {
		$this->dbname    = '[[softdb]]';
		}
		$this->dbuser    = '[[softdbuser]]';
		$this->dbpass	= '[[softdbpass]]';
		$this->version = '4.7';

		$this->emailConfiguration = dirname(__FILE__).'/mailConf.php';
		$this->errorLog =  realpath(dirname(__FILE__).'/../logs/').'/';
	}
}
?>