<?php
	class Consultorios
	{
		public function __construct(){
			if(!Auth::isLoggedIn()){
				Redirect::to('home/index');
			}
		}
		
		public function index(){
			$consultorios = Consultorio::all();
			View::render('consultorio',['consultorios' => $consultorios]);
		}

		public function registrarconsultorio(){
			if(Input::exists()){
				$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'NombreConsultorio' => [
                        'required' => true,
                        'min' => 10,
                        'max' => 50
                    ]
                ]);
                if($validation->passed()){
                	/*Insercion de un Consultorio*/
					Consultorio::create([
						'Nombre' => Input::get('NombreConsultorio')
					]);
				}else{
					Session::flash('errores',$validation->errors());
				}
			}
			Redirect::to('consultorios/index');
		}

		public function editarconsultorioajax(){
			$id = Input::get('id');
			$consultorio = Consultorio::find($id);
			echo json_encode($consultorio);
		}

		public function test(){
			//$consultorios = DB::getInstance()->query('SELECT * FROM consultorio WHERE Activo = "SI"')->results();
			$consultorios = DB::getInstance()->table('consultorio')
											->where('Activo','SI')
											->orWhere()
											->join('usuarios','usuario.id','=','consultorio.id')
											->exec();
			echo '<pre>';
			var_dump($consultorios);
			echo '</pre>';
		}

		public function editarconsultorio(){
			$validate = new Validate();
            $validation = $validate->check($_POST,[
                'NombreConsultorio' => [
                    'required' => true,
                    'min' => 10,
                    'max' => 50
                ]
            ]);
            if($validation->passed()){
				Consultorio::update([
					'Nombre' => Input::get('NombreConsultorio')
				],Input::get('id'));
			}else{
				Session::flash('erroresedit',$validation->errors());
			}
			Redirect::to('consultorios/index');
		}

		public function habilitar($param){
			Consultorio::update([
				'Activo' => 'SI'
			],$param);
			Redirect::to('consultorios/index');
		}

		public function inhabilitar($param){
			Consultorio::update([
				'Activo' => 'NO'
			],$param);
			Redirect::to('consultorios/index');
		}

		public function eliminar($param){
			DB::getInstance()->delete('consultorio',[['id','=',$param]]);
			Redirect::to('consultorios/index');
		}
	}