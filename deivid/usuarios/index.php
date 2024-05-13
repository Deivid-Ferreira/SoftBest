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
		<title>Login</title>
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
				<table id="repete-table">
					<caption id="titulo-tabela"><p class="titulo-tabela">Usuários cadastrados :</p></caption>
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
	$sqlUsuarios = "SELECT nomeUsuario, cpfUsuario, celularUsuario, emailUsuario, senhaUsuario FROM usuarios";
	$resultUsuarios = $conn->query($sqlUsuarios);
	if ($resultUsuarios->num_rows > 0) {
		while ($dadosUsuario = $resultUsuarios->fetch_assoc()) {
	        	echo "<tr>";
	                echo "<td>" . $dadosUsuario["nomeUsuario"] . "</td>";
	                echo "<td>" . $dadosUsuario["cpfUsuario"] . "</td>";
	                echo "<td>" . $dadosUsuario["celularUsuario"] . "</td>";
	                echo "<td>" . $dadosUsuario["emailUsuario"] . "</td>";
	                echo "<td>" . $dadosUsuario["senhaUsuario"] . "</td>";
	                echo "</tr>";
	        }
	        }else {
	        	echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
	        }
?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
