<?php
	class Usuarios
	{
		public function __construct(){
			if(!Auth::isLoggedIn()){
				Redirect::to('home/index');
			}
		}
		
		public function index(){
			$usuarios = DB::getInstance()->table('usuario')
										->select('usuario.id','usuario.Documento',
												'usuario.NombreCompleto',
												'cargo.Nombre as Cargo',
												'usuario.Activo')
										->join('cargo','cargo.id','=','usuario.Cargo')
										->exec();
										
			$consultorios = DB::getInstance()->table('consultorio')->where('Activo','SI')->exec();
			$cargos = Cargo::all();
			View::render('usuario',['usuarios' => $usuarios,'consultorios' => $consultorios,'cargos'=> $cargos]);
		}

		public function registrarusuario(){
			if(Input::exists()){
				$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'Documento' => [
                        'required' => true,
                        'min' => 8,
                        'max' => 8
                    ],
                    'Nombre' => [
                    	'required' => true,
                    	'min' => 10,
                    	'max' => 50
                    ],
                    'Consultorio' => [
                        'required' => true
                    ],
                    'Contrasena' => [
                    	'required' => true
                    ],
                    'Cargo' => [
                        'required' => true
                    ]
                ]);
                if($validation->passed()){
                	/*Insercion de un Usuario*/
					Usuario::create([
						'Documento' => Input::get('Documento'),
						'Cargo' => Input::get('Cargo') ,
						'NombreCompleto' => Input::get('Nombre'),
						'Consultorio' => Input::get('Consultorio'),
						'Contrasena' => Hash::make(Input::get('Contrasena'))
					]);
				}else{
					Session::flash('errores',$validation->errors());
				}
			}
			Redirect::to('usuarios/index');
		}

		public function editarusuarioajax(){
			$id = Input::get('id');
			$usuario = Usuario::find($id);
			echo json_encode($usuario);
		}

		public function editarusuario(){
			$validate = new Validate();
            $validation = $validate->check($_POST,[
                    'Documento' => [
                        'required' => true,
                        'min' => 8,
                        'max' => 8
                    ],
                    	'Nombre' => [
                    	'required' => true,
                    	'min' => 10,
                    	'max' => 50
                    ],
                    'Consultorio' => [
                        'required' => true
                    ],
                    'Contrasena' => [
                    	'required' => true
                    ],
                    'Cargo' => [
                    	'required' => true
                    ]
                ]);
            if($validation->passed()){
				Usuario::update([
					'Documento' => Input::get('Documento'),
					'Cargo' => Input::get('Cargo') ,
					'NombreCompleto' => Input::get('Nombre'),
					'Consultorio' => Input::get('Consultorio'),
					'Contrasena' => Hash::make(Input::get('Contrasena'))
				],Input::get('id'));
			}else{
				Session::flash('erroresedit',$validation->errors());
			}
			Redirect::to('usuarios/index');
		}

		public function eliminar($param){
			DB::getInstance()->delete('usuario',[['id','=',$param]]);
			Redirect::to('usuarios/index');
		}

		public function habilitar($param){
			Usuario::update([
				'Activo' => 'SI'
			],$param);
			Redirect::to('usuarios/index');
		}

		public function inhabilitar($param){
			Usuario::update([
				'Activo' => 'NO'
			],$param);
			Redirect::to('usuarios/index');
		}
	}