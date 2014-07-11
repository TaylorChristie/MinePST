<?php
header('Content-Type: application/json');
require '../init.php';
$paste = new pastes;
$paste->paste = $_POST['paste'];
if($paste->save()) {
	$paste->url = $HASH_ID->encrypt($paste->id);
	if($paste->save()) {
		$response = 1;
		$url = $paste->url;
	} else {
		$response = 0;
	}
} else {
	$response = 0;
	$url = null;
}
echo json_encode(array('response' => $response, 'url' => $url));