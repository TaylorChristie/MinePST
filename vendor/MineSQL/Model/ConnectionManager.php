<?php
namespace \MineSQL\Model;

// Creates a connection instance using settings defined in
// /config/database.php and dynamically chooses a interface from \MineSQL\DBInterface that can be used effortlessly in the model.php
// file (since the interaction is the exact same) :DDD

use \MineSQL\DBInterface;


class ConnectionManager
{

    private $dbConfigFile, $interfaceLocation;
    
    public $interfaces;
    


    public function __construct($dbConfigFile = '/config/database.php', $defaultInterface = 'pdo', $interfaceLocation = 'MineSQL/DBInterface')
    {
        $this->dbConfigFile = $dbConfigFile;
        $this->defaultInterface = $defaultInterface;
        $this->parseFile();
        return $this->getInterface();
    }
    
    private function parseFile()
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
            $files = scandir($this->interfaceLocation); 
            $this->populateInterfaces($key, $arry, $files);
        }

    }
    
    
    // This method needs to find the interfaces in \MineSQL\DBInterface and create a new instance of the interface
    // if found.
    private function populateInterfaces($interfaceType, $information, $files)
    {
        foreach($files as $file) 
        {
            if(strpos($file, $interfaceType) !== false)
            {
                // Assuming are documents are up to PSR standards, we now have the path of the interface which we can initiate through this class
                $this->interfaces[$interfaceType] = $this->interfaceLocation.'/'.substr($file, 0, -4); 
            }
        }
    }
    
    // Returns an interface based on the config file and the loaded interfaces
    private function getInterface()
    {
        
    }



}
