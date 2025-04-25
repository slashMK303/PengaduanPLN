<div class="container">
  <div class="row">
    <div class="col-md-12 mt-3">
      <h3>Selamat Datang <?php echo $_SESSION['nama_petugas'] ?></h3>
      <div class="card">
        <div class="card-header text-center">
          Data Masyarakat
        </div>
        <div class="card-body">
          <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</a>

          <!-- Modal Tambah Warga -->
          <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Masyarakat</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    <div class="row mb-3">
                      <label class="col-md-4">NIK</label>
                      <div class="col-md-8">
                        <input type="number" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4">Nama</label>
                      <div class="col-md-8">
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4">Username</label>
                      <div class="col-md-8">
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4">Password</label>
                      <div class="col-md-8">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4">No Telepon</label>
                      <div class="col-md-8">
                        <input type="number" name="telp" class="form-control" placeholder="Masukkan No Telepon" required>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="tambah_data" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>

                <?php
                include '../config/koneksi.php';
                if (isset($_POST['tambah_data'])) {
                  $nik = $_POST['nik'];
                  $nama = $_POST['nama'];
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $telp = $_POST['telp'];
                  $level = 'masyarakat';

                  $query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik','$nama', '$username','$password', '$telp', '$level')");

                  if ($query) {
                    header('location:index.php?page=masyarakat');
                  }
                }
                ?>

              </div>
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../config/koneksi.php';

              $no = 1;
              $query = mysqli_query($koneksi, "SELECT*FROM masyarakat");
              while ($data = mysqli_fetch_array($query)) { ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nik']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['telp']; ?></td>
                  <td>
                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['nik'] ?>">Hapus</a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus<?php echo $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data <?php echo $data['nama'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="edit_data.php" method="post">
                              <input type="hidden" name="nik" class="form-control" value="<?php echo $data['nik'] ?>">
                              <p>Apakah yakin akan menghapus data <?php echo $data['nama'] ?> ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="hapus_masyarakat" class="btn btn-danger">Hapus</button>
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