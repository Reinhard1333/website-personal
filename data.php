<?php
include 'koneksi2.php';

// Proses Tambah Data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['No_kegiatan'];
    $nama = $_POST['Nama_kegiatan'];
    $tanggal = $_POST['Tanggal'];

    $target_dir = "uploads/";
    $nama_file = basename($_FILES["bukti"]["name"]);
    $target_file = $target_dir . $nama_file;

    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO portofolio (No_kegiatan, Nama_kegiatan, Tanggal, Bukti)
                VALUES ('$kode', '$nama', '$tanggal', '$nama_file')";
        mysqli_query($koneksi, $sql);
        header("Location: data.php");
        exit;
    } else {
        echo "Gagal mengupload file.";
    }
}



// Ambil data dari database
$query = "SELECT * FROM portofolio";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Portofolio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { padding: 5px 10px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-danger { background-color: #f44336; color: white; border: none; }
        .btn-danger:hover { background-color: #d32f2f; }
        .btn-primary { background-color: #4CAF50; color: white; border: none; }
        .btn-primary:hover { background-color:rgb(29, 202, 101); }
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>

    <div style=" margin-bottom: 10px;">
  <a href="index.html" class="btn btn-primary">← Kembali ke Beranda</a>
</div>

    <!-- Form Tambah Data -->
    <h3>Tambah Data Portofolio</h3>
    <form action="data.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>No_kegiatan:</label>
        <input type="text" name="No_kegiatan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nama Kegiatan:</label>
        <input type="text" name="Nama_kegiatan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Tanggal Kegiatan:</label>
        <input type="date" name="Tanggal" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Bukti (Upload File):</label>
        <input type="file" name="bukti" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>


    <!-- Tabel Data -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Tanggal Kegiatan</th>
            <th>Bukti</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['No_kegiatan']); ?></td>
            <td><?php echo htmlspecialchars($row['Nama_kegiatan']); ?></td>
            <td><?php echo htmlspecialchars($row['Tanggal']); ?></td>
            <td><?php echo htmlspecialchars($row['Bukti']); ?></td>
            <td>
                <a href="edit.php?kode=<?php echo $row['No_kegiatan']; ?>" class="btn btn-primary">Edit</a>
                <a href="hapus.php?No_kegiatan=<?php echo $row['No_kegiatan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
