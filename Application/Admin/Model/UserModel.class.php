<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
	//使用create创建对象会自动验证
	 protected $_validate = array(
	 	array('captcha','_checkCode','验证码不正确',1,'callback',8),

	 	array('username', 'require', '用户名不能为空'),
		// 但是我们在新增是不能为空，但是在更新的是时候是可以为空的
		array('password', 'require', '密码不能为空', 1, 'regex', 1),//了解里面的参数是什么意思

		// 确认密码
		array('pwd', 'password', '确认密码不一致', 1, 'confirm',1), // 注意 最后一个参数，执行的时间 add update
		array('email', 'require', '邮箱不能为空'),
		array('email', 'email', '邮箱格式不合法'),

		// 唯一性验证
		array('username', '', '用户名重复', 1, 'unique',1),//新增
		array('username', '', '用户名重复', 1, 'unique',2),//更改
		array('email', '', '邮箱重复', 1, 'unique',1),//新增php里面最后的逗号写上 js里面不要写 json字面量对象
		array('email', '', '邮箱重复', 1, 'unique',2),//更改




	 	);

	 //使用create创建对象可以自动完成，添加add_time
	protected $_auto = array(

		array('add_time','time',1,'function'),


		); 

	 //插入前的钩子
	 public function _before_insert(&$data){
	 		//$data表示验证通过的数据
	 		//dump($data)表示二维数组dump($data['password'])找出接收到的密码。
	 		
	 		$salt = uniqid();
	 		$data['salt'] = $salt;//把$salt添加到$data的数组中
	 		//dump($data);
	 		$data['password'] = md5(md5($data['password']).$salt);//入库
	 		//dump($data['password']);



	 }

	 public function _before_update(&$data,$option){
	 	//1空密码不做处理   2密码要加密
	 		//$data['password'] = '';
	 		if($data['password']){
	 			$salt = uniqid();
	 		$data['salt'] = $salt;//把$salt添加到$data的数组中
	 		//dump($data);
	 		$data['password'] = md5(md5($data['password']).$salt);

	 		}else{

	 			unset($data['password']);
	 		}
	 		
	 }

	 public function login(){

	 	//$username=I('post.username');等同于下面
	 	
	 
		// 规定 $username = I('post.username');
		// 为什么可以？ 面向对象 ---> 父类--> model.class.php --> 魔术方法__get()
		$username = $this->username;
		$password = $this->password;

		$where = array('username' => $username);
		$info = $this->where($where)->find();
		$salt = $info['salt'];
		/*dump(I('post.password'));
		dump($info['password']);
		dump(md5( md5($password) . $salt ));die;*/
		if($info){
			
			// 合法$info['password']表示数据表里客户录入的信息
			if( md5( md5($password) . $salt ) == $info['password'] ){
				// 登录成功 记录标识
				session('id', $info['id']); // TP里面提供的
				session('username', $info['username']);
				return true;
			}else{
				// 密码错误
				return 2;
			}
		}else{
			// 用户不存在
			return 1;
		}
		
	}


	protected function _checkCode($code){//验证码的设置方式

		$verify = new\Think\Verify();

		return $verify->check($code,'');

	}

}