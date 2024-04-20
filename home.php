<div class="container-fluid mt-3">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
    </ol>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <a href="?page=pelanggan" class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM pelanggan")) ?> Pelanggan</h3>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-sm-6">
            <a href="?page=produk" class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM produk")) ?> Produk</h3>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-sm-6">
            <a href="?page=pembelian" class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM penjualan")) ?> Pembelian</h3>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-sm-6">
            <a href="#" class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user")) ?> Total User</h3>
                </div>
            </a>
        </div>
    </div>
</div>
