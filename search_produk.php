<?php
include "koneksi.php";

$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($koneksi, $_POST["query"]);
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%".$search."%'";
}
else
{
    $query = "SELECT * FROM produk";
}
$result = mysqli_query($koneksi, $query);
if(mysqli_num_rows($result) > 0)
{
    while($produk = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td>'.$produk["nama_produk"].'</td>
                <td>'.$produk["stok"].'</td>
                <td><input class="form-control" type="number" step="1" min="0" max="'.$produk["stok"].'" name="produk['.$produk["id_produk"].']" value="0"></td>
            </tr>
        ';
    }
}
?>
