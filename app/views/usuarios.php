<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Consultorio</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
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
						<li><a href="admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
						<li><a href="pacientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="consultamedica.php" ><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
						<li><a href="citamedica.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li class="open"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a class="active" href="usuarios.php">Usuarios</a></li>
						        <li><a  href="cargos.php">Cargos</a></li>
						        <li ><a href="consultorio.php" >Consultorios</a></li>
						     </ul>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-xs-10 contenido well">
			<div class="alert alert-info">
				<h3 class="text-center">
					USUARIOS
				</h3>
			</div>
			<div class="pull-right">
				<a href="#" class="btn btn-success nuevo"data-toggle="modal" data-target="#formPaciente">+</a>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="formPaciente" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nuevo Usuario</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Documento">Documento</label>
								<input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese su Documento">
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Cargo">Tipo de Usuario</label>
								<select class="form-control" id="Cargo" name="Cargo">
									<option value="Ninguno">--Tipo de Usuario--</option>
								</select>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Nombre">Nombre Completo</label>
								<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese su Nombre">
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Consultorio">Consultorio</label>
								<select class="form-control" id="Consultorio" name="Consultorio">
									<option value="Ninguno">--Consultorio--</option>
								</select>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Contrasena">Contrasena</label>
								<input type="password" class="form-control" id="Contrasena" name="Contrasena" placeholder="Ingrese su Contraseña">
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
					  <li class="list-group-item active">LISTADO DE USUARIOS</li>
					  <li class="list-group-item">
						  <div class="bs-example" data-example-id="striped-table">
						    <table id="example" class="display" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>DOCUMENTO</th>
						                <th>NOMBRE</th>
						                <th>CARGO</th>
						                <th>ESTADO</th>
						                <th></th>
						            </tr>
						        </thead>		 				 
						        <tbody>
						            <tr>
						                <td>11112222</td>
						                <td>Adrian Ruiz</td>
						                <td>Administrador</td>
						                <td><p class="label label-success" >Activo</p></td>
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
										    <li><a href="#"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
										  </ul>
										</div>
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
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
		    $('#example').DataTable();
		});
	</script>
</body>
</html>