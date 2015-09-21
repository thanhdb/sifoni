<?php

namespace App\Controller\admin;

use Sifoni\Controller\Base;
use App\Model\admin\Auth;
use App\Model\User;
use App\Model\Content;
class AdminController extends Base 
{
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

    public function userAction()
    {
        $data['title'] = 'Quản trị hệ thống';
        $data['users'] = User::all();
        // dump($data['users']); die();

        return $this->render('admin/manage/user.html.twig', $data);
    }

    public function userDelAction($id)
    {
        $data['title'] = 'Quản trị hệ thống';
        User::where('id','=',$id)->delete();

        return $this->redirect('user_manager');
    }

    public function postAction()
    {
        $data['title'] = 'Quản trị hệ thống';
        $data['contents'] = Content::all();
        // dump($data['contents']); die;
        return $this->render('admin/manage/post.html.twig', $data);
    }

    public function postDelAction($id)
    {
        $data['title'] = 'Quản trị hệ thống';
        Content::where('id','=',$id)->delete();

        return $this->redirect('post_manager');
    }

    public function postAddAction()
    {
        $data['title'] = 'Quản trị hệ thống';
        if($this->isPostRequest())
        {
            $postData = $this->getPostData();
            Content::insert($postData);

            return $this->redirect('post_manager');
        }
        return $this->render('admin/manage/addpost.html.twig', $data);
    }

}
