<?php
// What is the architecture ?
function __arch(){	

	$arch = trim(shell_exec('uname -m'));
	$arch = (preg_match('/64/is', $arch) ? 'x86_64' : 'x86');
	
	return $arch;	
	
}

$arch = __arch();
echo '<arch>'.$arch.'</arch>';

@unlink('arch.php');
?>