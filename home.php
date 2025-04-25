<div class="container">
    <h4 class="text-center mt-3">PENGADUAN PLN INDONESIA</h4>
    <hr>
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card border-info">
                <div class="card-header bg-info text-white">INFROMASI</div>
                <div class="card-body">
                    WEBSITE INI DI BUAT UNTUK MELAKUKAN LAPORAN KEPADA PIHAK PLN, <br>
                    SEBAGAI CONTOH TIANG LISTRIK ROBOH DAN SEBAGAINYA
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-info">
                <div class="card-header bg-info text-white">KONTAK</div>
                <div class="card-body">
                    Di kembangkan oleh <br>
                    Nama : Nananag M K <br>
                    Kelas : 12A <br>
                    Absem : 20
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<?php

include 'config/koneksi.php';
$pengaduan = mysqli_query($koneksi, 'SELECT * FROM pengaduan');
$jml_pengaduan = mysqli_num_rows($pengaduan);

$tanggapan = mysqli_query($koneksi, 'SELECT * FROM tanggapan');
$jml_tanggapan = mysqli_num_rows($tanggapan);

?>

<div class="container">
    <h3 class="mt-3 text-center">LAPORAN DAN TANGGAPAN</h3>
    <div class="row text-center">
        <div class="col-md-3 mt-2">
            <div class="card-lt border-info">
                <div class="card-header bg-info text-white">Pengaduan</div>
                <div class="card-body"><?php echo $jml_pengaduan; ?> Pengaduan</div>
            </div>
        </div>
        <div class="col-md-3 mt-2">
            <div class="card-lt border-info">
                <div class="card-header bg-info text-white">Tanggapan</div>
                <div class="card-body"><?php echo $jml_tanggapan; ?> Tanggapan</div>
            </div>
        </div>
    </div>
</div>