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
     * Function to sanitize a string
     * @param string $string The string to sanitize
     * @return string The sanitized string
     */
    public function real_escape_string($string) {
        //real_escape_string() native function, escapes special characters in a string for use in an SQL statement
        return $this->db->real_escape_string($string);
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
    public function registerUser(string $username, string $password, string $email, int $notification): bool
    {
        $successful = false;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password, email, notification) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $username, $hashedPassword, $email, $notification);
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
        $query = "SELECT `ID_user`, `username`, `password`, `email`, `notification` FROM `users` WHERE `ID_user` = ?";
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
     * @return bool True if the post is inserted, false otherwise
     * Remember to sanitize the description after retrieving from the database
     */
    public function insertPost(int $ID_user, string $description): bool
    {
        $currentDateTime = date("Y-m-d H:i:s");
        $successful = false;
        $query = "INSERT INTO posts (description, datetime, k_user) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssi", $description, $currentDateTime, $ID_user);
        if ($stmt->execute()) {
            $successful = true;
        }
        return $successful;
    }

    /**
        * Function to get the information of a single post using the ID_post
        * @param int $ID_post The ID of the post
        * @return array The information of the post
    */
    public function getPostInfo(int $ID_post): array
    {
        $query = "SELECT * FROM posts WHERE ID_post = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ID_post);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
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

    /**
     * Function to get the number of followers (accounts that are following the user)
     * @param int $ID_user The ID of the user
     * @return int The number of followers of the user
     */
    public function getFollowers(int $ID_user): int
    {
        $query = "SELECT COUNT(*) FROM follows WHERE k_following = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ID_user);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['COUNT(*)'];
    }

    /**
     * Function to get the number of following (accounts followed by a user)
     * @param int $ID_user The ID of the user
     * @return int The number of following of the user
     */
    public function getFollowing(int $ID_user): int
    {
        $query = "SELECT COUNT(*) FROM follows WHERE k_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ID_user);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['COUNT(*)'];
    }

    /**
     * Function to get X ammount of random users, excluding the logged user
     * @param int $limit The number of users to retrieve
     * @return array of array the users, it returns the ID_user and the username
     * @return null if there are no users
     */
    public function getRandomUsers(int $limit, int $ID_user): ?array
    {
        $query = "SELECT ID_user, username FROM users WHERE ID_user != ? ORDER BY RAND() LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $ID_user, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return null;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
        * Function to know if a user is following another user
        * @param int $ID_user The ID of the user
        * @param int $ID_following The ID of the user to check if is followed
        * @return bool True if the user is following the other user, false otherwise
    */
    public function isFollowing(int $ID_user, int $ID_following): bool
    {
        $query = "SELECT * FROM follows WHERE k_user = ? AND k_following = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $ID_user, $ID_following);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;  //row found -> true, row not found -> false
    }

    /**
        * Function to follow or unfollow a user
        * @param int $ID_user The ID of the user
        * @param int $ID_following The ID of the user to follow or unfollow
        * @param bool $follow True ID_user is following ID_following, False ID_user is unfollowing ID_following
        * the function will swap the follow status
        * @return bool True if the operation is successful, false otherwise
    */
    public function toggleFollow(int $ID_user, int $ID_following, bool $follow): bool
    {
        if($follow){
            //ID_user is following ID_following, so we need to unfollow
            $query = "DELETE FROM follows WHERE k_user = ? AND k_following = ?";
        } else {
            //ID_user is not following ID_following, so we need to follow
            $query = "INSERT INTO follows (k_user, k_following) VALUES (?, ?)";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $ID_user, $ID_following);
        return $stmt->execute();
    }

    /**
     * Function to search for usernames
     * @param string $query The query to search for
     * @return array of array The usernames that match the query
     */
    public function searchUsernames($query) {
        $sql = "SELECT username FROM users WHERE username LIKE ?";
        $stmt = $this->db->prepare($sql);
        $query = "%$query%";
        $stmt->bind_param("s", $query);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $users;
    }

    /**
     * Destructor for DatabaseHelper class
     */
    public function __destruct()
    {
        $this->db->close();
    }
}
