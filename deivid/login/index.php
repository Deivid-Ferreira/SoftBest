<?php
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
					<div id="repete-login">
						<div id="bloco-titulo">
							<p class="titulo-login">Login</p>
						</div>
						<div id="conteudo-login">
							<form method="post">
								<div id="bloco-texto">
									<input type="text" name="nome" placeholder=" Nome" id="nome-login">
									<input type="password"name="senha" placeholder=" Senha" id="senha-login">
								</div>
								<div id="bloco-botao">
									<button type="subimit">
										<p>Login</p>
									</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>