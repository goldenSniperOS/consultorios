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

	}