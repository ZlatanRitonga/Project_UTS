<?php
// Create database connection using config file
include_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="backoffice.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="pemesanan.php">Pemesanan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Zlatan Ganteng Shop</h1>
                <p class="lead fw-normal text-white-50 mb-0">Belanja? Disini azzaaa</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id DESC");
                while ($data = mysqli_fetch_array($result)) {
                    echo '';
                    echo '<div class="col mb-5">';
                    echo '<div class="card h-100">';
                    echo '<!-- Product image-->';
                    echo '<img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />';
                    echo '<!-- Product details-->';
                    echo '<div class="card-body p-4">';
                    echo '<div class="text-center">';
                    echo '<!-- Product name-->';
                    echo '<h5 class="fw-bolder">' . $data['nama'] . '</h5>';
                    echo '<!-- Product reviews-->';
                    echo '<div class="d-flex justify-content-center small text-warning mb-2">';
                    echo '<div class="bi-star-fill"></div>';
                    echo '<div class="bi-star-fill"></div>';
                    echo '<div class="bi-star-fill"></div>';
                    echo '<div class="bi-star-fill"></div>';
                    echo '<div class="bi-star-fill"></div>';
                    echo '</div>';
                    echo '<!-- Product price-->';
                    echo 'Rp ' . number_format($data['harga_jual'], 2);
                    echo '</div>';
                    echo '</div>';
                    echo '<!-- Product actions-->';
                    echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                    echo '<form action="detail.php" method="GET">';
                    echo '<input type="text" hidden name="id_produk" id="inputNama" value=' . $data['id'] . '>';
                    echo '<div class="text-center"><button class="btn btn-outline-dark mt-auto" type="submit">Detail</button></div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        </div>
        <?php if (isset($_GET['status'])) : ?>
            <p>
                <?php
                if ($_GET['status'] == 'success') {
                    echo "<script type='text/javascript'>alert('Pesanan Berhasil');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Pesanan Gagal');</script>";
                }
                ?>
            </p>
        <?php endif; ?>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>