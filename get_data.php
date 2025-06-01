<?php
// Hubungkan ke database
include 'koneksi2.php';

// Set header agar browser tahu ini data JSON
header('Content-Type: application/json');

// Ambil data dari tabel portofolio
$query = "SELECT * FROM portofolio";
$result = mysqli_query($koneksi, $query);

// Siapkan array untuk menampung data
$data = [];

// Loop hasil query dan masukkan ke array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Kirim data dalam format JSON
echo json_encode($data);
?>
