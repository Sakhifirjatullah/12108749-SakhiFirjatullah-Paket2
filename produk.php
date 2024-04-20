
<div class="container-fluid mt-3">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Produk</li>
    </ol>
    <a href="?page=produk_tambah" class="btn btn-primary">+ Tambah Produk</a>
    <hr>
  <table class="table table-bordered">
    <tr>
        <th>Gambar</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
        <?php
            $query = mysqli_query($koneksi, "SELECT*FROM produk");
            while($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><img src="img/<?php echo $row["foto"] ?>" width="50"></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <td>
                        <a href="?page=produk_ubah&&id=<?php echo $data['id_produk']; ?>" class="btn btn-secondary">Ubah</a>
                        <a href="?page=produk_hapus&&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>

                <?php
            }
        ?>
  </table>
</div>  