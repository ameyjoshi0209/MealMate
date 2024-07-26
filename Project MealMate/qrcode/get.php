<?php
require_once '../connection.php';
session_start();
$uname = $_SESSION['username'];
$view = $_SESSION['views'];
// $_SESSION['views'] = 0;
if ($_SESSION['views'] == 60) {
  // session_destroy();
  unset($_SESSION['views']);
  mysqli_query($conn, "UPDATE users SET days = 0 WHERE username = '$uname';");
  // unset($_SESSION['views']);
  // echo "<script>alert('You have completed your 60 days plan. Please contact admin for further details.')</script>";
  header("location:../index.php");
  // mysqli_query($conn, "UPDATE users SET days = $view-1 WHERE username = '$uname';");
} elseif (isset($_SESSION['views'])) {
  // foreach( $_SESSION['views'] as $)
  $_SESSION['views'] = $_SESSION['views'] + 1;
  mysqli_query($conn, "UPDATE users SET days = $view+1 WHERE username = '$uname';");
} else {
  $_SESSION['views'] = 1;
  mysqli_query($conn, "UPDATE users SET days = $view+1 WHERE username = '$uname';");
}

if (isset($_GET['data'])) {
  $qr = $_GET['data'];
  $sql = "SELECT * FROM `users` where username='$qr' ";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);
  $name = $row['name'];
  $username = $row['username'];
  $phone = $row['phone'];
  $dt = $row['dt'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <!-- Style CSS -->
  <link rel="stylesheet" href="../assets/css/profile.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
</head>

<body>
  <main class="cd__main">
    <div class="profile-page">
      <div class="content">
        <div class="content__cover">
          <div class="content__avatar"></div>
          <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
          </div>
        </div>
        <div class="content__title">
          <br>
          <br>
          <br>
          <h1><?php echo $name ?></h1><span><?php echo $uname ?></span>
        </div>
        <div class="content__description">
          <p>Date Created : <?php echo $dt ?></p>
        </div>
        <ul class="content__list">
          <li><span>
              <?php
              if (isset($_SESSION['views'])) {
                $sql = mysqli_query($conn, "SELECT days FROM `users` where username='$uname'");
                $row = mysqli_fetch_assoc($sql);
                echo $row['days'];
              } else {
                echo "0";
              };
              ?>
            </span>days remaining</li>
        </ul>
      </div>
      <div class="bg">
        <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>
  </main>
</body>

</html>