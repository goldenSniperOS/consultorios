<?php
if(Session::exists('errores')){
	$errores = Session::flash('errores');
}

if(Session::exists('erroresedit')){
	$erroresedit = Session::flash('erroresedit');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Paciente</title>
	<?=HTML::style('css/bootstrap.min.css')?>
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
						<li><a href="<?=URL::to('pacientes/index')?>" class="active"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="consultamedica.php" ><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
						<li><a href="citamedica.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a href="<?=URL::to('usuarios/index')?>">Usuarios</a></li>
						       	<li><a href="<?=URL::to('cargos/index')?>">Cargos</a></li>
						        <li ><a href="<?=URL::to('consultorios/index')?>" >Consultorios</a></li>
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
			      <form action="<?=URL::to('pacientes/registrarpaciente')?>" method="POST" >
			      <?php echo (isset($errores['Documento'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Telefono'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Nombre'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Edad'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Sexo'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Departamento'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Email'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Municipio'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <?php echo (isset($errores['Estado'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nuevo Paciente</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Documento']))?'has-error':''?>" >
								<label for="Documento">Documento</label>
								<input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese su Documento">
								<?php if(isset($errores['Documento'])): ?>
                                    <p class="help-block"><?=$errores['Documento']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Telefono']))?'has-error':''?>">
								<label for="Telefono">Telefono</label>
								<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese su Telefono">
								<?php if(isset($errores['Telefono'])): ?>
                                    <p class="help-block"><?=$errores['Telefono']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Nombre']))?'has-error':''?>">
								<label for="Nombre">Nombre</label>
								<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese su Nombre">
								<?php if(isset($errores['Nombre'])): ?>
                                    <p class="help-block"><?=$errores['Nombre']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Edad']))?'has-error':''?>">
								<label for="Edad">Edad</label>
								<input type="text" class="form-control" id="Edad" name="Edad" placeholder="Ingrese su Edad">
								<?php if(isset($errores['Edad'])): ?>
                                    <p class="help-block"><?=$errores['Edad']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Direccion']))?'has-error':''?>">
								<label for="Direccion">Direccion</label>
								<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Ingrese su Direccion">
								<?php if(isset($errores['Direccion'])): ?>
                                    <p class="help-block"><?=$errores['Direccion']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Sexo">Sexo</label>
								<select name="Sexo" class="form-control" id="Sexo">
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Departamento">Departamento</label>
								<select name="Departamento" class="form-control" id="Departamento" onchange="">
									<option value="0">-- SELECCIONE --</option>
									<?php foreach ($departamentos as $departamento): ?>
										<option value="<?=$departamento->idDepa?>"><?=$departamento->departamento?></option>
									<?php endforeach; ?>
								</select>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Email']))?'has-error':''?>">
								<label for="Email">Email</label>
								<input type="email" class="form-control" id="Email" name="Email" placeholder="Ingrese su Email">
								<?php if(isset($errores['Email'])): ?>
                                    <p class="help-block"><?=$errores['Email']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group ">
								<label for="Municipio">Municipio</label>
								<select name="Municipio" class="form-control" id="Municipio">
									<option value="Ninguno">-- SELECCIONE --</option>
								</select>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Estado">Estado</label>
								<select name="Estado" class="form-control" id="Estado">
									<option value="SI">Activo</option>
									<option value="NO">Inactivo</option>
								</select>
							</div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			      </div>
			    </form>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- Modal -->
			<div class="modal fade" id="formPacienteEdit" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <form action="<?=URL::to('pacientes/editarpaciente')?>" method="POST" >
			      <?php echo (isset($erroresedit['Documento'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['Telefono'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['Nombre'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['Edad'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['Sexo'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['DepartamentoEdit'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['Email'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['MunicipioEdit'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <?php echo (isset($erroresedit['Estado'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Editar Paciente</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Documento']))?'has-error':''?>" >
								<label for="Documento">Documento</label>
								<input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese su Documento">
								<?php if(isset($erroresedit['Documento'])): ?>
                                    <p class="help-block"><?=$erroresedit['Documento']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Telefono']))?'has-error':''?>">
								<label for="Telefono">Telefono</label>
								<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese su Telefono">
								<?php if(isset($erroresedit['Telefono'])): ?>
                                    <p class="help-block"><?=$erroresedit['Telefono']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Nombre']))?'has-error':''?>">
								<label for="Nombre">Nombre</label>
								<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese su Nombre">
								<?php if(isset($erroresedit['Nombre'])): ?>
                                    <p class="help-block"><?=$erroresedit['Nombre']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Edad']))?'has-error':''?>">
								<label for="Edad">Edad</label>
								<input type="text" class="form-control" id="Edad" name="Edad" placeholder="Ingrese su Edad">
								<?php if(isset($erroresedit['Edad'])): ?>
                                    <p class="help-block"><?=$erroresedit['Edad']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Direccion']))?'has-error':''?>">
								<label for="Direccion">Direccion</label>
								<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Ingrese su Direccion">
								<?php if(isset($erroresedit['Direccion'])): ?>
                                    <p class="help-block"><?=$erroresedit['Direccion']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Sexo">Sexo</label>
								<select name="Sexo" class="form-control" id="Sexo">
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="DepartamentoEdit">Departamento</label>
								<select name="DepartamentoEdit" class="form-control" id="DepartamentoEdit">
									<option value="0">-- SELECCIONE --</option>
									<?php foreach ($departamentos as $departamento): ?>
										<option value="<?=$departamento->idDepa?>"><?=$departamento->departamento?></option>
									<?php endforeach; ?>
								</select>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Email']))?'has-error':''?>">
								<label for="Email">Email</label>
								<input type="email" class="form-control" id="Email" name="Email" placeholder="Ingrese su Email">
								<?php if(isset($erroresedit['Email'])): ?>
                                    <p class="help-block"><?=$erroresedit['Email']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group ">
								<label for="MunicipioEdit">Municipio</label>
								<select name="MunicipioEdit" class="form-control" id="MunicipioEdit">
									<option value="Ninguno">-- SELECCIONE --</option>
								</select>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Estado">Estado</label>
								<select name="Estado" class="form-control" id="Estado">
									<option value="SI">Activo</option>
									<option value="NO">Inactivo</option>
								</select>
							</div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			      	<input type="hidden" name="id">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			      </div>
			    </form>
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
						        	<?php if($pacientes): ?>
						        		<?php foreach ($pacientes as $paciente): ?>
						            <tr>
						                <td><span class="glyphicon glyphicon-user"></span> <?=$paciente->Nombre?></td>
						                <td><?=$paciente->Direccion?></td>
						                <td><?=$paciente->Telefono?></td>
						                <td>
					                	<!-- Split button -->
										<div class="btn-group">
										  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
										  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    <span class="caret"></span>
										    <span class="sr-only">Toggle Dropdown</span>
										  </button>
										  <ul class="dropdown-menu">
										    <li><a id="<?=$paciente->id?>" class="editar" href="#" data-toggle="modal" data-target="#formPacienteEdit"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
										    <li><a href="<?=URL::to('pacientes/eliminar/'.$paciente->id)?>" class="eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
										  </ul>
										</div>
										<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span></button>
						                </td>
						            </tr>
						            <?php endforeach; ?>
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

	<?=HTML::script('js/jquery-1.11.3.min.js')?>
	<?=HTML::script('js/jquery.dataTables.min.js')?>
	<?=HTML::script('js/bootstrap.min.js')?>
	<script>
		$(document).ready(function(){
		    $('#example').DataTable();
		});
	</script>  
	<script>
		$('.editar').on('click',function(e){
			e.preventDefault();
			$.ajax({
				method:'post',
				url:'<?=URL::to("pacientes/editarpacienteajax")?>',
				dataType:'json',
				data:{
					id:$(this).attr('id')
				},
				success: function(response){
					$('#formPacienteEdit [name=DepartamentoEdit]').val(response.Departamento);
					$('#formPacienteEdit [name=Documento]').val(response.Documento);
					$('#formPacienteEdit [name=id]').val(response.id);
					$('#formPacienteEdit [name=Telefono]').val(response.Telefono);
					$('#formPacienteEdit [name=Nombre]').val(response.Nombre);
					$('#formPacienteEdit [name=Edad]').val(response.Edad);
					$('#formPacienteEdit [name=Sexo]').val(response.Sexo);
					$('#formPacienteEdit [name=Direccion]').val(response.Direccion);
					$('#formPacienteEdit [name=Email]').val(response.Email);
					$('#formPacienteEdit [name=Estado]').val(response.Activo);
					$('#formPacienteEdit [name=MunicipioEdit]').val(response.Municipio);
				},	
				error: function(){
					console.log('Fracaso');
				}
			})
		});

		$(document).ready(function(){
			$('.eliminar').on('click',function(e){
				e.preventDefault();
				if(confirm('¿Desea Eliminar el paciente?')){
					window.location = $(this).attr('href');
				}
			});
		});
	</script>
	<?php 
		$datos=json_encode($distritos)
	 ?>
	<script>
		$(document).ready(function(){
			$("#Departamento").change(function(){
				valor = $("#Departamento").val();

				var Distritos = eval(<?php echo $datos;?>);	
				$("#Municipio").empty();


				$.each(Distritos, function (i, Distrito) {
					if(Distrito.idDepa==valor){

						$('#Municipio').append($('<option>', { 
				        value: Distrito.idDist,
				        text : Distrito.distrito 
				    	}));
				    }
				});

			});
		});
		$(document).ready(function(){
			$("#DepartamentoEdit").change(function(){
				valor = $("#DepartamentoEdit").val();

				var Distritos = eval(<?php echo $datos;?>);	
				$("#MunicipioEdit").empty();


				$.each(Distritos, function (i, Distrito) {
					if(Distrito.idDepa==valor){

						$('#MunicipioEdit').append($('<option>', { 
				        value: Distrito.idDist,
				        text : Distrito.distrito 
				    }));

					}
				    
				});

			});
		});



	</script>

	
</body>
</html>