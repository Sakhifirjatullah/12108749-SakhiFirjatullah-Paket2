<?php
if(isset($_POST['submit'])) {
    include "koneksi.php";
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan, alamat, no_telepon) VALUES('$nama_pelanggan', '$alamat', '$no_telepon')");

    if($query) {
        echo '<script>alert("Tambah Data Berhasil"); window.location.href="?page=pelanggan";</script>';
    } else {
        echo '<script>alert("Tambah Data Gagal")</script>';
    }
}
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan " required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
