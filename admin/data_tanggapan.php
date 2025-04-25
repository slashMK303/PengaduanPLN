<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Selamat Datang <?php echo $_SESSION['nama_petugas'] ?></h3>
            <div class="card">
                <div class="card-header text-center">
                    Data Tanggapan
                </div>
                <div class="card-body">
                    <a href="export_data.php" class="btn btn-success" target="_blank">Export Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>NIK</th>
                                <th>Nama Masyarakat</th>
                                <!-- <th>Nama Petugas</th> -->
                                <th>Judul</th>
                                <th>Tanggapan</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                    <!-- <td><?php echo $data['nama_petugas']; ?></td> -->
                                    <td><?php echo $data['judul_laporan']; ?></td>
                                    <td><?php echo $data['tanggapan']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['status'] == 'proses') {
                                            echo "<span class='badge bg-warning'>Proses</span>";
                                        } elseif ($data['status'] == 'selesai') {
                                            echo "<span class='badge bg-success'>Selesai</span>";
                                        } else {
                                            echo "<span class='badge bg-danger'>Menunggu</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_tanggapan'] ?>">Hapus</a>
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus<?php echo $data['id_tanggapan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Tanggapan : <?php echo $data['judul_laporan'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="post">
                                                            <input type="hidden" name="id_tanggapan" class="form-control" value="<?php echo $data['id_tanggapan'] ?>">
                                                            <p>Apakah yakin akan menghapus tanggapan <br> <?php echo $data['judul_laporan'] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_tanggapan" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal edit -->
                                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_tanggapan'] ?>" data-bs-target="#edit <?php echo $data['id_pengaduan'] ?>">Edit</a>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="edit<?php echo $data['id_tanggapan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tanggapan : <?php echo $data['judul_laporan'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="post">
                                                            <input type="hidden" name="id_tanggapan" class="form-control" value="<?php echo $data['id_tanggapan'] ?>">
                                                            <!-- <p>Apakah yakin akan mengedit tanggapan <br> <?php echo $data['judul_laporan'] ?></p> -->
                                                            <div class="row mb-3">
                                                                <label class="col-md-4 ">Tanggapan</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="tanggapan" class="form-control" placeholder="Masukkan Tanggapan" value="<?php echo $data['tanggapan'] ?>" required>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit_tanggapan" class="btn btn-primary">edit</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>