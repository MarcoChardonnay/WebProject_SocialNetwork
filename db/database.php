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
        * Function to get the ID_user from the username
        * @param string $username The username of the user
        * @return int The ID of the user, -1 if the user doesn't exist
        */
    public function getIDUserbyUsername(string $username):int{
        $query = "SELECT ID_user FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0){
            return -1;
        }
        $rowID = $result->fetch_assoc();
        return $rowID['ID_user'];
    }

    /**
        * Function to get the ID_user from the email
        * @param string $email The email of the user
        * @return int The ID of the user, -1 if the user doesn't exist
        */
    public function getIDUserbyEmail(string $email):int{
        $query = "SELECT ID_user FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0){
            return -1;
        }
        $rowID = $result->fetch_assoc();
        return $rowID['ID_user'];
    }

    /**
        * Function to check if the password is correct
        * @param int $IDuser The ID of the user
        * @param string $password The password of the user
        * @return bool True if the password is correct, false otherwise
        */
    public function checkPassword(int $IDuser, string $password):bool{
        $query = "SELECT password FROM users WHERE ID_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i",$IDuser);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return password_verify($password,$row['password']);     //password_verify() compares the hash of the password with the hash stored in the db
    }

    /**
        * Function to register a new user
        * @param string $username The username of the user
        * @param string $password The password of the user
        * @param string $email The email of the user
        * @param int $notification The notification preference of the user
        * @param string $profile_picture The profile picture of the user
        * @return bool True if the registration is successful, false otherwise
        */
    public function registerUser(string $username, string $password, string $email, int $notification, string $profile_picture):bool{
        $successfull = false;
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password, email, notification, profile_picture) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssis",$username,$hashedPassword,$email,$notification,$profile_picture);
        if($stmt->execute()){
            $successfull = true;
        }
        return $successfull;
    }

    /**
     * Destructor for DatabaseHelper class
     */
    public function __destruct(){
        $this->db->close();
    }
}
?>