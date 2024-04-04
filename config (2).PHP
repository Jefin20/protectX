
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Conexão PHP com Banco de Dados</title>
</head>
<body>


\\!-- tela_cadastro.php
<?php
// Conexão com o banco de dados
$dbHost = "localhost";
$dbUsername = "usuario";
$dbPassword = "Arroba 34"; // Senha padrão do MySQL no XAMPP é vazia
$dbName = "formulario_cadastro";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    echo("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
else{
    echo"Conexao efetuada com sucesso".$conn->connect_error;
}

?>
</body>
</html>