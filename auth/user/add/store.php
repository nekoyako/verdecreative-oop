<?php

// Include necessary files (adjust paths as needed)
include("../../../php/config.php");
include("../../models/User.php");

// Validate and sanitize form data (example)
$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$position = $_POST['position'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Create a new instance of the User class
$user = new User($conn); // Assuming 'User' class name has a capital U

// Store user data into the database
$success = $user->store([
    'id' => $id,
    'name' => $name,
    'position' => $position,
    'username' => $username,
    'password' => $password,
]);

// Check if the insertion was successful
if ($success) {
    // Redirect to the user dashboard (adjust the URL as needed)
    header("Location: ../../dashboard/?menu=user");
    exit; // Stop further script execution
} else {
    // Handle insertion failure (e.g., display an error message)
    echo "Failed to store user data. Please try again.";
    // Optionally, provide a link to go back or retry
    // echo '<a href="../auth/dashboard/?menu=client">Go back</a>';
    exit; // Stop further script execution
}
