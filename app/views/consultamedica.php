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
						<?php if(Auth::hasPermission('pacientes')): ?><li><a href="<?=URL::to('pacientes/index')?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li><?php endif; ?>
						<?php if(Auth::hasPermission('consultas')): ?><li><a href="<?=URL::to('consultas/index')?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li><?php endif; ?>
						<?php if(Auth::hasPermission('citas')): ?><li><a href="<?=URL::to('citas/index')?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li><?php endif; ?>
						<li><a href="<?=URL::to('admin/estadisticas')?>"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<?php if(Auth::hasPermission('admin')): ?>
						<li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a href="<?=URL::to('usuarios/index')?>">Usuarios</a></li>
						        <li><a href="<?=URL::to('cargos/index')?>">Cargos</a></li>
						        <li><a href="<?=URL::to('consultorios/index')?>">Consultorios</a></li>
						     </ul>
						</li>
						<?php endif; ?>
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
			    <form action="<?=URL::to('consultas/registrarconsulta')?>" method="POST">
			    <?php echo (isset($errores['Sintomas'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Diagnostico'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Receta'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Observaciones'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Tratamiento'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
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
								<?php if($pacientes): ?>
								<select name="Paciente" id="Paciente" class="form-control">
								<?php if($pacientes): ?>
								<?php foreach ($pacientes as $paciente):?>
									<option value="<?=$paciente->id?>"><?=$paciente->Nombre?></option>
								<?php endforeach; ?>
								<?php endif; ?>
								</select>
								<?php endif; ?>
							</div>
							<div class="form-group <?=(isset($errores['Sintomas']))?'has-error':''?>">
								<label for="Sintomas ">Sintomas</label>
								<textarea required type="text" class="form-control" id="Sintomas" name="Sintomas" placeholder="Ingrese su Sintomas"></textarea>
								<?php if(isset($errores['Sintomas'])): ?>
								<p class="help-block"><?=$errores['Sintomas']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($errores['Diagnostico']))?'has-error':''?>">
								<label for="Diagnostico">Diagnostico</label>
								<textarea required type="text" class="form-control" id="Diagnostico" name="Diagnostico" placeholder="Ingrese su Diagnostico"></textarea>
								<?php if(isset($errores['Diagnostico'])): ?>
								<p class="help-block"><?=$errores['Diagnostico']?></p>
                                <?php endif; ?>
							</div>

			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Tratamiento']))?'has-error':''?>">
								<label for="Tratamiento">Tratamiento</label>
								<textarea required type="text" class="form-control" id="Tratamiento" name="Tratamiento" placeholder="Ingrese su Tratamiento"></textarea>
								<?php if(isset($errores['Tratamiento'])): ?>
								<p class="help-block"><?=$errores['Tratamiento']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($errores['Receta']))?'has-error':''?>">
								<label for="Receta">Receta</label>
								<textarea required type="text" class="form-control" id="Receta" name="Receta" placeholder="Ingrese su Receta"></textarea>
								<?php if(isset($errores['Receta'])): ?>
								<p class="help-block"><?=$errores['Receta']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($errores['Observaciones']))?'has-error':''?>">
								<label for="Observaciones">Observaciones</label>
								<textarea required type="text" class="form-control" id="Observaciones" name="Observaciones" placeholder="Ingrese su Observaciones"></textarea>
								<?php if(isset($errores['Observaciones'])): ?>
								<p class="help-block"><?=$errores['Observaciones']?></p>
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
			<!-- Modal -->
			<div class="modal fade" id="formConsultaEdit" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('consultas/editarconsulta')?>" method="POST">
			    <?php echo (isset($erroresedit['Sintomas'])) ? '<script>$(document).ready(function(){$("#formConsultaEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Diagnostico'])) ? '<script>$(document).ready(function(){$("#formConsultaEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Receta'])) ? '<script>$(document).ready(function(){$("#formConsultaEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Observaciones'])) ? '<script>$(document).ready(function(){$("#formConsultaEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Tratamiento'])) ? '<script>$(document).ready(function(){$("#formConsultaEdit").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Editar Consulta</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Paciente">Paciente</label>
								<?php if($pacientes): ?>
								<select name="Paciente" id="Paciente" class="form-control">
								<?php foreach ($pacientes as $paciente):?>
									<option value="<?=$paciente->id?>"><?=$paciente->Nombre?></option>
								<?php endforeach; ?>
								</select>
								<?php endif; ?>
							</div>
							<div class="form-group <?=(isset($erroresedit['Sintomas']))?'has-error':''?>">
								<label for="Sintomas">Sintomas</label>
								<textarea required type="text" class="form-control" id="Sintomas" name="Sintomas" placeholder="Ingrese su Sintomas"></textarea>
								<?php if(isset($erroresedit['Sintomas'])): ?>
								<p class="help-block"><?=$erroresedit['Sintomas']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($erroresedit['Diagnostico']))?'has-error':''?>">
								<label for="Diagnostico">Diagnostico</label>
								<textarea required type="text" class="form-control" id="Diagnostico" name="Diagnostico" placeholder="Ingrese su Diagnostico"></textarea>
								<?php if(isset($erroresedit['Diagnostico'])): ?>
								<p class="help-block"><?=$erroresedit['Diagnostico']?></p>
                                <?php endif; ?>
							</div>

			            </div>
			            <div class="col-md-6">
			            	<div class="form-group  <?=(isset($erroresedit['Tratamiento']))?'has-error':''?>">
								<label for="Tratamiento">Tratamiento</label>
								<textarea required type="text" class="form-control" id="Tratamiento" name="Tratamiento" placeholder="Ingrese su Tratamiento"></textarea>
								<?php if(isset($erroresedit['Tratamiento'])): ?>
								<p class="help-block"><?=$erroresedit['Tratamiento']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($erroresedit['Receta']))?'has-error':''?>">
								<label for="Receta">Receta</label>
								<textarea required type="text" class="form-control" id="Receta" name="Receta" placeholder="Ingrese su Receta"></textarea>
								<?php if(isset($erroresedit['Receta'])): ?>
								<p class="help-block"><?=$erroresedit['Receta']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($erroresedit['Observaciones']))?'has-error':''?>">
								<label for="Observaciones">Observaciones</label>
								<textarea required type="text" class="form-control" id="Observaciones" name="Observaciones" placeholder="Ingrese su Observaciones"></textarea>
								<?php if(isset($erroresedit['Observaciones'])): ?>
								<p class="help-block"><?=$erroresedit['Observaciones']?></p>
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
					  <li class="list-group-item active">ULTIMAS CONSULTAS</li>
					  <li class="list-group-item">
					    <table class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>#</th>
					                <th>PACIENTE</th>
					                <th>FECHA Y HORA DE ATENCION</th>
					                <th>MEDICO</th>
					                <th>DIAGNOSTICO</th>
					                <th>OPERACIONES</th>
					            </tr>
					        </thead>		 				 
					        <tbody>
					        	<?php if($consultas): ?>
						        	<?php foreach ($consultas as $consulta): ?>
						            <tr>
						                <td><?=$consulta->id?></td>
						                <td>
						                	<?php 
						                		foreach ($pacientes as $paciente) {
						                		if ($consulta->Paciente == $paciente->id) {
						                				echo "$paciente->Nombre";
						                			}	
						                		}
						                	?>
						                </td>
						                <td><?=date('d/m/Y h:i A',strtotime(str_replace('/', '.', $consulta->Fecha)))?></td>
						                <td>
						                	<?=$consulta->Medico?>
						                </td>
						                <td><?=$consulta->Diagnostico?></td>
						                <td>
					                	<!-- Split button -->
										<div class="btn-group">
										  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
										  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    <span class="caret"></span>
										    <span class="sr-only">Toggle Dropdown</span>
										  </button>
										  <ul class="dropdown-menu">
										  	<li><a id="<?=$consulta->id?>" class="editar" href="#" data-toggle="modal" data-target="#formConsultaEdit"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
										    <li><a href="<?=URL::to('consultas/eliminar/'.$consulta->id)?>" class="eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
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
	<?=HTML::script('js/jquery.dataTables.min.js')?>
	<?=HTML::script('js/bootstrap.min.js')?>
	<script>
	$(document).ready(function(){
		    $('#example').DataTable();
		});

	function formatDate (input) {
	  var datePart = input.split("-"),
	  year = datePart[0], // get only two digits
	  month = datePart[1], day = datePart[2];

	  return day+'/'+month+'/'+year;
	}
	
	$('.editar').on('click',function(e){
		e.preventDefault();
		$.ajax({
			method:'post',
			url:'<?=URL::to("consultas/editarconsutaajax")?>',
			dataType:'json',
			data:{
				id:$(this).attr('id')
			},
			success: function(response){
				console.log(response);
				$('#formConsultaEdit [name=Paciente]').val(response.Paciente);
				$('#formConsultaEdit [name=Sintomas]').val(response.Sintomas);
				$('#formConsultaEdit [name=Diagnostico]').val(response.Diagnostico);
				$('#formConsultaEdit [name=Receta]').val(response.Receta);
				$('#formConsultaEdit [name=Observaciones]').val(response.Observacion);
				$('#formConsultaEdit [name=Tratamiento]').val(response.Tratamiento);
				$('#formConsultaEdit [name=id]').val(response.id);
			},
			error: function(){
				console.log('Fracaso');
			}
		})
	});
	$(document).ready(function(){
		$('.eliminar').on('click',function(e){
			e.preventDefault();
			if(confirm('¿Desea Eliminar el Consulta?')){
				window.location = $(this).attr('href');
			}
		});
	});
	</script>
</body>
</html>