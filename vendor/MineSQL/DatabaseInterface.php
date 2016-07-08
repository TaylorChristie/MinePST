<?php
namespace MineSQL;


// This is a loose interface for our database which we can hook into a MYSQL 
// implementation, and then eventually a high level Model interaction class
interface DatabaseInterface {

    abstract public function sendPreparedQuery($sql, $values){}
    
    abstract public function sendPreparedQueryWithReturn($sql, $values){}
    
    abstract public function insertIntoNewRow($data2d){}
    
    abstract public function updateIntoExistingRow($id, $data){}

}
