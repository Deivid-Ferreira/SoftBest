<?php
    session_start();

    include ('f/conf/config.php');

    if(isset($_GET['acao'])){
      if($_GET['cod'] != ''){
        $cod = $_GET['cod'];
      
        $sqlDeleta = "DELETE FROM usuarios WHERE codUsuario = ".$cod."";
        $resultDeleta = $conn->query($sqlDeleta);

        if($resultDeleta == 1){
            $_SESSION['mensagem'] = "Usuário excluido com sucesso!";
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";
        }
      }else{
            $_SESSION['mensagem'] = "Problemas ao excluir usuário: ".$conn->error;	
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=".$configUrl."'>";  
		    }
    }
?>