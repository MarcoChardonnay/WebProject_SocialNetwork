<?php
class DatabaseHelper{
    private $db;

    /**
     * Constructor for DatabaseHelper class
     * @param string $hostname The hostname of the db server
     * @param string $username The username of the db server
     * @param string $password The password of the db server
     * @param string $database The name of the database
     * @param int $port The port of the db server (default 3306)
     */

    public function __construct(string $hostname,string $username,string $password,string $database,int $port = 3306){
        $this->db = new mysqli($hostname,$username,$password,$database,$port);
        if($this->db->connect_error){
            die("Connection failed: ".$this->db->connect_error);
        }
    }

    /**
     * Destructor for DatabaseHelper class
     */
    
    public function __destruct(){
        $this->db->close();
    }
}
?>