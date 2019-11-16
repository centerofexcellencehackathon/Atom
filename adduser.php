<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
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
  margin-top:5%;
  margin-left: 35%;
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
    <h2>Add User</h2>
  </div>
  
  <form method="post" action="adduser.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Adhar number</label>
      <input type="number" name="adhar" >
    </div>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username">
    </div>
    <div class="input-group">
      <label>Retina image</label>
      <textarea type="textarea" name="r_image"></textarea>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="add_user">Add</button>
    </div>
  </form>
</body>
</html>