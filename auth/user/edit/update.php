<?php
include("../../../php/config.php");
include("../../models/User.php");

// Retrieve ID from the URL query string
$id = isset($_GET['id']) ? $_GET['id'] : "";

// Instantiate Client object with database connection
$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare data to be updated
    $updateUser = [
        'id' => $id,
        'name' => $_POST['name'],
        'position' => $_POST['position'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];
    
    // Perform the update operation
    $user->update($updateUser);

    // Redirect back to client dashboard after update
    header("Location: /auth/dashboard/?menu=user");
    exit;
}
?>
