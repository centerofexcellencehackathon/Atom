<?php
session_start();

// initializing variables
$username = "";
$r_image   = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'shop1');

// REGISTER USER
if (isset($_POST['add_user'])) {
  // receive all input values from the form
  $adhar=$_POST['adhar'];
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $r_image= mysqli_real_escape_string($db, $_POST['r_image']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($adhar)) { array_push($errors, "Adhar number is requiree is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($r_image)) { array_push($errors, "Retina image code is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE adhar='$adhar'LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['adhar'] === $adhar) {
      array_push($errors, "Person already registered");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$r_image = md5($r_image);
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO user (adhar, username, r_image, password) 
  			  VALUES('$adhar', '$username', '$r_image', '$password')";
  	mysqli_query($db, $query);
  	header('location: hi.php');
  }
}

if (isset($_POST['chk_user'])) {
  $adhar=$_POST['adhar'];
  $r_image = mysqli_real_escape_string($db, $_POST['r_image']);
  $r_image1 = md5($r_image);

  if (empty($adhar)) {
    array_push($errors, "Adhar number is required");
  }
  if (empty($r_image)) {
    array_push($errors, "Retina image is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM user WHERE adhar='$adhar'";
    $results = mysqli_query($db, $query);
    $row=mysqli_fetch_array($results);
    $r_image=$row['r_image'];
    if ($r_image1 != $r_image) {
      array_push($errors, "Retina not matched");
    }else {
      header("location: fetch.php?adhar=".$adhar);
    }
  }
}
?>
