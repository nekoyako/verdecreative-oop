<?php
include("../../php/config.php");
// include("../models/Client.php");

// $client = new Client($conn);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $transactionData = $transaction->getById($id);
    if(!$transactionData) {
        // Handle jika data tidak ditemukan
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    // Handle jika parameter id tidak ada
    echo "ID tidak ditemukan";
    exit;
}


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Edit Data Transaksi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Transaksi</h6>
        </div>
        <form action="../transaction/edit/updated.php" method="POST"> 
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Bisnis:</label>
                    <input type="text" class="form-control" name="business" value="<?php echo $transactionData['business']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Tanggal Mulai:</label>
                    <input type="date" class="form-control" name="startDate" value="<?php echo $transactionData['startDate']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai:</label>
                    <input type="date" class="form-control" name="endDate" value="<?php echo $transactionData['endDate']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Tanggal Invoice:</label>
                    <input type="date" class="form-control" name="invoiceDate" value="<?php echo $transactionData['invoiceDate']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Discount:</label>
                    <input type="number" class="form-control" name="discount" value="<?php echo $transactionData['discount']; ?>" />
                </div>
                <div class="form-group">
                    <label>Down Payment:</label>
                    <input type="number" class="form-control" name="downPayment" value="<?php echo $transactionData['downPayment']; ?>" />
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="../../auth/dashboard/?menu=transaction" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>