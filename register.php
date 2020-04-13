
<?php session_start();

  $error=''; // Variable To Store Error Message
  if (isset($_POST['submit'])) {
    if (empty($_POST['userEmail']) || empty($_POST['password'])) {
      $error = "User Email or Password is invalid";
      }
    else
  {
  // Define $userEmail and $password
  $userEmail=$_POST['userEmail'];
  $password=$_POST['password'];

  // Establishing Connection with Server by passing server_name, user_id, and password as a parameter
  $connection = mysqli_connect("localhost", "root", "helloworld");

  // To protect MySQL injection for Security purpose
  $userEmail = stripslashes($userEmail);
  $password = stripslashes($password);
  $userEmail = mysql_real_escape_string($username);
  $password = mysql_real_escape_string($password);

  // Selecting Database
  $db = mysql_select_db("cville-swig", $connection);
  // SQL query to fetch information of registerd users and finds user match.
  $query = mysql_query("select * from login where password='$password' AND userEmail='$userEmail'", $connection);
  $rows = mysql_num_rows($query);
  if ($rows == 1) {
  $_SESSION['login_user']=$userEmail; // Initializing Session
    header("location: profile.php"); // Redirecting To Other Page
  } else {
    $error = "User Email or Password is invalid";
  }
  mysql_close($connection); // Closing Connection
  }
  }
  ?>
