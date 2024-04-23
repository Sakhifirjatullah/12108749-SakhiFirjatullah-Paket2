<?php
if(isset($_POST['submit'])) {
    // Menggunakan file koneksi.php untuk terhubung ke database
    include "koneksi.php";
    
    // Mengambil nilai dari formulir
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "images/".$gambar;
    
    move_uploaded_file($tmp, $path);

    // Memasukkan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO produk(nama_produk, harga, stok, gambar) VALUES('$nama', '$harga', '$stok', '$gambar')");

    // Memberikan pemberitahuan sukses atau gagal
    if($query) {
        echo '<script>alert("Tambah Data Berhasil"); window.location.href="?page=produk";</script>';
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
                    <h5 class="card-title mb-0">Tambah Produk</h5>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <a href="?page=produk" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
