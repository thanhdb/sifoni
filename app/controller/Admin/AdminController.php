<?php

namespace App\Controller\admin;

use Sifoni\Controller\Base;
use App\Model\admin\Auth;
class AdminController extends Base {
    public function indexAction() {
        return $this->redirect('loginadmin');  
    }
    public function homeAction(){
        $nameAdmin=$this->app['session']->get('adminName','1');
        if($nameAdmin==1){
            return $this->redirect('loginadmin'); 
        }
    	$data['title']='Quản trị hệ thống';
        $data['fullname']=$this->app['session']->get('adminName','Null');
    	return $this->render('admin/home/index.html.twig',$data);
    }

}
