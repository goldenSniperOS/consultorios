<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Consultorio</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container-fluid no-padding">
		<row>
			<div class="top">
			<div class="col-xs-2 logo"><span>Clinica</span></div>
			<div class="col-xs-10 topbar">
				<div class="pull-right">
					<span>Fecha:<?=date('d/M/Y',time())?></span>
					<a href="#" class="btn btn-lg btn-danger">Salir</a>
				</div>	
			</div>
			</div>
		</row>
		<row>
			<div class="col-xs-2 navegador">
				<img src="img/user.png" alt="">
				<nav>
					<ul>
						<li><a href="<?=URL::to('admin/index')?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
						<li><a href="<?=URL::to('pacientes/index')?>" class="active"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="<?=URL::to('consultas/index')?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
						<li><a href="<?=URL::to('citas/index')?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a href="<?=URL::to('usuarios/index')?>">Usuarios</a></li>
						        <li><a href="<?=URL::to('cargos/index')?>">Cargos</a></li>
						        <li><a href="<?=URL::to('consultorios/index')?>">Consultorios</a></li>
						     </ul>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-xs-10 contenido well">
			<div class="alert alert-info">
				<h3 class="text-center">
					HISTORIAL MEDICO Osea que onda e.e
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-2 col-xs-offset-5">
					<a href="#" class="btn btn-lg btn-default center-block"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
				</div>			
			</div>
			<div class="row">
				<div class="col-xs-3"><p class="text-center"><strong>MEDICINA GENERAL</strong></p><img class="img-centered" src="img/logo.png" align="center"></div>
				<div class="col-xs-4 detail-logueo">
				<div class="col-xs-12 bloque"><p><strong>FECHA:</strong>&nbsp;<?=date('d/M/Y',time())?> | <strong>HORA: </strong>&nbsp;<?=date('H:i',time())?></p></div>
				<div class="col-xs-12 bloque"><p><strong>USUARIO: </strong>ADMIN</p></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 detail-click">
				<p><strong>CONSULTORIO MEDICO ORIENTAL</strong></p>
				<p><strong>PACIENTE: </strong> VERÓNICA DEL CARMEN</p>
				<p><strong>DIRECCION: </strong> DIRECCION DE MI CASA</p>
				<p><strong>TELEFONO: </strong> 2154632-5313515</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="bs-example" data-example-id="striped-table">
						    <table class="table table-striped table-bordered">
						      <thead>
						        <tr>
						          <th>FECHA</th>
						          <th>DIAGNOSTICO</th>
						          <th>MEDICO</th>
						          <th></th>
						        </tr>
						      </thead>
						      <tbody>
						        <tr>
						          <td class="col-xs-2"><span class="glyphicon glyphicon-user"></span> Mark</td>
						          <td class="col-xs-7">235-45621</td>
						          <td class="col-xs-2">ADMIN</td>
						          <td class="col-xs-1"><a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-print"></span></a></td>
						        </tr>
						        <tr>
						          <td class="col-xs-2"><span class="glyphicon glyphicon-user"></span> Mark</td>
						          <td class="col-xs-7">235-45621</td>
						          <td class="col-xs-2">ADMIN</td>
						          <td class="col-xs-1"><a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-print"></span></a></td>
						        </tr>
						        <tr>
						          <td class="col-xs-2"><span class="glyphicon glyphicon-user"></span> Mark</td>
						          <td class="col-xs-7">235-45621</td>
						          <td class="col-xs-2">ADMIN</td>
						          <td class="col-xs-1"><a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-print"></span></a></td>
						        </tr>				        
						      </tbody>
						    </table>
						  </div>
				</div>
			</div>
			</div>
		</row>
	</div>
</body>
</html>