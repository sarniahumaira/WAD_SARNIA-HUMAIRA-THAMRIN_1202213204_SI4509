<?php
namespace DAO;

include_once 'models/user.php';
use Models\User;

class UserDAO {
    private $conn;

    public function __construct($conn = null) {
        $this->conn = $conn;
    }

    public function insert($username, $email, $password) {
        $sql = "insert into users (username, email, password) values(?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);
        
        $stmt->execute();
        
        $stmt->close();
    }

    public function move_uploaded_file($photo){
        $sql = "update users set photo = ? where id = (select max(id) from users)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $photo);
        
        $stmt->execute();
        
        $stmt->close();    
    }

    public function getAll() {
        $users = [];
        
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $users[] = new User($row['id'], $row['username'], $row['photo']);
            }
        }

        return $users;
    }

    public function login($username, $password) {
        $user = null;
        
        $sql = "SELECT * FROM users where username = '$username' and password='$password'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user = new User($row['id'], $row['username'], $row['photo']);
                break;
            }
        }

        return $user;
    }
}