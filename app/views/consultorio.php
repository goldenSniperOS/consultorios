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
						        <li><a href="<?=URL::to('usuarios/index')?>">Usuarios</a></li>
						        <li><a href="<?=URL::to('cargos/index')?>">Cargos</a></li>
						        <li><a class="active" href="<?=URL::to('consultorios/index')?>">Consultorios</a></li>
						     </ul>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-xs-10 contenido well">
			<div class="alert alert-info">
				<h3 class="text-center">
					CONSULTORIOS
				</h3>
			</div>
			<div class="pull-right">
				<a href="#" class="btn btn-success nuevo" data-toggle="modal" data-target="#formConsultorio">+</a>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="formConsultorio" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('consultorios/registrarconsultorio')?>" method="POST">
			    <?php echo (isset($errores['NombreConsultorio'])) ? '<script>$(document).ready(function(){$("#formConsultorio").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nueva Consulta</h4>
			      </div>
				      <div class="modal-body">
				        <div class="container-fluid">
				          <div class="row">
				            <div class="col-md-12">
				            	<div class="form-group <?=(isset($errores['NombreConsultorio']))?'has-error':''?>">
									<label for="NombreConsultorio">Nombre del Consultorio</label>
									<input type="text" name="NombreConsultorio" id="NombreConsultorio" class="form-control">
									<?php if(isset($errores['NombreConsultorio'])): ?>
                                    <p class="help-block"><?=$errores['NombreConsultorio']?></p>
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
			<div class="modal fade" id="formConsultorioEdit" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('consultorios/editarconsultorio')?>" method="POST">
			    <?php echo (isset($erroresedit['NombreConsultorio'])) ? '<script>$(document).ready(function(){$("#formConsultorioEdit").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Editar Consulta</h4>
			      </div>
				      <div class="modal-body">
				        <div class="container-fluid">
				          <div class="row">
				            <div class="col-md-12">
				            	<div class="form-group <?=(isset($erroresedit['NombreConsultorio']))?'has-error':''?>">
									<label for="NombreConsultorio">Nombre del Consultorio</label>
									<input type="text" name="NombreConsultorio" id="NombreConsultorio" class="form-control">
									<?php if(isset($erroresedit['NombreConsultorio'])): ?>
                                    <p class="help-block"><?=$erroresedit['NombreConsultorio']?></p>
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
					  <li class="list-group-item active">LISTADO DE CONSULTORIOS</li>
					  <li class="list-group-item">
					    <table class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>NOMBRE</th>
					                <th>ESTADO</th>
					                <th>ACCIONES</th>
					            </tr>
					        </thead>		 				 
					        <tbody>
					        	<?php if($consultorios): ?>
						        	<?php foreach ($consultorios as $consultorio): ?>
							        	<tr>
							        		<td><?=$consultorio->Nombre?></td>
							        		<td><?=($consultorio->Activo == 'SI')?'<p class="label label-success">Activo</p>':'<p class="label label-danger">Inactivo</p>'?></td>
							        		<td>
											<div class="btn-group">
											  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
											  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											    <span class="caret"></span>
											    <span class="sr-only">Toggle Dropdown</span>
											  </button>
											  <ul class="dropdown-menu">
											    <li><a id="<?=$consultorio->id?>" class="editar" href="#" data-toggle="modal" data-target="#formConsultorioEdit"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
											    <li><a href="<?=URL::to('consultorios/habilitar/'.$consultorio->id)?>"><span class="glyphicon glyphicon-check"></span> Habilitar</a></li>
											    <li><a href="<?=URL::to('consultorios/inhabilitar/'.$consultorio->id)?>"><span class="glyphicon glyphicon-remove-circle"></span> Inhabilitar</a></li>
											    <li><a href="<?=URL::to('consultorios/eliminar/'.$consultorio->id)?>" class="eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
											  </ul>
											</div>
											<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span></button>
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
	<?=HTML::script('js/bootstrap.min.js')?>
	<script>
	$('.editar').on('click',function(e){
		e.preventDefault();
		$.ajax({
			method:'post',
			url:'<?=URL::to("consultorios/editarconsultorioajax")?>',
			dataType:'json',
			data:{
				id:$(this).attr('id')
			},
			success: function(response){
				$('#formConsultorioEdit [name=NombreConsultorio]').val(response.Nombre);
				$('#formConsultorioEdit [name=id]').val(response.id);
			},
			error: function(){
				console.log('Fracaso');
			}
		})
	});
	$(document).ready(function(){
		$('.eliminar').on('click',function(e){
			e.preventDefault();
			if(confirm('¿Desea Eliminar el Consultorio?')){
				window.location = $(this).attr('href');
			}
		});
	});
	</script>
	<!-- 
		consultorios/eliminar/'.$consultorio->id
	-->
</body>
</html>