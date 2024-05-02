<?php

// Include the database configuration
require_once(__DIR__ . "/../../php/config.php");

class TransactionDetail
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index()
    {
        // Fetch all users from the transaction table
        $query = "SELECT * FROM transactionDetail";
        $result = $this->conn->query($query);

        if (!$result) {
            throw new Exception("Error retrieving users: " . $this->conn->error);
        }

        return $result;
    }

    public function store($newTransactionDetail)
    {
        // Prepare and execute an INSERT query to add a new transaction to the transaction table
        $query = "INSERT INTO transactionDetail (business, startDate, endDate, invoiceDate, discount, downPayment) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        // Bind parameters, including checking if discount is set or not
        // Bind parameters, including checking if discount is set or not
        if (array_key_exists('discount', $newTransactionDetail) && $newTransactionDetail['discount'] !== '') {
            $discount = $newTransactionDetail['discount'];
        } else {
            // If discount is not set or empty, set it to NULL
            $discount = null;
        }

        if (array_key_exists('downPayment', $newTransactionDetail) && $newTransactionDetail['downPayment'] !== '') {
            $downPayment = $newTransactionDetail['downPayment'];
        } else {
            // If downPayment is not set or empty, set it to NULL
            $downPayment = null;
        }

        // Prepare and execute an INSERT query to add a new transaction to the transaction table
        $query = "INSERT INTO transactionDetail (business, startDate, endDate, invoiceDate, discount, downPayment) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("sssssd", $newTransactionDetail['business'], $newTransactionDetail['startDate'], $newTransactionDetail['endDate'], $newTransactionDetail['invoiceDate'], $discount, $downPayment);

        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error inserting new transaction: " . $stmt->error);
        }

        return $success;
    }


    public function getById($id)
    {
        // Retrieve a user by ID from the staff table
        $query = "SELECT * FROM transactionDetail WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $transactionDetail = $result->fetch_assoc();

        if (!$transactionDetail) {
            return null; // User not found
        }

        return $transactionDetail;
    }

    public function update($updatedTransactionDetail)
    {
        // Update an existing user in the product table
        $query = "UPDATE transaction SET business = ?, startDate = ?, endDate = ?, invoiceDate = ?, discount = ?, downPayment = ?  WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("sssssssi", $updatedTransactionDetail['business'], $updatedTransactionDetail['startDate'], $updatedTransactionDetail['endDate'], $updatedTransactionDetail['invoiceDate'], $updatedTransactionDetail['discount'], $updatedTransactionDetail['downPayment']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error updating transactionDetail: " . $stmt->error);
        }

        return $success;
    }
}
