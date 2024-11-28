<?php
ob_start();
session_start();

$title = 'Print Hasil';

require '../../public/app.php';
require '../layouts/header.php';

// logic backend

$query = "SELECT * FROM ( ( tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan )
        INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas ) ORDER BY id_tanggapan DESC";

$result = mysqli_query($conn, $query);

ob_end_flush();
?> 

<nav class="navbar navbar-expand-lg navbar-dark bg-danger py-3 shadow">
    <div class="container" data-aos="fade-down">
        <a class="navbar-brand" href="#">
            <i class="fas fa-atlas"></i> Form Aduan Masyarakat
        </a>

        <ul class=" navbar-nav ml-auto d-flax">

            <div class="btn-group">
                <a class="btn btn-outline-light" href="../admin/generate.php">
                    <i class="fas fa-fw fa-arrow-left "></i>
                    Kembali
                </a>
            </div>
        </ul>
    </div>
</nav>

<div class="container shadow mt-5">

    <table class="table table-bordered shadow text-center" data-aos="fade-up" data-aos-duration="900">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Tanggal Laporan</th>
                <th scope="col">Laporan</th>
                <th scope="col">Tanggal Tanggapan</th>
                <th scope="col">Tanggapan</th>
                <th scope="col">Nama Petugas</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?>.</th>
                    <td><?= $row["nik"]; ?></td>
                    <td><?= $row["tgl_pengaduan"]; ?></td>
                    <td><?= $row["isi_laporan"]; ?></td>
                    <td><?= $row["tgl_tanggapan"]; ?></td>
                    <td><?= $row["tanggapan"]; ?></td>
                    <td><?= $row["nama_petugas"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require '../layouts/footer.php'; ?>

<script type="text/javascript">
    window.print();
</script>