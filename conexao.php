<!DOCTYPE html>

<?php
// Conexão com o banco de dados
$dbHost = "localhost";
$dbUsername = "usuario";
$dbPassword = "Arroba 34"; // Senha padrão do MySQL no XAMPP é vazia
$dbName = "formulario_cadastro";

$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se a conexão foi estabelecida com sucesso
if ($mysqli->error) {
   die("Erro na conexão com o banco de dados: " . $mysqli->error);
}


?>