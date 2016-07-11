<?php
namespace \MineSQL\Model;

// Creates a connection instance using settings defined in
// /config/database.php and dynamically chooses a interface from \MineSQL\DBInterface that can be used effortlessly in the model.php
// file (since the interaction is the exact same) :DDD

use \MineSQL\DBInterface;


class ConnectionManager
{

    private $dbConfigFile;
    


    public function __construct($dbConfigFile = '/config/database.php', $defaultInterface = 'pdo')
    {
        $this->dbConfigFile = $dbConfigFile;
        $this->defaultInterface = $defaultInterface;
        $this->parseFile();
    }
    
    public function parseFile()
    {
        $file = $this->$dbConfigFile;
        // since this is autoloaded from /vendor the real path is ../$dbConfigFile
        $real_path = '../'.$file
        
        if(is_file($real_path)) 
        {
            $setting = include $real_path;
        } 
        else 
        {
            throw new Exception('Could not find the database configuration file: '.$file);   
        }
        
        foreach($setting as $key => $arry)
        {
            $this->populateInterfaces($key, $arry);
        }

    }
    
    
    // This method needs to find the interfaces in \MineSQL\DBInterface and create a new instance of the interface
    // if found.
    public function populateInterfaces($interfaceType, $information)
    {
    
    
    
    
    }



}
