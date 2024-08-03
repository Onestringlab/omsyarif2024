 <?php
  $username = "admin";
  $password = "DB_omsyarif_2024";
  $dbname = "omsyarif_2024_ori";
  $hostname = "localhost";

  $con = mysqli_connect($hostname, $username, $password, $v_db);
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else {
    echo "Success";
  }
  ?>