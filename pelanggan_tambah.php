<?php
if(isset($_POST['nama_pelanggan'])) {
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan,alamat,no_telepon) values('$nama', '$alamat', '$no_telepon')");
    if($query) {
        echo '<script>alert("Tambah Data Berhasil")</script>';
    } else {
        echo '<script>alert("Tambah Data gagal")</script>';
    }
}
?>

<div class="container-fluid mt-3">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Tambah Pelanggan</li>
                    </ol>
                        
                        <hr>
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Nama Pelangan</td>
                                    <td width="1">:</td>
                                    <td><input class="form-control" type="text" name="nama_pelanggan"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="alamat" rows="5" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Telepon</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="number" step="0" name="no_telepon"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                       <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
                                    </td>
                                </tr>
                            </table>

                        </form>
                    </div>