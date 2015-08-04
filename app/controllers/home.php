<?php
class Home
{
	public function __construct(){
		/*if(Auth::isLoggedIn()){
			Redirect::to('admin/index');
		}*/
	}

	public function index(){
		View::render('index');
	}

	public function test(){
		var_dump($_SESSION);
	}


	public function login(){
		if(Input::exists()){
			if(Token::check(Input::get('token'))){
				$validate = new Validate();
				$validation = $validate->check($_POST,array(
					'DNI' => array('required' => true),
					'Contrasena' => array('required' => true)
				));
				if($validation->passed()){			
					$login = Auth::login(
						Input::get('DNI'),
						Input::get('Contrasena')
					);
					if($login){
						Redirect::to('admin/index');
						die();
					}else{
						Session::flash('login',array(
	                    	'message' => 'Usuario o Passwords Incorrectos!',
	                    	'class' => 'danger'
	                    ));
					}
				}else{
					Session::flash('errores',$validation->errors());
				}
			}
		}
		Redirect::to('home/index');
	}

}