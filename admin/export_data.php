<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengaduan dan Tanggapan.xls");
?>

<center>
    <h3>Laporan Kepada PLN</h3>
</center>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>NIK</th>
            <th>Nama Masyarakat</th>
            <th>Judul Laporan</th>
            <th>Isi Laporan</th>
            <th>Tanggapan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../config/koneksi.php';

        $no = 1;
        $query = mysqli_query($koneksi, "SELECT a.*, b.*, c.* FROM tanggapan a INNER JOIN pengaduan b INNER JOIN masyarakat c ON c.nik=b.nik ON a.id_pengaduan=b.id_pengaduan ORDER BY tgl_tanggapan DESC");
        while ($data = mysqli_fetch_array($query)) { ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['tgl_tanggapan']; ?></td>
                <td><?php echo $data['nik']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['judul_laporan']; ?></td>
                <td><?php echo $data['isi_laporan']; ?></td>
                <td><?php echo $data['tanggapan']; ?></td>
                <td><?php echo $data['status']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>