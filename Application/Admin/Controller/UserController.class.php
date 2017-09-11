<?php

namespace Admin\Controller;
use Think\Model;

class UserController extends FatherController{
	
	public function add(){
		//接收post传过来的数据
		if( IS_POST ){
		
		$usermodel = D("User");
        if($usermodel->create()){//接收表单传送post的数据dump(I('post.'));

        	if($usermodel->add()){

        		$this->success('添加成功',U('Index/index'));die();

        	}else{

        		$this->error('添加失败',$usermodel->getDbError());
        	}

        }else{

        	$this->error('验证失败'.$usermodel->getDbError());
        }

       
		
	}
		
		$this->display();
	
	}



	public function lst(){
		//调用模型查询表格所有数据
		$model=D('User');
		$rows = $model->select();
		//dump($rows);die();
		$this->assign('rows',$rows);
		
		$this->display();


	
	}

	public function edt(){

			$model = D('User');
			
		if(IS_POST){

			if($model->create()){
				//进到这里表示验证通过
				if($model->save() !==false){//save方法返回的值是受影响的行数，可能为0，即什么也没有修改，直接提交。
					$this->success('更新成功','U("lst")');die();


				}else{
					$this->error('更新失败'.$model->getDbErrord());

				}

			}else{
			$this->error('验证失败'.$model->getDbError());


		}
	}

		
		

		//将编辑页面的数据回显
		$id=I('get.id');

		
		$row = $model->find($id);

		$this->assign('row',$row);
		$this->display();
	}


	public function del(){
		//接收客户传过来要修改的id
		$id=I('get.id');
		//dump($id);
		$model = D('User');

		if($model->delete($id)){

			$this->success('删除成功',U('lst'));die;

		}else{
			$this->error('删除失败',$model->getDbError());
		}
	}



}
