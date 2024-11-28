<?php
ob_start();
session_start();

$title = 'Laporan yang Belum Terverify';

require '../../public/app.php';
require '../layouts/header.php';
require '../layouts/navUser.php';


// logic backend

$result = mysqli_query($conn, "SELECT * FROM pengaduan WHERE status = 'proses' ORDER BY id_pengaduan DESC");

ob_end_flush();
?> 

<div class="row" data-aos="fade-up">
  <div class="col-6">
    <h3 class="text-gray-800">Daftar Laporan Masyarakat</h3>
  </div>
  <div class="col-6 d-flex justify-content-end">
  </div>
  <div class="col-6">
    <p>Data yang Terlampir Sudah Belum Diverify</p>
  </div>
</div>

<hr>
<table class="table table-striped shadow-sm text-center" data-aos="fade-up" data-aos-duration="700">
  <thead>
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col">Tanggal</th>
      <th scope="col">NIK</th>
      <th scope="col">Isi Laporan</th>
      <th scope="col">Foto</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <th scope="row"><?= $i++; ?>.</th>
        <td><?= $row["tgl_pengaduan"]; ?></td>
        <td><?= $row["nik"]; ?></td>
        <td><?= $row["isi_laporan"]; ?></td>
        <td><img src="../../assets/foto/<?= $row['foto']; ?>" width="80"></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php require '../layouts/footer.php'; ?>