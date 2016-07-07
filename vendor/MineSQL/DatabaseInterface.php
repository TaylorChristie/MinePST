<?php
namespace MineSQL;


// This is a loose interface for our database which we can hook into a MYSQL 
// implementation, and then eventually a high level Paste interaction class
// these interactions should have a table defined.

abstract class DatabaseInterface {

    public $connection, $table;

    abstract public function find($identifier) {}
    
    abstract public function update($2dArray) {}
    
    abstract public function delete($identifier) {}
    
    abstract public function create($2dArray) {}


}
