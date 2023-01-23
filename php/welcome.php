<?php

$servername = getenv('SERVER');
$username = getenv('USERNAMEINSERT');
$password = getenv('PASSWORDINSERT');
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


if(!isset($_SESSION['login_user']))
{
session_destroy();
header("Location: php/index.php");
}



if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
$myMSG=$_POST['msg'];

$sqlQuery="INSERT INTO mensagens (mensagens) values ('$myMSG')";
	
$result = $conn->query($sqlQuery);
header("Location: mensagens.php?mensagem=$myMSG");
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

<form action="logout.php" >
    <button type="submit" class="btn btn-secondary" >Logout</button>
</form>


</body>
</html>
