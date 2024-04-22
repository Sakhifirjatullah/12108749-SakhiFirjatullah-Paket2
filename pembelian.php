<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pembelian</h5>
                </div>
                <div class="card-body">
                    <a href="?page=pembelian_tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tanggal Pembelian</th>
                                    <th scope="col">Pelanggan</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan");
                                while($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['tanggal_penjualan']; ?></td>
                                    <td><?php echo $data['nama_pelanggan']; ?></td>
                                    <td><?php echo $data['total_harga']; ?></td>
                                    <td>
                                        <a href="?page=penjualan_detail&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-sm btn-secondary">Detail</a>
                                        <a href="?page=penjualan_hapus&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
