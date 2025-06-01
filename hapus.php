<?php
include 'koneksi2.php';

if (isset($_GET['No_kegiatan'])) {
    $no_kegiatan = (int) $_GET['No_kegiatan'];  // (int) untuk keamanan

    $query = "DELETE FROM portofolio WHERE No_kegiatan = $no_kegiatan";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: data.php?status=sukses");
    } else {
        echo "Gagal menghapus data: ". mysqli_error($koneksi);
    }
} else {
    header("Location: data.php");
}
?>