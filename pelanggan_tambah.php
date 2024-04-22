<?php
if(isset($_POST['submit'])) {
    include "koneksi.php";
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password= $_POST['password'];
    
    $role = $_POST['role'];

    $query = mysqli_query($koneksi, "INSERT INTO user(nama, username, password, role) VALUES('$nama', '$username', '$password', '$role')");

    if($query) {
        echo '<script>alert("Tambah Data Berhasil"); window.location.href="?page=pelanggan_admin";</script>';
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
                            <label for="nama">Nama </label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama " required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <textarea class="form-control" id="username" name="username" rows="3" placeholder="Username" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <textarea class="form-control" id="password" name="password" rows="3" placeholder="Password" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="tel" class="form-control" id="role" name="role" placeholder="Role" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <a href="?page=pelanggan_admin" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
