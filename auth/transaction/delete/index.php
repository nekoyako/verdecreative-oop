<?php
// Include necessary files (adjust paths as needed)
require_once("../../php/config.php");
require_once("../models/Transaction.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
         $transaction = new Transaction($conn);
        $deleteResult = $transaction->deleteTransaction($id);
        
        if ($deleteResult) {
            $url = "/auth/dashboard/?menu=transaction";
            echo "<script>alert('Transaction successfully deleted'); window.location='$url'; </script>";
            exit; // Stop further execution
        } else {
            throw new Exception("Failed to delete transaction.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: User ID not specified.";
}
?>
