<?php
  session_start();

  if (isset($_GET['logout'])) {  //checks if logout button is clicked
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
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

  <div class="content">
    	<!-- notification message -->
    	<?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
        	<h3>
            <?php
            	echo $_SESSION['success'];
            	unset($_SESSION['success']);
            ?>
        	</h3>
        </div>
    	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

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
              <i class="fas fa-user"></i> Profile </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
              <a class="dropdown-item waves-effect waves-light" href="./login.html">Log in</a>
              <a class="dropdown-item waves-effect waves-light" href="./register.php">Sign Up</a>
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
    <a class="btn btn-primary btn-lg" href="./login.html" role="button">Log In</a>
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
<div class="w3-container text-center font-weight-bold">
  <label for="days">Choose a Day of the Week:</label>

  <select id="days">
      <option value="Sunday">Sunday</option>
      <option value="Monday">Monday</option>
      <option value="Tuesday">Tuesday</option>
      <option value="Wednesday">Wednesday</option>
      <option value="Thursday">Thursday</option>
      <option value="Friday">Friday</option
      <option value="Saturday">Saturday</option>
  </select>

</div>

<div class="row">
  <div class="col-sm-4">
    <div class="card" >
      <a href="./restaurant.html">
      <div class="image">
        <img src="https://static1.squarespace.com/static/5643c029e4b081513daea7e3/t/5643c241e4b0a6089935f46b/1578506817865/?format=1500w" />
      </div>
      <div class="card-inner">
        <div class="header">
          <h2>Boylan Heights</h2>
        </div>
        <div class="content">
          <p>Milkshake Monday: all day! $5 for any milkshake</p>
        </div>
      </div>
    </div>

    </a>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="image">
        <img src="https://scontent.fric1-2.fna.fbcdn.net/v/t1.0-9/37318004_876805135845954_2615626720962674688_n.jpg?_nc_cat=109&_nc_sid=dd9801&_nc_ohc=4XzDwHRg2MkAX_nuhkx&_nc_ht=scontent.fric1-2.fna&oh=cc58e772c42e926071277ce89c3b33b5&oe=5E806A23" />
      </div>
      <div class="card-inner">
        <div class="header">
          <h2>Asado Wing & Taco Company</h2>
        </div>
        <div class="content">
          <p>Monday's:</p>
          <ul>
            <li>Half-off chips and queso</li>
            <li>$3.95 margaritas</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="image">
        <img src="https://sedonataphouse.com/wp-content/uploads/sedona-taphouse-charlottesville.png" />
      </div>
      <div class="card-inner">
        <div class="header">
          <h2>Sedona Taphouse</h2>
        </div>
        <div class="content">
          <p>Steak Out for Charity every Monday! For lunch or dinner, you can get Sedona's 8oz. Black Angus Flat Iron Steak or 7oz. Salmon with garlic whipped potatoes for only $8 (normally $18.9) and we donate $1 from each plate sold to support an amazing charity.</p>
        </div>
      </div>
    </div>
  </div>
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
