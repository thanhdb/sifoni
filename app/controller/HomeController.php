<?php

namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\Content;

class HomeController extends Base {
    public function indexAction() {
        $data['title']='Coffee Break';
		$data['content'] = Content::all();
        return $this->render('default/home/index.html.twig', $data);
    }
    
}
