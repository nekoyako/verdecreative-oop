<?php

include("../../php/config.php");

class Transaction
{

    public function __construct(
        private $conn
    ) {
    }

    public function index()
    {
        $result = $this->conn->query("select * from transaction");

        return $result;
    }

    public function store(array $newTransaction)
    {
        $queryStore = $this->conn->prepare("insert into transaction(code, name, contactPerson, phone, address) values(?, ?, ?, ?, ?)");
        $queryStore->bind_param("sssss", $newTransaction['code'], $newTransaction['name'], $newTransaction["contactPerson"], $newTransaction["phone"], $newTransaction["address"]); // isi sendiri

        return $queryStore->execute();
    }
    

    public function getById($id)
    {
        $query = $this->conn->prepare("SELECT * FROM transaction WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function update(array $updatedTransaction)
    {
        $query = $this->conn->prepare("UPDATE transaction SET code=?, name=?, contactPerson=?, phone=?, address=? WHERE id=?");
        $query->bind_param("sssssi", $updatedTransaction['code'], $updatedTransaction['name'], $updatedTransaction["contactPerson"], $updatedTransaction["phone"], $updatedTransaction["address"], $updatedTransaction["id"]);
        return $query->execute();
    }
}
