<?php
namespace App\Model;


use Sifoni\Model\Base;

class Payment extends Base {
	protected $table = "payments";
	protected $primarykey = "id";
	public $timestamps = false;
	protected static $unguarded = true;

} 