<?php
    session_start();

    include ('f/conf/config.php');

    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    }

    if($nome != "" && $cpf != "" && $celular != "" && $email != "" && $senha != ""){
        $sqlUsuario = "SELECT codUsuario FROM usuarios WHERE cpfUsuario = '".$cpf."' ORDER BY codUsuario DESC LIMIT 0,1";
        $resultUsuario = $conn->query($sqlUsuario);
        $dadosUsuario = $resultUsuario->fetch_assoc();

        if($dadosUsuario['codUsuario'] == ""){
            $sqlInsere = "INSERT INTO usuarios VALUES(0, '".date('Y-m-d')."', '".$nome."', '".$cpf."', '".$celular."', '".$email."', '".$senha."', 'T')";
            $resultInsere = $conn->query($sqlInsere);

            if($resultInsere == 1){
                $_SESSION['mensagem'] = "Usuário inserido com sucesso!";
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
            }else{
                $_SESSION['mensagem'] = "Problemas ao inserir usuário";
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
            }
        }else{
            $_SESSION['mensagem'] = "O CPF digitado ja foi utilizado.";
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
        }
    }else{
        $_SESSION['mensagem'] = "Um dos campos não foi preenchido.";
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
     }
?>