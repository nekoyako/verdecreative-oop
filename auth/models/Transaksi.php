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
        $queryStore = $this->conn->prepare("insert into transaction(business, invoiceNumber, startDate, endDate, invoiceDate, discount, downPayment) values(?, ?, ?, ?, ?, ?, ?)");
        $queryStore->bind_param("sssssss", $newTransaction['business'], $newTransaction['invoiceNumber'], $newTransaction["startDate"], $newTransaction["endDate"], $newTransaction["invoiceDate"], $newTransaction["discount"], $newTransaction["downPayment"]); // isi sendiri

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
        $query = $this->conn->prepare("UPDATE transaction SET business=?, invoiceNumber=?, startDate=?, endDate=?, invoiceDate=? discount=? downPayment=? WHERE id=?");
        $query->bind_param("sssssssi", $updatedTransaction['business'], $updatedTransaction['invoiceNumber'], $updatedTransaction["startDate"], $updatedTransaction["endDate"], $updatedTransaction["invoiceDate"], $updatedTransaction["discount"], $updatedTransaction["downPayment"]);
        return $query->execute();
    }
}
