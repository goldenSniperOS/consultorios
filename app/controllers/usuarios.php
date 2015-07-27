<?php
	class Usuarios
	{
		public function index(){
			$usuarios = Usuario::all();
			$consultorios = Consultorio::all();
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
						'Contrasena' => Input::get('Contrasena')
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

		public function editarconsultorio(){
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
					'Contrasena' => Input::get('Contrasena')
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