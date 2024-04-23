<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
    $data = mysqli_fetch_array($query);
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Pembelian</h5>
                </div>
                <div class="card-body">
                   
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
                                while($data_detail = mysqli_fetch_array($query_detail)) {
                                ?>
                                <tr>
                                    <td><?php echo $data_detail['nama_produk']; ?></td>
                                    <td>Rp <?php echo number_format($data_detail['harga'], 0, ",", "."); ?></td>
                                    <td><?php echo $data_detail['jumlah_produk']; ?></td>
                                    <td>Rp <?php echo number_format($data_detail['subtotal'], 0, ",", "."); ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right"><b>Total</b></td>
                                    <td><b>Rp <?php echo number_format($data['total_harga'], 0, ",", "."); ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="?page=pembelian_admin" class="btn btn-danger">Kembali</a>
                    <a href="print.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary">Print PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
