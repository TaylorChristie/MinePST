<script>
	var readonly = false;
</script>
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

