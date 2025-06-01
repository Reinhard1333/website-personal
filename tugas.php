<?php
// Panggil file koneksi
include 'koneksi.php';

// Query gabungan untuk mengambil data mahasiswa, nilai, dan nama mata kuliah
$query = "SELECT mahasiswa.nim, mahasiswa.nama, tb_mk.nama_mk, tb_nilai.nilai 
FROM tb_nilai
JOIN mahasiswa ON tb_nilai.nim = mahasiswa.nim
JOIN tb_mk ON tb_nilai.kode_mk = tb_mk.kode_mk"; 
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding  ='8'>";
    echo "<tr><th>No</th><th>NIM</th><th>Nama</th><th>Mata Kuliah</th><th>Nilai</th></tr>";
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nim'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['nama_mk'] . "</td>";
        echo "<td>" . $row['nilai'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data mahasiswa.";
}
?>