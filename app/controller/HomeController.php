<?php

namespace App\Controller;

use Sifoni\Controller\Base;
use App\Model\Content;
// use App\Model\Post;

class HomeController extends Base {
    public function indexAction() {
        $data['title']='Coffee Break';
        // $data['menu'] = Menu::where('status',1)->get();
        // $data['post'] =Post::where('status',1)->get();
		// $data['content'] = model('content')->all();
		$data['content'] = Content::all();
		// $data['template_file'] = 'index/index.php';
		// $data['sidebar_signin'] = 'sidebar/signin.php';
		// $data['sidebar_signup'] = 'sidebar/signup.php';

        return $this->render('default/home/index.html.twig', $data);
    }
    
}
