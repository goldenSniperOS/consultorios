<?php 
	class Pacientes{
		public function __construct(){
            if(!Auth::isLoggedIn()){
                Redirect::to('home/index');
            }
        }
        
        public function index(){
			$pacientes = Paciente::all();
			$departamentos = Departamento::all();
			$distritos = DB::getInstance()->table('provincia')
									 ->join('distrito','distrito.idProv','=','provincia.idProv')
									 ->exec();
			View::render('paciente',['pacientes' => $pacientes,'departamentos' => $departamentos,'distritos' => $distritos]);
		}
		public function registrarpaciente(){
			if(Input::exists()){
				$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'Documento' => [
                        'required' => true,
                        'unique' => ['paciente','Documento'],
                        'min' => 8,
                        'max' => 8
                    ],
                    'Telefono' => [
                    	'min' => 9,
                    	'max' =>9
                    ],
                    'Nombre' => [
                    	'required' => true,
                        'min' => 20,
                        'max' => 50
                    ],
                    'Edad' => [
                    	'required' => true,
                        'min' => 0,
                        'max' => 100
                    ],
                    'Direccion' => [
                    	'required' => true,
                        'min' => 10,
                        'max' => 50
                    ],
                    'Departamento' => [
                    	'required' => true,
                    ],
                    'Email' => [
                    	'required' => true,
                        'min' => 16,
                        'max' => 30
                    ],
                    'Municipio' => [
                    	'required' => true,
                    ]
                ]);
                if($validation->passed()){
                	/*Insercion de un Paciente*/
					Paciente::create([
						'Documento' => Input::get('Documento'),
						'Telefono' => Input::get('Telefono'),
						'Nombre' => Input::get('Nombre'),
						'Edad' => Input::get('Edad'),
						'Direccion' => Input::get('Direccion'),
						'Sexo' => Input::get('Sexo'),
						'Departamento' => Input::get('Departamento'),
						'Email' => Input::get('Email'),
						'Municipio' => Input::get('Municipio'),
						'Activo' => Input::get('Estado')
					]);
				}else{
					Session::flash('errores',$validation->errors());
				}
			}
			Redirect::to('pacientes/index');
		}
		public function eliminar($param){
			DB::getInstance()->delete('paciente',[['id','=',$param]]);
			Redirect::to('pacientes/index');
		}
		
		public function editarpacienteajax(){
			$id = Input::get('id');
			$paciente = Paciente::find($id);
			echo json_encode($paciente);
		}
		public function editarpaciente(){
				$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'Documento' => [
                        'required' => true,
                        'min' => 8,
                        'max' => 8
                    ],
                    'Telefono' => [
                    	'min' => 9,
                    	'max' =>9
                    ],
                    'Nombre' => [
                    	'required' => true,
                        'min' => 20,
                        'max' => 50
                    ],
                    'Edad' => [
                    	'required' => true,
                        'min' => 0,
                        'max' => 100
                    ],
                    'Direccion' => [
                    	'required' => true,
                        'min' => 10,
                        'max' => 50
                    ],
                    'DepartamentoEdit' => [
                    	'required' => true,
                    ],
                    'Email' => [
                    	'required' => true,
                        'min' => 16,
                        'max' => 30
                    ],
                    'MunicipioEdit' => [
                    	'required' => true,
                    ]
                ]);
                if($validation->passed()){
                	/*Insercion de un Paciente*/
					Paciente::update([
						'Documento' => Input::get('Documento'),
						'Telefono' => Input::get('Telefono'),
						'Nombre' => Input::get('Nombre'),
						'Edad' => Input::get('Edad'),
						'Direccion' => Input::get('Direccion'),
						'Sexo' => Input::get('Sexo'),
						'Departamento' => Input::get('DepartamentoEdit'),
						'Email' => Input::get('Email'),
						'Municipio' => Input::get('MunicipioEdit'),
						'Activo' => Input::get('Estado')
						],Input::get('id'));	 	
				}else{
					Session::flash('erroresedit',$validation->errors());
				}
			Redirect::to('pacientes/index');
		}

	}	