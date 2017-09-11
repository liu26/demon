<?php
namespace Admin\Controller;
use Think\Controller;

class FatherController extends Controller{

	public function __construct(){

		parent::__construct();//要先继承父类的构造方法,对象实例化就被马上调用

		if(!session('?id')){
			
			$this->error('必须登录后才能访问');
		}

	}


}
