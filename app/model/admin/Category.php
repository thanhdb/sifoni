<?php

namespace App\Model\admin;
use Sifoni\Model\Base;
use DB;
class Category extends Base {
	protected $table = "category";
	protected $primarykey = "id";
	public function getList(){
		$category = Category::where('status',1)->get();
		return $category;
	}

} 