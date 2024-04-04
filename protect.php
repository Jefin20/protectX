<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['Id'])) {
    die("Você não pode acessar esta página porque não está logado. <p><a href=\"tela_login.php\">Etrar</a></p>");
}

?>