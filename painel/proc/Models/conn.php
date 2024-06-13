<?php
$server = "35.225.3.37"; // Indique o ip do servidor mysql
$dbname= "kahoot"; // Indique o nome do banco de dados que ser� aberto
$usuario="ricardo"; // Indique o nome do usu�rio que tem acesso
$password="Fdjysq@2406"; // Indique a senha do usu�rio

//1� passo - Conecta ao servidor MySQL
Global $conn;
$conn = mysqli_connect($server,$usuario,$password,$dbname) or die (mysqli_error());

$conn->set_charset('utf8mb4');
/* check connection */
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

?>