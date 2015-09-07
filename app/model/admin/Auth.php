<?php

namespace App\Model\admin;
use Sifoni\Model\Base;
use DB;
class Auth extends Base {
	protected $table = "user";
	protected $primarykey = "id";
	public function checkLogin($postData){
		$email=$postData['email'];
		$password=$postData['password'];
		$user = Auth::where('email', '=', $email)->first();
		if ($user && $user->password == md5($password)&&$user->role_id == 1) {
			return $user;
		}
		return false;
	}

} 