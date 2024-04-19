<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
}
include("../php/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/style_admin.css" />
    <title>Yako Treats Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/css/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        .bg_yako {
            background-color: #744a07;
        }

        .bg_yako2 {
            background-color: #fbf4e1;
        }

        .btn-custom {
            background-color: #744a07;
            border-color: #744a07;
            color: white;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            opacity: 0.82;
            color: white;
        }

        .page-item.active .page-link {
            background-color: #744a07 !important;
            border-color: #744a07 !important;
        }

        .text-custom {
            color: #744a07;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "menu.php"; ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="bg_yako2">

                <!-- Topbar -->
                <?php include "menu_top.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php
                $menu = isset($_GET['menu']) ? $_GET['menu'] : "";
                if ($menu == "") {
                    include "dashboard.php";
                } else if ($menu == "user") {
                    include "user/user.php";
                } else if ($menu == "product") {
                    include "product/product.php";
                } else if ($menu == "cat") {
                    include "categories/cat.php";
                } else {
                    include "blank_page.php";
                }
                ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="footer my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Yako Treats 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Log out" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn" type="button" data-dismiss="modal"
                        style="color: white; background: grey">Cancel</button>
                    <a class="btn" href="../php/logout.php" style="color: white; background: navy">Log out</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/css/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/css/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/css/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/css/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>