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
			View::render('admin',['pacientes'=> $pacientes]);
		}


		public function logout(){
			Auth::logout();
			Redirect::to('home/index');
		}

	}