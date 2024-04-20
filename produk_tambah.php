
<?php
if(isset($_POST['nama_produk'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $filename = $_FILES['foto']['name'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    
    

    // Pindahkan gambar ke direktori yang ditentukan
    move_uploaded_file($gambar_tmp, $upload_directory.$foto);

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
    $path = "images/".$fotobaru;

    // Masukkan data ke database bersama dengan nama gambar
    $query = mysqli_query($koneksi, "INSERT INTO produk(nama_produk, harga, stok, foto) VALUES('$nama', '$harga', '$stok', '$fotobaru')");


    
    if($query) {
        echo '<script>alert("Tambah Data Berhasil"); window.location.href="?page=produk";</script>';
    } else {
        echo '<script>alert("Tambah Data gagal")</script>';
    }
}
?>


<div class="container-fluid mt-3">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Tambah Produk</li>
                        </ol>
          

                        <hr>
                        <form method="post">
                            <table class="table table-bordered">
                            <tr>
                         <td>Gambar Produk</td>
                         <td>:</td>
                         <td><input class="form-control" type="file" name="foto"></td>
                        </tr>
                                <tr>
                                    <td width="200">Nama Produk</td>
                                    <td width="1">:</td>
                                    <td><input class="form-control" type="text" name="nama_produk"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="number" step="0" name="harga"></td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="number" step="0" name="stok"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="?page=produk" class="btn btn-danger">Kembali</a>
                                    </td>
                                </tr>
                            </table>

                        </form>
                    </div>