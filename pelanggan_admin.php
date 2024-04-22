<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User</h5>
                </div>
                <div class="card-body">
                    <a href="?page=pelanggan_tambah" class="btn btn-primary mb-3">+ Tambah User</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>   
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM user");
                                while($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['role']; ?></td>
                                    <td>
                                    <a href="?page=pelanggan_ubah2&&id=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-info">Ubah</a>
                                        <a href="?page=pelanggan_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
