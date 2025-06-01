<?php
// Panggil file koneksi
include 'koneksi.php';

// Query untuk mengambil data dari tb_mahasiswa
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>No</th><th>NIM</th><th>Nama</th><th>Alamat</th><th>Jurusan</th></tr>";
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nim'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['jurusan'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data mahasiswa.";
}
?>
