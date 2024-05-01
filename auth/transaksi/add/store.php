<?php

include("../../../php/config.php");
include("../../models/Transaction.php");

// get form data

$transaction = new Transaction($conn);
$transaction->store([
    'business' => $_POST['business'],
    'invoicenumber' => $_POST['invoicenumber'],
    'startdate' => $_POST['startdate'],
    'enddate' => $_POST['enddate'],
    'invoicedate' => $_POST['invoicedate'],
    'discount' => $_POST['discount'],
    'downpayment' => $_POST['downpayment'],
]);

// redirect to transaction index
// header("Location: ../auth/dashboard/?menu=transaction");
header("Location: /auth/dashboard/?menu=transaction");
exit; 