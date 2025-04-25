<div class="row mt-3">
  <div class="col-md-4 offset-md-4">
    <div class="card">
      <div class="card-header text-center bg-info text-white">
        REGISTRASI
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="mb-4">
            <label class="form-label">NIK</label>
            <input type="number" class="form-control" name="nik" placeholder="Masukkan NIK yang sesuai !" required>
          </div>
          <div class="mb-4">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama yang sesuai !" required>
          </div>
          <div class="mb-4">
            <label class="form-label">Username</label>
            <input type="text" pattern="[a-zA-Z]+" class="form-control" name="username" placeholder="Masukkan Username !" autofocus required oninvalid="this.setCustomValidity('Input hanya boleh huruf a-z tanpa spasi!')" required>
          </div>
          <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password !" required>
          </div>
          <div class="mb-4">
            <label class="form-label">No. Telepon</label>
            <input type="number" class="form-control" name="telp" placeholder="Masukkan No. Telepon !" required>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" name="kirim" class="btn btn-primary btn-sm">DAFTAR</button>
        <a href="index.php?page=login" class="m-3">Sudah punya akun ? Login disini!</a>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
include 'config/koneksi.php';

if (isset($_POST['kirim'])) {
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $telp = $_POST['telp'];
  $level = 'masyarakat';

  $query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik','$nama', '$username','$password', '$telp', '$level')");

  if ($query) {
    header('location:index.php?page=login');
  }
}

?>