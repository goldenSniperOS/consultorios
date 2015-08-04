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
	<title>Administrador | Cargos</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/style.css')?>
	<?=HTML::style('css/jquery.dataTables.min.css')?>
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
						<li><a href="<?=URL::to('admin/estadisticas')?>"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
						</li>
						<li class="open"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administración</a>
							<ul class="submenu">
						        <li><a href="<?=URL::to('usuarios/index')?>">Usuarios</a></li>
						        <li><a class="active" href="<?=URL::to('cargos/index')?>">Cargos</a></li>
						        <li><a href="<?=URL::to('consultorios/index')?>">Consultorios</a></li>
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
			    <form action="<?=URL::to('cargos/registrarcargo')?>" method="POST">
			    	<?php echo (isset($errores['NombreCargo'])) ? '<script>$(document).ready(function(){$("#formCargo").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Nuevo Cargo</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-12">
			            	<div class="form-group <?=(isset($errores['NombreCargo']))?'has-error':''?>">
								<label for="NombreCargo">Nombre del Cargo</label>
								<input type="text" name="NombreCargo" id="NombreCargo" class="form-control">
								<?php if(isset($errores['NombreCargo'])): ?>
                                <p class="help-block"><?=$errores['NombreCargo']?></p>
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
			<div class="modal fade" id="formCargoEdit" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    <form action="<?=URL::to('cargos/editarcargo')?>" method="POST">
			    <?php echo (isset($erroresedit['NombreCargo'])) ? '<script>$(document).ready(function(){$("#formCargoEdit").modal({show:true})});</script>':''?>
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="gridSystemModalLabel">Editar Cargo</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-12">
			            	<div class="form-group <?=(isset($erroresedit['NombreCargo']))?'has-error':''?>">
								<label for="NombreCargo">Nombre del Cargo</label>
								<input type="text" name="NombreCargo" id="NombreCargo" class="form-control">
								<?php if(isset($erroresedit['NombreCargo'])): ?>
								<p class="help-block"><?=$erroresedit['NombreCargo']?></p>
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
					        	<?php if($cargos): ?>
					        	<?php foreach ($cargos as $cargo): ?>
					        	<tr>
					                <td><?=$cargo->Nombre?></td>
					                <td>
				                	<!-- Split button -->
									<div class="btn-group">
									  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-cog"></span></button>
									  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="caret"></span>
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a id="<?=$cargo->id?>" href="#" data-toggle="modal" data-target="#formCargoEdit" class="editar"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
									    <li><a href="<?=URL::to('cargos/eliminar/'.$cargo->id)?>" class="eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
									  </ul>
									</div>
									<a href="<?=URL::to('cargos/permisos/'.$cargo->id)?>" class="btn btn-<?=(json_decode($cargo->Permisos)->admin)?'success':'danger'?>"><span class="glyphicon glyphicon-book"></span> Permisos</button>
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
	$('.editar').on('click',function(e){
		e.preventDefault();
		$.ajax({
			method:'post',
			url:'<?=URL::to("cargos/editarcargoajax")?>',
			dataType:'json',
			data:{
				id:$(this).attr('id')
			},
			success: function(response){
				$('#formCargoEdit [name=NombreCargo]').val(response.Nombre);
				$('#formCargoEdit [name=id]').val(response.id);
			},
			error: function(){
				console.log('Fracaso');
			}
		})
	});
	$(document).ready(function(){
		$('.eliminar').on('click',function(e){
			e.preventDefault();
			if(confirm('¿Desea Eliminar el Cargo?')){
				window.location = $(this).attr('href');
			}
		});
	});
	</script>
</body>
</html>