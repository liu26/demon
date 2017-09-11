<?php

namespace Admin\Controller;
use Think\Controller;
header('Content-type:text/html;charset=UTF-8');

class BackController extends Controller {
    //
    public function login(){

      
      if(IS_POST){

        $model = D('User');
        //验证通过后tp实际上认为create是增加数据的方法，除非后面有个主键id作为编辑或删除，还有就是自定义create第二个参数
         
        if($model->create(I('post.'),8)){//4代表是登录的处理，用模型调用create方法，可以接收数据和验证（先验证）

         $status = $model->login();//从数据库中做验证

          if($status === true){

             $this->success('登录成功',U('Index/index'));die();
          }else{
            //true表示登录成功，1和2是自定义
              if($atatus == 1){
                  $this->error('用户不存在');

              }else{

                $this->error('用户名或密码不存在',$model->getError());
              }

          }
        }

       }

       $this->display();
    }

    public function logout(){
        session(null);
        $this->success('退出成功',U('back/login'));

    }

	public function code(){
        //在tp框架手册中专题的里面，快速生成验证码
    $config = array(  'fontSize'  =>  20,   // 验证码字体大小    
                      'length'    =>  2,     // 验证码位数    
                      'useNoise'  =>  true, // 关闭验证码杂点);
                
                );

            $Verify =  new \Think\Verify($config);
            $Verify->entry();

  }

	public function left(){
       $this->display();
    }

	public function right(){
       $this->display();
    }
}