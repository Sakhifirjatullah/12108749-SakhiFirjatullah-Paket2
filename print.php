<?php
require_once('tcpdf/tcpdf.php');
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
$data = mysqli_fetch_array($query);

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Detail Pembelian - '.$data['nama_pelanggan']);
$pdf->SetSubject('Detail Pembelian - '.$data['nama_pelanggan']);
$pdf->SetKeywords('TCPDF, PDF, detail, pembelian');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

$html = '
<style>
    .container-fluid {
        font-size: 10px;
        margin-top: 20px;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #dee2e6;
        padding: 8px;
    }
    .table th {
        background-color: #f2f2f2;
        text-align: center;
    }
    .text-right {
        text-align: right;
    }
    .card {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }
    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #f2f2f2;
        border-bottom: 1px solid #dee2e6;
    }
    .card-title {
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
    }
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-right: 15px;
        padding-left: 15px;
        overflow-y: hidden;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }
    .text-center {
        text-align: center;
    }
    .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-info {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Pembelian - '.$data['nama_pelanggan'].'</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>';

$query_detail = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
while($data_detail = mysqli_fetch_array($query_detail)) {
    $html .= '
        <tr>
            <td>' . $data_detail['nama_produk'] . '</td>
            <td>Rp ' . number_format($data_detail['harga'], 0, ",", ".") . '</td>
            <td>' . $data_detail['jumlah_produk'] . '</td>
            <td>Rp ' . number_format($data_detail['subtotal'], 0, ",", ".") . '</td>
        </tr>';
}

$html .= '
                                <tr>
                                    <td colspan="3" class="text-right"><b>Total</b></td>
                                    <td><b>Rp ' . number_format($data['total_harga'], 0, ",", ".") . '</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('detail_pembelian.pdf', 'I');
?>
<?php
require_once('tcpdf/tcpdf.php');
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
$data = mysqli_fetch_array($query);

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Detail Pembelian - '.$data['nama_pelanggan']);
$pdf->SetSubject('Detail Pembelian - '.$data['nama_pelanggan']);
$pdf->SetKeywords('TCPDF, PDF, detail, pembelian');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

$html = '
<style>
    .container-fluid {
        font-size: 10px;
        margin-top: 20px;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #dee2e6;
        padding: 8px;
    }
    .table th {
        background-color: #f2f2f2;
        text-align: center;
    }
    .text-right {
        text-align: right;
    }
    .card {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }
    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #f2f2f2;
        border-bottom: 1px solid #dee2e6;
    }
    .card-title {
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
    }
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-right: 15px;
        padding-left: 15px;
        overflow-y: hidden;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }
    .text-center {
        text-align: center;
    }
    .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-info {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Pembelian - '.$data['nama_pelanggan'].'</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>';

$query_detail = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
while($data_detail = mysqli_fetch_array($query_detail)) {
    $html .= '
        <tr>
            <td>' . $data_detail['nama_produk'] . '</td>
            <td>Rp ' . number_format($data_detail['harga'], 0, ",", ".") . '</td>
            <td>' . $data_detail['jumlah_produk'] . '</td>
            <td>Rp ' . number_format($data_detail['subtotal'], 0, ",", ".") . '</td>
        </tr>';
}

$html .= '
                                <tr>
                                    <td colspan="3" class="text-right"><b>Total</b></td>
                                    <td><b>Rp ' . number_format($data['total_harga'], 0, ",", ".") . '</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('detail_pembelian.pdf', 'I');
?>
