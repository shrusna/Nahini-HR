<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="slide.css">
<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Zen+Loop&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&family=Zen+Loop&display=swap');

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
    background-image: url("img/pre-quiz.png");
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
  <script src="slide.js"></script>
  <nav>
    <img src="img/Nah.png" alt="logo">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="prequiz.php">Test</a></li>
      <li><a href="">Hasil Test</a></li>
      <li><a href="home.php?logout=true">Log Out</a></li>
    </ul>
  </nav>
</header>

<body>
  <p style="font-family: 'Josefin Sans', sans-serif; text-align: center; margin-left:90px; margin-top:-80px; font-size: 60px; width: 800px;"> NahIni Corps</p>
  <p style="font-family: 'Josefin Sans', sans-serif; text-align: center; margin-left:90px; margin-top:-50px; font-size: 30px; width: 800px;"> Perhatikan Instruksi Berikut!!</p>
  <p style="font-family: 'Josefin Sans', sans-serif; text-align: justify; margin-left:200px; margin-top:10px; font-size: 25px; width: 800px;">
    1. Kesempatan Mengerjakan Test Ini Hanya Sekali!!<br>
    2. Diharapkan Menjawab Dengan jawaban yang jujur!!<br>
    3. Setelah test berakhir hasil akan di bagikan <br>pada halaman "Hasil Test"<br>
    4. Jika dinyatakan lulus harap menghubungi email yang<br> nantinya akan diberikan</p>
  <button onclick="startquiz()" class="button">Start Test</button>
</body>

<script>
  function startquiz() {
    window.location.assign("quiz.php")
  }
</script>