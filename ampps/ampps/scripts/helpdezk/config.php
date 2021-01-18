<?php 


date_default_timezone_set('America/New_York') ;


//DATABASE CONFIGURATION
$config["db_connect"] 	 = 	"mysqli"; //mysqli = MYSQL | oci8po = Oracle 
$config["db_hostname"] 	 = 	"[[softdbhost]]";
$config["db_port"] 		 = 	"3306";
$config["db_name"] 		 = 	"[[softdb]]";
$config["db_username"] 	 = 	"[[softdbuser]]";
$config["db_password"] 	 = 	"[[softdbpass]]";


//SYSTEM CONFIGURATION
$config["hdk_url"] 	 = 	"[[softurl]]";
$config["path_default"] 	 = 	"[[relativeurl_]]";
$config["lang"] 	 = 	"en_US";
$config["theme"] 	 = 	"parracho";
$config["page_title"] 	 = 	" [HELPDEZK] - Parracho - A free open source Helpdesk software! ";
$config["jquery"] 	 = 	"jquery-2.1.1.js";


//EXTERNAL STORAGE CONFIGURATION
$config["external_storage"] 		 = 	false ; 
$config["external_storage_path"] 	 = 	 'puth_external_storage_path_here' ;
$config["external_storage_url"] 	 = 	 'puth_external_storage_url_here' ; 


//LOCATION CONFIGURATION
if($config["lang"] == 'en_US') {
	 $config["id_mask"] 	 = 	"999-99-9999";
	 $config["ein_mask"] 	 = 	"99-9999999";
	 $config["zip_mask"] 	 = 	"00000";
	 $config["phone_mask"] 	 = 	"(000) 000-0000";
	 $config["cellphone_mask"] 	 = 	"(00) 00000-0000";
	 $config["date_placeholder"] 	 = 	"mm/dd/yyyy";
	 $config["log_date_format"] 	 = 	"%m/%d/%Y %H:%i:%s";
	 $config["date_format"] 	 = 	"%m/%d/%Y";
	 $config["hour_format"] 	 = 	"%h:%i %p";
}
if($config["lang"] == 'pt_BR') {
	 $config["id_mask"] 	 = 	" ?999.999.999-99";
	 $config["ein_mask"] 	 = 	" ?99.999.999/9999-99 ";
	 $config["zip_mask"] 	 = 	"00000-000";
	 $config["phone_mask"] 	 = 	"(00) 0000-0000";
	 $config["cellphone_mask"] 	 = 	"(00) 00000-0000";
	 $config["date_placeholder"] 	 = 	"dd/mm/yyyy";
	 $config["log_date_format"] 	 = 	"%d/%m/%Y %H:%i:%s";
	 $config["date_format"] 	 = 	"%d/%m/%Y";
	 $config["hour_format"] 	 = 	"%H:%i";
}


