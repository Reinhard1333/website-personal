<?php
include 'koneksi2.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portofolio Danny Ahmad Yusuf, mahasiswa informatika dengan minat di teknologi dan inovasi digital." />
  <title>Danny Ahmad Yusuf - Portfolio</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="Style.css" />
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 20px;
      border-radius: 10px;
      width: 90%;
      max-width: 400px;
      position: relative;
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .modal-body form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .modal-body input[type="text"],
    .modal-body input[type="date"],
    .modal-body input[type="file"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .modal-body button {
      background-color: #007bff;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .modal-body button:hover {
      background-color: #0056b3;
    }

    .close {
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <nav>
    <div class="nav-container">
      <a href="#home" class="logo-link">
        <img src="aset/th.jpg" alt="Logo" class="logo-img">
      </a>
      <ul class="nav-menu">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Me</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#opini">Opini</a></li>
        <li><a href="#kontak">Contact Me</a></li>
        <li><a href="upload.php">Upload</a></li>
        <li class="dropdown">
          <a href="#">More</a>
          <ul class="dropdown-content">
            <li><a href="https://www.facebook.com/profile.php?id=100078606710272" target="_blank">Facebook</a></li>
            <li><a href="https://www.instagram.com/aku_danny?igsh=MTA3dW00MW9sYTN6ZA==" target="_blank">Instagram</a></li>
            <li><a href="https://www.tiktok.com/@dannyyusuf31?_t=ZS-8w4d70u2dyp&_r=1" target="_blank">Tiktok</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <section id="home" class="hero-section">
    <div class="hero-container">
      <img src="aset/241101063.jpg" alt="Danny Ahmad Yusuf" class="hero-photo">
      <div class="hero-text">
        <h1>Halo, saya <span class="highlight">Danny Ahmad Yusuf</span></h1>
        <h2>Mahasiswa Informatika & Teknologi</h2>
        <p>Saya memiliki ketertarikan mendalam pada dunia teknologi, pemrograman, dan inovasi digital.</p>
        <a href="#about"><input type="submit" name="Submit" value="Kenali saya" id="submit"></a>
      </div>
    </div>
  </section>

  <section id="about" class="about">
    <div class="about-container">
      <div class="about-text">
        <h2>Tentang Saya</h2>
        <p>Halo! Saya Danny Ahmad Yusuf, alamat saya Kabupaten Bojonegoro, Kecamatan Trucuk, Desa Banjarsari...</p>
      </div>
      <div class="about-image">
        <img src="aset/IMG-20230203-WA0002.jpg" alt="Danny Ahmad Yusuf">
      </div>
    </div>
  </section>

  <section id="portfolio" class="portfolio-section">
    <h2 class="section-title">Portfolio</h2>
    <button class="btn-tambah" onclick="openModal()">Tambah</button>
    <div class="table-wrapper">
      <table class="portfolio-table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Kegiatan</th>
            <th>Tanggal Kegiatan</th>
            <th>Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM portofolio";
          $result = mysqli_query($koneksi, $query);
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $no++ . "</td>";
              echo "<td>" . $row['Nama_kegiatan'] . "</td>";
              echo "<td>" . $row['Tanggal'] . "</td>";
              echo "<td><img src='uploads/" . $row['Bukti'] . "' alt='Bukti' class='sertifikat-img'></td>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Modal Tambah -->
    <div id="modalTambah" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Tambah Portofolio</h3>
          <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
          <form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="nama_kegiatan">Nama Kegiatan:</label>
            <input type="text" id="nama_kegiatan" name="nama_kegiatan" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="bukti">Upload Bukti:</label>
            <input type="file" id="bukti" name="bukti" accept="image/*" required>

            <button type="submit" name="submit">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Bagian lain tetap seperti sebelumnya -->

  <script>
    function openModal() {
      document.getElementById('modalTambah').style.display = 'block';
    }

    function closeModal() {
      document.getElementById('modalTambah').style.display = 'none';
    }

    window.onclick = function(event) {
      const modal = document.getElementById('modalTambah');
      if (event.target === modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>
</html>
