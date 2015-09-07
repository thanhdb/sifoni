<?php

namespace App\Controller\admin;

use Sifoni\Controller\Base;
use App\Model\admin\Category;

class CategoryController extends Base {
    public function indexAction() {
    	$data['title']='Quản lý danh mục tin tức';
    	$data['fullname']=$this->app['session']->get('adminName','1');
    	$data['control']='Quản lý danh mục tin tức';
     	$data['category']=Category::getList();
     	return $this->render('admin/category/list.html.twig', $data);    
    }

}
