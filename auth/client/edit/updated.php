<?php
include "../../../php/config.php";

$id = mysqli_real_escape_string($conn, $_POST['id']);
$code = mysqli_real_escape_string($conn, $_POST['code']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$contactPerson = mysqli_real_escape_string($conn, $_POST['contactPerson']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

$sql = "UPDATE client SET code='$code',
								name='$name',
								contactPerson='$contactPerson',
								phone='$phone',
								address='$address'
								WHERE id='$id'";
$query = mysqli_query($conn, $sql);


$url = "/auth/dashboard/?menu=client";
$pesan = "Successfully Edited";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>

<!-- <?php
include "../../../php/config.php";

// Check if all required fields are set
if(isset($_POST['id'], $_POST['code'], $_POST['name'], $_POST['contactPerson'], $_POST['phone'], $_POST['address'])) {
    // Sanitize input
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contactPerson = mysqli_real_escape_string($conn, $_POST['contactPerson']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Check if update was successful
    if ($stmt->affected_rows > 0) {
        // Redirect to client dashboard with success message
        $url = "/auth/dashboard/?menu=client";
        $pesan = "Successfully Edited";
        echo "<script>alert('$pesan'); location.href='$url'; </script>";
        exit; // Prevent further execution
    } else {
        // Display error message if update fails
        echo "<script>alert('Failed to update client information.');</script>";
    }

    // Close prepared statement
    $stmt->close();
} else {
    // Display error message if required fields are not set
    echo "<script>alert('All fields are required.');</script>";
}

// Close database connection
$conn->close();
?> -->