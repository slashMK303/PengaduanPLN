<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header text-center bg-info text-white">
                LOGIN
            </div>
            <div class="card-body">
                <form action="config/aksi_login.php" method="POST">
                    <div class="mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" pattern="[a-zA-Z]+" class="form-control" name="username" placeholder="Masukkan Username !" autofocus required oninvalid="this.setCustomValidity('Input hanya boleh huruf a-z tanpa spasi!')" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password !" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Login sebagai</label>
                        <select class="form-control" name="level">
                            <option value="masyarakat">Masyarakat</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="kirim" class="btn btn-primary btn-sm">LOGIN</button>
                <a href="index.php?page=registrasi" class="m-3">Belum punya akun ? Daftar disini !</a>
            </div>
            </form>
        </div>
    </div>
</div>