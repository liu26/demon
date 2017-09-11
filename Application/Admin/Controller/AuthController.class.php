<?php
namespace Admin\Controller;
use Think\Controller;

class AuthController extends FatherController{
     
	public function add(){
		$model = D('Auth');

		if(IS_POST){

		if($model->create()){

			if($model->add()){

				$this->success('插入数据成功',U('Index/index'));die();
			
			}else{

				$this->error('插入失败',$model->getDbError());
			}


		}else{
			$this->error('验证失败',$model->getError());
		}

		

	}

		$authdatas= $model->getTree();
		//dump($authdatas);die();

		$this->assign('authdatas',$authdatas);
		$this->display();

  }
  		
  		public function lst(){
  			$model = D('Auth');
  			//dump($model);die();
  			$rows= $model->getTree();
  			//dump($rows);die();
  			$this->assign('rows',$rows);

  			$this->display();
  		}


  		/*public function del(){
        //ajax访问失败，弹出框插件安装失败

  				 $id = I('get.auth_id');

  				 $model = D('Auth');

  				 $status = $model->checkChild($id);//checkChild方法返回函数输出的值

  				 //dump($status);die();

  				 if($status){

  				 	$this->error('删除失败,当前权限存在子级');

  				 }

  						$model->delete($id);

  				 		$this->success('删除成功',U('lst'));exit();
  				 	
  				 		
  				 	

  		}
*/
  		public function ajaxDel(){

  			$id = I('get.auth_id');

  			$model = D('Auth');
  			
  			 $status = $model->checkChild($id);

  			 if($status){

  			 	$data = array(

  			 		'sign'=>1,
  			 		'code'=>'has child',
  			 		'msg'=>"存在子级，不能删除",

  			 		);

  			 	echo json_encode($data);exit();//json_encode和json_decode分别表示什么？
         //dump($data);die();  			 }

  			 $modle->delete($id);

  			 $data = array(
  			 	'sign'=>0,
  			 	'code'=>'success',
  			 	'msg'=>"删除成功",

  			 	);
         
  			 echo json_encode($data);exit();
  		}
   }


	
  public function edt(){
    $model = D('auth');
      
    $id = I('get.auth_id');
     
     
       if(IS_POST){
        
          $_POST['auth_id'] = $id;
         
         if($model->create()){


          if($model->save()){//save后面不是要传递id？

            $this->success('更新成功',U('Auth/lst'));die();

          }else{

            $this->error('更新失败'.$model->getDbError());
          }


         }else{

          $this->model('验证失败'.$model->getError());
         }
        
      
      }
        

        $row=$model->find($id);


        //dump($row);exit;
        
        $this->assign('row',$row);


       $this->display();
  }

}