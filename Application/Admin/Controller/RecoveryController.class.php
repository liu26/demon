<?php
namespace Admin\Controller;
use Think\Controller;

class RecoveryController extends FatherController{

	public function lst(){
		$id = I('get.id');

		$model = D('goods');

		$modeldata = $model->where('is_delete=1')->select();
		$this->assign('modeldata',$modeldata);
		$this->display();
	}

	public function del(){

		$del_id = I('get.id');
		$model = D('goods');
		if($model->delete($del_id)){

			$this->success('删除成功',U('Recovery/lst'));die();
		}

				$this->error('删除失败',U('Recovery/lst'));
	}

		public function reback(){

			$id = I('get.id');
			//dump($id);die();
			$model = M('goods');
			
			$where=array('id'=>$id);
			//dump($where);die();
			$status = $model->where($where)->setField('is_delete',0);

			if($status){

				$this->success('还原成功',U('goods/lst'));die();
			}
				$this->error('还原失败'.$model->getError());
		}



}