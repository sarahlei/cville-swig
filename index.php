<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<!-- retrieved template from: https://startbootstrap.com/snippets/registration-page/ -->

<?php
include('register.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
  header("location: profile.php");
}

?>

<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Sarah Lei">

  <title>CvilleSwig</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/register.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>



  <div class="container">
    <a href="./index.html" style="color:white">go back to Home Page</a>
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>

          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>

            <?php
            if (! empty($errorMessage) && is_array($errorMessage)) {
                ?>
                        <div class="error-message">
                        <?php
                        foreach($errorMessage as $message) {
                            echo $message . "<br/>";
                        }
                        ?>

            <form class="form-register" id="register_form" method="post" action="">
              <? php
                if (! empty($errorMessage) && is_array($errorMessage)) {
              ?>
                          <div class="error-message">
                          <?php
                          foreach($errorMessage as $message) {
                              echo $message . "<br/>";
                          }
                          ?>
                          </div>
              <?php
              }
              ?>
                          <div class="field-column">
                              <div>
                                  <input type="text" class="demo-input-box" placeholder="Email" autofocus required
                                      name="userEmail"
                                      default
                                      value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                              </div>
                          </div>

                          <div class="field-column">
                              <div>
                                  <input type="text" class="demo-input-box" placeholder="First Name" required
                                      name="firstName"
                                      value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
                              </div>

                          </div>

                          <div class="field-column">
                              <div>
                                  <input type="text" class="demo-input-box" placeholder="Last Name" required
                                      name="firstName"
                                      value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
                              </div>

                          </div>

                          <div class="field-column">
                              <div><input type="password" class="demo-input-box" placeholder="Password"
                                  name="password" value=""></div>
                          </div>
                          <div class="field-column">
                              <div>
                                  <input type="password" class="demo-input-box" placeholder="Confirm Password"
                                      name="confirm_password" value="">
                              </div>
                          </div>

                          <div class="field-column">
                          </br>
                            <div>
                              <input type="submit" name="register-user" value="Register" class="btnRegister">
                            </div>
                          </div>

                      </div>
                  </form>
              </body>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>

  function getInfo(){
    var firstName = document.getElementById("inputFirstName").value;
    var lastName = document.getElementById("inputLastName").value;
    var email = document.getElementById("inputEmail").value;
    var password = document.getElementById("inputPassword").value;
    var confirm_password = document.getElementById("inputConfirmPassword").value;

    console.log(firstName);
    console.log(lastName);
    console.log(email);
    console.log(password);
    console.log(confirm_password);

    var match = checkPassword(password, confirm_password);
    if(match == true){
      let user = new User(firstName, lastName, email, password);
      console.log(user);
    }
    return false;

  }

  const checkPassword = function(password1, password2) {
                // If Not same return False.
                if (password1 != password2) {
                    alert ("\nPassword did not match: Please try again...")
                    return false;
                }

                // If same return True.
                else{
                    return true;
                }
  }
  class User {

    constructor(firstName, lastName, email, password) {
      this.firstName = firstName;
      this.lastName = lastName;
      this.email = email;
      this.password = password;
  }

}


  </script>



  </html>
