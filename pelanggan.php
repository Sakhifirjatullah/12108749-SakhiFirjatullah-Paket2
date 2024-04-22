<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pelanggan</h5>
                </div>
                <div class="card-body">
                    <a href="?page=pelanggan_tambah2" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                while($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['nama_pelanggan']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['no_telepon']; ?></td>
                                    <td>
                                        <a href="?page=pelanggan_ubah&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-sm btn-info">Ubah</a>
                                        <a href="?page=pelanggan_hapus2&&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
