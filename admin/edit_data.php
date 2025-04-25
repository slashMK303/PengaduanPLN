<?php
include '../config/koneksi.php';
if (isset($_POST['hapus_pengaduan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT*FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    $data = mysqli_fetch_array($query);
    if (is_file("../assets/img/" . $data['foto'])) {
        unlink("../assets/img/" . $data['foto']);
        mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
        header('location:index.php?page=pengaduan');
    }
}

if (isset($_POST['hapus_tanggapan'])) {
    $id_tanggapan = $_POST['id_tanggapan'];
    $query = mysqli_query($koneksi, "DELETE FROM tanggapan WHERE id_tanggapan='$id_tanggapan'");
    if ($query) {
        header('location:index.php?page=tanggapan');
    }
}

if (isset($_POST['hapus_masyarakat'])) {
    $nik = $_POST['nik'];
    $query = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik='$nik'");
    if ($query) {
        header('location:index.php?page=masyarakat');
    }
}

if (isset($_POST['hapus_petugas'])) {
    $id_petugas = $_POST['id_petugas'];
    $query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id_petugas'");
    if ($query) {
        header('location:index.php?page=petugas');
    }
}

// edit tanggapan
if (isset($_POST['edit_tanggapan'])) {
    $update = mysqli_query($koneksi, "UPDATE tanggapan SET tanggapan='" . $_POST['tanggapan'] . "' WHERE id_tanggapan = '" . $_POST['id_tanggapan'] . "' ");
    if ($update) {
        echo "<script>alert('Data di Update')</script>";
        echo "<script>location='index.php?page=tanggapan'</script>";
    }
}

// // edit petugas
// if(isset($_POST['edit_petugas'])){
//     $update_petugas = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='".$_POST['nama_petugas']."' WHERE id_petugas = '".$_POST['id_petugas']."' ");
//     if($update_petugas){
//         echo "<script>alert('Data di Update')</script>";
//         echo "<script>location='index.php?page=petugas'</script>";
//     }
// }
