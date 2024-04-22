<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user=$id");
if($query) {
    echo '<script>alert("Hapus Data Berhasil"); location.href="?page=pelanggan_admin"</script>';
} else {
    echo '<script>alert("Hapus Data gagal")</script>';
}
?>