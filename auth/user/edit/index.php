<?php
include("../../php/config.php");
// include("../models/Client.php");

// $client = new Client($conn);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $userData = $user->getById($id);
    if(!$userData) {
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
    <h1 class="h3 mb-2 text-custom" style="color:black">Edit Data Pelanggan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Pelanggan</h6>
        </div>
        <form action="../user/edit/updated.php" method="POST"> 
            <div class="card-body">
                <div class="form-group">
                    <label>Kode:</label>
                    <input type="text" class="form-control" name="code" value="<?php echo $userData['id']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Nama Perusahaan:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $userData['name']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Nama Penanggung Jawab:</label>
                    <input type="text" class="form-control" name="position" value="<?php echo $userData['position']; ?>" required />
                </div>
                <div class="form-group">
                    <label>No Telepon:</label>
                    <input type="number" class="form-control" name="username" value="<?php echo $userData['username']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Alamat:</label>
                    <input type="text" class="form-control" name="password" value="<?php echo $userData['password']; ?>" required />
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="../../auth/dashboard/?menu=user" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>