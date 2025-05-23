<div class="container">
  <div class="row">
    <div class="col-md-12 mt-3">
      <h3>Selamat Datang <?php echo $_SESSION['nama_petugas'] ?></h3>
      <div class="card">
        <div class="card-header text-center">
          Data Petugas
        </div>
        <div class="card-body">
          <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</a>

          <!-- Modal Tambah Petugas -->
          <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Petugas</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    <div class="row mb-3">
                      <label class="col-md-4">Nama</label>
                      <div class="col-md-8">
                        <input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama" required>
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
                  $nama = $_POST['nama_petugas'];
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $telp = $_POST['telp'];
                  $level = 'petugas';

                  $query = mysqli_query($koneksi, "INSERT INTO petugas VALUES ('','$nama', '$username','$password', '$telp', '$level')");

                  if ($query) {
                    header('location:index.php?page=petugas');
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
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../config/koneksi.php';

              $no = 1;
              $query = mysqli_query($koneksi, "SELECT*FROM petugas");
              while ($data = mysqli_fetch_array($query)) { ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nama_petugas']; ?></td>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['telp']; ?></td>
                  <td><?php echo $data['level']; ?></td>
                  <td>
                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_petugas'] ?>">Hapus</a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus<?php echo $data['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data <?php echo $data['nama_petugas'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="edit_data.php" method="post">
                              <input type="hidden" name="id_petugas" class="form-control" value="<?php echo $data['id_petugas'] ?>">
                              <p>Apakah yakin akan menghapus data <?php echo $data['nama_petugas'] ?> ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="hapus_petugas" class="btn btn-danger">Hapus</button>
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