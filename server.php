<?php
session_start();

$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'helloworld', 'cville-swig');
//if ($db->connect_error) {
//   die("Connection failed: " . $db->connect_error);
//}

// Register user
if (isset($_POST['reg_user'])) {
  //get form data values
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //validate form
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  function password_match($password_1, $password_2){
    if($password_1 != $password_2)
      return False;
    return True;
  }
  if (!password_match($password_1, $password_2)) {
	array_push($errors, "Passwords do not match!");
  }


  // check db if username or email already exists
  $user_query = "SELECT * FROM 'users' WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_query);
  if ($result){

    $user = mysqli_fetch_assoc($result);

    if ($user) {
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }
}
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1, PASSWORD_BCRYPT);
  	$query = "INSERT INTO 'users' (username, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in!";
  	header('location: index.php');
  }
}

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM 'users' WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
echo "HELLO";
    if($results){
      echo "HEY";
    	if (mysqli_num_rows($results) == 1) {
    	  $_SESSION['username'] = $username;
    	  $_SESSION['success'] = "You are now logged in";
    	  header('location: index.php');
    	}
    }
    else{
      echo "UH OH";
      array_push($errors, "Login failed: Invalid username or password.");
    }
  }
}
?>
