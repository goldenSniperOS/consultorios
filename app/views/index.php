<?php
if(Session::exists('errores')){
  $errores = Session::flash('errores');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesión | Consultorio</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/style.css')?>
</head>
<body>
<div class="login well">
<h3 class="text-info text-center">Iniciar Sesion</h3>
<?=HTML::image('img/logo.png')?>
<?php if(Session::exists('login')){$value = Session::flash('login');}?>
<?php if(isset($value)): ?>
<div class="alert alert-<?=$value['class']?> fade in" role="alert"><?=$value['message']?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
</div>
<?php endif; ?>
<form method="POST" action="<?=URL::to('home/login')?>">
  <div class="form-group <?=(isset($errores['DNI']))?'has-error':''?>">
    <label for="DNI">DNI</label>
    <input required type="text" class="form-control" id="DNI" name="DNI" placeholder="Ingrese su DNI">
    <?php if(isset($errores['DNI'])): ?>
    <p class="help-block"><?=$errores['DNI']?></p>
    <?php endif; ?>
  </div>
  <div class="form-group <?=(isset($errores['Contrasena']))?'has-error':''?>">
    <label for="Contrasena">Password</label>
    <input required type="password" class="form-control" id="Contrasena" name="Contrasena"  placeholder="Ingrese su Contraseña">
  <?php if(isset($errores['Contrasena'])): ?>
  <p class="help-block"><?=$errores['Contrasena']?></p>
  <?php endif; ?>
  </div>
  <input type="hidden" name="token" value="<?=Token::generate()?>">
  <button type="submit" class="btn btn-primary btn-block">>Entrar</button>
</form>
</div>
</body>
<?=HTML::style('css/bootstrap.min.js')?>
</html>