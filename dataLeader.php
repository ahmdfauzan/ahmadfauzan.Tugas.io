<?php

// Koneksi Ke database
session_start();
require 'koneksi/function.php';
require 'koneksi/fungsiRp.php';

// Ambil data Tabel Pho_Pengurus

$dataAmbil = mysqli_query($conn, "SELECT * FROM projectleader");
$dataApprove = mysqli_fetch_array($dataAmbil);
// if (!isset($_SESSION['login'])) {
//     header('Location: ../index.php');
// }

// if ((time() - $_SESSION['timer']) > 6000) {
//     header('Location: ../index.php');
// }

// if (isset($_POST['logout'])) {
//     unset($_SESSION['login']);
//     session_destroy();
//     header('Location: ../index.php');
// }

// switch ($_SESSION['level']) {
//    case 'cPusat':
//     header('Location: ');
//     break;

//   case 'cBantaeng':
//     header('Location: ');
//     break;
  
//   default:
//     header('Location: ../index.php');
//     break;
// }


// SEARCH APPROVE
$dataSearch = query("SELECT * FROM dt_approve ORDER BY id DESC");
// Tombol Search 
if (isset($_POST["cariApprove"])) {
    $dataSearch = cariApprove($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <title>Data Client</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo-banks-sulselbar.svg">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- CSS SIDEBAR -->
    <link href="css/newstyle.css" rel="stylesheet">
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="tambah_approve.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <center><img src="images/user-icon.png" width="50" alt="homepage" class="logo" /></center>
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input id="keyword" type="text" placeholder="Search..." class="form-control mt-0">
                                <a class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="images/user-icon.png" alt="user-img" width="36" class="img-circle">
                                <?php

                                if (isset($_SESSION['login'])) {
                                ?>
                                    <span class="text-white font-medium"><?= $_SESSION['username']; ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="text-white font-medium">Admin</span>
                                <?php
                                }

                                ?>

                            </a>
                        </li>
                        <li>
                            <form action="" method="POST">
                                <button type="submit" name="logout" style="background-color:transparent; border: none;" class="pe-4"><i class="fas fa-sign-out-alt"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                    
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dataClient.php" aria-expanded="false">
                                <i class="fas fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Data Client</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="projectMonitoring.php" aria-expanded="false">
                                <i class="fas fa-laptop" aria-hidden="true"></i>
                                <span class="hide-menu">Project Monitoring</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dataLeader.php" aria-expanded="false">
                                <i class="fas fa-database" aria-hidden="true"></i>
                                <span class="hide-menu">Data Pegawai Projek Leader</span>
                            </a>
                        </li>

                        
                    </ul>

                </nav>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper" style="min-height: 250px;">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Client</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Table Data Inputan -->
                        <div class="white-box" id="container">
                            <table class="table">
                                <thead>
                                    <tr id="table">
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Project Handel</th>
                                        <th scope="col">Email</th>                                      
                                        <th scope="col">Foto</th>   
                                        <th scope="col">Mulai Project</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Action </th>
                                    </tr>

                                    <?php $i = 1; ?>
                                    <?php foreach ($dataAmbil as $row) : {
                                        } ?>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td class="text-center"><?php echo $i; ?></td>
                                        <td><?php echo $row["namaLeader"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td class="text-center"> <img width="50px" src="images/<?php echo $row["foto"];  ?> " class="img-circle" alt="">   </td>
                                        <td><?php echo $row["mulaiProject"]; ?></td>
                                        <td><?php echo $row["progress"]; ?></td>
                                        <td class="text-center">
                                            <div class="tile-title-w-btn">
                                                <div class="btn-group">
                                                     <a class="btn btn-primary" href="tambahLeader.php"><i class="fas fa-plus"></i></a>

                                                    <a class="btn btn-primary" href="editLeader.php?id_projectLeader=<?= $row["id_projectLeader"]; ?>"><i class="fas fa-edit"></i></a>

                                                    <a class="btn btn-primary" href="hapusLeader.php?id_projectLeader=<?= $row["id_projectLeader"]; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <?php $i++ ?>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!-- SCRIPT SIDE BAR -->
    <script src="js/jscript2.js"></script>
    <script>
        const container = document.getElementById('container');
        const keyword = document.getElementById('keyword');

        keyword.addEventListener('keyup', function() {
            // buat objek ajax
            let xhr = new XMLHttpRequest()

            // cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    container.innerHTML = xhr.responseText;
                }
            }

            // eksekusi ajax
            xhr.open('GET', 'ajax/ajax_data_approve.php?keyword=' + keyword.value, true)
            xhr.send();
        });
    </script>
</body>

</html>