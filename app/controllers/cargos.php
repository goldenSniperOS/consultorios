<?php
	class Cargos
	{
		public function index(){
			$cargos = Cargo::all();
			View::render('cargos',['cargos' => $cargos]);
		}

		public function registrarcargo(){
			if(Input::exists()){
				$validate = new Validate();
	            $validation = $validate->check($_POST,[
                    'NombreCargo' => [
                        'required' => true,
                        'min' => 4,
                        'max' => 50
                    ]
                ]);
                if($validation->passed()){
                	/*Insercion de un cargo*/
					Cargo::create([
						'Nombre' => Input::get('NombreCargo'),
						'Permisos' => json_encode(['admin' => false,'citas' => false,'consultas'=>false,'pacientes' =>false])
					]);
				}else{
					Session::flash('errores',$validation->errors());
				}
			}
			Redirect::to('cargos/index');
		}

		public function editarcargoajax(){
			$id = Input::get('id');
			$cargo = Cargo::find($id);
			echo json_encode($cargo);
		}

		public function test(){
			//$cargos = DB::getInstance()->query('SELECT * FROM cargo WHERE Activo = "SI"')->results();
			$cargos = DB::getInstance()->table('cargo')
											->where('Activo','SI')
											->orWhere()
											->join('usuarios','usuario.id','=','cargo.id')
											->exec();
			echo '<pre>';
			var_dump($cargos);
			echo '</pre>';
		}

		public function editarcargo(){
			$validate = new Validate();
            $validation = $validate->check($_POST,[
                'NombreCargo' => [
                    'required' => true,
                    'min' => 10,
                    'max' => 50
                ]
            ]);
            if($validation->passed()){
				Cargo::update([
					'Nombre' => Input::get('NombreCargo')
				],Input::get('id'));
			}else{
				Session::flash('erroresedit',$validation->errors());
			}
			Redirect::to('cargos/index');
		}

		/*public function habilitar($param){
			Cargo::update([
				'Activo' => 'SI'
			],$param);
			Redirect::to('cargos/index');
		}

		public function inhabilitar($param){
			Cargo::update([
				'Activo' => 'NO'
			],$param);
			Redirect::to('cargos/index');
		}*/

		public function eliminar($param){
			DB::getInstance()->delete('cargo',[['id','=',$param]]);
			Redirect::to('cargos/index');
		}		
	}