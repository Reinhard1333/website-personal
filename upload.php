<?php
include 'koneksi2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];

    $target_dir = "uploads/";
    $nama_file = basename($_FILES["bukti"]["name"]);
    $target_file = $target_dir . $nama_file;

    // Upload file ke folder
    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
        // Simpan ke database
        $sql = "INSERT INTO portofolio (kode_kegiatan, Nama_kegiatan, Tanggal, Bukti)
                VALUES ('$kode', '$nama', '$tanggal', '$nama_file')";
        if (mysqli_query($koneksi, $sql)) {
            echo "Data berhasil disimpan. <a href='portofolio.php'>Lihat Data</a>";
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    } else {
        echo "Upload gambar gagal.";
    }
}
?>

<!-- Form Upload -->
<h2>Upload Portofolio</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Kode Kegiatan: <input type="text" name="kode" required><br><br>
    Nama Kegiatan: <input type="text" name="nama" required><br><br>
    Tanggal: <input type="text" name="tanggal" required><br><br>
    Bukti (Gambar): <input type="file" name="bukti" accept="image/*" required><br><br>
    <input type="submit" value="Upload">
</form>
