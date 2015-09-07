<?php

namespace App\Model;


use Sifoni\Model\Base;
use DB;
class User extends Base {
	protected $table = "user";
	protected $primarykey = "id";
	public function checkLogin($postData){
		$username=$postData['username'];
		$password=$postData['password'];
		$user = User::where('username', '=', $username)->first();
		if ($user && $user->password == md5($password)) {
			return $user;
		}

		return false;
	}

} 