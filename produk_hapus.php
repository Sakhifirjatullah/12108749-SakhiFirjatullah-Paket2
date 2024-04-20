<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk=$id");
if($query) {
    echo '<script>alert("Hapus Data Berhasil"); location.href="?page=pelanggan"</script>';
} else {
    echo '<script>alert("Hapus Data gagal")</script>';
}
?>