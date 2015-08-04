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

        public function detallehistoria($param){
            $paciente = Paciente::find($param);
            $consultas = DB::getInstance()->select('consulta.id','consulta.Fecha','consulta.Diagnostico','usuario.NombreCompleto as Medico')->table('consulta')->join('usuario','usuario.id','=','consulta.Medico')->where('Paciente',$param)->exec();
            $consultorio = Consultorio::find(Auth::get('Consultorio'));
            View::render('detallehistoria',['paciente' => $paciente,'consultas' => $consultas,'consultorio' => $consultorio]);
        }

        public function historiatotal($param){
            $paciente = Paciente::find($param);
            $consultas = DB::getInstance()->select('consulta.Fecha','consulta.Diagnostico','usuario.NombreCompleto as Medico')->table('consulta')->join('usuario','usuario.id','=','consulta.Medico')->where('Paciente',$param)->exec();
            $consultorio = Consultorio::find(Auth::get('Consultorio'));
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', '', 10);
            $pdf->Image(Config::path('public_absolute').'img/logo.png' , 10 ,8, 15 , 15,'PNG');
            $pdf->Cell(18, 10, '', 0);
            $pdf->Cell(150, 10, $consultorio->Nombre, 0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(50, 10, 'Fecha: '.date('d/m/Y').'', 0);
            $pdf->Ln(15);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8, '', 0);
            $pdf->Cell(100, 8, 'HISTORIA DEL PACIENTE', 0);
            $pdf->Ln(10);
            $pdf->Cell(120, 8, '', 0);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(20,10,'Medico: ',0);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(20,10,Auth::get('NombreCompleto'),0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(30,10,'Paciente: ',1);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(50,10,$paciente->Nombre,1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(30,10,'Direccion: ',1);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(50,10,$paciente->Direccion,1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(30,10,'Telefono: ',1);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(50,10,$paciente->Telefono,1);
            $pdf->Ln(30);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8, '', 0);
            $pdf->Cell(100, 8, 'DETALLES DE LA HISTORIA', 0);
            $pdf->Ln(10);
            $pdf->Cell(15, 8, '#', 1);
            $pdf->Cell(40, 8, 'Fecha', 1);
            $pdf->Cell(80, 8, 'Diagnostico', 1);
            $pdf->Cell(40, 8, 'Medico', 1);
            $pdf->Ln(8);
            $pdf->SetFont('Arial', '', 8);
            //CONSULTA
            $item = 0;
            foreach($consultas as $consulta){
                $item++;
                $pdf->Cell(15, 8, $item, 1);
                $pdf->Cell(40, 8,$consulta->Fecha, 1);
                $pdf->Cell(80, 8,$consulta->Diagnostico, 1);
                $pdf->Cell(40, 8,$consulta->Medico, 1);
                $pdf->Ln(8);
            }
            $pdf->Output();
        }

        public function detalleconsulta($param,$consulta){
            $paciente = Paciente::find($param);
            $consultaFinal = Consulta::find($consulta);
            $consultorio = Consultorio::find(Auth::get('Consultorio'));
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', '', 10);
            $pdf->Image(Config::path('public_absolute').'img/logo.png' , 10 ,8, 15 , 15,'PNG');
            $pdf->Cell(18, 10, '', 0);
            $pdf->Cell(150, 10, $consultorio->Nombre, 0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(50, 10, 'Fecha: '.date('d/m/Y').'', 0);
            $pdf->Ln(15);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8, '', 0);
            $pdf->Cell(100, 8, 'HISTORIA DEL PACIENTE', 0);
            $pdf->Ln(10);
            $pdf->Cell(120, 8, '', 0);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(20,10,'Medico: ',0);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(20,10,Auth::get('NombreCompleto'),0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(30,10,'Paciente: ',1);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(50,10,$paciente->Nombre,1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(30,10,'Direccion: ',1);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(50,10,$paciente->Direccion,1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(30,10,'Telefono: ',1);
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(50,10,$paciente->Telefono,1);
            $pdf->Ln(30);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8, '', 0);
            $pdf->Cell(100, 8, 'DETALLES DE LA CONSULTA', 0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(90, 8,'MEDICO TRATANTE:', 1);
            $pdf->Cell(90, 8,'FECHA DE LA CONSULTA:', 1);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(90, 10,Usuario::find($consultaFinal->Medico)->NombreCompleto,1,0, 'L');
            $pdf->Cell(90, 10,$consultaFinal->Fecha,1,0, 'L');
            $pdf->Ln(20);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8,'SINTOMAS:', 0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(100, 10,$consultaFinal->Sintomas,0,0, 'L');
            $pdf->Ln(20);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8,'DIAGNOSTICO:', 0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(100, 10,$consultaFinal->Diagnostico,0,0, 'L');
            $pdf->Ln(20);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8,'TRATAMIENTO:', 0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(100, 10,$consultaFinal->Tratamiento,0,0, 'L');
            $pdf->Ln(20);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(70, 8,'RECETA:', 0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(100, 10,$consultaFinal->Receta,0,0, 'L');
            $pdf->Ln(20);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell( 70, 8,'OBSERVACION:', 0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(100, 10,$consultaFinal->Observacion,0,0, 'L');
            $pdf->Ln(20);
            $pdf->Output();
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
                        'min' => 15,
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
                        'min' => 15,
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