<?php 

@unlink('ioncube.php');

$lv = '';

if(function_exists('ioncube_loader_iversion')) {
	$liv = ioncube_loader_iversion();
	$lv = sprintf("%d.%d.%d", $liv / 10000, ($liv / 100) % 100, $liv % 100);
}

echo '<iversion>'.$lv.'</iversion>';

?>
