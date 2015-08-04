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
	<?=HTML::style('css/bootstrap-datepicker3.min.css')?>
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
						<?php if(Auth::hasPermission('pacientes')): ?><li><a href="<?=URL::to('pacientes/index')?>" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li><?php endif; ?>
						<?php if(Auth::hasPermission('consultas')): ?><li><a href="<?=URL::to('consultas/index')?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li><?php endif; ?>
						<?php if(Auth::hasPermission('citas')): ?><li><a href="<?=URL::to('citas/index')?>" class="active"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li><?php endif; ?>
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
					CITAS MEDICAS
				</h3>
			</div>
			<?php if($pacientes): ?>
			<div class="pull-right">
				<a href="#" class="btn btn-success nuevo"data-toggle="modal" data-target="#formConsulta">+</a>
			</div>
			<?php endif; ?>
			<!-- Modal -->
			<div class="modal fade" id="formConsulta" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('citas/registrarcita')?>" method="POST">
			    <?php echo (isset($errores['Fecha'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Horario'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>			    
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nueva Cita</h4>
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
									<option value="<?=$paciente->id?>"><?=$paciente->Documento?> - <?=$paciente->Nombre?></option>	
								<?php endforeach; ?>
								<?php endif; ?>
								</select>
								<?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Fecha">Fecha Proxima Cita</label>
								<input type="text" class="form-control datepicker" id="Fecha" data-date-start-date="today" data-date-format="dd/mm/yyyy" name="Fecha" value="<?=date('d/m/Y',time())?>" placeholder="Ingrese su Fecha DD/MM/AAAA">
								<?php if(isset($errores['Fecha'])): ?>
								<p class="help-block"><?=$errores['Fecha']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Horario">Horario</label>
								<select name="Horario" id="Horario" class="form-control">
								<option value="M">Mañana</option>
								<option value="T">Tarde</option>
								<option value="N">Noche</option>
								</select>
								<?php if(isset($errores['Horario'])): ?>
								<p class="help-block"><?=$errores['Horario']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	
							<div class="form-group">
								<label for="Receta">Observaciones</label>
								<textarea type="text" class="form-control" id="Receta" name="Receta" placeholder="Ingrese su Receta"></textarea>
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
			<!-- Editar -->
			<div class="modal fade" id="formCitaEdit" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('citas/editarcita')?>" method="POST">
			    <?php echo (isset($erroresedit['Fecha'])) ? '<script>$(document).ready(function(){$("#formConsultaEdit").modal({show:true})});</script>':''?>
			    <?php echo (isset($erroresedit['Horario'])) ? '<script>$(document).ready(function(){$("#formConsultaEdit").modal({show:true})});</script>':''?>			    
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Editar Cita</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
								<label for="Paciente">Paciente</label>
								<?php if($pacientes): ?>
								<select name="Paciente" id="Paciente" class="form-control">
								<?php foreach ($pacientes as $paciente): ?>Paciente
									<option value="<?=$paciente->id?>"><?=$paciente->Documento?> - <?=$paciente->Nombre?></option>			
								<?php endforeach; ?>
								</select>
								<?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Fecha']))?'has-error':''?>">
								<label for="Fecha">Fecha Proxima Cita</label>
								<input type="text" class="form-control datepicker" id="Fecha" data-date-format="dd/mm/yyyy" data-date-start-date="today" name="Fecha" placeholder="Ingrese su Fecha">
								<?php if(isset($erroresedit['Fecha'])): ?>
								<p class="help-block"><?=$erroresedit['Fecha']?></p>
                                <?php endif; ?>

							</div>
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($erroresedit['Horario']))?'has-error':''?>">
								<label for="Horario">Horario</label>
								<select name="Horario" id="Horario" class="form-control">
								<option value="M">Mañana</option>
								<option value="T">Tarde</option>
								<option value="N">Noche</option>
								</select>
								<?php if(isset($erroresedit['Horario'])): ?>
								<p class="help-block"><?=$erroresedit['Horario']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			            <div class="col-md-6">
							<div class="form-group">
								<label for="Receta">Observaciones</label>
								<textarea type="text" class="form-control" id="Receta" name="Receta" placeholder="Ingrese su Receta"></textarea>
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
			<!-- Modal -->
			<div class="modal fade" id="formReprogramarCita" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('citas/reprogramarcita')?>" method="POST">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Atender Cita</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-xs-12">
			            	<div class="form-group <?=(isset($errores['Fecha']))?'has-error':''?>">
								<label for="Fecha">Fecha Proxima Cita</label>
								<input type="text" class="form-control datepicker" id="Fecha" data-date-format="dd/mm/yyyy" data-date-start-date="today" value="<?=date('d/m/Y',time())?>" name="Fecha" placeholder="Ingrese su Fecha">
								<?php if(isset($errores['Fecha'])): ?>
								<p class="help-block"><?=$errores['Fecha']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			      	<input type="hidden" name="CodigoCita">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			      </div>
			      </form>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- Modal -->
			<!-- Modal -->
			<div class="modal fade" id="formAtenderCita" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('citas/atendercita')?>" method="POST">
			     <?php echo (isset($errores['Sintomas'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Diagnostico'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Receta'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Observaciones'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			    <?php echo (isset($errores['Tratamiento'])) ? '<script>$(document).ready(function(){$("#formConsulta").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Atender Cita</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-6">
							<input type="hidden" name="Paciente" id="Paciente">
							<div class="form-group <?=(isset($errores['Sintomas']))?'has-error':''?>">
								<label for="Sintomas ">Sintomas</label>
								<textarea type="text" class="form-control" id="Sintomas" name="Sintomas" placeholder="Ingrese su Sintomas"></textarea>
								<?php if(isset($errores['Sintomas'])): ?>
								<p class="help-block"><?=$errores['Sintomas']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($errores['Diagnostico']))?'has-error':''?>">
								<label for="Diagnostico">Diagnostico</label>
								<textarea type="text" class="form-control" id="Diagnostico" name="Diagnostico" placeholder="Ingrese su Diagnostico"></textarea>
								<?php if(isset($errores['Diagnostico'])): ?>
								<p class="help-block"><?=$errores['Diagnostico']?></p>
                                <?php endif; ?>
							</div>

			            </div>
			            <div class="col-md-6">
			            	<div class="form-group <?=(isset($errores['Tratamiento']))?'has-error':''?>">
								<label for="Tratamiento">Tratamiento</label>
								<textarea type="text" class="form-control" id="Tratamiento" name="Tratamiento" placeholder="Ingrese su Tratamiento"></textarea>
								<?php if(isset($errores['Tratamiento'])): ?>
								<p class="help-block"><?=$errores['Tratamiento']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($errores['Receta']))?'has-error':''?>">
								<label for="Receta">Receta</label>
								<textarea type="text" class="form-control" id="Receta" name="Receta" placeholder="Ingrese su Receta"></textarea>
								<?php if(isset($errores['Receta'])): ?>
								<p class="help-block"><?=$errores['Receta']?></p>
                                <?php endif; ?>
							</div>
							<div class="form-group <?=(isset($errores['Observaciones']))?'has-error':''?>">
								<label for="Observaciones">Observaciones</label>
								<textarea type="text" class="form-control" id="Observaciones" name="Observaciones" placeholder="Ingrese su Observaciones"></textarea>
								<?php if(isset($errores['Observaciones'])): ?>
								<p class="help-block"><?=$errores['Observaciones']?></p>
                                <?php endif; ?>
							</div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			      	<input type="hidden" name="CodigoCita">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			      </div>
			      </form>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- Modal -->
			<div class="row">
				<div class="col-xs-12">
					<ul class="list-group">
					  <li class="list-group-item active">ULTIMAS CITAS</li>
					  <li class="list-group-item">
					    <table class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>#</th>
					                <th>PACIENTE</th>
					                <th>FECHA PROXIMA CITA</th>
					                <th>TURNO</th>
					                <th>OBSERVACIONES</th>
					                <th>ESTADO</th>
					                <th></th>
					            </tr>
					        </thead>		 				 
					        <tbody>
					            <?php if($citas): ?>
						        	<?php $counter = 1; foreach ($citas as $cita): ?>
						            <tr>
						                <td><?=$counter?></td>
						                <td>
						                	<?php 
						                		foreach ($pacientes as $paciente) {
						                		if ($cita->Paciente == $paciente->id) {
						                				echo "$paciente->Nombre";
						                			}	
						                		}
						                	?>
						                </td>
						                <td><?=date('d/m/Y',strtotime(str_replace('/', '.', $cita->Fecha)))?></td>
						                <td>
						                	<?php 
						                	if ($cita->Horario == 'M'){
						                		echo "Mañana";
						                	}elseif ($cita->Horario == 'T') {
						                		echo "Tarde";
						                	}else{
						                		echo "Noche";
						                	}
						                	?>
						                </td>
						                <td><?=$cita->Observacion?></td>
						                <?php if($cita->Atendido == "NO" && strtotime($cita->Fecha) < time() ): ?>
						                <td><p class="btn btn-danger">Necesita Reprogramacion</p></td>
						            	<?php endif;?>
						            	<?php if($cita->Atendido == "NO" && strtotime($cita->Fecha) >= time() ): ?>
						                <td><p class="btn btn-warning">No Atendida</p></td>
						            	<?php endif;?>
						            	<?php if($cita->Atendido == "SI"): ?>
						                <td><p class="btn btn-success">Atendida</p></td>
						            	<?php endif;?>
						                <td>
					                	<!-- Split button -->
										<div class="btn-group">
										  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
										  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    <span class="caret"></span>
										    <span class="sr-only">Toggle Dropdown</span>
										  </button>
										  <ul class="dropdown-menu">
										  	<li><a id="<?=$cita->id?>" class="editar" href="#" data-toggle="modal" data-target="#formCitaEdit"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
										    <li><a href="<?=URL::to('citas/eliminar/'.$cita->id)?>" class="eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
										    
										    <?php if($cita->Atendido == "NO" && strtotime($cita->Fecha) < time() ): ?>
							                <li><a href="#" data-toggle="modal" id="<?=$cita->id?>" data-paciente="<?=$cita->Paciente?>" data-target="#formReprogramarCita" class="reprogramar"><span class="glyphicon glyphicon-book"></span> Reprogramar</a></li>
							            	<?php endif;?>
							            	<?php if($cita->Atendido == "NO" && strtotime($cita->Fecha) >= time() ): ?>
							                <li><a href="#" data-toggle="modal" id="<?=$cita->id?>" data-paciente="<?=$cita->Paciente?>" data-target="#formAtenderCita" class="atender"><span class="glyphicon glyphicon-book"></span> Atender</a></li>
							            	<?php endif;?>
							            	<?php if($cita->Atendido == "SI"): ?>
							            	<?php endif;?>
										  </ul>
										</div>
										</td>
						            </tr>
						            <?php $counter++; endforeach; ?>
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
	<?=HTML::script('js/bootstrap.min.js')?>
	<?=HTML::script('js/bootstrap-datepicker.min.js')?>
	<script>

	$('.datepicker').datepicker({
	    startDate: "today",
    	autoclose: true
	});

	$('.atender').on('click',function(e){
		e.preventDefault();
		$('#formAtenderCita input[name="CodigoCita"]').val($(this).attr('id'));
		$('#formAtenderCita input[name="Paciente"]').val($(this).data('paciente'));
	});

	$('.reprogramar').on('click',function(e){
		e.preventDefault();
		$('#formReprogramarCita input[name="CodigoCita"]').val($(this).attr('id'));
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
			url:'<?=URL::to("citas/editarcitaajax")?>',
			dataType:'json',
			data:{
				id:$(this).attr('id')
			},
			success: function(response){
				$('#formCitaEdit [name=Paciente]').val(response.Paciente);
				$('#formCitaEdit [name=Fecha]').val(formatDate(response.Fecha));
				$('#formCitaEdit [name=Horario]').val(response.Horario);
				$('#formCitaEdit [name=Receta]').val(response.Observacion);
				$('#formCitaEdit [name=id]').val(response.id);
			},
			error: function(){
				console.log('Fracaso');
			}
		})
	});
	$(document).ready(function(){
		$('.eliminar').on('click',function(e){
			e.preventDefault();
			if(confirm('¿Desea Eliminar el Cita?')){
				window.location = $(this).attr('href');
			}
		});
	});
	</script>
</body>
</html>