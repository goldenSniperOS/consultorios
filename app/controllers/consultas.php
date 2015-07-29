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
			View::render('consultamedica',['consultas'=>$consultas]);
		}

		public function registrarconsulta(){
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
					Consulta::create([
						'Paciente' =>  Input::get('Paciente'),
						'Fecha' => Input::get('Fecha'),
						'Horario' => Input::get('Horario') ,
						'Observacion' => Input::get('Receta')						
					]);
				}else{
					Session::flash('errores',$validation->errors());
				}
			}
			Redirect::to('citas/index');
		}

		public function editarcitaajax(){
			$id = Input::get('id');
			$citas = Usuario::find($id);
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
					'Paciente' =>  null,
					'Fecha' => Input::get('Fecha'),
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