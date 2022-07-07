<?php

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['nama'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['nama'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $NIK = $_POST['NIK'];

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "SELECT * FROM user WHERE NIK = '$NIK'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (email, password, nama, tanggal_lahir, no_telp, NIK)
                    VALUES ( '$email', '$password','$nama', '$tanggal_lahir', '$no_telp','$NIK')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
            } else {
                echo  mysqli_error($conn);
                echo "<script>alert('Terjadi Kesalahan')</script> ";
            }
        } else {
            echo "<script>alert('NIK Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Email Sudah Terdaftar.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="date" placeholder="Tgl lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>
            </div>
            <div class="input-group">
                <input type="tel" placeholder="No. Telp" name="no_telp" value="<?php echo $no_telp; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Alamat" name="alamat" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="NIK" name="NIK" value="<?php echo $NIK; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login </a></p>
        </form>
    </div>
</body>

</html>