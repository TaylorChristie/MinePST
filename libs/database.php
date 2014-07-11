<?php  
require 'vendor/autoload.php';  
 
use Illuminate\Database\Capsule\Manager as Capsule;  
 
$capsule = new Capsule;
 
$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      =>  $mysql['host'],
    'database'  => $mysql['db'],
    'username'  => $mysql['user'],
    'password'  => $mysql['password'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));
 
$capsule->bootEloquent();
require 'database_tables.php';
