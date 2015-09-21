<?php

namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\Content;

class PostController extends Base{
	public function showAction($id)
	{
		$data['title'] = 'Coffee Break';
    	$data['contents'] = Content::where('id','=',$id)->get()[0];
    	return $this->render('default/post/detail.html.twig',$data);
	}
}