<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<title>Mensagens </title>
</head>
<body style="background-color:powderblue;">
<h1><center>Mensagens</h1> 
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


    $sqlQuery="SELECT * FROM mensagens;";
	
    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "mensagem: " . $row["mensagens"]. "<br>";
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