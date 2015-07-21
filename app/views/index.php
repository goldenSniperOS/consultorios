<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesión | Consultorio</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/style.css')?>
</head>
<body>
<div class="outer">
<div class="middle">
<div class="container">
		<div class="row">
			<div class="login">
				<div class="col-xs-4 col-xs-offset-4 well ">
					<h3 class="text-info text-center">Iniciar Sesion</h3>
					<?=HTML::image('img/logo.png')?>
					<form>
					  <div class="form-group">
					    <label for="Usuario">Usuario</label>
					    <input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Ingrese su Usuario">
					  </div>
					  <div class="form-group">
					    <label for="Contrasena">Password</label>
					    <input type="password" class="form-control" id="Contrasena"  placeholder="Ingrese su Contraseña">
					  </div>
					  <button type="submit" class="btn btn-primary btn-block">>Entrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>