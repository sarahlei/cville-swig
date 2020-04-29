<?php
  session_start();

  if (isset($_GET['logout'])) {  //checks if logout button is clicked
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }

?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Sarah Lei">
	<title>CvilleSwig</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link href="css/landing-page.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light info-color">
  <a class="navbar-brand" href="#">
    <img src="img/cville-swig-logo.png" height="60" wifth="60">  CvilleSwig</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Directory <span class="sr-only">(current)</span></a>
            </li>
          <li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search>
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
          </li>
                    <li>
            <a class="nav-link waves-effect waves-light" href="#">
              <i class="fas fa-envelope"></i> Contact
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>
              <span>
                <?php  if (isset($_SESSION['username'])) : ?>
                	Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!
                <?php endif ?>
              </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
              <?php  if (isset($_SESSION['username'])){ ?>
                <a class="dropdown-item waves-effect waves-light" href="./profile.php?username=<?php echo $_SESSION['username']; ?> ">Account</a>
                <a class="dropdown-item waves-effect waves-light" href="index.php?logout='1'">Log Out</a>
              <?php } else{ ?>
              <a class="dropdown-item waves-effect waves-light" href="./register.php">Sign Up</a>
              <a class="dropdown-item waves-effect waves-light" href="./login.php">Log In</a>
            <?php }  ?>

            </div>
          </li>
        </ul>
      </div>
</nav>

  <div class="jumbotron jumobotron-fluid text-center bg-cover">
    <div class="overlay"></div>
    <div class="container">
  <h1 class="display-4" style="font-weight:bold; color:teal;   text-shadow: 2px 2px white;
">CvilleSwig</h1>
  <p class="lead">Your one-stop shop for Charlottesville happy hour specials. Specials listed are curated by Charlottesville locals. If you know about a regular food, drink, or event special, or see a listed special is out of date, please <a href="#">Contact Us</a></p>
  </div>
  <hr class="my-4">
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="./login.php" role="button">Log In</a>
  </p>
  <br>
  <p>Don't have an account?</p>
  <a href="./register.php" style="color:white; text-decoration:underline">Sign up here</a>
  </div>

<div class="w3-container w3-teal text-center">
  <h1 id="banner"></h1>
</div>

<script>
  var d = new Date();
  var weekday = new Array(7);
  weekday[0] = "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";

  var n = weekday[d.getDay()];
 //var node = document.createElement("h1");
 // var text = document.createTextNode(n);
  //node.appendChild(text);
  //document.getElementById("banner").appendChild(node);
  document.getElementById("banner").innerHTML = "<p></p>Today is: <strong>" + n + "!</strong><p></p>";

                                                                                                     </script>

<br>
<?php
    if(isset($_POST) && !empty($_POST['day'])){
        $day = $_POST['day']; // you can write the variable name same as input in form element
        printf("%s", $day);
        echo $day;

    }
?>
<div class="w3-container text-center font-weight-bold">
  <label for="days">Choose a Day of the Week:</label>
    <form action="./" method="post">
      <select name="Day" id="select_day">
        <option hidden disabled selected value> -- select an option -- </option>
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option
        <option value="Saturday">Saturday</option>
      </select>
      <button type="button" id="pick"onclick="filterDays();"> Pick Me!</button>
    </form>

    <script>
    function filterDays(){
        var day = document.getElementById("select_day").value;
        alert(day);

        //alert (h); // works
        $.ajax({
            type: "POST",
            url: 'day.php',  // I also tried index.php directly
            data: {day : day},
            success:(function(data){
                console.log(data);
            })
        });
    });
    </script>


<?php

$db = mysqli_connect('localhost', 'root', 'helloworld', 'cville-swig');
$sql = "SELECT * FROM restaurants ";
if ($result = $db -> query($sql)) {
  ?>  <div class="row">
<?php
while ($row = $result -> fetch_row()) {

  ?>
  <div class="col-sm-4">
    <div class="card" >
      <a href="./restaurant.html">
      <div class="image">
        <img src="<?php printf("%s", $row[3]) ?>"/>
      </div>
      <div class="card-inner">
        <div class="header">
          <h2><?php printf("%s", $row[0]) ?></h2>
        </div>
        <div class="content">
          <p><?php printf("%s: %s", $row[1], $row[2]) ?></p>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
  </div>
<?php
//  printf ("%s (%s)\n (%s)", $row[0], $row[1], $row[2]);

$result -> free_result();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?>
</div>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
