<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
    $data = mysqli_fetch_array($query);
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=pembelian">Pembelian</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pembelian</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Pembelian</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td width="200"><b>Nama Pelanggan</b></td>
                                <td width="1">:</td>
                                <td><?php echo $data['nama_pelanggan']; ?></td>
                            </tr>
                            <?php
                                $pro = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
                                while($produk = mysqli_fetch_array($pro)) {
                            ?>
                            <tr>
                                <td><b><?php echo $produk['nama_produk']; ?></b></td>
                                <td>:</td>
                                <td>
                                    <b>Harga Satuan :</b> Rp <?php echo number_format($produk['harga'], 0, ",", "."); ?><br>
                                    <b>Jumlah :</b> <?php echo $produk['jumlah_produk']; ?><br>
                                    <b>Subtotal :</b> Rp <?php echo number_format($produk['subtotal'], 0, ",", "."); ?><br>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <td><b>Total</b></td>
                                <td>:</td>
                                <td>Rp <?php echo number_format($data['total_harga'], 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
                                    <a href="print.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary">Print PDF</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Pembelian</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <?php
                            $pro = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
                            while($produk = mysqli_fetch_array($pro)) {
                        ?>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo $produk['nama_produk']; ?></h5>
                                <small><?php echo $produk['jumlah_produk']; ?> pcs</small>
                            </div>
                            <p class="mb-1">Harga Satuan : Rp <?php echo number_format($produk['harga'], 0, ",", "."); ?></p>
                            <small>Subtotal : Rp <?php echo number_format($produk['subtotal'], 0, ",", "."); ?></small>
                        </a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
