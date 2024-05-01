<?php

// Include the database configuration
require_once(__DIR__ . "/../../php/config.php");

class Transaction
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index()
    {
        // Fetch all users from the transaction table
        $query = "SELECT * FROM transaction";
        $result = $this->conn->query($query);

        if (!$result) {
            throw new Exception("Error retrieving users: " . $this->conn->error);
        }

        return $result;
    }

    public function store($newTransaction)
    {
        // Prepare and execute an INSERT query to add a new user to the staff table
        $query = "INSERT INTO transaction (business, invoiceNumber, startDate, endDate, invoiceDate, discount, downPayment) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("sssssss", $newTransaction['business'], $newTransaction['invoiceNumber'], $newTransaction['startDate'], $newTransaction['endDate'], $newTransaction['invoiceDate'], $newTransaction['discount'], $newTransaction['downPayment']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error inserting new product: " . $stmt->error);
        }

        return $success;
    }

    public function getById($id)
    {
        // Retrieve a user by ID from the staff table
        $query = "SELECT * FROM transaction WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $transaction = $result->fetch_assoc();

        if (!$transaction) {
            return null; // User not found
        }

        return $transaction;
    }

    public function update($updatedTransaction)
    {
        // Update an existing user in the product table
        $query = "UPDATE transaction SET business = ?, invoiceNumber = ?, startDate = ?, endDate = ?, invoiceDate = ?, discount = ?, downPayment = ?  WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("sssssssi", $updatedTransaction['business'], $updatedTransaction['invoiceNumber'], $updatedTransaction['startDate'], $updatedTransaction['endDate'], $updatedTransaction['invoiceDate'], $updatedTransaction['discount'], $updatedTransaction['downPayment']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error updating transaction: " . $stmt->error);
        }

        return $success;
    }
}
