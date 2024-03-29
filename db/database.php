<?php
class DatabaseHelper
{
    private $db;

    /**
     * Constructor for DatabaseHelper class
     * @param string $hostname The hostname of the db server
     * @param string $username The username of the db server
     * @param string $password The password of the db server
     * @param string $database The name of the database
     * @param int $port The port of the db server (default 3306)
     */

    public function __construct(string $hostname, string $username, string $password, string $database, int $port = 3306)
    {
        $this->db = new mysqli($hostname, $username, $password, $database, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }


    /**
     * Function to get the ID_user from the username
     * @param string $username The username of the user
     * @return int The ID of the user, -1 if the user doesn't exist
     */
    public function getIDuserbyUsername(string $username): int
    {
        $query = "SELECT ID_user FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return -1;
        }
        $rowID = $result->fetch_assoc();
        return $rowID['ID_user'];
    }

    /**
     * Function to get the username from the ID_user
     * @param int $ID_user The ID of the user
     * @return string The username of the user
     * @return null if the user doesn't exist
     */
    public function getUsername(int $ID_user): ?string
    {
        $query = "SELECT username FROM users WHERE ID_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ID_user);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return null;
        }
        $row = $result->fetch_assoc();
        return $row['username'];
    }

    /**
     * Function to get the ID_user from the email
     * @param string $email The email of the user
     * @return int The ID of the user, -1 if the user doesn't exist
     */
    public function getIDuserbyEmail(string $email): int
    {
        $query = "SELECT ID_user FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return -1;
        }
        $rowID = $result->fetch_assoc();
        return $rowID['ID_user'];
    }

    /**
     * Function to check if the password is correct
     * @param int $ID_user The ID of the user
     * @param string $password The password of the user
     * @return bool True if the password is correct, false otherwise
     */
    public function checkPassword(int $ID_user, string $password): bool
    {
        $query = "SELECT password FROM users WHERE ID_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ID_user);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return password_verify($password, $row['password']);     //password_verify() compares the hash of the password with the hash stored in the db
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
    public function registerUser(string $username, string $password, string $email, int $notification, string $profile_picture): bool
    {
        $successful = false;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password, email, notification, profile_picture) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssis", $username, $hashedPassword, $email, $notification, $profile_picture);
        if ($stmt->execute()) {
            $successful = true;
        }
        return $successful;
    }

    /**
     * Function to get all the information of a user using the ID_user
     * @param int $ID_user The ID of the user
     * @return array The information of the user
     */
    public function getUserInfo(int $ID_user): array
    {
        $query = "SELECT `username`, `password`, `email`, `notification`, `profile_picture` FROM `users` WHERE `ID_user` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ID_user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    /**
     * Function to insert a new post in the db
     * @param int $ID_user The ID of the user that made the post
     * @param string $description The description of the post
     * TODO: img of the post
     * @return bool True if the post is inserted, false otherwise
     * Remember to sanitize the description after retrieving from the database
     */
    public function insertPost(int $ID_user, string $description): bool
    {
        $img = "default.jpg";
        $currentDateTime = date("Y-m-d H:i:s");
        $successful = false;
        $query = "INSERT INTO posts (img, imgdescription, datetime, k_user) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $img, $description, $currentDateTime, $ID_user);
        if ($stmt->execute()) {
            $successful = true;
        }
        return $successful;
    }

    /**
        * Function to get all the posts of a user using the ID_user
        * @param int $ID_user The ID of the user
        * @return array of array The posts of the user
    */
    public function getPostsByID(int $ID_user): array
    {
        $query = "SELECT posts.* FROM posts, users WHERE users.id_user = $ID_user AND posts.k_user = users.id_user ORDER BY posts.datetime DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //!: NOT TESTED
    /**
        * Function to get the last N posts of the users followed by the logged user
        * @param int $ID_user The ID of the user
        * @param int $limit The number of posts to retrieve
        * @return array of array The posts of the users followed by the logged user
    */
    public function getPostsFollowed(int $ID_user, int $limit): array
    {
        $query = "SELECT posts.* FROM posts, users, follows
                WHERE follows.k_user = users.ID_user AND follows.k_following = posts.k_user AND users.id_user = $ID_user
                ORDER BY posts.datetime DESC LIMIT $limit";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
                Ultimi 10 post degli utenti seguiti da logged user
    $query =    SELECT posts.*
                FROM posts, users, follows
                WHERE follows.k_user = users.ID_user AND follows.k_following = posts.k_user AND users.id_user = $ID_usersessione
                ORDER BY posts.datetime ASC / DESC
                LIMIT 10;

                Tutti gli utenti seguiti da logged user
    $query =    SELECT k_following
                FROM follows
                WHERE k_user = $ID_usersessione
                ORDER BY datetime ASC / DESC

                Tutti i post di un utente
    $query =    SELECT posts.*
                FROM posts, users
                WHERE users.id_user = $ID_usersessione AND posts.k_user = users.id_user
                ORDER BY posts.datetime ASC / DESC
    */

    /**
     * Destructor for DatabaseHelper class
     */
    public function __destruct()
    {
        $this->db->close();
    }
}
