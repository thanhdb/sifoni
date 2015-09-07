<?php

namespace App\Controller\admin;

use Sifoni\Controller\Base;
use App\Model\admin\Auth;
class AuthController extends Base {
    public function indexAction() {
      	$data['title']='Đăng Nhập Hệ Thống';
      	$data['notification']='';
        $nameAdmin=$this->app['session']->get('adminName','1');
        if($nameAdmin!=1){
            return $this->redirect('adminhome');  
        }
        if ($this->getPostData("login")) {
            $postData = $this->getPostData();
            if(Auth::checkLogin($postData)!= Null) {
                echo "<script>alert('Đăng nhập thành công !')</script>";
                $dataget=Auth::checkLogin($postData);
                $Name=$dataget['name'];
                $this->app['session']->set("adminName",$Name);
                $nameAdmin=$this->app['session']->get('adminName','Null');
                return $this->redirect('adminhome');  
            }
            if (Auth::checkLogin($postData) == false) {

               	$data['notification']='Đăng nhập thất bại vui lòng kiểm tra lại !';
                return $this->render('admin/auth/login.html.twig', $data);
            }
        }
        return $this->render('admin/auth/login.html.twig', $data);    
    }
    public function logoutAction(){
        $this->app['session']->clear();
        return $this->redirect('loginadmin');   
    }

}
