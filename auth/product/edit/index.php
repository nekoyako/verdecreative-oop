<?php
include("../../php/config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $productData = $product->getById($id);
    if(!$productData) {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID tidak ditemukan";
    exit;
}
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Edit Data Produk</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Produk</h6>
        </div>
        <form action="/auth/product/edit/updated.php" method="POST"> 
            <div class="card-body">
            <input type="hidden" name="id" value="<?php echo $productData['id']; ?>" />
                <div class="form-group">
                    <label>Nama Item:</label>
                    <input type="text" class="form-control" name="item" value="<?php echo $productData['item']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Nama Package:</label>
                    <input type="text" class="form-control" name="package" value="<?php echo $productData['package']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Harga:</label>
                    <input type="number" class="form-control" name="price" value="<?php echo $productData['price']; ?>" required />
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="../../auth/dashboard/?menu=product" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>