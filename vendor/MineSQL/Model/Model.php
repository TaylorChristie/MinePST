<?php
namespace MineSQL\Model;




// all user functions will be found here and they will all use the Interface in order to complete Querys.
// this enables the switching of database architechure extremely easy.

//    public function sendPreparedQuery($sql, array $values = null)
//    public function sendPreparedQueryWithReturn($sql, array $values = null, $takeOne = 0)


class Model
{
  
    protected $dbi;
    protected $table_name, $primaryKey,
    
    public function __construct()
    {
        $this->dbi = new ConnectionManager(); // need to somehow decide how to access a certain interface easily without removing portablility
    }
    
    public function find($primaryKey)
    {
      // gets one entry from table via its primary key 
    }
    
    public function where($query, $values, $limit = 10)
    {
      
      
    }
    
    
    
    
    




}

