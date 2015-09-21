<?php

namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\Product;
use App\Model\Payment;
// use App\Model\Post;

class StoreController extends Base {
    public function indexAction() {
        $data['title']='Coffee Break';
		$data['product'] = Product::all();
        return $this->render('default/store/index.html.twig', $data);
    }

    public function detailAction($slug)
    {
    	$data['title'] = 'Coffee Break';
    	$data['detail'] = Product::where('slug','=',$slug)->get()[0];
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

    public function paymentAction()
    {
       
        $user_id = $this->app['session']->get('logged')['id'];

        $paid_day = date("Y-m-d");
        if( $postData = $this->getPostData())
        {
            foreach ($postData['name'] as $key => $value) 
            {
                $payment = new Payment([
                    'user_id'       => $user_id, 
                   'product_id'    => $key,
                   'product_name'  => $postData['name'][$key],
                   'quantity'      => $postData['quantity'][$key],
                   'prices'        => $postData['prices'][$key],
                   'paid_day'      => $paid_day
                ]);
                $payment->save();
            }
            // echo "<pre";
            // print_r($this->app['session']->get('logged')['id']);
            // $this->app['session']->remove('product');
            return 'true';
        }
    }
    
}
