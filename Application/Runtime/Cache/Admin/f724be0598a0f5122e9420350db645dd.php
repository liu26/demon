<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加权限</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="../../../../Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/Public/Css/completer.css">
       

         <style type="text/css">
            label.error{
                padding: 5px;
                margin-left: 5px;
                color: red;
            }
        </style>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：用户权限-》添加用户权限</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
			
            <form action="/index.php/Admin/auth/add" method="POST" enctype="multipart/form-data" id='add_user_form'/>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>权限名称</td>
					
                    <td><input type="text" name="auth_name" placeholder='auth....'/></td>
                </tr>
                <tr>
                    <td>顶级权限</td>
                    <td>
                        <select name="auth_pid">

                            <option value="">请选择</option>
							<option value='0'>顶级权限</option>
                        <?php foreach($authdatas as $k=>$v):?>
						<option value="<?php echo $v['auth_id'];?>"><?php echo str_repeat('+',$v['level']*3). $v['auth_name'];?></option>
						<?php endforeach;?>
						</select>
                    </td>
                </tr>

				 <tr>
                    <td>权限方法</td>
					<td>
                     <input type="text" name="auth_a" value="" placeholder="auth_a..."/><font color="red">*顶级权限则写为null</font>
					 </td>

                </tr>
                <tr>
                    <td>权限控制器</td>
                    <td>
                       <input type="text" name="auth_c" value="" placeholder="auth_c..."/> <font color="red">*顶级权限则写为null</font>
                    </td>
                </tr>
               

				<tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
   <script type="text/javascript" src='/Public/Js/jquery-1.7.2.min.js'></script>

   <script type="text/javascript" src='/Public/Js/jquery.validate.min.js'></script>
   <script type="text/javascript" src='/Public/Js/validate_zh_cn.js'></script>
   <script type="text/javascript" src='/Public/Js/completer.min.js'></script>
   
   <script type="text/javascript">
       

    $("#auto_email").completer({
        separator: "@",
        source: ["163.com", "qq.com", "126.com", "139.com", "gmail.com", "hotmail.com", "icloud.com", 'tx.com.cn']
    });


   </script>

   <script type="text/javascript">
       //错误的提示信息实际上是在input框后面加了个label标签
       $("#add_user_form").validate({
        rules: {
            username: {
                required: true, // 代表是必须填写
                rangelength: [2, 8] // 长度
            },
            password: {
                required: true, // 代表是必须填写
                rangelength: [2, 8] // 长度
            },
            pwd: {
                required: true, // 代表是必须填写
                rangelength: [2, 8], // 长度 
                equalTo: "#password" // ID选择器,井号表示密码的id是password，要与password密码一样
            },
            email: {
                required: true,
                email: true
            }
        }
    });
   </script>
</html>