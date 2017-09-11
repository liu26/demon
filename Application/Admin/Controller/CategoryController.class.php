<?php
namespace Admin\Controller;
use Think\Model;


class CategoryController extends FatherController{

		public function add(){

		$model = D('category');

		if(IS_POST){

		if($model->create()){
			//echo 44;
			//dump($model->create());die;

			if($model->add()){


				$this->success('插入成功',U('lst'));die();

			}else{

				$this->error('插入失败',$model->getDbError());
			}

		}else{

			$this->error('验证不通过',$model->getDberror());
		}


}	
	//显示增加页面分类栏目信息
		$rows = $model->getTree();
		$this->assign('rows',$rows);
		$this->display();	//增加页面的html页面的信息展示不是很懂	


	}

	public function lst(){

		 $model = D('Category');

		 $rows = $model->getTree();

		$this->assign('rows',$rows);

		$this->display();

	}


}
		
		

		
		

	

	