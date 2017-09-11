<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>权限列表</title>

        <link href="/Public/css/sweetalert.css" type="text/css" rel="stylesheet" />
		  <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="/Public/Js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：权限管理-》权限列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="#">【添加权限】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    用户<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">1</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                
                        <td>序号</td>
                        <td>权限名称</td>
						<td>权限上级id</td>
                        <td>权限控制器</td>
                        <td>权限方法</td>
                      
                        <td align="center">操作</td>
                    
                    <tr>
                     
                        <?php foreach($rows as $k=>$v):?>
                        <tr>
                            <td><?php echo $v['auth_id']; ?></td>
                            <td><?php echo str_repeat('&nbsp;',$v['level']*5).$v['auth_name'];?></td>
							<td><?php echo $v['auth_pid']; ?></td>
                            <td><?php echo $v['auth_c'];?></td>
                            <td><?php echo $v['auth_a']; ?></td>
                           
                            <!-- index.php/Admin/User/edt/id/12.html -->
							
                           <td>
						  
                            <a  href =  "<?php echo U('Auth/edt', array('auth_id'=>$v['auth_id']),false); ?>">修改</a> 

								 <!--<a href="<?php echo U('Auth/del', array('auth_id' => $v['auth_id']), false);?>">删除</a>  -->
							
                                      <!--javascript:;是阻止a标签页面跳转行为--> 
                                 
								<a href="javascript:;" auth_id="<?php echo ($v['auth_id']); ?>" class='del'>删除</a>

                        
                            </td>
							
							
                        </tr>
                    <?php endforeach; ?>
                  
                        
                  
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            [1]
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    <script type="text/javascript">

    $('del').click(function(event){
	
		var _auth_id = $(this).attr('auth_id');//通过a链接获取auth_id
		$.ajax({
			url:"/index.php/Admin/Auth/ajaxDel",
			data:{"auth_id":_auth_id},
			dataType:"json",
			type:"get",
			success:function(json){

				console.log(json);
			}
	
		});

		
			
});

    </script>
	
	<script type="text/javascript" src="/Public/Js/sweetalert.min.js"></script>
	
</html>