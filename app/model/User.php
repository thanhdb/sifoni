<?php

namespace App\Model;


use Sifoni\Model\Base;
use DB;
class User extends Base {
	protected $table = "users";
	protected $primarykey = "id";
	public function authLogin($postData)
	{
		$email=$postData['email'];
		$password=$postData['password'];
		$user = User::where('email', '=', $email)->get()[0];
		if ($user && $user['password'] == md5($password)) 
		{
			unset($user['password']);
			
			return $user;
		}

		return false;
	}

	public function authRegister($postData) 
	{
        // $user = static::getOneBy($postData['email'], 'email');
        $ok = User::where('email', '=', $postData['email'])->get();
        if (isset($ok[0]) ) 
        {
        	
            return false;
        } 
        else 
        {

            $postData['password'] = md5($postData['password']);

            User::insert($postData);
            unset($postData['password']);
            // $postData['id'] = $user_id;
            // $_SESSION['logged'] = $postData;
            return $postData;
        }
    }

} 