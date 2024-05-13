<?php
	session_start();

	include ('f/conf/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="f/c/estilo.css">
		<title>Cadastro de usuário</title>
	</head>
	<body>
		<div id="tudo">
			<div id="topo">
				<div id="repete-topo">
				</div>
			</div>
			<div id="conteudo">
				<div id="repete-conteudo">
					<div id="bloco-conteudo">
						<div id="repete-usuario">
							<div id="bloco-titulo-usuario">
								<p class="titulo-usuario">Cadastro de Usuário</p>
							</div>
							<div id="conteudo-usuario">
<?php 
	if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
		if($_GET['cod'] != ''){
			$libera = "sim";
		}else{
			$libera = "nao";	
		}
	}else{
		$libera = "nao";	
	}

	if($libera == "sim"){
		$sqlUsuarios = "SELECT * FROM usuarios WHERE codUsuario = ".$_GET['cod'];
		$resultUsuarios = $conn->query($sqlUsuarios);
		$dadosUsuarios = $resultUsuarios->fetch_assoc();		
?>								
							<form action="<?php echo $configUrl;?>alterarUsuario.php" method="post">
<?php
		if($_SESSION['mensagem'] != ""){
?>
								<div id="erro"><?php echo $_SESSION['mensagem'];?></div>
<?php
			$_SESSION['mensagem'] = "";
		}
?>
									<div id="repete-cadastro">
										<input type="hidden" value="<?php echo $dadosUsuarios['codUsuario']?>" name="cod">
										<input type="text" name="nome" id="nome" placeholder=" Nome" value="<?php echo $dadosUsuarios['nomeUsuario']?>" required>
										<input type="text" name="cpf" id="cpf" placeholder=" CPF" value="<?php echo $dadosUsuarios['cpfUsuario']?>" required>
										<input type="text" name="celular" id="celular" placeholder=" Celular" value="<?php echo $dadosUsuarios['celularUsuario']?>" required> 
										<input type="email" name="email" id="email" placeholder=" E-mail" value="<?php echo $dadosUsuarios['emailUsuario']?>"  require>
										<input type="password" name="senha" id="senha"  placeholder=" Senha" value="<?php echo $dadosUsuarios['senhaUsuario']?>" required>
									</div>
									<div id="repete-botao">
										<button type="subimit" id="bloco-botao">
											<p class="conteudo-botao">Alterar</p>
										</button>
									</div>
								</form>
<?php 
	}else{
?>
							<form action="<?php echo $configUrl;?>cadastraUsuario.php" method="post">
<?php
		if($_SESSION['mensagem'] != ""){
?>
								<div id="erro"><?php echo $_SESSION['mensagem'];?></div>
<?php
			$_SESSION['mensagem'] = "";
		}
?>

									<div id="repete-cadastro">
										<input type="text" name="nome" id="nome" placeholder=" Nome" required>
										<input type="text" name="cpf" id="cpf" placeholder=" CPF" required>
										<input type="text" name="celular" id="celular" placeholder=" Celular" required> 
										<input type="email" name="email" id="email" placeholder=" E-mail" require>
										<input type="password" name="senha" id="senha"  placeholder=" Senha" required>
									</div>
									<div id="repete-botao">
										<button type="subimit" id="bloco-botao">
											<p class="conteudo-botao">Cadastrar</p>
										</button>
									</div>
								</form>
<?php 
	}
?>								
								<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
								<script>
									$(document).ready(function() {
										$('#cpf').inputmask('999.999.999-99');
										$('#email').inputmask({ alias: 'email' });
										$('#celular').inputmask('(99) 99999-9999');
									});
								</script>
							</div>
						</div>
					</div>
				</div>
				<table id="repete-tabela">
					<caption id="titulo-tabela"><p class="titulo-tabela"><b>Usuários cadastrados :</b></p></caption>
					<thead >
						<tr id="tr-tabela">
							<th>Nome</th>
							<th>Cpf</th>
							<th>Celular</th>
							<th>Email</th>
							<th>Senha</th>
						</tr>
					</thead>
					<tbody>
<?php
	$sqlUsuarios = "SELECT codUsuario, nomeUsuario, cpfUsuario, celularUsuario, emailUsuario, senhaUsuario FROM usuarios";
	$resultUsuarios = $conn->query($sqlUsuarios);
	if ($resultUsuarios->num_rows > 0) {
		while ($dadosUsuario = $resultUsuarios->fetch_assoc()) {
	        echo "<tr id='linha'>";
	        	echo "<td id='conteudo-td'>" . $dadosUsuario["nomeUsuario"] . "</td>";
	        	echo "<td id='conteudo-td'>" . $dadosUsuario["cpfUsuario"] . "</td>";
	            echo "<td id='conteudo-td'>" . $dadosUsuario["celularUsuario"] . "</td>";
	            echo "<td id='conteudo-td'>" . $dadosUsuario["emailUsuario"] . "</td>";
	            echo "<td id='conteudo-td'>" . $dadosUsuario["senhaUsuario"] . "</td>";
				echo "<th id='conteudo-td'><button id='btn-editar'><a href='$configUrl?acao=editar&cod=$dadosUsuario[codUsuario]'><p>Editar</p></a></button></th>";
				echo "<th id='conteudo-td'><button id='btn-excluir' onclick='return confirmarExclusao();'><a href='".$configUrl."excluirUsuario.php?acao=excluir&cod=$dadosUsuario[codUsuario]'><p>Excluir</p></a></button></th>";
	       		echo "</tr>";
	    }
	    }else {
	        echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
	    }
?>
					</tbody>
				</table>
				<script>
       				function confirmarExclusao() {
						var confirma = confirm("Tem certeza que deseja excluir?");
						return confirma;
        			}		
    			</script>
			</div>
		</div>
	</body>
</html>