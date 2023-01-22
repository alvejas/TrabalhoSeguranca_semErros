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


if(!isset($_SESSION['login_user']))
{
header("Location: php/index.php");
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
$myusername=$_POST['msg'];

$sqlQuery="INSERT INTO mensagens (mensagens) values ('$myusername')";
	
$result = $conn->query($sqlQuery);
header("Location: mensagens.php?mensagem=$myusername");
exit();
}

?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<title>Bem vindo </title>

</head>

<body style="background-color:powderblue;">
<h1><center>Bem vindo <?php echo $_SESSION['login_user']; ?></h1> 
<div id="auth" class="auth_div">
	<form method="POST">
		Messagem
		<input id="msg" type="text" name="msg"  class="form-control"/><br/><br/>

        <button type="submit" class="btn btn-primary" value=" SEND " >Enviar mensagem</button>
    </form>
    
</div>

<!--<a href="logout.php">
    <img id="logout" src="WebSiteSeguranca/styles/logout.jpg"></img>
</a>-->
<form action="logout.php" >
    <button type="submit" class="btn btn-secondary" >Logout</button>
</form>


</body>
</html>
