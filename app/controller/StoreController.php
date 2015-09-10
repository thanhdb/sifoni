<?php

namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\Product;
// use App\Model\Post;

class StoreController extends Base {
    public function indexAction() {
        $data['title']='Coffee Break';
        // $data['menu'] = Menu::where('status',1)->get();
        // $data['post'] =Post::where('status',1)->get();
		// $data['content'] = model('content')->all();
		$data['product'] = Product::all();

        return $this->render('default/store/index.html.twig', $data);
    }

    public function detailAction($id)
    {
    	$data['title'] = 'Coffee Break';

    	$data['detail'] = Product::where('id','=',$id)->get()[0];
    	
    	return $this->render('default/store/detail.html.twig',$data);
    }
    
}
