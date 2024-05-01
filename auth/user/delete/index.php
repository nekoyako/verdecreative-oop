<?php
// Include necessary files (adjust paths as needed)
include("../../php/config.php");
include("../models/User.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a new instance of the User class
    $user = new User($conn);

    // Attempt to delete the user
    try {
        $deleteResult = $user->deleteUser($id);
        
        if ($deleteResult) {
            $url = "index.php?menu=user";
            echo "<script>alert('User successfully deleted'); window.location='$url'; </script>";
            exit; // Stop further execution
        } else {
            throw new Exception("Failed to delete user.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: User ID not specified.";
}
?>
