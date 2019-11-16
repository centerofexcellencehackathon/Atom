<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'shop1');
$adhar = $_SESSION['adhar'];
$bank_id = $_SESSION['bank_id'];

$errors = array(); 

// connect to the database

if (isset($_POST['tr_user'])) {
$pincode=$_POST['pincode'];
$amount=$_POST['amount'];

if (empty($pincode)) {
    array_push($errors, "Pin code is required");
  }
  if (empty($amount)) {
    array_push($errors, "Please enter the amount to be deducted");
  }

  $query = "SELECT * FROM bank WHERE adhar='$adhar' and bank_id='$bank_id'";
  $results = mysqli_query($db, $query);
  $row=mysqli_fetch_array($results);
  $pincode1=$row['pincode'];
  if ($pincode != $pincode1) {
      array_push($errors, "Please enter the correct pincode");
    }else {
    $balance=$row['balance'];
    $balance1=$balance;
    $balance= $balance-$amount;
    $query = "UPDATE bank SET balance ='$balance' WHERE adhar='$adhar' and bank_id='$bank_id'";
    mysqli_query($db, $query);
      header("location: output.php?balance1=".$balance1."&balance=".$balance);

}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <STYLE>
  * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 90%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin-left: 35%;
  margin-top:5%;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin-left:35%;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
  margin-left:0.2%;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</STYLE>
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="transaction.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Enter the pin code</label>
  		<input type="number" name="pincode" >
  	</div>
  	<div class="input-group">
  		<label>Enter the amount</label>
  		<input type="number" name="amount">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="tr_user">Submit</button>
  	</div>
    </p>
  </form>
</body>
</html>