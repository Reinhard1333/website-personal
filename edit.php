<?php
include 'koneksi2.php';

if (!isset($_GET['kode'])) {
    echo "Kode tidak ditemukan.";
    exit;
}

$kode = $_GET['kode'];
$query = "SELECT * FROM portofolio WHERE No_kegiatan = '$kode'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];

    if ($_FILES['bukti']['name']) {
        $target_dir = "uploads/";
        $nama_file = basename($_FILES["bukti"]["name"]);
        $target_file = $target_dir . $nama_file;

        if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
            $bukti = $nama_file;
        } else {
            echo "Gagal mengupload file baru.";
            exit;
        }
    } else {
        $bukti = $data['Bukti']; // pakai file lama
    }

    $update = "UPDATE portofolio 
               SET Nama_kegiatan = '$nama', Tanggal = '$tanggal', Bukti = '$bukti'
               WHERE No_kegiatan = '$kode'";

    if (mysqli_query($koneksi, $update)) {
        header("Location: data.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Portofolio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 8px 12px; text-decoration: none; background-color: #4CAF50; color: white; border: none; }
        .btn:hover { background-color: #45a049; }
        .img-preview { max-height: 120px; margin-top: 10px; }
    </style>
</head>
<body>

    <h2>Edit Data Portofolio</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>No Kegiatan:</label>
            <input type="text" name="kode" class="form-control" value="<?php echo htmlspecialchars($data['No_kegiatan']); ?>" disabled>
        </div>
        <div class="form-group">
            <label>Nama Kegiatan:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($data['Nama_kegiatan']); ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Kegiatan:</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo htmlspecialchars($data['Tanggal']); ?>" required>
        </div>
        <div class="form-group">
            <label>Bukti (Upload Baru jika ingin diganti):</label>
            <input type="file" name="bukti" class="form-control">
            <p>File saat ini:</p>
            <img src="uploads/<?php echo htmlspecialchars($data['Bukti']); ?>" alt="Bukti" class="img-preview" onerror="this.src='aset/default.png'">
        </div>
        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>

</body>
</html>
