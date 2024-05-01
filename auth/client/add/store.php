<?php

include("../../../php/config.php");
include("../../models/Client.php");

// get form data

$client = new Client($conn);
$client->store([
    'code' => $_POST['code'],
    'name' => $_POST['name'],
    'contactPerson' => $_POST['contactPerson'],
    'phone' => $_POST['phone'],
    'address' => $_POST['address'],
]);

// redirect to client index
// header("Location: ../auth/dashboard/?menu=client");
<<<<<<< HEAD
header("Location: /auth/dashboard/?menu=client");
=======
header("Location: /auth/dashboard?menu=client");
>>>>>>> 7f41b9b06aa5193451667e01d5b2de8d0b922ee5
exit; 