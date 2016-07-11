<?php
namespace MineSQL\Model;




// all user functions will be found here and they will all use the Interface in order to complete Querys.
// this enables the switching of database architechure extremely easy.
class Model
{
  
    protected $dbi;
    
    public function __construct()
    {
        $this->dbi = new ConnectionManager(); // need to somehow decide how to access a certain interface easily without removing portablility
    }
    
    
    
    
    




}

