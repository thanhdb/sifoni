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

    public function cartAction()
    {
        $products = array();
        $data['title'] = 'Coffee Break';
        if($this->isPostRequest())
        {
            $product = $this->getPostData();

            if ($this->app['session']->has('product')) 
            {
                 $products = $this->app['session']->get('product');
            }
            
            if (!in_array($product, $products)) 
            {
                array_push($products, $product);
            }
            
           
            $this->app['session']->set('product',$products);
        }
        // dump($this->app['session']->get('product'));
        return $this->render('default/store/cart.html.twig',$data);
    }

    public function deleteAction()
    {
        $id = $_POST['pid']; 
        $products = $this->app['session']->get('product');
        foreach ($products as $key => $value) {
            if ($value['id'] == $id) {
                unset($products[$key]);
                break;
            }
        }
        $this->app['session']->set('product',$products);
        return 'ok';
    }
    
}
