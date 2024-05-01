<?php

include("../../php/config.php");

class User
{

    public function __construct(
        private $conn
    ) {
    }

    public function index()
    {
        $result = $this->conn->query("SELECT * FROM user");
    
        if (!$result) {
            // Query execution failed
            throw new Exception("Error executing query: " . $this->conn->error);
        }
    
        return $result;
    }

    public function store(array $newUser)
    {
        $queryStore = $this->conn->prepare("insert into user(id, name, position, username, password) values(?, ?, ?, ?, ?)");
        $queryStore->bind_param("sssss", $newUser['id'], $newUser['name'], $newUser["position"], $newUser["username"], $newUser["password"]); // isi sendiri

        return $queryStore->execute();
    }
    

    public function getById($id)
    {
        $query = $this->conn->prepare("SELECT * FROM user WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function update(array $updatedUser)
    {
        $query = $this->conn->prepare("UPDATE user SET id=?, name=?, position=?, username=?, password=? WHERE id=?");
        $query->bind_param("sssssi", $updatedUser['id'], $updatedUser['name'], $updatedUser["position"], $updatedUser["username"], $updatedUser["password"], $updatedUser["id"]);
        return $query->execute();
    }
}
