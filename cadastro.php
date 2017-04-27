<?php
require_once "config.php";
?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<title>VIDEO - CADASTRO COM PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div id="cadastro">
	<form method="post" action="?go=cadastrar">
		<table id="cad_table">
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" id="nome" class="txt" /></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" id="email" class="txt" /></td>
			</tr>
			<tr>
				<td>Usuário:</td>
				<td><input type="text" name="usuario" id="usuario" class="txt" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Senha:</td>
				<td><input type="password" name="senha" id="senha" class="txt" maxlength="15" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Cadastrar" id="btnCad"> 
				&nbsp;
				<a href="./">
					<input type="button" value="Cancelar" class="btn" id="btnCancelar">
				</a>
			</td>
			</tr>	
		</table>
	</form>
</div>

</body>
</html>

<?php
if(@$_GET['go'] == 'cadastrar'){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$user = $_POST['usuario'];
	$pwd = $_POST['senha'];

	if(empty($nome)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($email)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($user)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($pwd)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}else{
		$query1 = mysqli_num_rows(mysql_query("SELECT * FROM USUARIO WHERE USUARIO = '$user'"));
		if($query1 == 1){
			echo "<script>alert('Usuário já existe.'); history.back();</script>"; 
		}else{
			mysqli_query("insert into usuario (nome, email, usuario, senha) values ('$nome','$email','$user','$pwd')");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			echo "<meta http-equiv='refresh' content='0, url=./'>";
		}
	}
}

?>