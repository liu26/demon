<?php
namespace Admin\Model;
use Think\Model;
header('Content-type:text/html;charset=UTF-8');
class AuthModel extends Model{

	//create方法里面的自动验证
	protected $_validate = array(

		//验证的顺序是跟数据表里的顺序是一样
		array('auth_name','require','权限名称不能为空'),
		array('auth_c','require','权限控制器不能为空'),
		array('auth_a','require','权限方法不能为空'),
		array('auth_pid','require','权限上级id不能为空'),


		);


	public function getTree(){

		//使用递归取出数据
		$data = $this->select();
	//dump($data);die();//输出的是查询到auth表中的数据（二维数组）
		//递归
		return $this->_getTree($data);//return是返回到哪里了？

		//dump($data);die();
	}


	public function _getTree($data,$pid=0,$level=0){
			//dump($data);die();//得到的是一个数据表中的二维数组
		static $list = array();
		foreach ($data as $k => $v) {
			if($v['auth_pid'] == $pid){
				$v['level'] = $level;
				$list[] = $v;
				$this->_getTree($data, $v['auth_id'], $level+1);
			}
		}
		
		return $list;
	}

	public function checkChild($id){

		//dump($id);die();//传送在列表页点击要删除权限的auth_id
		$where = array('auth_pid' => $id);//条件是删除的id这条记录有其他记录的pid等于该条记录的id
		
		//dump($where);

		 return $this->where($where)->find();
	}
}	