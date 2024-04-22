<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Produk</h5>
                </div>
                <div class="card-body">
                    <a href="?page=produk_tambah" class="btn btn-primary mb-3">+ Tambah Produk</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM produk");
                                while($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['nama_produk']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['stok']; ?></td>
                                    <td>
                                        <a href="?page=produk_ubah&&id=<?php echo $data['id_produk']; ?>" class="btn btn-sm btn-info">Ubah</a>
                                        <a href="?page=produk_hapus&&id=<?php echo $data['id_produk']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
