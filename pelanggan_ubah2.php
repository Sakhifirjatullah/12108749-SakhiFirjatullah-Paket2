<?php
$id = $_GET['id'];
if(isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Tambahkan ini
    $role = $_POST['role'];

    // Tambahkan kondisi WHERE untuk mengidentifikasi baris yang akan diubah
    $query = mysqli_query($koneksi, "UPDATE user set nama='$nama', username='$username', password='$password', role='$role' WHERE id_user='$id'");
    if($query) {
        echo '<script>alert("Ubah Data Berhasil"); window.location.href="?page=pelanggan_admin";</script>';
    } else {
        echo '<script>alert("Ubah Data gagal")</script>';
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid mt-3">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Ubah Pengguna</li>
    </ol>
    <hr>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><input class="form-control" value="<?php echo $data['nama'] ?>" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input name="username" class="form-control" value="<?php echo $data['username'] ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input name="password" class="form-control" value="<?php echo $data['password'] ?>"></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>:</td>
                <td>
                    <select name="role" class="form-control">
                        <option value="admin" <?php if($data['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                        <option value="kasir" <?php if($data['role'] == 'kasir') echo 'selected'; ?>>Kasir</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="?page=pelanggan_admin" class="btn btn-danger">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</div>
