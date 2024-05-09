<?php
    $configServer = "localhost";
    $configLogin = "root";
    $configSenha = "epitafio";
    $configBaseDados = "deivid";

    $conn = new mysqli($configServer, $configLogin, $configSenha, $configBaseDados);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }
?>