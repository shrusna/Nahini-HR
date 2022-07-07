<!DOCTYPE html>

<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap');

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
    padding: 0px;

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
    background-image: url("img/quiz.png");
    background-size: 1370px;

  }

  .container {
    background-color: black;
    color: black;
    border-radius: 10px;
    padding: 20px;
    font-family: "Montserrat", sans-serif;
    max-width: 700px;
  }
</style>


<?php

session_start();
include 'koneksi.php';
$ids = $_SESSION['user_id'];
if (!isset($_SESSION['nama'])) {
} else {
  $sql = "SELECT * from hasil where user_id= '$ids'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
  } else {
    header("Location: home.php");
    echo "<script>alert('Anda sudah melakukan test sebelumnya')</script>";
    echo "<meta http-equiv='Refresh' content='waktu-tunda'; URL='home/php'>";
    echo "<script language=javascript>
    setTimeout('location.href='home.php'', 2);</script>";
    $ids = "";
  }
}

$array = array();
if (isset($_POST['submittest'])) {
  if (!empty($_POST['group-1'])) {
    if (!empty($_POST['group-2'])) {
      if (!empty($_POST['group-3'])) {
        if (!empty($_POST['group-4'])) {
          if (!empty($_POST['group-5'])) {
            if (!empty($_POST['group-6'])) {
              if (!empty($_POST['group-7'])) {
                if (!empty($_POST['group-8'])) {
                  if (!empty($_POST['group-9'])) {
                    array_push(
                      $array,
                      $_POST['group-1'],
                      $_POST['group-2'],
                      $_POST['group-3'],
                      $_POST['group-4'],
                      $_POST['group-5'],
                      $_POST['group-6'],
                      $_POST['group-7'],
                      $_POST['group-8'],
                      $_POST['group-9']
                    );
                    $arr = json_encode($array);
                    $sql = "INSERT into hasil (user_id, array_jawaban) VALUES ('$ids','$arr')";
                    if ($conn->query($sql) === TRUE) {
                      echo "<script>alert('Terima Kasih Sudah Mengerjakan')</script>";
                      header("Location: home.php");
                      echo "<script>alert('Anda sudah melakukan test sebelumnya')</script>";
                      echo "<meta http-equiv='Refresh' content='waktu-tunda'; URL='home/php'>";
                      echo "<script language=javascript>
                       setTimeout('location.href='home.php'', 2);</script>";
                      $arr = "";
                      $ids = "";
                    } else {
                      echo "<script>alert('Harap login terlebih dahulu" . $result . "')</script>";
                      $arr = "";
                      $ids = "";
                    }
                  } else {
                    echo "<script>alert('Please select the value of number 9.')</script>";
                  }
                } else {
                  echo "<script>alert('Please select the value of number 8.')</script>";
                }
              } else {
                echo "<script>alert('Please select the value of number 7.')</script>";
              }
            } else {
              echo "<script>alert('Please select the value of number 6.')</script>";
            }
          } else {
            echo "<script>alert('Please select the value of number 5.')</script>";
          }
        } else {
          echo "<script>alert('Please select the value of number 4.')</script>";
        }
      } else {
        echo "<script>alert('Please select the value of number 3.')</script>";
      }
    } else {
      echo "<script>alert('Please select the value of number 2.')</script>";
    }
  } else {
    echo "<script>alert('Please select the value of number 1.')</script>";
  }
} else {
}

?>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>NAHINI EXAM</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <header>
    <script src="slide.js"></script>
    <nav>
      <img src="img/Nah.png" alt="logo">
      <ul>
        <li><?php echo "Selamat Mengerjakan, " . $_SESSION['nama'] . "!";  ?> </li>
        <li><a href="home.php">Home</a></li>
        <li><a href="prequiz.php">Test</a></li>
        <li><a href="">Hasil Test</a></li>
        <li><a href="home.php?logout=true">Log Out</a></li>
      </ul>
    </nav>
  </header>
</head>

<body oncontextmenu="return false" class="snippet-body">
  <!-- Daftar Pertanyaan -->
  <form method="POST" class="quiz">
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>1. Keterampilan dalam membuat grafis gerak!</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-1">
          <label class="options">1
            <input type="radio" name="group-1" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-1" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-1" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-1" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-1" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>2. Menguasai sofware desain serta ilustrasi!</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-2">
          <label class="options">1
            <input type="radio" name="group-2" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-2" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-2" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-2" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-2" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>3. Keterampilan yang baik dalam berkomunikasi!</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-3">
          <label class="options">1
            <input type="radio" name="group-3" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-3" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-3" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-3" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-3" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>4. Keahlian dalam 3D!</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-4">
          <label class="options">1
            <input type="radio" name="group-4" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-4" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-4" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-4" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-4" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>5. Kemampuan dalam bekerja secara mandiri!</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-5">
          <label class="options">1
            <input type="radio" name="group-5" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-5" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-5" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-5" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-5" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>6. Kemampuan dalam bekerja dalam tim!</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-6">
          <label class="options">1
            <input type="radio" name="group-6" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-6" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-6" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-6" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-6" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>7. Kemampuan dalam mengikuti tren terbaru!</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-7">
          <label class="options">1
            <input type="radio" name="group-7" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-7" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-7" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-7" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-7" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>8. Kemampuan menyelesaikan suatu masalah!?</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-8">
          <label class="options">1
            <input type="radio" name="group-8" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-8" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-8" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-8" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-8" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>

      <div class="d-flex align-items-center pt-3"></div>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="container mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5">
          <b>9. Kemampuan dalam bekerja dibawah tekanan ?</b>
        </div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options" name="group-2">
          <label class="options">1
            <input type="radio" name="group-9" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="options">2 <input type="radio" name="group-9" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="options">3 <input type="radio" name="group-9" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="options">4 <input type="radio" name="group-9" value="4" />
            <span class="checkmark"></span>
          </label>
          <label class="options">5
            <input type="radio" name="group-9" value="5" />
            <span class="checkmark">
            </span>
          </label>
        </div>
      </div>
    </div>

    <div class="container mt-sm-5 my-1">
      <div class="d-flex align-items-center pt-3">
        <div class="ml-auto mr-sm-5">
          <button name="submittest" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </form>

  <?php


  ?>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>