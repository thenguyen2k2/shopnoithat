<?php 
namespace app\core;
// signgerton
class Database
{

    private static $instance = null;
    private $conn;
    private function __construct()
    {        
        $this->conn = new \PDO(DNS, USER, PASSWORD);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION); 
    }
    
    public static function getInstance()
    {
      if(!self::$instance)
      {
        self::$instance = new Database();
      }
     
      return self::$instance;
    }
    
    public function getConnection()
    {
      return $this->conn;
    }

}