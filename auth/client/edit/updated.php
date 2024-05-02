<?php
include("../../../php/config.php");

// Check if all required fields are present
    // Retrieve and sanitize POST data
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $contactPerson = $_POST['contactPerson'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Update query with prepared statement
    $sql = "UPDATE client SET 
            code = ?,
            name = ?, 
            contactPerson = ?, 
            phone = ?, 
            address = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $code, $name, $contactPerson, $phone, $address, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redirect back to client dashboard after update
        $url = "/auth/dashboard/?menu=client";
        $pesan = "Successfully Edited";
        echo "<script>alert('$pesan'); window.location='$url'; </script>";
    } else {
        // Handle error if prepare statement fails
        $pesan = "Failed to update data";
        echo "<script>alert('$pesan'); window.history.back(); </script>";
    }
mysqli_close($conn);
?>