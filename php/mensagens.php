<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<title>Mensagens </title>
</head>
<body style="background-color:powderblue;">
<h1><center>Mensagens</h1> 
    <?php
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
    
    $servername = getenv('SERVER');
    $username = getenv('USERNAMESELECT');
    $password = getenv('PASSWORDSELECT');
    $dbname = getenv('DB');
    session_start();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if(!isset($_SESSION['login_user']))
    {
    session_destroy();
    header("Location: index.php");
    }


    $sqlQuery="SELECT * FROM mensagens;";
	
    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo htmlspecialchars( "mensagem: " . $row["mensagens"]). "<br>";
        }
    }
    else  {
        $conn->close(); 
        $error="Your Login Name or Password is invalid";
    }
    ?>

    <form action="welcome.php" >
        <button type="submit" class="btn btn-primary" >Voltar à página anterior</button>
    </form>
</body>

</html>