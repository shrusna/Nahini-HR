<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
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

function terima()
{
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
    <?php
    include 'koneksi.php';
            $id= 0;
    if (isset($_POST['terima'])) {
        $id =  $_POST['userid'];
        $string = 'DITERIMA';
        $stmt = $conn->prepare("UPDATE hasil SET hasil = ? WHERE user_id =?");
        $stmt->bind_param("si", $string, $id);
        $stmt->execute();
        $stmt->close();
    }
    if (isset($_POST['tolak'])) {
        $id =  $_POST['userid'];
        $string = 'DITOLAK';
        $stmt = $conn->prepare("UPDATE hasil SET hasil = ? WHERE user_id =?");
        $stmt->bind_param("si", $string, $id);
        $stmt->execute();
        $stmt->close();
    }
    ?>


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
                            <a href="homepage-admin.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Homepage</a>
                        </li>
                        <li>
                            <a href="table-admin.php"><i class="fa fa-database fa-fw"></i> Participant Data</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Selamat Datang, Admin!</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Participant</div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Hasil ID</th>
                                            <th>Nama</th>
                                            <th>Hasil VI</th>
                                            <th>Status</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $no = 1;
                                        $sql = "Select hasil.hasilid, hasil.userid, hasil.hasil,hasil.array_jawaban,hasil.vi, user.nama from hasil LEFT JOIN user ON hasil.user_id = user.user_id";
                                        $data = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id ORDER BY Vi DESC;");
                                        if (!$data) {
                                            printf("Error: %s\n", mysqli_error($conn));
                                        }
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>

                                                <td><?php echo $d['hasil_id']; ?></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['Vi']; ?></td>
                                                <td><?php echo $d['hasil']; ?></td>
                                                <td>
                                                    <form method="post">
                                                    <?php if($d['hasil'] == "Waiting") : ?>
                                                        <input type="number" name="userid" value="<?php echo $d['user_id']; ?>" hidden />
                                                        <button class="btn btn-warning btn-sm" name="terima">Terima</button>
                                                        <button class="btn btn-danger btn-sm" name="tolak">Tolak</button>
                                                    <?php else : ?>

                                                    <?php endif; ?>
                                                        

                                                    </form>
                                                </td>
                                            </tr>
                                    </tbody>
                                <?php
                                        }
                                ?>
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