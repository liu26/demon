<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改用户</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：用户管理-》修改用户信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/index.php/Admin/User/edt" method="post" enctype="multipart/form-data">

			<input type='hidden' name='id' value="<?php echo $row['id']; ?>"> 
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>用户名称</td>
                    <td><input type="text" name="username" value="<?php echo $row['username']; ?>"  /></td>
                </tr>
                <tr>
                    <td>用户角色</td>
                    <td>
                        <select name="role_id">
                            <option>请选择</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>密码</td>
                    <td>
                        <input type='password' name='password'/><font color='red'>*密码为空表示不用修改</font>
                    </td>
                </tr>
                <tr>
                    <td>确认密码</td>
                    <td><input type="password" name="pwd" value="" /></td>
                </tr>
                <tr>
                    <td>用户图片</td>
                    <td><input type="file" name="f_goods_image" value="./img/2013-12-33.jpg" /></td>
                </tr>
                <tr>
                    <td>用户详细描述</td>
                    <td>
                        <textarea name="mark_up"><?php echo $row['mark_up']; ?></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>