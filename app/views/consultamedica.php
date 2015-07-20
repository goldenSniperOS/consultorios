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
						<li><a href="pacientes.php" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="consultamedica.php" class="active"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
						<li><a href="citamedica.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a href="usuarios.php">Usuarios</a></li>
						        <li><a href="cargos.php">Cargos</a></li>
						        <li ><a href="consultorio.php" >Consultorios</a></li>
						     </ul>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-xs-10 contenido well">
			<div class="alert alert-info">
				<h3 class="text-center">
					CONSULTAS MEDICAS
				</h3>
			</div>
			<div class="pull-right">
				<a href="#" class="btn btn-success nuevo"data-toggle="modal" data-target="#formConsulta">+</a>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="formConsulta" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nueva Consulta</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Paciente">Paciente</label>
								<select name="Paciente" id="Paciente" class="form-control">
								</select>
							</div>
							<div class="form-group">
								<label for="Sintomas">Sintomas</label>
								<textarea type="text" class="form-control" id="Sintomas" name="Sintomas" placeholder="Ingrese su Sintomas"></textarea>
							</div>
							<div class="form-group">
								<label for="Diagnostico">Diagnostico</label>
								<textarea type="text" class="form-control" id="Diagnostico" name="Diagnostico" placeholder="Ingrese su Diagnostico"></textarea>
							</div>

			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Tratamiento">Tratamiento</label>
								<textarea type="text" class="form-control" id="Tratamiento" name="Tratamiento" placeholder="Ingrese su Tratamiento"></textarea>
							</div>
							<div class="form-group">
								<label for="Receta">Receta</label>
								<textarea type="text" class="form-control" id="Receta" name="Receta" placeholder="Ingrese su Receta"></textarea>
							</div>
							<div class="form-group">
								<label for="Observaciones">Observaciones</label>
								<textarea type="text" class="form-control" id="Observaciones" name="Observaciones" placeholder="Ingrese su Observaciones"></textarea>
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
					  <li class="list-group-item active">ULTIMAS CONSULTAS</li>
					  <li class="list-group-item">
					    <table class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>#</th>
					                <th>PACIENTE</th>
					                <th>FECHA</th>
					                <th>MEDICO</th>
					                <th>OPERACIONES</th>
					            </tr>
					        </thead>		 				 
					        <tbody>
					            <tr>
					            	<th scope="row">1</th>
					                <td><span class="glyphicon glyphicon-user"></span> Adrian Ruiz</td>
					                <td>10/JUN/2015</td>
					                <td>Medico Jose</td>
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
									<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span></button>
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
</body>
</html>