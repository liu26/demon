<?php
return array(
	//'配置项'=>'配置值'
	
	/*数据库设置*/

	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sh_',    // 数据库表前缀

    "TMPL_PARSE_STRING"=>array(

    		//'ADMIN_PUBLIC'=>'/Application',
    		'ADMIN_STATIC'=>'/Public',
    		
    		),
    "DEFAULT_FILTER"      =>  'removeXSS',
    'UPLOAD_ROOT_PATH'    =>  './Public/Uploads/',//前面加个./和/有什么区别?
    'UPLOAD_FILE_SIZE'    =>'3M',
    'UPLOAD_ALLOW_EXTS'   =>array('jpg','jpeg','gif','png'),//允许上传的后缀
    'VIEW_ROOT_PATH'      =>'/Public/Uploads/',
    'SHOW_PAGE_TRACE'     =>true,
);