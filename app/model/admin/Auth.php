<?php

namespace App\Model\admin;
use Sifoni\Model\Base;
use DB;
class Auth extends Base {
	protected $table = "admin";
	protected $primarykey = "id";
	public function checkLogin($postData){
		$email=$postData['email'];
		$password=$postData['password'];
		$user = Auth::where('email', '=', $email)->first();
		if ($user && $user->password == md5($password)) {
			return $user;
		}
		return false;
	}

} 