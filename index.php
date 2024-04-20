<?php
include "koneksi.php";
if(!isset($_SESSION['user'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Web Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <!-- Bagian "Login as" dan nama pengguna dipindahkan ke footer -->
        
        <!-- Navbar Search dan Tautan Menu di sini -->
        <div class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user']['nama']?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"></div>
                    Dashboard
                </a> 
                <a class="nav-link" href="?page=pelanggan">
                    <div class="sb-nav-link-icon"></div>
                    Pelanggan
                </a>
                <a class="nav-link" href="?page=produk">
                    <div class="sb-nav-link-icon"></div>
                    Produk
                </a>
                <a class="nav-link" href="?page=pembelian">
                    <div class="sb-nav-link-icon"></div>
                    Pembelian
                </a>
            </div>
        </form>
        
        
        
    </nav>

    <!-- <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"></div>
                            Dashboard
                        </a> 
                         <a class="nav-link" href="?page=pelanggan">
                            <div class="sb-nav-link-icon"></div>
                            Pelanggan
                        </a> 
                        <a class="nav-link" href="?page=produk">
                            <div class="sb-nav-link-icon"></div>
                            Produk
                        </a>
                        <a class="nav-link" href="?page=pembelian">
                            <div class="sb-nav-link-icon"></div>
                            Pembelian
                        </a>
                    </div>
                </div> -->
                
               
            </nav>
        </div>
        <!-- buat memisahkan logika dan tampilan ke dalam file-file terpisah -->
        <div id="layoutSidenav_content">
            <main>
               <?php
                  $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                  include $page . '.php';
               ?>
            </main>
            
           
        </div>
        
    </div>

    <!-- JavaScript -->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Bootstrap JS (Tambahkan ini) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <!-- Dashboard JS -->
    <script src="./js/dashboard/dashboard-1.js"></script>
</body>
</html>
