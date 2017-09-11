<?php
namespace Admin\Model;
use Think\Model;

class RoleModel extends Model{

	protected $_validate = array(

		array('role_name','require','分类角色不能为空'),

		);

}