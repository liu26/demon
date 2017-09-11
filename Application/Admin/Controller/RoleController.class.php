<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=UTF-8");
class RoleController extends Controller{

	public function add(){

		$model = D('role');

		if(IS_POST){

		if($model->create()){//接收表单信息

			
			if($model->add()){

				$this->success('增加数据成功',U('add'));die();

			}else{

				$this->error('增加数据失败');
			}


		

		}else{

			$this->error('验证失败',$model->getError());
		}

	}

		$this->display();

	}

	public function lst(){

		$model = D('role');
		$row= $model->select();
		$this->assign('row',$row);
		$this->display();
	}


	public function edt(){

		$id = I('get.id');
		$model = D('role');

		if(IS_POST){

			if($model->create()){

				if($model->save()){

					$this->success('修改成功',U('lst'));exit();

				}else{

					$this->error('修改失败'.$model->error());
				}


			}else{

				$this->error('验证失败'.$modle->getDbError());
			}

		}	

			$row = $model->find($id);

			$this->assign('row',$row);
			
			$this->display();

	}

	public  function del(){

		$id = I('get.id');

		$model = D('role');

		$model->delete($id);

	}


}