<?php 
	class Admin
	{
		public function __construct(){
			if(!Auth::isLoggedIn()){
				Redirect::to('home/index');
			}
		}

		public function index(){
			$pacientes = DB::getInstance()->table('paciente')->orderBy('id','desc')->limit(3)->exec();
			$citas = DB::getInstance()->table('cita')->select('paciente.Nombre as Paciente','cita.Fecha')->join('paciente','paciente.id','=','cita.Paciente')->orderBy('cita.id','desc')->where('Atendido','NO')->limit(3)->exec();
			View::render('admin',['pacientes'=> $pacientes,'citas' => $citas]);
		}


		public function logout(){
			Auth::logout();
			Redirect::to('home/index');
		}

		public function estadisticas(){
			$mujeres = DB::getInstance()->select('COUNT(*) as Cantidad')->table('paciente')->where('Sexo','F')->exec()[0];
			$hombres = DB::getInstance()->select('COUNT(*) as Cantidad')->table('paciente')->where('Sexo','M')->exec()[0];

			$estat1 = [$mujeres,$hombres];

			$enero = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','1')->exec()[0];
			$febrero = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','2')->exec()[0];
			$marzo = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','3')->exec()[0];
			$abril = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','4')->exec()[0];
			$mayo = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','5')->exec()[0];
			$junio = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','6')->exec()[0];
			$julio = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','7')->exec()[0];
			$agosto = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','8')->exec()[0];
			$septiembre = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','9')->exec()[0];
			$octubre = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','10')->exec()[0];
			$noviembre = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','11')->exec()[0];
			$diciembre = DB::getInstance()->select('COUNT(*) as Cantidad')->table('consulta')->where('MONTH(Fecha)','12')->exec()[0];

			$estat2 = [$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre];

			$atentidas = DB::getInstance()->select('COUNT(*) as Cantidad')->table('cita')->where('Atendido','SI')->exec()[0];
			$noatendidas = DB::getInstance()->select('COUNT(*) as Cantidad')->table('cita')->where('Atendido','NO')->exec()[0];
			$estat3 = [$atentidas,$noatendidas];
			$valorestat = "";

			$cargos = Cargo::all();
			foreach($cargos as $cargo){
				$valorestat .='{ label:"'.$cargo->Nombre.'", y:'.DB::getInstance()->select('COUNT(*) as Cantidad')->table('usuario')->where('Cargo',$cargo->id)->exec()[0]->Cantidad.'},';
			}

			View::render('estadisticas',['estat1' => $estat1,'estat2' => $estat2,'estat3' => $estat3,'valorestat' => $valorestat]);
		}

	}