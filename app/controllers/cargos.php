<?php
	class Cargos
	{
		public function __construct(){
			if(!Auth::isLoggedIn()){
				Redirect::to('home/index');
			}
		}

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

		public function permisos($cargoIndex){
			$cargo = Cargo::find($cargoIndex);
			View::render('permisos',['cargo'=>$cargo]);
		}

		public function habilitarpermiso($permiso,$cargoIndex){
			$cargo = Cargo::find($cargoIndex);
			$cargo->Permisos = json_decode($cargo->Permisos);
			$cargo->Permisos->{$permiso} = true;
			Cargo::update([
				'Permisos' => $cargo->Permisos = json_encode($cargo->Permisos)
			],$cargoIndex);
			
			if(Auth::get('Cargo') == $cargoIndex){
				$grupo =  DB::getInstance()->table(Config::get('groups/table'))->where(Config::get('groups/primaryKey'),$cargoIndex)->exec()[0];
				Session::put('ListPermission',json_decode($grupo->Permisos));
			}
			View::render('permisos',['cargo'=>$cargo]);
		}

		public function inhabilitarpermiso($permiso,$cargoIndex){
			$cargo = Cargo::find($cargoIndex);
			$cargo->Permisos = json_decode($cargo->Permisos);
			$cargo->Permisos->{$permiso} = false;
			Cargo::update([
				'Permisos' => $cargo->Permisos = json_encode($cargo->Permisos)
			],$cargoIndex);
			
			if(Auth::get('Cargo') == $cargoIndex){
				$grupo =  DB::getInstance()->table(Config::get('groups/table'))->where(Config::get('groups/primaryKey'),$cargoIndex)->exec()[0];
				Session::put('ListPermission',json_decode($grupo->Permisos));
			}
			View::render('permisos',['cargo'=>$cargo]);
		}

		public function editarcargo(){
			$validate = new Validate();
            $validation = $validate->check($_POST,[
                'NombreCargo' => [
                    'required' => true,
                    'min' => 5,
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