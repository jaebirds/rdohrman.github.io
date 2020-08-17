<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $email = $_POST['email'];

  //Database connection

  if (!empty($username) || !empty($password) || !empty($Fname) || !empty($Lname) || !empty($email)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "curatelogin";

    $conn = new mysqli($host,$dbUsername,$dbPassword, $dbname);

    if (mysqli_connect_error()) {
      die ('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
      $SELECT = "SELECT email From register Where email = ? Limit 1";
      $INSERT = "INSERT Into register (username, password, Fname, Lname, email) values (?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if ($rnum == 0) {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssss", $username, $password, $Fname, $Lname, $email);
        $stmt->execute()
        echo "New record inserted successfully.";
        {else}
        echo "Someone has already registered with this email.";
      }
      $stmt->close();
      $conn->close();
    }
  } else {
    echo "All fields are required.";
    die();
  }
?>
