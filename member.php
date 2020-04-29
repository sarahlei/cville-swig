<?php

function validateMember()
{
  $valid = true;
  $errorMessage = array();
  foreach ($_POST as $key => $value) {
      if (empty($_POST[$key])) {
          $valid = false;
      }
  }

  if($valid == true) {
      if ($_POST['password'] != $_POST['confirm_password']) {
          $errorMessage[] = 'Passwords should be same.';
          $valid = false;
      }

      if (! isset($error_message)) {
          if (! filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
              $errorMessage[] = "Invalid email address.";
              $valid = false;
          }
      }

  }
  else {
      $errorMessage[] = "All fields are required.";
  }

  if ($valid == false) {
      return $errorMessage;
  }
  return;
}

function isMemberExists($email)
{
    $query = "select * FROM registered_users WHERE email = ?";
    $paramType = "ss";
    $paramArray = array($email);
    $memberCount = $this->ds->numRows($query, $paramType, $paramArray);

    return $memberCount;
}

function insertMemberRecord($email, $firstName, $lastName, $password)
{
    $passwordHash = md5($password);
    $query = "INSERT INTO registered_users (email, firstName, lastName, password) VALUES (?, ?, ?, ?)";
    $paramType = "ssss";
    $paramArray = array(
        $firstName,
        $lastName,
        $passwordHash,
        $email
    );
    $insertId = $this->ds->insert($query, $paramType, $paramArray);
    return $insertId;
}

 ?>
