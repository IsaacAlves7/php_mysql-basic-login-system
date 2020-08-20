<?php
// Database connection
// Create a user and a password on database
// The registered user is Rodrigo Oliveira, the email is "admin" and the password is "123".

$servername = "localhost"; // server name
$username = "root"; // user name
$password = ""; // password
$db_name = "sistemalogin"; // database name

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;
?>