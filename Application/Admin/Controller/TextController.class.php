<?php
namespace Admin\Controller;
use Think\Controller;


class TextController extends Controller{

	public function add(){
		$model = D('users');
		if(IS_POST){

		if($model->create()){
		//dump($rows);die();
			if($model->add()){

				$this->success('添加成功',U('add'));exit();

			}else{

				$this->error('添加失败'.$model->getDbError());
			}


		}else{

			$this->error('验证没有通过'.$model->getError());
		}
		




		}
		
	$this->display();
	}


	public function login(){


		if(IS_POST){

			$model = D('users');

			$rows= $model->create(I('post.'));
			//dump($rows);die();

			$model->login();
			



		}

		$this->display();



	}
}