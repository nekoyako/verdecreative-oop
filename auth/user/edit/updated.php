<?php
include("../../../php/config.php");

// Retrieve and sanitize POST data
$id = $_POST['id'];
$name = $_POST['name'];
$position = $_POST['position'];
$username = $_POST['username'];
$password = $_POST['password'];

// Update query with prepared statement
$sql = "UPDATE staff SET 
        name = ?, 
        position = ?, 
        username = ?, 
        password = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $position, $username, $password, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect back to client dashboard after update
    $url = "/auth/dashboard/?menu=product";
    $pesan = "Successfully Edited";
    echo "<script>alert('$pesan'); window.location='$url'; </script>";
} else {
    // Handle error if prepare statement fails
    $pesan = "Failed to update data";
    echo "<script>alert('$pesan'); window.history.back(); </script>";
}

mysqli_close($conn);
?>
