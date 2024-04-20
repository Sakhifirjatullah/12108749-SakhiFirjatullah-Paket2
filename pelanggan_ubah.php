<?php
$id = $_GET['id'];
if(isset($_POST['nama_pelanggan'])) {
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $query = mysqli_query($koneksi, "UPDATE pelanggan set nama_pelanggan='$nama', alamat='$alamat', no_telepon='$no_telepon' WHERE id_pelanggan='$id'");
    if($query) {
        echo '<script>alert("Ubah Data Berhasil"); window.location.href="?page=pelanggan";</script>';
    } else {
        echo '<script>alert("Ubah Data gagal")</script>';
    }
}

    $query = mysqli_query($koneksi, "SELECT*FROM pelanggan WHERE id_pelanggan=$id");
    $data = mysqli_fetch_array($query);
?>

<div class="container-fluid mt-3">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Ubah Pelanggan</li>
                        </ol>
                        <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
                        <hr>
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Nama Pelangan</td>
                                    <td width="1">:</td>
                                    <td><input class="form-control" value="<?php echo $data['nama_pelanggan'] ?>" type="text" name="nama_pelanggan"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="alamat" rows="5" class="form-control"><?php echo $data['alamat'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Telepon</td>
                                    <td>:</td>
                                    <td><input class="form-control" value="<?php echo $data['no_telepon'] ?>" type="number" step="0" name="no_telepon"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <a href="?page=pelanggan_tambah"><button type="submit" class="btn btn-primary">Simpan</button></a>
                                    
                                    </td>
                                </tr>
                            </table>

                        </form>
                    </div>