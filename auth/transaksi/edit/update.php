<?php
include("../../../php/config.php");
include("../../models/Client.php");

// Pastikan $id didefinisikan dengan benar, misalnya dari URL
$id = isset($_GET['id']) ? $_GET['id'] : "";

// Pastikan $client diinstansiasi sebelum digunakan
$client = new Client($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses penyimpanan perubahan data
    $updateClient = [
        'id' => $id, // Pastikan $id sudah didefinisikan
        'code' => $_POST['code'],
        'name' => $_POST['name'],
        'contactPerson' => $_POST['contactPerson'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
    ];
    
    // Pastikan $client sudah didefinisikan sebelum memanggil metode update()
    $client->update($updateClient);

    // Redirect kembali ke halaman index setelah update
    header("Location: /auth/dashboard/?menu=client");
    exit;
}
?>
