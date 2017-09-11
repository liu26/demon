<?php
namespace Admin\Controller;
use Think\Controller;


class GoodsController extends FatherController{

	public function add(){//添加方法中商品的描述还是带有html的标签，

		if(IS_POST){
			
			
		 $model = D('goods');

		 //dump($model);die();
//dump($model->create());die();
		 if($model->create()){

		 	if($model->add()){

		 		$this->success('增加数据成功',U('add'));exit();
		 	}else{

		 		$this->error('增加数据失败',$model->getDbError());
		 	}
		 }else{

		 	$this->error('验证没有通过',$model->getError()); 
		 }

		 		

		}

		 $model = D('Category');
		 $rows=$model->getTree();
		 $this->assign('rows',$rows);

		 $typemodel = M('type');
		 $types= $typemodel->select();
		 $this->assign('types',$types);
		 


		 $model=D('goods');
		 $lines=$model->where('is_delete=0 and is_sale=1')->select();
		 $this->assign('lines',$lines);
		 //dump($lines);die();
		 $this->display();
}


		public function lst(){

			$model = D('goods');

			$rows=$model->where('is_delete=0')->select();

			$this->assign('rows',$rows);

			$this->display();
		}

		public function edt(){

			$id = I('id');

			$model = D(goods);

			if(IS_POST){

				if($model->create()){

					if($model->save()){

						$this->success('成功',U('lst'));die();

					}else{

						$this->error('更改失败'.$model->getError());
					}


				}else{

					$this->error('验证失败');
				}
			}

			$row=$model->find($id);
			$this->assign('row',$row);
			

			//商品需要分类，所以要调用分类模型
			     $catemodel = D('Category');
			     $cateData = $catemodel->getTree();
			     $this->assign('cateData',$cateData);
			     $this->display();

			
		}


		public function del(){

			$id = I('get.id');
			//dump($id);die();
			$model = M('goods');

			$status = $model->where(array('id'=>$id))->setField('is_delete',1);
			//dump($status);die();
			if($status!==false){

				$this->success('加入回收站成功',U('Recovery/lst'));exit();
			}else{
				$this->error('加入回收站失败',$model->getDbError());
			}
		}

	}



