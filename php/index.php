<?php

$servername = getenv('SERVER');
$username = getenv('USERNAMESELECT');
$password = getenv('PASSWORDSELECT');
$dbname = getenv('DB');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

error_reporting(E_RECOVERABLE_ERROR); // Sensitive
  error_reporting(32); // Sensitive

  ini_set('docref_root', '1'); // Sensitive
  ini_set('display_errors', '1'); // Sensitive
  ini_set('display_startup_errors', '1'); // Sensitive
  ini_set('error_log', "path/to/logfile"); // Sensitive - check logfile is secure
  ini_set('error_reporting', E_PARSE ); // Sensitive
  ini_set('error_reporting', 64); // Sensitive
  ini_set('log_errors', '0'); // Sensitive
  ini_set('log_errors_max_length', '512'); // Sensitive
  ini_set('ignore_repeated_errors', '1'); // Sensitive
  ini_set('ignore_repeated_source', '1'); // Sensitive
  ini_set('track_errors', '0'); // Sensitive

  ini_alter('docref_root', '1'); // Sensitive
  ini_alter('display_errors', '1'); // Sensitive
  ini_alter('display_startup_errors', '1'); // Sensitive
  ini_alter('error_log', "path/to/logfile"); // Sensitive - check logfile is secure
  ini_alter('error_reporting', E_PARSE ); // Sensitive
  ini_alter('error_reporting', 64); // Sensitive
  ini_alter('log_errors', '0'); // Sensitive
  ini_alter('log_errors_max_length', '512'); // Sensitive
  ini_alter('ignore_repeated_errors', '1'); // Sensitive
  ini_alter('ignore_repeated_source', '1'); // Sensitive
  ini_alter('track_errors', '0'); // Sensitive

session_start();

$error="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
//existe uma verificaça dos parametros de entrada
$myusername=$_POST['username']; 
$mypassword=md5($_POST['password']); 

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

$stmt = $conn->prepare("SELECT * FROM utilizadores WHERE nome=? and password=?;");

$stmt->bind_param('ss', $myusername, $mypassword);
$stmt->execute();
$rs= $stmt->fetch ();
$stmt->close();
if (!$rs) {
	session_destroy();
	$conn->close(); 
	$error="Your Login Name or Password is invalid";
	
}

else  {
	$_SESSION['login_user']=$myusername;
	header("location: welcome.php");
	$conn->close(); 

	
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

<form>

		<input type="button" class="btn btn-primary" value=" Registar-se " onClick="window.location.href='registo.php'">

</form>
</body>
</html>
