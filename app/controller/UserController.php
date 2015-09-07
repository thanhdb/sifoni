<?php
namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\Menu;
use App\Model\User;

class UserController extends Base
{
    public function indexAction() {
        $data['title'] = 'Đăng Nhập | Blog Tin Tức';
        $data['menu'] = Menu::where('status', 1)->get();
        if(isset($fullname)){
            return $this->redirect('userinfo');  
        }
        if ($this->getPostData("action")) {
            $postData = $this->getPostData();
            if(User::checkLogin($postData)!= Null) {
                echo "<script>alert('Đăng nhập thành công !')</script>";
                $dataget=User::checkLogin($postData);
                $name=$dataget['name'];
                $this->app['session']->set("fullname",$name);
                $fullname=$this->app['session']->get('fullname','Null');
                return $this->redirect('userinfo',$dataget);  
            }
            if (User::checkLogin($postData) == false) {
                echo "<script>alert('Đăng nhập thất bại !')</script>";
                header("Refresh:0; url='/login.html'");
                return $this->render('default/user/login.html.twig', $data);
            }
            exit();
        }
          return $this->render('default/user/login.html.twig', $data);
    }
    public function registerAction() {
        $data['title'] = 'Đăng Kí | Blog Tin Tức';
        $data['menu'] = Menu::where('status', 1)->get();
        return $this->render('default/user/register.html.twig', $data);
    }
    public function userinfoAction(){
        $data['title'] = 'Đăng Kí| Blog Tin Tức';
        $data['menu'] = Menu::where('status', 1)->get();
        return $this->render('default/user/detail.html.twig', $data);

    }
}
