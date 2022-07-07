<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="slide.css">
<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Zen+Loop&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&family=Zen+Loop&display=swap');

  /* punya alsi */
  body {
    font-family: sans-serif;
    margin: 0;
    padding: 0;
  }

  h2 {
    color: #E9967A;
  }

  footer {
    padding: 5px;
    color: white;
    background-color: #E9967A;
    text-align: right;
    font-weight: bold;
  }

  nav {
    background-color: transparent;
    padding: 15px;
    text-align: right;
    position: sticky;
    top: 0;
    overflow: auto;

  }

  nav li {
    display: inline;
    list-style-type: none;
    margin-right: 50px;
    width: 5px;
    padding: 1px;

  }

  nav a {
    font-size: 30px;
    font-weight: 300px;
    text-decoration: none;
    color: black;
    margin-top: 30px;
    font-family: 'Zen Loop', cursive;
    font-weight: bold;
  }

  nav li:hover a {
    color: gold;
  }

  nav img {
    float: left;
    margin-top: -100px;
    height: 300px;
    width: 300px;
  }

  body {
    background-image: url("img/hasil.png");
    background-size: 1370px;
  }

  * {
    box-sizing: border-box
  }

  footer {
    text-align: center;
    padding: 3px;
    background-image: url("Gambar/bg2.jpg");
    color: black;
    font-size: 20px;
    font-family: 'Josefin Sans', sans-serif;
  }

  .button {
    background-color: #4CAF50;
    /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    transition-duration: 0.4s;
    cursor: pointer;
    margin-left: 140px;
    border-radius: 15px;
  }

  .button2 {
    background-color: white;
    color: black;
    border: 2px solid #008CBA;
  }

  .button2:hover {
    background-color: #008CBA;
    color: white;
  }

  .button3 {
    background-color: white;
    color: black;
    border: 2px solid #f44336;
    margin-left: 10px;
  }

  .button3:hover {
    background-color: #f44336;
    color: white;
  }
</style>

<?php

session_start();

if (!isset($_SESSION['nama'])) {
  header("Location: login.php");
}
if (!$_SESSION['credential'] == 1) {
  echo $_SESSION['credential'];
  header("Location: home.php");
}

?>
<?php
function Logout()
{
  session_start();
  session_destroy();

  header("Location: login.php");
}
if (isset($_GET['logout'])) {
  Logout();
}
?>

<header>
  <script src="slide.js"></script>
  <nav>
    <img src="img/Nah.png" alt="logo">
    <ul>
      <li><?php echo "Selamat Datang, " . $_SESSION['nama'] . "!";  ?> </li>
      <li><a href="home.php?logout=true">logout</a></li>
    </ul>
  </nav>
</header>

<body>
  <p style="font-family: 'Josefin Sans', sans-serif; text-align: center; margin-left:-90px; margin-top:40px; font-size: 60px; width: 800px;"> NahIni Corps</p>
  <p style="font-family: 'Josefin Sans', sans-serif; text-align: center; margin-left:70px; margin-top:-50px; font-size: 30px; width: 800px;"> Motion Graph & 3D animation</p>

</body>