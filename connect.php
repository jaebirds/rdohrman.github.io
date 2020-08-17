<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $email = $_POST['email'];

  //Database connection
  $conn = new mysqli('localhost','root','','test');
  if($conn->connect_error){
    die('Connection Failed : '.$conn,>connect-error);
  }else{
    $stmt = $conn->prepare("insert into registration (username,password,Fname,Lname,email)
      values(?,?,?,?,?)"){
    $stmt->bind_param("sssss", $username, $password, $Fname, $Lname, $email");
    $stmt->execute();
    echo "Registration successful.";
    $stmt->close();
    $conn->close();
    }
  }
  }
?>
