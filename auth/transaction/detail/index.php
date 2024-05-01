<div class="card mt-5">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-center">Detail Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th width="10">Item</th>
                        <th width="100">Paket</th>
                        <th width="100">Kuantitas</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>

                <tbody>
                  
                        <tr>
                        <td width="10">1</td>
                        <td width="10">SMM</td>
                        <td width="100">Splendor</td>
                        <td width="100">1</td>
                        <td><a href="?menu=transaction&action=edit&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #466d1d">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?menu=transaction&action=delete&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #c01605" onclick="return confirm('Do you want to delete this?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a></td>
                        </tr>
         
                </tbody>

            </table>
            <a href="#" class="btn btn-primary" id="showFormButton">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="?menu=transaction&action=add" method="POST">
                    <!-- Isi form sesuai kebutuhan -->
                    <div class="form-group">
                        <label>Nama Item:</label>
                        <input type="text" class="form-control" name="business" placeholder="Masukkan Nama Item" required /> 
                    </div>
                    <div class="form-group">
                        <label>Nama Paket:</label>
                        <input type="text" class="form-control" name="business" placeholder="Masukkan Nama Paket" required />
                    </div>
                    <div class="form-group">
                        <label>Kuantitas:</label>
                        <input type="number" class="form-control" name="business" placeholder="Masukkan Kuantitas" required />
                    </div>
                    <!-- Tambahkan input lainnya -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Masukkan semua link JavaScript yang diperlukan di sini -->

<script>
    // Ketika dokumen selesai dimuat, tambahkan event listener untuk menampilkan pop-up form ketika tombol ditekan
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("showFormButton").addEventListener("click", function() {
            document.getElementById("myModal").style.display = "block";
        });

        // Sembunyikan pop-up form ketika tombol Close atau area luar pop-up form ditekan
        document.querySelectorAll("[data-dismiss='modal']").forEach(function(element) {
            element.addEventListener("click", function() {
                document.getElementById("myModal").style.display = "none";
            });
        });

        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal")) {
                document.getElementById("myModal").style.display = "none";
            }
        }
    });
</script>