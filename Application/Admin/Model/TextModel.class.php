<?php
namespace Admin\Model;
use Think\Model;

class TextModel extends Model{


	dfdgfgh

	protected $_validate = array(
		//echo 123;
		
		array('name','require','用户名必须要填'),
		array('passwd','require','密码必须要填'),



		);


	protected $_auto = array(

		array('addtime','time',1,'function'),

		)


	public function login(){

		$name= I('post.name');

		$password = I('post.passwd');

		dump($name);die();

		$where = array('name'=>$name);

		$info = $this->where($where)->find();

		$info['salt'] = $salt;

		if(md5(md5('passwd'.salt))==$password){

			
		}

	}


}
