<?php
require_once('tcpdf/tcpdf.php');

include 'koneksi.php'; // Sertakan file koneksi.php

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
$data = mysqli_fetch_array($query);

$pdf = new TCPDF('P', 'mm', array(80, 300), true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Detail Pembelian');
$pdf->SetSubject('Detail Pembelian');
$pdf->SetKeywords('TCPDF, PDF, detail, pembelian');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$html = '
<style>
    .container {
        font-size: 10px;
    }
    .title {
        font-size: 12px;
        text-align: center;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #000;
        padding: 3px;
    }
</style>
<div class="container">
    <div class="title"><b>Detail Pembelian</b></div>
    <table class="table">
        <tr>
            <th>Nama Pelanggan:</th>
            <td>' . $data['nama_pelanggan'] . '</td>
        </tr>';

$pro = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");

while ($produk = mysqli_fetch_array($pro)) {
    $html .= '
        <tr>
            <td colspan="2">' . $produk['nama_produk'] . '</td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td>' . $produk['harga'] . '</td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>' . $produk['jumlah_produk'] . '</td>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td>' . $produk['subtotal'] . '</td>
        </tr>';
}

$html .= '
        <tr>
            <th>Total</th>
            <td>' . $data['total_harga'] . '</td>
        </tr>
    </table>
</div>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('detail_pembelian.pdf', 'I');
