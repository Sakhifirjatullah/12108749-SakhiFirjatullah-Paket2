<div class="container-fluid mt-3">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Pelanggan</li>
    </ol>

    <a href="?page=pelanggan_tambah" class="btn btn-primary">+ Tambah Pelanggan</a>
    <hr>
  <table class="table table-bordered">
    <tr>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Aksi</th>
    </tr>
        <?php
            $query = mysqli_query($koneksi, "SELECT*FROM pelanggan");
            while($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_telepon']; ?></td>
                    <td>
                        <a href="?page=pelanggan_ubah&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-secondary">Ubah</a>
                        <a href="?page=pelanggan_hapus&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>

                <?php
            }
        ?>
  </table>
</div>