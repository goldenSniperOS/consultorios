<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Bienvenido a Clinica</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/style.css')?>
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
						<li><a href="<?=URL::to('admin/index')?>" class="active"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
						<li><a href="<?=URL::to('pacientes/index')?>" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="<?=URL::to('consultas/index')?>" ><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
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
					ADMINISTRACIÓN
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<ul class="list-group">
					  <li class="list-group-item active">Ultimos Pacientes registrados</li>
					  <li class="list-group-item">
						  <div class="bs-example" data-example-id="striped-table">
						    <table class="table table-striped">
						      <thead>
						        <tr>
						          <th>#</th>
						          <th>NOMBRE</th>
						          <th>TELEFONO</th>
						        </tr>
						      </thead>
						      <tbody>
						      	<?php if($pacientes): ?>
						        <?php for ($i=1;$i<=count($pacientes);$i++): ?>
						        <tr>
						          <th scope="row"><?=$i?></th>
						          <td><span class="glyphicon glyphicon-user"></span> <?=$pacientes[$i-1]->Nombre?></td>
						          <td><?=$pacientes[$i-1]->Telefono?></td>
						        </tr>
						    	<?php endfor; ?>
						    	<?php endif; ?>	        
						      </tbody>
						    </table>
						  </div>
					  </li>
					</ul>
				</div>
				<div class="col-xs-6">
					<ul class="list-group">
					  <li class="list-group-item active">Citas Mas Cercanas</li>
					  <li class="list-group-item">
						  <div class="bs-example" data-example-id="striped-table">
						    <table class="table table-striped">
						      <thead>
						        <tr>
						          <th>#</th>
						          <th>PACIENTE</th>
						          <th>FECHA</th>
						        </tr>
						      </thead>
						      <tbody>
						        <?php if($citas): ?>
						        <?php for ($i=1;$i<=count($citas);$i++): ?>
						        <tr>
						          <th scope="row"><?=$i?></th>
						          <td><span class="glyphicon glyphicon-user"></span> <?=$citas[$i-1]->Paciente?></td>
						          <td><?=date('d/m/Y',strtotime(str_replace('/', '.', $citas[$i-1]->Fecha)))?></td>
						        </tr>
						    	<?php endfor; ?>
						    	<?php endif; ?>
						      </tbody>
						    </table>
						  </div>
					  </li>
					</ul>
				</div>			
			</div>
			</div>
		</row>
	</div>
</body>
</html>