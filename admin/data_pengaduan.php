<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Selamat Datang <?php echo $_SESSION['nama_petugas'] ?></h3>
            <div class="card">
                <div class="card-header text-center">
                    Data Pengaduan
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/koneksi.php";
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik ORDER BY id_pengaduan DESC");
                            while ($data = mysqli_fetch_array($query)) { ?>


                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['tgl_pengaduan'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['judul_laporan'] ?></td>
                                    <td><?php echo $data['isi_laporan'] ?></td>
                                    <td><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
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
                                        <?php
                                        if ($data['status'] != 'selesai') { ?>
                                            <a href="" class="btn btn-primary btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#verif<?php echo $data['id_pengaduan'] ?>">Verifikasi</a>
                                            <!-- Button trigger modal -->

                                            <!-- Modal Verifikasi -->
                                            <div class="modal fade" id="verif<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi :
                                                                <?php echo $data['judul_laporan'] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-4">Status</label>
                                                                    <div class="col-md-8">
                                                                        <select class="form-control" name="status">
                                                                            <option value="proses">Proses</option>
                                                                            <option value="0">Tolak</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="kirim" class="btn btn-primary">Verifikasi</button>
                                                        </div>
                                                        </form>

                                                        <?php
                                                        if (isset($_POST['kirim'])) {
                                                            $id_pengaduan = $_POST['id_pengaduan'];
                                                            $status = $_POST['status'];

                                                            $query = mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
                                                            echo "
                                            <script>
                                            alert('Data Berhasil Diverifikasi');
                                            window.location='index.php?page=pengaduan';
                                            </script> ";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        if ($data['status'] == 'proses') { ?>
                                            <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tanggapi<?php echo $data['id_pengaduan'] ?>">Tanggapi</a>
                                            <!-- Button trigger modal -->

                                            <!-- Modal Tanggapi -->
                                            <div class="modal fade" id="tanggapi<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tanggapi :
                                                                <?php echo $data['judul_laporan'] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-4">Tanggal</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="tgl_pengaduan" class="form-control" value="<?php echo $data['tgl_pengaduan'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-4">Judul</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-4">Laporan</label>
                                                                    <div class="col-md-8">
                                                                        <textarea name="isi_laporan" class="form-control" readonly><?php echo $data['isi_laporan'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-4">Foto</label>
                                                                    <div class="col-md-8">
                                                                        <img src="../assets/img/<?php echo $data['foto'] ?>" width="100">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-4">Tanggapan</label>
                                                                    <div class="col-md-8">
                                                                        <textarea name="tanggapan" class="form-control" required></textarea>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="kirim" class="btn btn-primary">Tanggapi</button>
                                                        </div>
                                                        </form>

                                                        <?php
                                                        if (isset($_POST['kirim'])) {
                                                            $id_pengaduan = $_POST['id_pengaduan'];
                                                            $id_petugas = $_SESSION['id_petugas'];
                                                            $tanggal = date("Y-m-d");
                                                            $tanggapan = htmlspecialchars($_POST['tanggapan']);

                                                            $query = mysqli_query($koneksi, "INSERT INTO tanggapan VALUES ('', '$id_pengaduan', '$tanggal', '$tanggapan', '$id_petugas' )");
                                                            if ($tanggapan != null) {
                                                                $update = mysqli_query($koneksi, "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan'");
                                                            }
                                                            echo "
                                                        <script>
                                                        alert('Data Berhasil Di Tanggapi');
                                                        window.location='index.php?page=pengaduan';
                                                        </script> ";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_pengaduan'] ?>">Hapus</a>
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data :
                                                            <?php echo $data['judul_laporan'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="post">
                                                            <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                                                            <p>Apakah yakin akan menghapus data <br>
                                                                <?php echo $data['judul_laporan'] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_pengaduan" class="btn btn-danger">Hapus</button>
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