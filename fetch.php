
<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'shop1');
?>
<html>
<head>
	<button type="submit" class="btn" style="font-size:150%;margin-left:92%;"><a href="bankfetch.php"><b></b>Proceed</a></button>
	<style>
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
    border: 5px solid black;
    margin-top:10%;
    margin-left:55px;
}
	a {
  	color: black;
}
p {
	font-size:150%;
}
th{
    border: 1px solid #000000;
    text-align: left;
    padding: 8px;
    font-size:200%;
    border: 5px solid black;
}
td{
    border: 1px solid #000000;
    text-align: left;
    padding: 8px;
    border: 5px solid black;
    font-size:120%;
}
.btn {
  padding: 10px;
  font-size: 15px;
  
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
</style>
</head>

<body>
	<?php
	 	$adhar = $_GET['adhar'];
		echo "<table>";
		echo "<th>Adhar</th>";
		echo "<th>Name</th>";
		echo "<th>Age</th>";
	    $query = "SELECT * FROM user WHERE adhar='$adhar'";
        $result = mysqli_query($db,$query);
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
		    echo "<td width=20%;><b>".$row['adhar']."</b></td>";
		    echo "<td width=35%;><b>".$row['username']."</b></td>";
		    echo "<td width=35%;><b>".$row['age']."</b></td>";
		    echo "</tr>";
		}
		$_SESSION['adhar'] = $adhar;
		?>
		 
</body>
</html>