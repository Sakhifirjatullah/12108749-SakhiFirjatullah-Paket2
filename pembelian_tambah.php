<?php
if(isset($_POST['id_pelanggan'])) {
    // Menggunakan file koneksi.php untuk terhubung ke database
    include "koneksi.php";
    
    // Mengambil nilai dari formulir
    $id_pelanggan = $_POST['id_pelanggan'];
    $produk = $_POST['produk'];
    $total = 0;
    $tanggal = date('Y/m/d');

    // Memasukkan record baru ke tabel "penjualan"
    $query = mysqli_query($koneksi, "INSERT INTO penjualan(tanggal_penjualan,id_pelanggan) VALUES('$tanggal', '$id_pelanggan')");

    // Mengambil ID penjualan terakhir yang dimasukkan ke database
    $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id_penjualan DESC"));
    $id_penjualan = $idTerakhir['id_penjualan'];

    // Memproses setiap produk yang dibeli
    foreach($produk as $key=>$val) {
        // Mengambil informasi produk dari database
        $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$key"));
    
        // Jika jumlah yang dibeli lebih dari 0, maka
        if($val > 0) {
            // Menghitung subtotal dan total
            $sub = $val * $pr['harga'];
            $total += $sub;
            
            // Memasukkan detail penjualan ke dalam tabel "detail_penjualan"
            $query = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan,id_produk,jumlah_produk,subtotal) VALUES('$id_penjualan', '$key', '$val', '$sub')");

            // Mengupdate stok produk
            $updateProduk = mysqli_query($koneksi, "UPDATE produk SET stok=stok-$val WHERE id_produk=$key");
        }
    }

    // Mengupdate total harga penjualan ke tabel "penjualan"
    $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga=$total WHERE id_penjualan=$id_penjualan");

    // Memberikan pemberitahuan sukses atau gagal
    if($query) {
        echo '<script>alert("Tambah Data Berhasil"); window.location.href="?page=pembelian";</script>';
    } else {
        echo '<script>alert("Tambah Data Gagal")</script>';
    }
}
?>


<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Pembelian</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="id_pelanggan">Nama Pelanggan</label>
                            <select class="form-control form-select" id="id_pelanggan" name="id_pelanggan">
                                <?php
                                    $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                    while($pel = mysqli_fetch_array($p)) {
                                ?>
                                    <option value="<?php echo $pel['id_pelanggan']; ?>"><?php echo $pel['nama_pelanggan']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="search_produk" placeholder="Cari Produk">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Jumlah Beli</th>
                                    </tr>
                                </thead>
                                <tbody id="produk_table">
                                    <?php
                                        $pro = mysqli_query($koneksi, "SELECT * FROM produk");
                                        while($produk = mysqli_fetch_array($pro)) {
                                    ?>
                                        <tr data-nama="<?php echo strtolower($produk['nama_produk']); ?>">
                                            <td><?php echo $produk['nama_produk']; ?></td>
                                            <td><?php echo $produk['stok']; ?></td>
                                            <td><img src="images/<?php echo $produk['gambar']; ?>" width="100"></td>
                                            <td><input class="form-control" type="number" step="1" min="0" max="<?php echo $produk['stok']; ?>" name="produk[<?php echo $produk['id_produk']; ?>]" value="0"></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#search_produk').on('keyup', function(){
            var searchText = $(this).val().toLowerCase();
            $('#produk_table tr').filter(function(){
                $(this).toggle($(this).data('nama').indexOf(searchText) > -1)
            });
        });
    });
</script>
