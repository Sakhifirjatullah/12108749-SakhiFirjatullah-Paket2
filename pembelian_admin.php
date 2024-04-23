<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pembelian</h5>
                </div>
                <div class="card-body">
               
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
                                        <a href="?page=penjualan_detail2&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-sm btn-secondary">Detail</a> 
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
