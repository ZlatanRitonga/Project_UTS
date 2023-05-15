<?php

include_once("config.php");

if(isset($_POST['pesanan'])){
    $id_produk = $_POST['id_produk'];
    $tanggal = $_POST['tanggal'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat_pemesan = $_POST['alamat_pemesan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $deskripsi = $_POST['deskripsi'];
    $result = mysqli_query($mysqli, "INSERT INTO pesanan(produk_id, tanggal, nama_pemesan, alamat_pemesan, no_hp, email, jumlah_pesanan, deskripsi) VALUES((SELECT id FROM produk WHERE nama ='$id_produk' OR id='$id_produk'), '$tanggal', '$nama_pemesan', '$alamat_pemesan', '$no_hp', '$email', '$jumlah_pesanan', '$deskripsi')");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil menambahkan pesanan";
        header("Location: index.php?status=success");
    }else{
        echo "Gagal menambahkan pesanan";
        header("Location: index.php?status=failed");
    }
    
}

if(isset($_POST['add_pesanan'])){
    header("Location: pemesanan.php");
}
if(isset($_POST['produk'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $deskripsi = $_POST['deskripsi'];
    $kategori_produk_id = $_POST['kategori_produk_id'];
    $result = mysqli_query($mysqli, "INSERT INTO produk(kode, nama, harga_jual, harga_beli, stok, min_stok, deskripsi, kategori_produk_id) VALUES('$kode', '$nama', '$harga_jual', '$harga_beli', '$stok', '$min_stok', '$deskripsi', (SELECT id FROM kategori_produk WHERE nama ='$kategori_produk_id' OR id='$kategori_produk_id'))");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil menambahkan produk";
        header("Location: backoffice_produk.php?status=success");
    }else{
        echo "Gagal menambahkan produk";
        header("Location: backoffice_produk.php?status=failed");
    }
}
if(isset($_POST['edit_produk'])){
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $deskripsi = $_POST['deskripsi'];
    $kategori_produk_id = $_POST['kategori_produk_id'];
    $result = mysqli_query($mysqli, "UPDATE produk SET kode='$kode', nama='$nama', harga_jual='$harga_jual', harga_beli='$harga_beli', stok='$stok', min_stok='$min_stok', deskripsi='$deskripsi', kategori_produk_id=(SELECT id FROM kategori_produk WHERE nama ='$kategori_produk_id' OR id='$kategori_produk_id') WHERE id='$id'");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil mengubah produk";
        header("Location: backoffice_produk.php?status=success");
    }else{
        echo "Gagal mengubah produk";
        header("Location: backoffice_produk.php?status=failed");
    }
}
if(isset($_POST['delete_produk'])){
    $id = $_POST['id'];
    $result = mysqli_query($mysqli, "DELETE FROM produk WHERE id='$id'");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil menghapus produk";
        header("Location: backoffice_produk.php?status=success");
    }else{
        echo "Gagal menghapus produk";
        header("Location: backoffice_produk.php?status=failed");
    }
}
if(isset($_POST['edit_pesanan'])){
    $id = $_POST['id'];
    $id_produk = $_POST['id_produk'];
    $tanggal = $_POST['tanggal'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat_pemesan = $_POST['alamat_pemesan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $deskripsi = $_POST['deskripsi'];
    $result = mysqli_query($mysqli, "UPDATE pesanan SET produk_id=(SELECT id FROM produk WHERE nama ='$id_produk' OR id='$id_produk'), tanggal='$tanggal', nama_pemesan='$nama_pemesan', alamat_pemesan='$alamat_pemesan', no_hp='$no_hp', email='$email', jumlah_pesanan='$jumlah_pesanan', deskripsi='$deskripsi' WHERE id='$id'");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil mengubah pesanan";
        header("Location: backoffice.php?status=success");
    }else{
        echo "Gagal mengubah pesanan";
        header("Location: backoffice.php?status=failed");
    }
}

if(isset($_POST['delete_pesanan'])){
    $id = $_POST['id'];
    $result = mysqli_query($mysqli, "DELETE FROM pesanan WHERE id='$id'");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil menghapus pesanan";
        header("Location: backoffice.php?status=success");
    }else{
        echo "Gagal menghapus pesanan";
        header("Location: backoffice.php?status=failed");
    }
}

if(isset($_POST['kategori'])){
    $nama = $_POST['nama'];
    $result = mysqli_query($mysqli, "INSERT INTO kategori_produk(nama) VALUES('$nama')");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil menambahkan kategori";
        header("Location: backoffice_kategori.php?status=success");
    }else{
        echo "Gagal menambahkan kategori";
        header("Location: backoffice_kategori.php?status=failed");
    }
}

if(isset($_POST['edit_kategori'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $result = mysqli_query($mysqli, "UPDATE kategori_produk SET nama='$nama' WHERE id='$id'");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil mengubah kategori";
        header("Location: backoffice_kategori.php?status=success");
    }else{
        echo "Gagal mengubah kategori";
        header("Location: backoffice_kategori.php?status=failed");
    }
}

if(isset($_POST['delete_kategori'])){
    $id = $_POST['id'];
    $result = mysqli_query($mysqli, "DELETE FROM kategori_produk WHERE id='$id'");
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }
    if($result){
        echo "Berhasil menghapus kategori";
        header("Location: backoffice_kategori.php?status=success");
    }else{
        echo "Gagal menghapus kategori";
        header("Location: backoffice_kategori.php?status=failed");
    }
}
?>