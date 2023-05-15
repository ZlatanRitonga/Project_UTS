<?php

include_once("config.php");

$produk = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id DESC");
if (!$produk) {
    echo "Error: " . mysqli_error($mysqli);
}
$data = array();
while ($row = mysqli_fetch_array($produk)) {
    $data[] = $row;
}
$jsonString = json_encode($data);
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
            <li class="nav-item active">
                <a class="nav-link" href="backoffice_produk.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Semua Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="backoffice_kategori.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kategori Produk</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                produk
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
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
                            <a href="index.php" role="button">Logout</a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Produk</h1>
                    <a class="btn btn-secondary my-2" href="tambah_produk.php">Tambah</a>
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablepesanan" name="tablepesanan" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Harga Jual</th>
                                            <th>Harga Beli</th>
                                            <th>Stok</th>
                                            <th>Minimal Stok</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori Produk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value) {
                                            echo '<tr>';
                                            echo '<td>' . ($key + 1) . '</td>';
                                            echo '<td>' . $value['kode'] . '</td>';
                                            echo '<td>' . $value['nama'] . '</td>';
                                            echo '<td>' . $value['harga_jual'] . '</td>';
                                            echo '<td>' . $value['harga_beli'] . '</td>';
                                            echo '<td>' . $value['stok'] . '</td>';
                                            echo '<td>' . $value['min_stok'] . '</td>';
                                            echo '<td>' . $value['deskripsi'] . '</td>';
                                            echo '<td>' . $value['kategori_produk_id'] . '</td>';
                                        ?>
                                            <td>
                                                <form method="POST" action="edit_produk.php">
                                                    <input type="text" hidden name="id_produk" value="<?php echo $value['id']; ?>">
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </form>
                                            </td>
                                            </tr>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

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

    <?php if (isset($_GET['status'])) : ?>
        <p>
            <?php
            if ($_GET['status'] == 'success') {
                echo "<script type='text/javascript'>alert('Permintaan Berhasil');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Permintaan Gagal');</script>";
            }
            ?>
        </p>
    <?php endif; ?>
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