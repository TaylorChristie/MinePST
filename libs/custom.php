<?php
require 'password.php';
require 'database.php';

//Custom file for all classes and functions

class action {

	static function show_paste($paste) {
		//Assumes paste is an obj
		load_header();
		echo '<pre id="editor">'.htmlspecialchars($paste).'</pre>';
		//Make the paste read only
		load_footer();
		return true;
	}


	static function show_error($type) {
		switch ($type) {
			case 'not-found':
				$title = "Paste Not Found - MinePST";
				$error = 'The PST Could Not Be Found';
			break;

			default:
				$title = "Unknown Error - MinePST";
				$error = "An Unknown Error Has Occured!";
		}
		load_header($title);
		echo '<center><h2>'.$error.'</h2>
				<img src="assets/img/uturn.png" style="margin-top:5%;margin-bottom:5%;" width="200px" alt="Go Back" /><br />
				<a href="index.php" class="btn btn-success btn-lg">Take Me Back!</a></center>';
		load_footer();
		return true;
	}


	static function new_paste() {
		load_header("MinePST - New", true);
		echo '<pre id="editor"></pre>
			  <button id="submitBtn" class="btn btn-success btn-lg" style="position:absolute;right:20px;top:20px;">Post Code</button>';
		load_footer();
		return true;

	}
}




//For the theme
function load_header($title="MinePST") {
	echo '<html>
			<head>
			<title>'.$title.'</title>
			<link href="assets/css/bootstrap.min.css" rel="stylesheet">
			<style type="text/css" media="screen">
    		 body {
    		     overflow: hidden;
    		     background-color:grey;
    		 }
    		 
    		 #editor { 
    		     margin: 0;
    		     position: absolute;
    		     top: 0;
    		     bottom: 0;
    		     left: 0;
    		     right: 0;
    		 }
  			</style>
			</head>
			<body>';
}


function load_footer() {
	echo '<p style="position:absolute;bottom:0px;right:3px;background:black;color:white;padding:10px;" id="foot" onClick="$(\'#foot\').hide();">All Rights Reserved :: <a href="http://minesql.me">MineSQL</a> '.date('Y').' :: Credits to <a href="http://laravel.com/docs/eloquent" target="_blank">Eloquent ORM</a> & <a href="http://ace.c9.io" target="_blank">Ace Editor</a> & <a href="http://www.hashids.org/php/" target="_blank">Hash ID\'s</a> for their awesome contributions to the open source community and helping me build this website (Click this dialog to hide)</p></body>
		  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		  <script src="assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
		  <script src="assets/js/custom.js"></script>
		  </html>';
}