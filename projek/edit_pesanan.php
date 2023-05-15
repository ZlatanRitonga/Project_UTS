<?php
include_once("config.php");
if (isset($_POST['id'])) {
    $id_produk = $_POST['produk_id'];
    $id = $_POST['id'];
    $produk_all = mysqli_query($mysqli, "SELECT * FROM produk");
    $pesanan = mysqli_query($mysqli, "SELECT * FROM pesanan Where id = '" . $id . "' ");
    if (!$pesanan) {
        echo "Error: " . mysqli_error($mysqli);
    }
    $data = mysqli_fetch_array($pesanan);
} else {
    header("Location: backoffice.php");
}
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>backoffice</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Produk
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="backoffice_produk.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Semua Produk</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="backoffice_kategori.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kategori Produk</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pesanan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="backoffice.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Semua Pesanan</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <h1>Edit Pesanan</h1>
                    <div class="registration-form">
                        <form id='formpesanan' action="CRUD.php" method="POST">
                            <div class="form-group">
                                <input type='text' class="form-control item" id="id" name="id" value='<?= $data['id']  ?>' hidden>
                                <input type="text" class="form-control item" list="produk_list" id="id_produk" name="id_produk" placeholder="Produk" value='<?= $data['produk_id']  ?>'>
                                <datalist id="produk_list">
                                    <?php
                                    while ($data_prod = mysqli_fetch_array($produk_all)) : ?>
                                        <option value="<?= $data_prod['id'] ?>" data-id="<?= $data_prod['nama'] ?>"><?= $data_prod['nama'] ?></option>
                                    <?php endwhile; ?>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control item" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Jumlah" value='<?= $data['jumlah_pesanan']  ?>' required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control item" id="tanggal" name="tanggal" placeholder="Tanggal" value='<?= $data['tanggal']  ?>' required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control item" id="email" name="email" placeholder="Email Pembeli"value='<?= $data['email']  ?>' required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control item" id="nama_pemesan" name="nama_pemesan" placeholder="Nama Pembeli" value='<?= $data['nama_pemesan']  ?>' required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control item" id="alamat_pemesan" name="alamat_pemesan" placeholder="Alamat" value='<?= $data['alamat_pemesan']  ?>' required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control item" id="no_hp" name="no_hp" placeholder="No HP." value='<?= $data['no_hp']  ?>' required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control item" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value='<?= $data['deskripsi']  ?>' required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" value="edit_pesanan" class="btn btn-outline-dark" name="edit_pesanan">Edit Pesanan</button>
                                <button type="submit" value="delete_pesanan" class="btn btn-outline-danger" name="delete_pesanan">Delete Pesanan</button>
                            </div>


                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2020</span>
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


            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#tablepesanan').DataTable({

                    });
                });
            </script>
            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>