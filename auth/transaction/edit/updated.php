<?php
include "../../../php/config.php";
$id = mysqli_real_escape_string($conn, $_POST['id']);
$business = mysqli_real_escape_string($conn, $_POST['business']);
$startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
$endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
$invoiceDate = mysqli_real_escape_string($conn, $_POST['invoiceDate']);
$discount = mysqli_real_escape_string($conn, $_POST['discount']);
$downPayment = mysqli_real_escape_string($conn, $_POST['downPayment']);

$sql = "UPDATE transaction SET business='$business',
								startDate='$startDate',
								endDate='$endDate',
								invoiceDate='$invoiceDate',
								discount='$discount'
								WHERE id='$id'";
$query = mysqli_query($conn, $sql);


$url = "/auth/dashboard/?menu=transaction";
$pesan = "Successfully Edited";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>