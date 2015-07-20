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
						<li><a href="admin.php" class="active"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
						<li><a href="pacientes.php" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
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
						        <tr>
						          <th scope="row">1</th>
						          <td><span class="glyphicon glyphicon-user"></span> Mark</td>
						          <td>235-45621</td>
						        </tr>
						        <tr>
						          <th scope="row">2</th>
						          <td><span class="glyphicon glyphicon-user"></span> Mark</td>
						          <td>235-45621</td>
						        </tr>
						        <tr>
						          <th scope="row">3</th>
						          <td><span class="glyphicon glyphicon-user"></span> Mark</td>
						          <td>235-45621</td>
						        </tr>				        
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
						        <tr>
						          <th scope="row">1</th>
						          <td>Mark</td>
						          <td>10/08/1994</td>
						        </tr>
						        <tr>
						          <th scope="row">2</th>
						          <td>Jacob</td>
						          <td>10/08/1994</td>
						        </tr>
						        <tr>
						          <th scope="row">3</th>
						          <td>Larry</td>
						          <td>10/08/1994</td>
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
</body>
</html>