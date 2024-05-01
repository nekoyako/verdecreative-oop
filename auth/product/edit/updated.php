<?php
include "../../../php/config.php";
$id = mysqli_real_escape_string($conn, $_POST['id']);
$item = mysqli_real_escape_string($conn, $_POST['item']);
$package = mysqli_real_escape_string($conn, $_POST['package']);
$price = mysqli_real_escape_string($conn, $_POST['price']);

$sql = "UPDATE product SET item='$item',
								package='$package',
								price='$price',
								WHERE id='$id'";
$query = mysqli_query($conn, $sql);


$url = "/auth/dashboard/?menu=product";
$pesan = "Successfully Edited";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>