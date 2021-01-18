<?php
/**
	 * Does the database server claim to have support for UTF-8 Multibyte (utf8mb4) collation?
	 *
	 * libmysql supports utf8mb4 since 5.5.3 (same version as the MySQL server). mysqlnd supports utf8mb4 since 5.0.9.
	 *
	 * @return  boolean
	 *
	 * @since   CMS 3.5.0
	 */
	function serverClaimsUtf8mb4Support()
	{
		
		if(!is_large_prefix_enabled()){
			return false;
		}
		
		$client_version = mysqli_get_client_info();

		if (strpos($client_version, 'mysqlnd') !== false)
		{
			$client_version = preg_replace('/^\D+([\d.]+).*/', '$1', $client_version);

			return version_compare($client_version, '5.0.9', '>=');
		}
		else
		{
			return version_compare($client_version, '5.5.3', '>=');
		}
	}
	
	function get_dbtype() {
		
		$details = getVersion();
		
		if(preg_match('/maridb/is', $details)){
			return 'mariadb';
		}
		
        return 'mysqli';
    }
	
	function get_engine_type(){
		return 'innodb';
	}
	
	/**
	 * Get the version of the database connector.
	 *
	 * @return  string  The database connector version.
	 *
	 * @since   12.1
	 */
	function getVersion(){
		global $con;
		
		$con = mysqli_connect("[[softdbhost]]","[[softdbuser]]","[[softdbpass]]","[[softdb]]");

		return mysqli_get_server_info($con);
	}
	
	function get_row_format($table = null) {
		global $con;
		$rowformat = null;
		if (is_antelope_file_format_no_more_supported()) {
			$rowformat = 'Barracuda';
			return $rowformat;
         }

        $sql = "SHOW VARIABLES LIKE 'innodb_file_format'";
        $result = mysqli_query($con, $sql);
        if ($rec = $result->fetch_assoc()) {
            // MySQL 8 BC: information_schema.* returns the fields in upper case.
            $rec = array_change_key_case($rec, CASE_LOWER);
            if (isset($table)) {
                $rowformat = $rec['row_format'];
            } else {
                $rowformat = $rec['value'];
            }
        }

        return $rowformat;
    }
	
	function is_antelope_file_format_no_more_supported() {
        // Breaking change: Antelope file format support has been removed from both MySQL and MariaDB.
        // The following InnoDB file format configuration parameters were deprecated and then removed:
        // - innodb_file_format
        // - innodb_file_format_check
        // - innodb_file_format_max
        // - innodb_large_prefix
        // 1. MySQL: deprecated in 5.7.7 and removed 8.0.0+.
        $ismysqlge8d0d0 = (get_dbtype() == 'mysqli') &&
                version_compare(getVersion(), '8.0.0', '>=');
        // 2. MariaDB: deprecated in 10.2.0 and removed 10.3.1+.
        $ismariadbge10d3d1 = (get_dbtype() == 'mariadb') &&
                version_compare(getVersion(), '10.3.1', '>=');

        return $ismysqlge8d0d0 || $ismariadbge10d3d1;
    }
	
	function is_compressed_row_format_supported($cached = true) {
        
		$engine = get_engine_type();
        $info = getVersion();

        if (version_compare($info, '5.5.0') < 0) {
            // MySQL 5.1 is not supported here because we cannot read the file format.
            $compressedrowformatsupported = false;

        } else if ($engine !== 'innodb' and $engine !== 'xtradb') {
            // Other engines are not supported, most probably not compatible.
            $compressedrowformatsupported = false;

        } else if (!is_file_per_table_enabled()) {
            $compressedrowformatsupported = false;

        } else if (get_row_format() !== 'Barracuda') {
            $compressedrowformatsupported = false;

        } else {
            // All the tests passed, we can safely use ROW_FORMAT=Compressed in sql statements.
            $compressedrowformatsupported = true;
        }

        return $compressedrowformatsupported;
    }
	
	function is_file_per_table_enabled() {
		global $con;
		$sql = "SHOW VARIABLES LIKE 'innodb_file_per_table'";
        $result = mysqli_query($con, $sql);
		if ($rec = $result->fetch_assoc()) {
            // MySQL 8 BC: information_schema.* returns the fields in upper case.
            $rec = array_change_key_case($rec, CASE_LOWER);
            if ($rec['value'] == 'ON') {
                return true;
            }
        }
		
        return false;
    }
	
	function get_row_format_sql($engine = null, $collation = null) {

       $rowformat = '';
	   $serverClaimsUtf8mb4Support = serverClaimsUtf8mb4Support();
	   $engine = get_engine_type();
	   
        if (($engine === 'innodb' || $engine === 'xtradb') && !empty($serverClaimsUtf8mb4Support)) {
            if (is_compressed_row_format_supported()) {
                $rowformat = "ROW_FORMAT=COMPRESSED";
            } else {
                $rowformat = "ROW_FORMAT=DYNAMIC";
            }
        }
        return $rowformat;
    }
	
    function is_large_prefix_enabled() {
		global $con;
		
        if (is_antelope_file_format_no_more_supported()) {
            // Breaking change: Antelope file format support has been removed, only Barracuda.
            return true;
        }
		
		$sql = "SHOW VARIABLES LIKE 'innodb_large_prefix'";
        $result = mysqli_query($con, $sql);
		if ($rec = $result->fetch_assoc()) {
            // MySQL 8 BC: information_schema.* returns the fields in upper case.
            $rec = array_change_key_case($rec, CASE_LOWER);
            if ($rec['value'] == 'ON') {
                return true;
            }
        }
		
        return false;
    }

	$serverClaimsUtf8mb4Support = serverClaimsUtf8mb4Support();
	$row_format = get_row_format_sql();
	
	if(!empty($serverClaimsUtf8mb4Support) && !empty($row_format)){
		echo '<claim_utf8>utf8mb4</claim_utf8>';
		echo '</br>';
		echo '<row_format>'.$row_format.'</row_format>';
	}

?>