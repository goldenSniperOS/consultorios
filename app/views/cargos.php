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
						<li><a href="admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
						<li><a href="pacientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="consultamedica.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
						<li><a href="citamedica.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li class="open"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a href="usuarios.php">Usuarios</a></li>
						        <li><a  class="active" href="<?=URL::to('cargos/index')?>">Cargos</a></li>
						        <li ><a href="<?=URL::to('consultorios/index')?>" >Consultorios</a></li>
						     </ul>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-xs-10 contenido well">
			<div class="alert alert-info">
				<h3 class="text-center">
					CARGOS
				</h3>
			</div>
			<div class="pull-right">
				<a href="#" class="btn btn-success nuevo"data-toggle="modal" data-target="#formCargo">+</a>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="formCargo" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nueva Consulta</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-12">
			            	<div class="form-group">
								<label for="NombreCargo">Nombre del Cargo</label>
								<input type="text" name="NombreCargo" id="NombreCargo" class="form-control">
							</div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Guardar</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- Modal -->
			<div class="modal fade" id="formCargo" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nueva Consulta</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-12">
			            	<div class="form-group">
								<label for="NombreCargo">Nombre del Cargo</label>
								<input type="text" name="NombreCargo" id="NombreCargo" class="form-control">
							</div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Guardar</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<div class="row">
				<div class="col-xs-12">
					<ul class="list-group">
					  <li class="list-group-item active">LISTADO DE CARGOS</li>
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
					                <td>Medico</td>
					                <td>
				                	<!-- Split button -->
									<div class="btn-group">
									  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
									  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="caret"></span>
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
									    <li><a href="#"><span class="glyphicon glyphicon-check"></span> Eliminar</a></li>
									  </ul>
									</div>
									<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-book"></span> Permisos</button>
					                </td>
					            </tr>
					            <tr>
					                <td>Administrador</td>
					                <td>
				                	<!-- Split button -->
									<div class="btn-group">
									  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
									  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="caret"></span>
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
									    <li><a href="#"><span class="glyphicon glyphicon-check"></span> Eliminar</a></li>
									  </ul>
									</div>
									<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-book"></span> Permisos</button>
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