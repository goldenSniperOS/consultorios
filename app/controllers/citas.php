<?php
	class Citas
	{
		public function __construct(){
			if(!Auth::isLoggedIn()){
				Redirect::to('home/index');
			}
		}
		
		public function index(){
			$citas = Cita::all();
			$pacientes = Paciente::all();

			View::render('cita',['citas' => $citas,'pacientes' => $pacientes]);
		}

		public function registrarcita(){
			if(Input::exists()){
				$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'Fecha' => [
                        'required' => true
                    ],
                    'Horario' => [
                    	'required' => true
                    ]
                ]);
                if($validation->passed()){
                	/*Insercion de un Usuario*/
					Cita::create([
						'Paciente' =>  Input::get('Paciente'),
						'Fecha' => date('Y-m-d',strtotime(str_replace('/', '.', Input::get('Fecha')))),
						'Horario' => Input::get('Horario') ,
						'Observacion' => Input::get('Receta')						
					]);
				}else{
					Session::flash('errores',$validation->errors());
				}
			}
			Redirect::to('citas/index');
		}

		public function atendercita(){
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
                	/*Insercion de un Usuario*/
					Consulta::create([
						'Paciente' =>  Input::get('Paciente'),
						'Sintomas' => Input::get('Sintomas'),
						'Diagnostico' => Input::get('Diagnostico') ,
						'Receta' => Input::get('Receta') ,
						'Observacion' => Input::get('Observaciones') ,
						'Tratamiento' => Input::get('Tratamiento'),
						'Medico' => Auth::get('id'),
					]);

					Cita::update([
						'Atendido' => 'SI'
					],Input::get('CodigoCita'));
				}else{
					Session::flash('errores',$validation->errors());
				}
			}					
			Redirect::to('citas/index');
		}

		public function reprogramarcita(){
			Cita::update(['Fecha' => date('Y-m-d',strtotime(str_replace('/', '.', Input::get('Fecha'))))],Input::get('CodigoCita'));
			Redirect::to('citas/index');
		}

		public function editarcitaajax(){
			$id = Input::get('id');
			$cita = Cita::find($id);
			echo json_encode($cita);
		}

		public function editarcita(){
			$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'Fecha' => [
                        'required' => true
                    ],
                    'Horario' => [
                    	'required' => true
                    ]
                ]);   
                if($validation->passed()){
				Cita::update([
					'Paciente' =>  Input::get('Paciente'),
					'Fecha' => date('Y-m-d',strtotime(str_replace('/', '.', Input::get('Fecha')))),
					'Horario' => Input::get('Horario') ,
					'Observacion' => Input::get('Receta')
				],Input::get('id'));
			}else{
				Session::flash('erroresedit',$validation->errors());
			}
			Redirect::to('citas/index');
		}

		public function eliminar($param){
			DB::getInstance()->delete('cita',[['id','=',$param]]);
			Redirect::to('citas/index');
		}
	}