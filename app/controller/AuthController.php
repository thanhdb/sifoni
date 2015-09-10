<?php
    
namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\User;
use App\Model\Content;

class AuthController extends Base
{
    function loginAction() 
    {
        $data = array();
        if ($this->isPostRequest()) 
        {
            $postData = $this->getPostData();
            
            if ($user = User::authLogin($postData)) 
            {
            
                $this->app['session']->set('logged', $user);
            } 
            else 
            {
                $data['error'] = 'Login failed ! Please try again !';
            }
        }   

        $data['title'] = "Coffee Break";
        $data['content'] = Content::all();
        return $this->render('default/home/index.html.twig', $data);

    }

    function registerAction() 
    {
        $data = array();
        
        if ($this->isPostRequest()) 
        {
            $postData = $this->getPostData();
            if ($user = User::authRegister($postData)) 
            {
                $this->app['session']->set('logged', $user);
            } 
            else 
            {
                $data['error'] = 'Register failed ! Email exists ! Please try again !';
                // $data['postData'] = $postData;
            }
        }
        $data['title'] = "Coffee Break";
        $data['content'] = Content::all();
        return $this->render('default/home/index.html.twig', $data);
    }

    function logoutAction() {
        $this->app['session']->remove('logged');
        return $this->redirect('home');
    }
}