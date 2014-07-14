
<html>
	<head>
		<title>'.$title.'</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<script> var readonly = false; </script>
	</head>
	<body>
<?php
require 'libs/init.php';
$file = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $file);
$pfile = $break[count($break) - 1]; 
if(!empty($_GET['paste'])) {
	$id = $HASH_ID->decrypt($_GET['paste']);
	$paste = pastes::find($id);
	foreach($paste as $paste) {
		$data = $paste->paste;
	}
	if(!empty($data)) {
		echo '<script>
				 var readonly = true;
			 </script>';
		action::show_paste($data);
	} else {
		action::show_error('not-found');
	}
} else {
	action::new_paste();
}

//TODO
/**
* Keyboard Shortcuts to save
* implement a side navigation on the right
* Pretty URL's
* Raw Pastes
**/
?>

<p style="position:absolute;bottom:0px;right:3px;background:black;color:white;padding:10px;" id="foot" onClick="$(\'#foot\').hide();">All Rights Reserved :: <a href="http://minesql.me">MineSQL</a> '.date('Y').' :: Credits to <a href="http://laravel.com/docs/eloquent" target="_blank">Eloquent ORM</a> & <a href="http://ace.c9.io" target="_blank">Ace Editor</a> & <a href="http://www.hashids.org/php/" target="_blank">Hash ID\'s</a> for their awesome contributions to the open source community and helping me build this website (Click this dialog to hide)</p></body>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/custom.js"></script>
</html>
