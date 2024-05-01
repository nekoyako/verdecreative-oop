<?php
include("../../../php/config.php");
include("../../models/Product.php");

// Pastikan $id didefinisikan dengan benar, misalnya dari URL
$id = isset($_GET['id']) ? $_GET['id'] : "";

// Pastikan $client diinstansiasi sebelum digunakan
$product = new Product($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses penyimpanan perubahan data
    $updateProduct = [
        'id' => $id, // Pastikan $id sudah didefinisikan
        'item' => $_POST['item'],
        'package' => $_POST['package'],
        'price' => $_POST['price'],
    ];
    
    // Pastikan $client sudah didefinisikan sebelum memanggil metode update()
    $product->update($updateProduct);

    // Redirect kembali ke halaman index setelah update
    header("Location: /auth/dashboard/?menu=product");
    exit;
}
?>
