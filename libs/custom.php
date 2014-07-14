<?php
require 'password.php';
require 'database.php';
//Custom file for all classes and functions
class action {
	static function show_paste($paste) {
		echo '<pre id="editor">'.htmlspecialchars($paste).'</pre>';
		return true;
	}
	static function show_error($type) {
		switch ($type) {
			case 'not-found':
				$error = 'The PST Could Not Be Found';
			break;
			default:
				$error = "An Unknown Error Has Occured!";
		}
		echo '<center><h2>'.$error.'</h2>
				<img src="assets/img/uturn.png" style="margin-top:5%;margin-bottom:5%;" width="200px" alt="Go Back" /><br />
				<a href="index.php" class="btn btn-success btn-lg">Take Me Back!</a></center>';
		return true;
	}
	static function new_paste() {
		echo '<pre id="editor"></pre>
			  <button id="submitBtn" class="btn btn-success btn-lg" style="position:absolute;right:20px;top:20px;">Post Code</button>';
		return true;

	}
}