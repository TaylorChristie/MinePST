<?php
session_start();
date_default_timezone_set('UTC');
$mysql = array('host' => '127.0.0.1', 'db' => 'minesql-pastebin', 'user' => 'root', 'password' => '');
require 'custom.php';
require 'hashid.php';
$HASH_ID = new Hashids\Hashids('some-random-hash-to-help-encryption');
