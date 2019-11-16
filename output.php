<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'shop1');
$balance = $_GET['balance'];
$balance1 = $_GET['balance1'];
echo("The balance before deduction is :".$balance1);
echo("<br>");
echo("The balance after deduction is :".$balance);
?>