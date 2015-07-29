<?php 
	class Admin
	{
		public function index(){
			$pacientes = DB::getInstance()->table('paciente')->orderBy('id','desc')->limit(3)->exec();
			View::render('admin',['pacientes'=> $pacientes]);
		}
	}