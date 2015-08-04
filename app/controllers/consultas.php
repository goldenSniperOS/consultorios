<?php 
	class Consultas
	{
		public function __construct(){
			if(!Auth::isLoggedIn()){
				Redirect::to('home/index');
			}
		}
		
		public function index(){
			$consultas = Consulta::all();
			$pacientes = Paciente::all();
			View::render('consultamedica',['consultas'=>$consultas,'pacientes' => $pacientes]);
		}

		public function registrarconsulta(){
			if(Input::exists()){
				$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'Sintomas' => [
                        'required' => true
                    ],
                    'Diagnostico' => [
                        'required' => true
                    ],
                    'Receta' => [
                        'required' => true
                    ],
                    'Observaciones' => [
                        'required' => true
                    ],
                    'Tratamiento' => [
                        'required' => true
                    ]
                ]);
                if($validation->passed()){
                	/*Insercion de un Consulta*/
					Consulta::create([
						'Paciente' =>  Input::get('Paciente'),
						'Sintomas' => Input::get('Sintomas'),
						'Diagnostico' => Input::get('Diagnostico') ,
						'Receta' => Input::get('Receta') ,
						'Observacion' => Input::get('Observaciones') ,
						'Tratamiento' => Input::get('Tratamiento'),
						'Medico' => Auth::get('id'),
					]);
				}else{
					Session::flash('errores',$validation->errors());
				}
			}					
			Redirect::to('consultas/index');
		}

		public function editarconsutaajax(){
			$id = Input::get('id');
			$consultas = Consulta::find($id);
			echo json_encode($consultas);
		}

		public function editarconsulta(){
			$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'Sintomas' => [
                        'required' => true
                    ],
                    'Diagnostico' => [
                        'required' => true
                    ],
                    'Receta' => [
                        'required' => true
                    ],
                    'Observaciones' => [
                        'required' => true
                    ],
                    'Tratamiento' => [
                        'required' => true
                    ]
                ]); 
                if($validation->passed()){
				Consulta::update([
					'Paciente' =>  Input::get('Paciente'),
					'Sintomas' => Input::get('Sintomas'),
					'Diagnostico' => Input::get('Diagnostico') ,
					'Receta' => Input::get('Receta') ,
					'Observacion' => Input::get('Observaciones') ,
					'Tratamiento' => Input::get('Tratamiento')
				],Input::get('id'));
			}else{
				Session::flash('erroresedit',$validation->errors());
			}
			Redirect::to('consultas/index');
		}

		public function eliminar($param){
			DB::getInstance()->delete('consulta',[['id','=',$param]]);
			Redirect::to('consultas/index');
		}
	}