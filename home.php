<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">User</h5>
                            <span class="text-muted"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); ?> User</span>
                        </div>
                        <div class="icon bg-primary text-white rounded-circle">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
               
            </div>  
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">Produk</h5>
                            <span class="text-muted"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk")); ?> Produk</span>
                        </div>
                        <div class="icon bg-success text-white rounded-circle">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">Pembelian</h5>
                            <span class="text-muted"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penjualan")); ?> Pembelian</span>
                        </div>
                        <div class="icon bg-info text-white rounded-circle">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
