<?php

if(!isset($_SESSION)){
    session_start();
}

// Array de perguntas
$perguntas = array(
    "Qual é a sua cor favorita?",
    "Qual é o seu animal favorito?",
    "Qual é o seu hobby preferido?",
    "Qual é o seu filme favorito?",
    "Qual é o seu lugar favorito para viajar?",
    // Adicione mais perguntas conforme desejado
);

// Selecionar uma pergunta aleatória
$pergunta_aleatoria = $perguntas[array_rand($perguntas)];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    Bem Vindo ao Painel, <?php echo $_SESSION['nome'];?>

    <p>
        Pergunta Aleatória: <?php echo $pergunta_aleatoria; ?>
    </p>

    <p>
        <a href="logout.php">Sair</a>
    </p>

</body>
</html>
