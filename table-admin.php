<!DOCTYPE html>
<html lang="en">
<?php

session_start();


if (!$_SESSION['credential'] == 1) {
    echo $_SESSION['credential'];
    header("Location: home.php");
}
if (!isset($_SESSION['nama'])) {
    header("Location: Signup.php");
}
function Logout()
{
    session_start();
    session_destroy();
    header("Location: Signup.php");
}

if (isset($_GET['logout'])) {
    Logout();
}
?>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>NAHINI Corp</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">NAHINI Corp</a>
            </div>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Admin <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="home.php?logout=true"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="homepage-admin.php"><i class="fa fa-dashboard fa-fw"></i> Homepage</a>
                        </li>
                        <li>
                            <a href="table-admin.php" class="active"><i class="fa fa-database fa-fw"></i> Participant Data</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Participant Data Table</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.Data Peserta -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Data Peserta</div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table class="table table-striped table-bordered">

                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                            <th>C7</th>
                                            <th>C8</th>
                                            <th>C9</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $no = 1;
                                        $datas = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                        if (!$datas) {
                                            printf("Error: %s\n", mysqli_error($conn));
                                        }
                                        while ($d = mysqli_fetch_array($datas)) {
                                            echo '<tr>';
                                            echo '<td>' . $no++ . '</td>';
                                            echo '<td>' . $d['nama'] . '</td>';
                                            $data = json_decode($d['array_jawaban']);
                                            foreach ($data as $dat) {
                                                echo '<td>' . $dat . '</td>';
                                            }
                                        }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.Ternormalisasi -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Data Peserta Ternormalisasi </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                            <th>C7</th>
                                            <th>C8</th>
                                            <th>C9</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $c1 = array();
                                        $c2 = array();
                                        $c3 = array();
                                        $c4 = array();
                                        $c5 = array();
                                        $c6 = array();
                                        $c7 = array();
                                        $c8 = array();
                                        $c9 = array();
                                        $datas = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                        if (!$datas) {
                                            printf("Error: %s\n", mysqli_error($conn));
                                        }
                                        while ($d = mysqli_fetch_array($datas)) {
                                            $data = json_decode($d['array_jawaban']);
                                            array_push($c1, $data[0]);
                                            array_push($c2, $data[1]);
                                            array_push($c3, $data[2]);
                                            array_push($c4, $data[3]);
                                            array_push($c5, $data[4]);
                                            array_push($c6, $data[5]);
                                            array_push($c7, $data[6]);
                                            array_push($c8, $data[7]);
                                            array_push($c9, $data[8]);
                                        }
                                        // perhitungan normalisasi
                                        echo '<tr>';
                                        $hasil1 = 0;
                                        $hasil2 = 0;
                                        $hasil3 = 0;
                                        $hasil4 = 0;
                                        $hasil5 = 0;
                                        $hasil6 = 0;
                                        $hasil7 = 0;
                                        $hasil8 = 0;
                                        $hasil9 = 0;
                                        foreach ($c1 as $num) {
                                            $hasil1 += $num * $num;
                                        }
                                        foreach ($c2 as $num) {
                                            $hasil2 += $num * $num;
                                        }
                                        foreach ($c3 as $num) {
                                            $hasil3 += $num * $num;
                                        }
                                        foreach ($c4 as $num) {
                                            $hasil4 += $num * $num;
                                        }
                                        foreach ($c5 as $num) {
                                            $hasil5 += $num * $num;
                                        }
                                        foreach ($c6 as $num) {
                                            $hasil6 += $num * $num;
                                        }
                                        foreach ($c7 as $num) {
                                            $hasil7 += $num * $num;
                                        }
                                        foreach ($c8 as $num) {
                                            $hasil8 += $num * $num;
                                        }
                                        foreach ($c9 as $num) {
                                            $hasil9 += $num * $num;
                                        }
                                        for ($x = 0; $x < sizeof($c1); $x++) {

                                            $x1 = $c1[$x] / sqrt($hasil1);
                                            $x2 = $c2[$x] / sqrt($hasil2);
                                            $x3 = $c3[$x] / sqrt($hasil3);
                                            $x4 = $c4[$x] / sqrt($hasil4);
                                            $x5 = $c5[$x] / sqrt($hasil5);
                                            $x6 = $c6[$x] / sqrt($hasil6);
                                            $x7 = $c7[$x] / sqrt($hasil7);
                                            $x8 = $c8[$x] / sqrt($hasil8);
                                            $x9 = $c9[$x] / sqrt($hasil9);
                                            echo '<td>' . round($x1, 4) . '</td>';
                                            echo '<td>' . round($x2, 4) . '</td>';
                                            echo '<td>' . round($x3, 4) . '</td>';
                                            echo '<td>' . round($x4, 4) . '</td>';
                                            echo '<td>' . round($x5, 4) . '</td>';
                                            echo '<td>' . round($x6, 4) . '</td>';
                                            echo '<td>' . round($x7, 4) . '</td>';
                                            echo '<td>' . round($x8, 4) . '</td>';
                                            echo '<td>' . round($x9, 4) . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.terbobot -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Data Peserta Ternormalisasi Bobot</div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                            <th>C7</th>
                                            <th>C8</th>
                                            <th>C9</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        // perhitungan normalisasi
                                        echo '<tr>';
                                        $datax1 = array();
                                        $datax2 = array();
                                        $datax3 = array();
                                        $datax4 = array();
                                        $datax5 = array();
                                        $datax6 = array();
                                        $datax7 = array();
                                        $datax8 = array();
                                        $datax9 = array();
          
                                        for ($x = 0; $x < sizeof($c1); $x++) {
                                            
                                            $x1 = $c1[$x] / sqrt($hasil1);
                                            $x2 = $c2[$x] / sqrt($hasil2);
                                            $x3 = $c3[$x] / sqrt($hasil3);
                                            $x4 = $c4[$x] / sqrt($hasil4);
                                            $x5 = $c5[$x] / sqrt($hasil5);
                                            $x6 = $c6[$x] / sqrt($hasil6);
                                            $x7 = $c7[$x] / sqrt($hasil7);
                                            $x8 = $c8[$x] / sqrt($hasil8);
                                            $x9 = $c9[$x] / sqrt($hasil9);
                                            $xb1 = $x1 * 5;
                                            $xb2 = $x2 * 5;
                                            $xb3 = $x3 * 3;
                                            $xb4 = $x4 * 5;
                                            $xb5 = $x5 * 3;
                                            $xb6 = $x6 * 3;
                                            $xb7 = $x7 * 3;
                                            $xb8 = $x8 * 3;
                                            $xb9 = $x9 * 3;
                                            array_push($datax1, $xb1);
                                            array_push($datax2, $xb2);
                                            array_push($datax3, $xb3);
                                            array_push($datax4, $xb4);
                                            array_push($datax5, $xb5); 
                                            array_push($datax6, $xb6);
                                            array_push($datax7, $xb7);
                                            array_push($datax8, $xb8);
                                            array_push($datax9, $xb9);



                                            echo '<td>' . round($xb1, 4)  . '</td>';
                                            echo '<td>' . round($xb2, 4)  . '</td>';
                                            echo '<td>' . round($xb3, 4)  . '</td>';
                                            echo '<td>' . round($xb4, 4)  . '</td>';
                                            echo '<td>' . round($xb5, 4)  . '</td>';
                                            echo '<td>' . round($xb6, 4)  . '</td>';
                                            echo '<td>' . round($xb7, 4)  . '</td>';
                                            echo '<td>' . round($xb8, 4)  . '</td>';
                                            echo '<td>' . round($xb9, 4)  . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.a+ a- -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Table A+ & A-</div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                            <th>C7</th>
                                            <th>C8</th>
                                            <th>C9</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // perhitungan normalisasi
                                        echo '<tr>';
                                        echo '<td>' . round(max($datax1), 4) . '</td>';
                                        echo '<td>' . round(max($datax2), 4) . '</td>';
                                        echo '<td>' . round(max($datax3), 4) . '</td>';
                                        echo '<td>' . round(max($datax4), 4) . '</td>';
                                        echo '<td>' . round(max($datax5), 4) . '</td>';
                                        echo '<td>' . round(max($datax6), 4) . '</td>';
                                        echo '<td>' . round(max($datax7), 4) . '</td>';
                                        echo '<td>' . round(max($datax8), 4) . '</td>';
                                        echo '<td>' . round(max($datax9), 4) . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>' . round(min($datax1), 4) . '</td>';
                                        echo '<td>' . round(min($datax2), 4) . '</td>';
                                        echo '<td>' . round(min($datax3), 4) . '</td>';
                                        echo '<td>' . round(min($datax4), 4) . '</td>';
                                        echo '<td>' . round(min($datax5), 4) . '</td>';
                                        echo '<td>' . round(min($datax6), 4) . '</td>';
                                        echo '<td>' . round(min($datax7), 4) . '</td>';
                                        echo '<td>' . round(min($datax8), 4) . '</td>';
                                        echo '<td>' . round(min($datax9), 4) . '</td>';
                                        echo '</tr>';

                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.d+ d- -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Table D+, D- & Vi</div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>D+</th>
                                            <th>D-</th>
                                            <th>Vi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $datanama = array();
                                        $no = 1;
                                        $ids = array();
                                        $sql = "Select hasil.hasilid, hasil.userid, hasil.hasil,hasil.array_jawaban,hasil.vi, user.nama from hasil LEFT JOIN user ON hasil.user_id = user.user_id";
                                        $data = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                        // perhitungan normalisasi
                                        if (!$data) {
                                            printf("Error: %s\n", mysqli_error($conn));
                                        }
                                        while ($d = mysqli_fetch_array($data)) {
                                            array_push($datanama, $d['nama']);
                                            array_push($ids, $d['user_id']);
                                        }
                                        echo '<tr>';
                                        for ($x = 0; $x < sizeof($c1); $x++) {
                                            echo '<td>' . $datanama[$x] . '</td>';
                                            $dxc1 = (max($datax1) - $datax1[$x]) * (max($datax1) - $datax1[$x]);
                                            $dxc2 = (max($datax2) - $datax2[$x]) * (max($datax2) - $datax2[$x]);
                                            $dxc3 = (max($datax3) - $datax3[$x]) * (max($datax3) - $datax3[$x]);
                                            $dxc4 = (max($datax4) - $datax4[$x]) * (max($datax4) - $datax4[$x]);
                                            $dxc5 = (max($datax5) - $datax5[$x]) * (max($datax5) - $datax5[$x]);
                                            $dxc6 = (max($datax6) - $datax6[$x]) * (max($datax6) - $datax6[$x]);
                                            $dxc7 = (max($datax7) - $datax7[$x]) * (max($datax7) - $datax7[$x]);
                                            $dxc8 = (max($datax8) - $datax8[$x]) * (max($datax8) - $datax8[$x]);
                                            $dxc9 = (max($datax9) - $datax9[$x]) * (max($datax9) - $datax9[$x]);
                                            $rdplus = sqrt($dxc1 + $dxc2 + $dxc3 + $dxc4 + $dxc5 + $dxc6 + $dxc7 + $dxc8 + $dxc9);
                                            echo '<td>' . round($rdplus, 4) . '</td>';
                                            $dxc1m = ($datax1[$x] - min($datax1)) * ($datax1[$x] - min($datax1));
                                            $dxc2m = ($datax2[$x] - min($datax2)) * ($datax2[$x] - min($datax2));
                                            $dxc3m = ($datax3[$x] - min($datax3)) * ($datax3[$x] - min($datax3));
                                            $dxc4m = ($datax4[$x] - min($datax4)) * ($datax4[$x] - min($datax4));
                                            $dxc5m = ($datax5[$x] - min($datax5)) * ($datax5[$x] - min($datax5));
                                            $dxc6m = ($datax6[$x] - min($datax6)) * ($datax6[$x] - min($datax6));
                                            $dxc7m = ($datax7[$x] - min($datax7)) * ($datax7[$x] - min($datax7));
                                            $dxc8m = ($datax8[$x] - min($datax8)) * ($datax8[$x] - min($datax8));
                                            $dxc9m = ($datax9[$x] - min($datax9)) * ($datax9[$x] - min($datax9));
                                            $rdmin = sqrt($dxc1m + $dxc2m + $dxc3m + $dxc4m + $dxc5m + $dxc6m + $dxc7m + $dxc8m + $dxc9m);
                                            $vi = $rdmin / ($rdmin + $rdplus);
                                            echo '<td>' . round($rdmin, 4) . '</td>';
                                            echo '<td>' . $vi . '</td>';
                                            echo '</tr>';
                                            $stmt = $conn->prepare("UPDATE hasil SET Vi = ? WHERE user_id = ?");
                                            $stmt->bind_param("si", $vi, $ids[$x]);
                                            if ($stmt->execute()) {
                                                $stmt->close();
                                            } else {
                                                echo $stmt->error;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>

            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/dataTables/jquery.dataTables.min.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>

</html>