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
						<li><a href="pacientes.php" class="active"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="consultamedica.php" ><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
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
					PACIENTES
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
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nuevo Paciente</h4>
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
								<label for="Telefono">Telefono</label>
								<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese su Telefono">
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Nombre">Nombre</label>
								<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese su Nombre">
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Edad">Edad</label>
								<input type="text" class="form-control" id="Edad" name="Edad" placeholder="Ingrese su Edad">
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Direccion">Direccion</label>
								<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Ingrese su Direccion">
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Sexo">Sexo</label>
								<select name="Sexo" class="form-control" id="Sexo">
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Departamento">Departamento</label>
								<select name="Departamento" class="form-control" id="Departamento">
									<option value="Ninguno">-- SELECCIONE --</option>
								</select>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Email">Email</label>
								<input type="email" class="form-control" id="Email" name="Email" placeholder="Ingrese su Email">
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Municipio">Municipio</label>
								<select name="Municipio" class="form-control" id="Departamento">
									<option value="Ninguno">-- SELECCIONE --</option>
								</select>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Estado">Estado</label>
								<select name="Estado" class="form-control" id="Estado">
									<option value="Activo">Activo</option>
									<option value="Inactivo">Inactivo</option>
								</select>
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
					  <li class="list-group-item active">LISTADO</li>
					  <li class="list-group-item">
						  <div class="bs-example" data-example-id="striped-table">
						    <table id="example" class="display" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>NOMBRE</th>
						                <th>DIRECCION</th>
						                <th>TELEFONO</th>
						                <th>OPERACIONES</th>
						            </tr>
						        </thead>		 				 
						        <tbody>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Tiger Nixon</td>
						                <td>System Architect</td>
						                <td>Edinburgh</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
						                </td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Garrett Winters</td>
						                <td>Accountant</td>
						                <td>Tokyo</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Ashton Cox</td>
						                <td>Junior Technical Author</td>
						                <td>San Francisco</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Cedric Kelly</td>
						                <td>Senior Javascript Developer</td>
						                <td>Edinburgh</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Airi Satou</td>
						                <td>Accountant</td>
						                <td>Tokyo</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Brielle Williamson</td>
						                <td>Integration Specialist</td>
						                <td>New York</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Herrod Chandler</td>
						                <td>Sales Assistant</td>
						                <td>San Francisco</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Rhona Davidson</td>
						                <td>Integration Specialist</td>
						                <td>Tokyo</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Colleen Hurst</td>
						                <td>Javascript Developer</td>
						                <td>San Francisco</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
										</td>
						            </tr>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> Sonya Frost</td>
						                <td>Software Engineer</td>
						                <td>Edinburgh</td>
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
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
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