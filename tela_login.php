<?php
include('conexao.php');

if(isset($_POST['user_id']) && isset($_POST['senha'])) {

    $user_id = $mysqli->real_escape_string($_POST['user_id']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    // Consulta o banco de dados para obter informações do usuário, incluindo a permissão de login
    $sql_code = "SELECT * FROM cadastro_user WHERE user_id = '$user_id' AND senha = '$senha' AND permissao_login = 1";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    if($sql_query->num_rows == 1) {

        $usuario = $sql_query->fetch_assoc();

        // Incrementa o contador de login no banco de dados
        $contador_login = $usuario['contador_login'] + 1;
        $sql_update = "UPDATE cadastro_user SET contador_login = $contador_login WHERE user_id = '$user_id'";
        $mysqli->query($sql_update) or die("Falha na atualização do contador de login: " . $mysqli->error);

        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['Id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("location: painel.php");

    } else {
        echo "Falha ao logar! user_id ou senha incorretos ou permissão negada";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tela de login </title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, black, gray);
        }
        div{
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: 15px;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: gray;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
        }
        button:hover{
            background-color: lightslategray;
        }
    </style>
</head>
<body>
    <div>
        <h1>login</h1>
        <form action="" method="POST">
            <input name="user_id" type="text" placeholder="user_id">
            <br><br>
            <input name="senha" type="password" placeholder="Senha">
            <br><br>
            <button type="submit">Entrar</button>
        </form>
        <br><br>
        <a href="http://localhost/tela_cadastro.php">Cadastre-se</a>
    </div>
</body>