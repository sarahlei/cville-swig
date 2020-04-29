<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', 'helloworld', 'cville-swig');
  $username = $_GET['username'];
  $sql = "SELECT * FROM users ";
  if ($result = $db -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    printf ("%s (%s)\n", $row[0], $row[1]);
  }
  $result -> free_result();
} else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }





  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>CvilleSwig</title>
  <meta name="author" content="Josh Buckley">
	<link rel="stylesheet" type="text/css" href="css/prof1.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link href="css/landing-page.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light info-color">
    <a class="navbar-brand" href="./index.php">
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

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                      <?php  if (isset($_SESSION['username'])) : ?>
                                        <strong><?php echo $_SESSION['username']; ?></strong>
                                      <?php endif ?>
                                    </h5>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Favorites</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                              <?php echo $_GET['username']; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                                                         </div>
                                        </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row">
                                  <div class="col-md-3">
                                  </div>
                                  <div class="col-md-8">
                                      <div class="tab-content profile-tab" id="myTabContent">
                                          <h4>Favorites:</h4>
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                                          <div class="col-md-8">
                                                              <div class="list-group">
                                                                  <div class="list-group-item"><a href="#" ><h4>Bodo's</h4><br><p style="display:inline-block">Buy One Get One Free</p></a> <p id="like_button1" class="like_button">&#10084;</p><i id="liked_1" class="fa fa-heart-o"></i> </div>
                                                                  <div class="list-group-item"><a href="#" ><h4>Trinity</h4><p style="display:inline-block">Buy None Get One Free</p></a><p id="like_button2" class="like_button" >&#10084;</p><i id="liked_2" class="fa fa-heart-o"></i></div>
                                                                  <div class="list-group-item"><a href="#" ><h4>Sheetz</h4><p style="display:inline-block">Buy One Get None Free</p></a><p id="like_button3" class="like_button" >&#10084;</p><i id="liked_3" class="fa fa-heart-o"></i></div>
                                                                </div>
                                                      </div>
                                          </div>

                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
<script>
    x = document.getElementById("like_button1");
    y = document.getElementById("like_button2");
    z = document.getElementById("like_button3");

    x.addEventListener("click", funct => {
        //x.innerHTML= "";
        x.style.display= "none";
        document.getElementById("liked_1").style.display="block";
        document.getElementById("liked_1").style.float="right";
        console.log("x done")
    });

    y.addEventListener("click", funct=() => {
        y.style.display= "none";
        //y.innerHTML= "";
        document.getElementById("liked_2").style.display="block";
        document.getElementById("liked_2").style.float="right";

    });

    z.addEventListener("click", funct=() => {
        z.style.display= "none";
        //z.innerHTML= "";
        document.getElementById("liked_3").style.display="block";
        document.getElementById("liked_3").style.float="right";

    });

    a = document.getElementById("liked_1");
    b = document.getElementById("liked_2");
    c = document.getElementById("liked_3");


    a.addEventListener("click", funct=() => {
        a.style.display= "none";
        //z.innerHTML= "";
        document.getElementById("like_button1").style.display="block";
        //document.getElementById("liked_3").style.float="right";

    });



    b.addEventListener("click", funct=() => {
        b.style.display= "none";
        //z.innerHTML= "";
        document.getElementById("like_button2").style.display="block";
        //document.getElementById("liked_3").style.float="right";

    });


    c.addEventListener("click", funct=() => {
        c.style.display= "none";
        //z.innerHTML= "";
        document.getElementById("like_button3").style.display="block";
        //document.getElementById("liked_3").style.float="right";

    });


    //const funct= (a) => {
      //  this.classList.toggle("unlike");
    //}
</script>

</html>
