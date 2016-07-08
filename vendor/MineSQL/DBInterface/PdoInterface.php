<?php
namespace MineSQL/DBInterface;


// this class should only wrap the PDO functionality with the basic requirements for database interactions. 
// this will function much like the eloquent model system once a model based design pattern is created for 
// this implementation (and all other implementations)

// we will not touch table inferences since this is highly generalize, and let the 
// Model system define the complete SQL query before executing these commands


class PdoInterface implements DatabaseInterface {

    protected $dbc;
    
    public function __construct(PDO $dbc)
    {
        $this->dbc = $dbc;
    }
    
    public function sendPreparedQuery($sql, array $values)
    {
        $dq = $this->dbc->prepare($sql);
        return $dq->execute($values);
    }
    
    //returns either one row or multilevel-arrays 
    public function sendPreparedQueryWithReturn($sql, array $values, $takeOne = 0)
    {
        $dq = $this->dbc->prepare($sql);
        $dq->execute($array);
        return (($takeOne) ? $dq->fetch() : $dq->fetchAll());
    }

}
