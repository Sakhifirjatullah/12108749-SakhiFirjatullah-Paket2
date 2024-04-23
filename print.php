<?php
require_once('tcpdf/tcpdf.php');
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
$data = mysqli_fetch_array($query);

$pdf = new TCPDF('P', 'mm', array(80, 200), true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Struk Pembelian');
$pdf->SetSubject('Struk Pembelian');
$pdf->SetKeywords('TCPDF, PDF, struk, pembelian');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

$html = '
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 10px;
    }
    .header {
        text-align: center;
        margin-bottom: 5px;
    }
    .header h2 {
        margin: 5px 0;
        font-size: 12px;
    }
    .info {
        margin-bottom: 5px;
        font-size: 10px;
    }
    .info p {
        margin: 3px 0;
    }
    .produk {
        width: 100%;
        margin-bottom: 3px;
        font-size: 10px;
    }
    .produk td, .produk th {
        padding: 1px;
    }
    .produk th {
        text-align: left;
    }
    .produk td {
        text-align: left;
    }
    .total {
        margin-top: 3px;
        font-size: 10px;
    }
    .total p {
        margin: 3px 0;
        text-align: right;
    }
    .footer {
        margin-top: 5px;
        text-align: center;
        font-size: 8px;
    }
</style>
<div class="header">
    <h2>Struk Pembelian</h2>
</div>
<div class="info">
    <p>Tanggal: '.$data['tanggal_penjualan'].'</p>
    <p>Nama Pelanggan: '.$data['nama_pelanggan'].'</p>
</div>
<table class="produk">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>';

$query_detail = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
$total_harga = 0;
while($data_detail = mysqli_fetch_array($query_detail)) {
    $subtotal = $data_detail['harga'] * $data_detail['jumlah_produk'];
    $total_harga += $subtotal;
    $html .= '
        <tr>
            <td>' . $data_detail['nama_produk'] . '</td>
            <td>' . number_format($data_detail['harga'], 0, ",", ".") . '</td>
            <td>' . $data_detail['jumlah_produk'] . '</td>
            <td> ' . number_format($subtotal, 0, ",", ".") . '</td>
        </tr>';
}

$html .= '
    </tbody>
</table>
<div class="total">
    <p><b>Total:</b> ' . number_format($total_harga, 0, ",", ".") . '</p>
</div>
<div class="footer">
    <p>Terima kasih atas kunjungan Anda</p>
</div>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('struk_pembelian.pdf', 'I');
?>
