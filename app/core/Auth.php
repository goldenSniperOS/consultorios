<?php
class Auth
{
	public static function get($attribute = null){
		if($attribute){
			if(Session::exists(Config::get('session/session_name'))){
				$user = Session::get(Config::get('session/session_name'));
				if($user){
					if(property_exists($user, $attribute)){
						return $user->{$attribute};
					}	
				}
			}
		}
		return null;
	}

	public static function login($username = null,$password = null,$remember = null){
		$class = Config::get('user/user_class');
		if($username != null && $password != null){
			$user = $class::find($username,Config::get('user/userField'));
			if($user != null){
				var_dump(self::getPermissions($user));
				if($user->{Config::get('user/passwordField')} === Hash::make($password)){
					//Estas Tres Lineas Loguean realmente al Usuario				
					Session::put('ListPermission',self::getPermissions($user));
					Session::put('isLoggedIn',true);
					Session::put(Config::get('session/session_name'),$user);

					if($remember && Config::get('session/activeDatabase')){
						$hash = Hash::unique();
						$hashCheck = DB::getInstance()->get(Config::get('session/table'),
							[
								[Config::get('session/primaryKey'),'=',$user->{$user->getInfo('primaryKey')}]
							])->first();
						if($hashCheck == null){
							DB::getInstance()->insert(Config::get('session/table'),[
								Config::get('session/primaryKey') => $user->{$user->getInfo('primaryKey')},
								Config::get('session/hashField') => $hash
							]);
						}else{
							$hash = $hashCheck->{Config::get('session/hashField')};
						}
						Cookie::put(Config::get('remember/cookie_name'),$hash,Config::get('remember/cookie_expiry'));
					}
					return true;
				}
			}
		}
		return false;
	}

	public static function logout(){
		if(Session::exists(Config::get('session/session_name')) && Config::get('session/activeDatabase')){
			$user = Session::get(Config::get('session/session_name'));
			if($user){
				DB::getInstance()->delete(Config::get('session/table'),[
					[Config::get('session/primaryKey'),'=',$user->{$user->getInfo('primaryKey')}]
				]);
			}
		}
		Session::delete('isLoggedIn');
		Session::delete('ListPermission');
		Session::delete(Config::get('session/session_name'));
		Cookie::delete(Config::get('remember/cookie_name'));
	}

	public static function getPermissions($user = null){
		if($user){
			$foreignGroup = Config::get('user/foreignGroup');
			$grupo =  DB::getInstance()->table(Config::get('groups/table'))->where(Config::get('groups/primaryKey'),$user->{$foreignGroup})->exec()[0];
			return json_decode($grupo->{Config::get('groups/permissionField')});
		}
		return false;
	}

	public function hasPermission($key){
		if(Session::exists('ListPermission')){
			if(property_exists(Session::get('ListPermission'), $key)){
				return Session::get('ListPermission')->{$key};
			}
		}
		return false;
	}

	public function isLoggedIn(){
		if(Session::exists('isLoggedIn')){
			return Session::get('isLoggedIn');
		}else{
			if(Cookie::exists(Config::get('remember/cookie_name'))){
				$hashCheck = DB::getInstance()->get(Config::get('session/table'),
				[
					[Config::get('session/hashField'),'=',Cookie::get(Config::get('remember/cookie_name'))]
				])->first();
				if($hashCheck){
					$class = Config::get('user/user_class');
					$user = $class::find($hashCheck->{Config::get('session/primaryKey')});
					
					Session::put('ListPermission',self::getPermissions($user));
					Session::put('isLoggedIn',true);
					Session::put(Config::get('session/session_name'),$user);
					
					return Session::get('isLoggedIn');
				}
			}
		}
		return false;
	}
}
?>