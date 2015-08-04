<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador | Bienvenido a Clinica</title>
	<?=HTML::style('css/bootstrap.min.css')?>
	<?=HTML::style('css/style.css')?>
	<script type="text/javascript">
	  window.onload = function () {
	    var chart = new CanvasJS.Chart("chartContainer", {

	      title:{
	        text: "Porcentaje de Pacientes por Genero"              
	      },
	      data: [//array of dataSeries              
	        { //dataSeries object

	         /*** Change type "column" to "bar", "area", "line" or "pie"***/
	         type: "pie",
	         indexLabel:"#percent%",
	         dataPoints: [
	         { label: "Mujeres", y: <?=$estat1[0]->Cantidad?> },
	         { label: "Hombres", y: <?=$estat1[1]->Cantidad?> },
	         ]
	       }
	       ]
	     });

	    chart.render();

	    var chart1 = new CanvasJS.Chart("chartContainer1", {

	      title:{
	        text: "Consultas Por Mes"              
	      },
	      data: [//array of dataSeries              
	        { //dataSeries object

	         /*** Change type "column" to "bar", "area", "line" or "pie"***/
	         type: "column",
	         dataPoints: [
	         { label: "Enero", y:<?=$estat2[0]->Cantidad?> },
	         { label: "Febrero", y:<?=$estat2[1]->Cantidad?> },
	         { label: "Marzo", y:<?=$estat2[2]->Cantidad?> },                                    
	         { label: "Abril", y:<?=$estat2[3]->Cantidad?> },
	         { label: "Mayo", y:<?=$estat2[4]->Cantidad?> },
	         { label: "Junio", y:<?=$estat2[5]->Cantidad?> },
	         { label: "Julio", y:<?=$estat2[6]->Cantidad?> },
	         { label: "Agosto", y:<?=$estat2[7]->Cantidad?> },
	         { label: "Septiembre", y:<?=$estat2[8]->Cantidad?> },
	         { label: "Octubre", y:<?=$estat2[9]->Cantidad?> },
	         { label: "Noviembre", y:<?=$estat2[10]->Cantidad?> },
	         { label: "Diciembre", y:<?=$estat2[11]->Cantidad?> },
	         ]
	       }
	       ]
	     });

	    chart1.render();

	    var chart2 = new CanvasJS.Chart("chartContainer2", {

	      title:{
	        text: "Citas Atendidas VS Citas No Atendidas"              
	      },
	      data: [//array of dataSeries              
	        { //dataSeries object

	         /*** Change type "column" to "bar", "area", "line" or "pie"***/
	         type: "pie",
	         indexLabel:"#percent%",
	         dataPoints: [
	         { label: "Atendidas", y: <?=$estat3[0]->Cantidad?> },
	         { label: "No Atendidas", y: <?=$estat3[1]->Cantidad?> },
	         ]
	       }
	       ]
	     });

	    chart2.render();

	    var chart3 = new CanvasJS.Chart("chartContainer3", {

	      title:{
	        text: "Numero de Usuarios por Cargo"              
	      },
	      data: [//array of dataSeries              
	        { //dataSeries object

	         /*** Change type "column" to "bar", "area", "line" or "pie"***/
	         type: "pie",
	         indexLabel:"#percent%",
	         dataPoints: [
	         	<?=$valorestat?>
	         ]
	       }
	       ]
	     });

	    chart3.render();
	  }
	  </script>
  <?=HTML::script('js/canvasjs.min.js')?>
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
						<?php if(Auth::hasPermission('pacientes')): ?><li><a href="<?=URL::to('pacientes/index')?>" class="active"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Pacientes</a></li><?php endif; ?>
						<?php if(Auth::hasPermission('consultas')): ?><li><a href="<?=URL::to('consultas/index')?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Consultas Médicas</a></li><?php endif; ?>
						<?php if(Auth::hasPermission('citas')): ?><li><a href="<?=URL::to('citas/index')?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Citas Médicas</a></li><?php endif; ?>
						<li><a href="<?=URL::to('admin/estadisticas')?>" class="active"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Estadísticas</a>
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
					ADMINISTRACIÓN
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<ul class="list-group">
					  <li class="list-group-item active">Estadistica de Pacientes por Sexo</li>
					  <li class="list-group-item">
						  <div id="chartContainer" style="height: 300px; width: 100%;">
					  </li>
					</ul>
				</div>
				<div class="col-xs-6">
					<ul class="list-group">
					  <li class="list-group-item active">Estadisticas de Consultas por Mes</li>
					  <li class="list-group-item">
						  <div id="chartContainer1" style="height: 300px; width: 100%;">
					  </li>
					</ul>
				</div>			
			</div>
			<div class="row">
				<div class="col-xs-6">
					<ul class="list-group">
					  <li class="list-group-item active">Citas Atendidas VS Citas No Atendidas</li>
					  <li class="list-group-item">
						  <div id="chartContainer2" style="height: 300px; width: 100%;">
					  </li>
					</ul>
				</div>
				<div class="col-xs-6">
					<ul class="list-group">
					  <li class="list-group-item active">Numero de Usuarios Por Cargo</li>
					  <li class="list-group-item">
						  <div id="chartContainer3" style="height: 300px; width: 100%;">
					  </li>
					</ul>
				</div>			
			</div>
			</div>
		</row>
	</div>
</body>
</html>