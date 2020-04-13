<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysqli("localhost", "root", "helloworld") or die("Connect failed: %\n");

$connection = new mysqli("Localhost", "root", "helloworld", "cville-swig") or die("Connect failed: %s\n". $conn -> error);
/* check connection */
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $connection->connect_error);
    exit();
  }
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select * from users where userEmail='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['userEmail'];
if(!isset($login_session)){
  echo "Connected Successfully";
  //mysqli_close($connection); // Closing Connection
  //header('Location: index.html'); // Redirecting To Home Page
}
?>
