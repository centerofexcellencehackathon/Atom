<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'shop1');
$adhar = $_SESSION['adhar'];
?>
<html>
<head>
	<style>
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 20%;
    border: 5px solid black;
    margin-top:10%;
    margin-left:35%;
}
	a {
  	color: black;
}
p {
	font-size:150%;
}
th{
    border: 1px solid #000000;
    text-align: center;
    padding: 8px;
    font-size:200%;
    border: 5px solid black;
}
td{
    border: 1px solid #000000;
    text-align: center;
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
		echo "<table>";
		echo "<th>Bank Name</th>";
	    $query = "SELECT * FROM bank WHERE adhar='$adhar'";
        $result = mysqli_query($db,$query);
        $row1 = mysqli_fetch_array($result);
        $bank_id=$row1['bank_id'];
        $query1 = "SELECT * FROM bank WHERE adhar='$adhar'";
        $result1 = mysqli_query($db,$query1);
        
		while($row = mysqli_fetch_array($result1)){
			echo "<tr>";
		    echo "<td><a href=\"transaction.php\">$row[bankname]</a>";
		    echo "</tr>";
		}
		$_SESSION['adhar'] = $adhar;
		$_SESSION['bank_id'] = $bank_id;
		?>
		 
</body>
</html>