<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="slide.css">
<style type="text/css">
   @import url('https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap');
   @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Zen+Loop&display=swap');
   @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&family=Zen+Loop&display=swap');

   body {
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
      display: inline-block;
      padding: 15px 25px;
      font-size: 24px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #4CAF50;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
      margin-left: 400px;
   }

   .button:hover {
      background-color: #3e8e41
   }

   .button:active {
      background-color: #3e8e41;
      box-shadow: 0 5px #666;
      transform: translateY(4px);
   }
</style>

<header>
   <nav>
      <img src="img/Nah.png" alt="logo">
      <ul>
         <li><a href="home.php">Home</a></li>
         <li><a href="prequiz.php">Test</a></li>
         <li><a href="hasiltest.php">Hasil Test</a></li>
         <li><a href="home.php?logout=true">logout</a></li>
      </ul>
   </nav>
</header>
<?php
include 'koneksi.php';
session_start();
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM hasil WHERE user_id =  $id";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
      if ($row['hasil'] == "DITERIMA"){
         echo '<body style="background-image: url(&#039 img/diterima.png &#039);">';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:-100px; font-size: 60px; width: 800px;"> NahIni Corps</p>';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:-50px; font-size: 30px; width: 800px;"> Hasil Test Anda Adalah :</p>';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:120px; font-size: 30px; width: 800px;">'. $row['hasil'] .'</p>';
         echo '</body>'; };
      if ($row['hasil'] == "DITOLAK"){
         echo '<body style="background-image: url(&#039 img/tidakditerima.png &#039);">';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:-100px; font-size: 60px; width: 800px;"> NahIni Corps</p>';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:-50px; font-size: 30px; width: 800px;"> Hasil Test Anda Adalah :</p>';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:120px; font-size: 30px; width: 800px;">'. $row['hasil'] .'</p>';
         echo '</body>';
      };
      if ($row['hasil'] == "Waiting"){
         echo '<body style="background-image: url(&#039 img/menunggu.png &#039);">';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:-100px; font-size: 60px; width: 800px;"> NahIni Corps</p>';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:-50px; font-size: 30px; width: 800px;"> Hasil Test Anda Adalah :</p>';
         echo '<p style="font-family: &#039 Josefin Sans &#039, sans-serif; text-align: center; margin-left:295px; margin-top:120px; font-size: 30px; width: 800px;">'. $row['hasil'] .'</p>';
         echo '</body>';};
      
	} else {
		echo "<script>alert('anda belum melakukan test". $id ."')
      window.location.href='home.php';
      </script>";


   }



?>
