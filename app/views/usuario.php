<?php
if(Session::exists('errores')){
	$errores = Session::flash('errores');
}

if(Session::exists('erroresedit')){
	$erroresedit = Session::flash('erroresedit');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Consultorio</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/style.css')?>
	<?=HTML::script('js/jquery-1.11.3.min.js')?>
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
						<li><a href="<?=URL::to('pacientes/index')?>" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li>
						<li><a href="<?=URL::to('consultas/index')?>" ><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li>
						<li><a href="<?=URL::to('citas/index')?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li class="open"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a class="active" href="<?=URL::to('usuarios/index')?>">Usuarios</a></li>
						        <li><a  href="<?=URL::to('cargos/index')?>">Cargos</a></li>
						        <li><a href="<?=URL::to('consultorios/index')?>">Consultorios</a></li>
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
			<?php if($cargos && $consultorios): ?>
			<div class="pull-right">
				<a href="#" class="btn btn-success nuevo"data-toggle="modal" data-target="#formPaciente">+</a>
			</div>
			<?php endif; ?>
			<!-- Modal -->
			<div class="modal fade" id="formPaciente" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('usuarios/registrarusuario')?>" method="POST">
			    <?php echo (isset($errores['Documento'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['NombreCompleto'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Consultorio'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Cargo'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Contrasena'])) ? '<script>$(document).ready(function(){$("#formPaciente").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nuevo Usuario</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Documento']))?'has-error':''?>">
								<label for="Documento">Documento</label>
								<input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese su Documento">
								<?php if(isset($errores['Documento'])): ?>
								<p class="help-block"><?=$errores['Documento']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Cargo']))?'has-error':''?>">
								<label for="Cargo">Tipo de Usuario</label>
								<?php if($cargos): ?>
								<select class="form-control" id="Cargo" name="Cargo">
								<?php foreach ($cargos as $cargo): ?>Cargo
									<option value="<?=$cargo->id?>"><?=$cargo->Nombre?></option>			
								<?php endforeach; ?>
								</select>
								<?php endif; ?>
								<?php if(isset($errores['Cargo'])): ?>
								<p class="help-block"><?=$errores['Cargo']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Nombre']))?'has-error':''?>">
								<label for="Nombre">Nombre Completo</label>
								<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese su Nombre">
								<?php if(isset($errores['Nombre'])): ?>
								<p class="help-block"><?=$errores['Nombre']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Consultorio']))?'has-error':''?>">
								<label for="Consultorio">Consultorio</label>
								<?php if($consultorios): ?>
								<select class="form-control" id="Consultorio" name="Consultorio">
									<?php foreach ($consultorios as $consultorio): ?>
									<option value="<?=$consultorio->id?>"><?=$consultorio->Nombre?></option>
									<?php endforeach; ?>									
								</select>
					        	<?php endif; ?>
					        	<?php if(isset($errores['Consultorio'])): ?>
								<p class="help-block"><?=$errores['Consultorio']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Contrasena']))?'has-error':''?>">
								<label for="Contrasena">Contrasena</label>
								<input type="password" class="form-control" id="Contrasena" name="Contrasena" placeholder="Ingrese su Contraseña">
								<?php if(isset($errores['Contrasena'])): ?>
								<p class="help-block"><?=$errores['Contrasena']?></p>
                                <?php endif; ?>
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
			<div class="modal fade" id="formPacienteEdit" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('usuarios/editarconsultorio')?>" method="POST">
			    <?php echo (isset($erroresedit['Documento'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['NombreCompleto'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Consultorio'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Cargo'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Contrasena'])) ? '<script>$(document).ready(function(){$("#formPacienteEdit").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Editar Usuario</h4>
			      </div>
				      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Documento']))?'has-error':''?>">
								<label for="Documento">Documento</label>
								<input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese su Documento">
								<?php if(isset($erroresedit['Documento'])): ?>
								<p class="help-block"><?=$erroresedit['Documento']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Cargo']))?'has-error':''?>">
								<label for="Cargo">Tipo de Usuario</label>
								<?php if($cargos): ?>
								<select class="form-control" id="Cargo" name="Cargo">
									<?php foreach ($cargos as $cargo): ?>
									<option value="<?=$cargo->id?>"><?=$cargo->Nombre?></option>			
									<?php endforeach; ?>
								</select>
								<?php endif; ?>
								<?php if(isset($erroresedit['Cargo'])): ?>
								<p class="help-block"><?=$erroresedit['Cargo']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Nombre']))?'has-error':''?>">
								<label for="Nombre">Nombre Completo</label>
								<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese su Nombre">
								<?php if(isset($erroresedit['Nombre'])): ?>
								<p class="help-block"><?=$erroresedit['Nombre']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Consultorio']))?'has-error':''?>">
								<label for="Consultorio">Consultorio</label>
								<?php if($consultorios): ?>
								<select class="form-control" id="Consultorio" name="Consultorio">
									<?php foreach ($consultorios as $consultorio): ?>
									<option value="<?=$consultorio->id?>"><?=$consultorio->Nombre?></option>
									<?php endforeach; ?>									
								</select>
					        	<?php endif; ?>
					        	<?php if(isset($erroresedit['Consultorio'])): ?>
								<p class="help-block"><?=$erroresedit['Consultorio']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Contrasena']))?'has-error':''?>">
								<label for="Contrasena">Contrasena</label>
								<input type="password" class="form-control" id="Contrasena" name="Contrasena" placeholder="Ingrese su Contraseña">
								<?php if(isset($erroresedit['Contrasena'])): ?>
								<p class="help-block"><?=$erroresedit['Contrasena']?></p>
                                <?php endif; ?>
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
						        	<?php if($usuarios): ?>
						        	<?php foreach ($usuarios as $usuario): ?>
						            <tr>
						                <td><?=$usuario->Documento?></td>
						                <td><?=$usuario->NombreCompleto?></td>
						                <td><?=$usuario->Cargo?></td>
						                <td><?=($usuario->Activo == 'SI')?'<p class="label label-success">Activo</p>':'<p class="label label-danger">Inactivo</p>'?></td>
						                <td>
					                	<!-- Split button -->
										<div class="btn-group">
										  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
										  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    <span class="caret"></span>
										    <span class="sr-only">Toggle Dropdown</span>
										  </button>
										  <ul class="dropdown-menu">
										  	<li><a id="<?=$usuario->id?>" class="editar" href="#" data-toggle="modal" data-target="#formPacienteEdit"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
										  	<li><a href="<?=URL::to('usuarios/habilitar/'.$usuario->id)?>"><span class="glyphicon glyphicon-check"></span> Habilitar</a></li>
											<li><a href="<?=URL::to('usuarios/inhabilitar/'.$usuario->id)?>"><span class="glyphicon glyphicon-remove-circle"></span> Inhabilitar</a></li>
										    <li><a href="<?=URL::to('usuarios/eliminar/'.$usuario->id)?>" class="eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
										  </ul>
										</div>
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
	<?=HTML::script('js/bootstrap.min.js')?>
	<script>
	$('.editar').on('click',function(e){
		e.preventDefault();
		$.ajax({
			method:'post',
			url:'<?=URL::to("usuarios/editarusuarioajax")?>',
			dataType:'json',
			data:{
				id:$(this).attr('id')
			},
			success: function(response){
				$('#formPacienteEdit [name=Documento]').val(response.Documento);
				$('#formPacienteEdit [name=Nombre]').val(response.NombreCompleto);
				$('#formPacienteEdit [name=Consultorio]').val(response.Consultorio);
				$('#formPacienteEdit [name=Cargo]').val(response.Cargo);
				$('#formPacienteEdit [name=Contrasena]').val(response.Contrasena);
				$('#formPacienteEdit [name=id]').val(response.id);
			},
			error: function(){
				console.log('Fracaso');
			}
		})
	});
	$(document).ready(function(){
		$('.eliminar').on('click',function(e){
			e.preventDefault();
			if(confirm('¿Desea Eliminar el Usuario?')){
				window.location = $(this).attr('href');
			}
		});
	});
	</script>
</body>
</html>