<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Cargos</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/style.css')?>
	<?=HTML::style('css/jquery.dataTables.min.css')?>
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
				<?=HTML::image('img/user.png')?>
				<nav>
					<ul>
						<li><a href="<?=URL::to('admin/index')?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
						<li><a href="<?=URL::to('pacientes/index')?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="<?=URL::to('consultas/index')?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
						<li><a href="<?=URL::to('citas/index')?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li class="open"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a href="<?=URL::to('usuarios/index')?>">Usuarios</a></li>
						        <li><a href="<?=URL::to('cargos/index')?>" class="active">Cargos</a></li>
						        <li><a href="<?=URL::to('consultorios/index')?>">Consultorios</a></li>
						     </ul>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-xs-10 contenido well">
			<div class="alert alert-info">
				<h3 class="text-center">
					PERMISOS DEL CARGO : <?=$cargo->Nombre?>
				</h3>
			</div>
			<div class="pull-left">
				<a href="<?=URL::to('cargos/index')?>" class="btn btn-success nuevo"><span class="glyphicon glyphicon-arrow-left"></span></a>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<ul class="list-group">
					  <li class="list-group-item active">ULTIMAS CONSULTAS</li>
					  <li class="list-group-item">
					    <table class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>NOMBRE</th>
					                <th>ACCIONES</th>
					            </tr>
					        </thead>		 				 
					        <tbody>
					            <tr>
					                <td>Administracion</td>
					                <td>
									<a href="<?=(json_decode($cargo->Permisos)->admin)?(URL::to('cargos/inhabilitarpermiso/admin/'.$cargo->id)):(URL::to('cargos/habilitarpermiso/admin/'.$cargo->id))?>" class="btn btn-<?=(json_decode($cargo->Permisos)->admin)?'success':'danger'?> administracion"><?=(json_decode($cargo->Permisos)->admin)?'Activo':'No Activo'?></button>
					                </td>
					            </tr>
					            <tr>
					                <td>Crear Citas</td>
					                <td>
									<a href="<?=(json_decode($cargo->Permisos)->citas)?URL::to('cargos/inhabilitarpermiso/citas/'.$cargo->id):URL::to('cargos/habilitarpermiso/citas/'.$cargo->id)?>" class="btn btn-<?=(json_decode($cargo->Permisos)->citas)?'success':'danger'?> citas"><?=(json_decode($cargo->Permisos)->citas)?'Activo':'No Activo'?></button>
					                </td>
					            </tr>
					            <tr>
					                <td>Crear Consultas</td>
					                <td>
									<a href="<?=(json_decode($cargo->Permisos)->consultas)?URL::to('cargos/inhabilitarpermiso/consultas/'.$cargo->id):URL::to('cargos/habilitarpermiso/consultas/'.$cargo->id)?>" class="btn btn-<?=(json_decode($cargo->Permisos)->consultas)?'success':'danger'?> consultas"><?=(json_decode($cargo->Permisos)->consultas)?'Activo':'No Activo'?></button>
					                </td>
					            </tr>
					            <tr>
					                <td>Crear Pacientes</td>
					                <td>
									<a href="<?=(json_decode($cargo->Permisos)->pacientes)?URL::to('cargos/inhabilitarpermiso/pacientes/'.$cargo->id):URL::to('cargos/habilitarpermiso/pacientes/'.$cargo->id)?>" class="btn btn-<?=(json_decode($cargo->Permisos)->pacientes)?'success':'danger'?> pacientes"><?=(json_decode($cargo->Permisos)->pacientes)?'Activo':'No Activo'?></button>
					                </td>
					            </tr>					            
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
	<?=HTML::script('js/jquery-1.11.3.min.js')?>
	<?=HTML::script('js/jquery.dataTables.min.js')?>
	<?=HTML::script('js/bootstrap.min.js')?>
</body>
</html>