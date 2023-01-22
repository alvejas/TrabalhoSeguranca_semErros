<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$error="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

//não há qualquer verificação dos dados de entrada
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

//esta propositadamente vulneravel a SQL injection
$sqlQuery="SELECT * FROM utilizadores WHERE nome='$myusername' and password='$mypassword';";
	
$result = $conn->query($sqlQuery);

	
if ($result->num_rows > 0) {
	$conn->close(); 

	$_SESSION['login_user']=$myusername;
	header("location: welcome.php");
}

else  {
	$conn->close(); 
	$error="Your Login Name or Password is invalid";
}

}



?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Página Inicial </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>



<script>

$(document).ready(function() {

    $("#auth").hide().fadeIn(1000);

});

</script>

<body style="background-color:powderblue;">
<h1><center>Página inicial </h1> 
<div id="auth" class="auth_div" style="align:center">
	<form action="" method="post">
		<label>UserName</label>
		<input id="username" type="text" name="username" class="form-control"/><br /><br />

		<label>Password</label>
		<input  id="password" type="password" name="password" class="form-control" /><br/><br />

		<button type="submit" class="btn btn-primary" value=" Login " >Submit</button>

	</form>
	<center><div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>
</body>
</html>
