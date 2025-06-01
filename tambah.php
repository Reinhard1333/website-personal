<?php
include 'koneksi2.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = mysqli_real_escape_string($koneksi, $_POST['No_kegiatan']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['Nama_kegiatan']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['Tanggal']);
    $nama_file = mysqli_real_escape_string($koneksi, $_POST['Bukti']);
    
    // Cek apakah NIM sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM portofolio WHERE No_kegiatan = '$kode'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: index.php?status=gagal&pesan=NIM sudah terdaftar");
        exit();
    }
    
    // Query tambah data
    $query = "INSERT INTO portofolio (No_kegiatan, Nama_kegiatan, Tanggal, Bukti) 
    VALUES ('$kode', '$nama', '$tanggal', '$nama_file')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=sukses");
    } else {
        header("Location: index.php?status=gagal");
    }
} else {
    header("Location: index.php");
}
?>