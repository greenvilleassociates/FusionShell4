<?php 

@unlink('copy_dir.php');

$src = '[[srcpath]]/storage/app/uploads';
$dst = '[[softpath]]/storage/app/uploads';

function copy_r($path, $dest){
		
	// Is it a Directory ?
	if( is_dir($path) ){
		
		// Create the Destination Dir
		@mkdir($dest);
		
		$stat = stat($path);
		
		// Set the mode of the destination
		if(!empty($stat['mode'])){
			@chmod($dest, $stat['mode']);
		}
		
		// Set the UID
		if(!empty($stat['uid'])){
			@chown($dest, $stat['uid']);
		}
		
		// Set the GID
		if(!empty($stat['gid'])){
			@chgrp($dest, $stat['gid']);
		}
		
		// Start reading the current directory
		$objects = scandir($path);
		if( sizeof($objects) > 0 ){
			foreach( $objects as $file )
			{
				if( $file == "." || $file == ".." ){
					continue;
				}
				
				// Go on
				copy_r( $path.'/'.$file, $dest.'/'.$file );
			}
		}
		
		return true;
		
	}elseif( is_file($path) ){
		
		//To exclude some files if set in script's clone.php's __pre_unzip() function
		$ret = copy($path, $dest);
		$stat = stat($path);
		
		// Set the mode of the destination
		if(!empty($stat['mode'])){
			@chmod($dest, $stat['mode']);
		}
		
		// Set the UID
		if(!empty($stat['uid'])){
			@chown($dest, $stat['uid']);
		}
		
		// Set the GID
		if(!empty($stat['gid'])){
			@chgrp($dest, $stat['gid']);
		}
		
		return $ret;
		
	}else{
		return false;
	}
}

copy_r($src, $dst);
