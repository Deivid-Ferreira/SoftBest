<?php
    session_start();

    include ('f/conf/config.php');

    if(isset($_POST['nome'])){
        $cod = $_POST['cod'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    }

    if($nome != "" && $cpf != "" && $celular != "" && $email != "" && $senha != ""){
        $sqlUsuario = "SELECT codUsuario FROM usuarios WHERE cpfUsuario = '".$cpf."' and codUsuario != ".$cod." ORDER BY codUsuario DESC LIMIT 0,1";
        $resultUsuario = $conn->query($sqlUsuario);
        $dadosUsuario = $resultUsuario->fetch_assoc();

        if($dadosUsuario['codUsuario'] == ""){
            $sqlAltera = "UPDATE usuarios SET nomeUsuario = '".$nome."', cpfUsuario = '".$cpf."', celularUsuario = '".$celular."', emailUsuario = '".$email."', senhaUsuario = '".$senha."' WHERE codUsuario = ".$cod;
            $resultAltera = $conn->query($sqlAltera);
            
            if($resultAltera == 1){
                $_SESSION['mensagem'] = "Usuário alterado com sucesso!";
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
            }else{
                $_SESSION['mensagem'] = "Problemas ao alterar usuário";
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
            }
        }else{
            $_SESSION['mensagem'] = "O CPF digitado ja foi utilizado.";
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
        }
    }else{
        $_SESSION['mensagem'] = "Algum campo não foi preenchido";
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
     }
?>