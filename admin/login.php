<?php
/* si se envio el formulario */
if(isset($_POST['enviar-login']))
{
	if($_POST['usuario'] == '' && $_POST['pass'] == '')
	{
		session_start();
		$_SESSION['login_admin'] = 'OK';
		header("Location: index.php");
		exit;
	} else {
		$error_login = "El nombre de usuario y/o contraseña no son correctos.";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Campos y Estancias » Administración</title>
<link href="css/tm_admin.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="contenedor_login">
	
	<div id="mensaje_login">
		Por favor inicie sesión para continuar.
	</div>
	
	<div id="logo_login" style="text-align: center;">
		
	</div>
	
	<form id="form-login" name="login" method="post" action="">
		
		<?php
		if(isset($error_login)):
		?>
		
		<p class="login-error"><?php echo $error_login; ?></p>
		
		<?php
		endif;
		?>
		
		Usuario:
		<br />
		<input type="text" name="usuario" class="txt" id="txt_usuario" />
		
		<br /><br />
		
		Contraseña:
		<br />
		<input type="password" name="pass" class="txt" id="txt_pass" />
		
		<br /><br />
		
		<p class="boton">
			<input type="submit" name="enviar-login" value="Ingresar" id="btn_ingresar" />
		</p>
		
	</form>
	
</div>

</body>
</html>