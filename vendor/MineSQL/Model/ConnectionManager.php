<?php
namespace \MineSQL\Model;

// Creates a connection instance using settings defined in
// /config/database.php and dynamically chooses a interface from \MineSQL\DBInterface that can be used effortlessly in the model.php
// file (since the interaction is the exact same) :DDD


class ConnectionManager
{

    private $dbConfigFile, $interfaceLocation, $defaultInterface;
    
    protected $interfaces;
    


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
        
        $files = scandir($this->interfaceLocation);
        
        foreach($setting as $key => $arry)
        {
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
    // this could be optimized
    private function getInterface()
    {
        if(array_key_exists($this->defaultInterface, $this->interfaces))
        {
            $fileLocation = $this->interfaces[$this->defaultInterface];
            $class = '\\'.str_replace('/', '\\', $fileLocation);
            return new $class();
        } else {
            if(is_array($this->interfaces))
            {
                // Will choose the first configurated interface
                $fileLocation = $this->interfaces[0];
                $class = '\\'.str_replace('/', '\\', $fileLocation);
                return new $class();
            }
        }
        
        throw new Exception('Could not find any interfaces.');
    }



}
