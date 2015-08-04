<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Consultorio</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/jquery.dataTables.min.css')?>
	<?=HTML::style('css/style.css')?>
	<?=HTML::script('js/jquery-1.11.3.min.js')?>
</head>
<body>
	<div class="container-fluid no-padding">
		<row>
			<div class="top">
			<div class="col-xs-2 logo"><span>Clinica</span></div>
			<div class="col-xs-10 topbar">
				<div class="pull-right">
					<span>Fecha:<?=date('d/M/Y',time())?></span>
					<a href="<?=URL::to('admin/logout')?>" class="btn btn-lg btn-danger">Salir</a>
				</div>	
			</div>
			</div>
		</row>
		<row>
			<div class="col-xs-2 navegador">
				<?=HTML::image('img/user.png')?>
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
					HISTORIAL MEDICO
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-2 col-xs-offset-5">
					<a href="#" class="btn btn-lg btn-default center-block"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
				</div>			
			</div>
			<div class="row">
				<div class="col-xs-3"><p class="text-center"><strong>MEDICINA GENERAL</strong></p><?=HTML::image('img/logo.png',['align' => 'centered','class' => 'img-centered'])?></div>
				<div class="col-xs-4 detail-logueo">
				<div class="col-xs-12 bloque"><p><strong>FECHA:</strong>&nbsp;<?=date('d/M/Y',time())?> | <strong>HORA: </strong>&nbsp;<?=date('H:i',time())?></p></div>
				<div class="col-xs-12 bloque"><p><strong>USUARIO: </strong><?=Auth::get('NombreCompleto')?></p></div>
				</div>
				<div class="col-xs-4 detail-click">
				<p><strong><?=$consultorio->Nombre?></strong></p>
				<p><strong>PACIENTE: </strong> <?=$paciente->Nombre?></p>
				<p><strong>DIRECCION: </strong> <?=$paciente->Direccion?></p>
				<p><strong>TELEFONO: </strong> <?=$paciente->Telefono?></p>
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
						      <?php if($consultas): ?>
						      	<?php foreach ($consultas as $consulta): ?>
						        <tr>
						          <td class="col-xs-2"><span class="glyphicon glyphicon-user"></span> <?=date('d/m/Y h:i A',strtotime(str_replace('/', '.', $consulta->Fecha)))?></td>
						          <td class="col-xs-7"><?=$consulta->Diagnostico?></td>
						          <td class="col-xs-2"><?=$consulta->Medico?></td>
						          <td class="col-xs-1"><a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-print"></span></a></td>
						        </tr>
						    	<?php endforeach; ?>
						    	<?php endif; ?>		        
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