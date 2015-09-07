<?php

namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\Menu;
use App\Model\Post;

class HomeController extends Base {
    public function indexAction() {
        $data['title']='Blog Tin Tức';
        $data['menu'] = Menu::where('status',1)->get();
        $data['post'] =Post::where('status',1)->get();
        return $this->render('default/home/index.html.twig', $data);
    }
    public function testAction(){
        $data['title']='Tin Nổi Bật | Blog Tin Tức';
        $data['menu'] = Menu::where('status',1)->get();
        return $this->render('default/category/index.html.twig', $data);
    }
}
