<?php
include_once("config.php");
if (isset($_POST['id_produk'])) {
    $id = $_POST['id_produk'];
    $product =  mysqli_query($mysqli, "SELECT p.*, k.nama AS kategori  FROM produk AS p JOIN kategori_produk AS k ON p.kategori_produk_id = k.id WHERE p.id = $id");
}  
else{
    $product = mysqli_query($mysqli, "SELECT p.*, k.nama AS kategori  FROM produk AS p JOIN kategori_produk AS k ON p.kategori_produk_id = k.id");
}

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="pemesanan.php">Pemesanan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">PEMESANAN</h1>
                <p class="lead fw-normal text-white-50 mb-0">Form Pemesanan</p>
            </div>
        </div>
    </header>

    <!-- Related items section-->
    <section class="py-5 px-5 bg-light">
        <div class="registration-form">
            <form id='formpesanan' action="CRUD.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control item" list="produk_list" id="id_produk" name="id_produk" placeholder="Produk" >
                    <datalist id="produk_list">
                        <?php while ($data = mysqli_fetch_array($product)) : ?>
                            <option value="<?= $data['id'] ?>" data-id="<?= $data['nama'] ?>"><?= $data['nama'] ?></option>
                        <?php endwhile; ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control item" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Jumlah" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control item" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control item" id="email" name="email" placeholder="Email Pembeli" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" id="nama_pemesan" name="nama_pemesan" placeholder="Nama Pembeli" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" id="alamat_pemesan" name="alamat_pemesan" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" id="no_hp" name="no_hp" placeholder="No HP." required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" value="pesanan" class="btn btn-outline-dark" name="pesanan">Buat Pesanan</button>
                </div>

            </form>
        </div>
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