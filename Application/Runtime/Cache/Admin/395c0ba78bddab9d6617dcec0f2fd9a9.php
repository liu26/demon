<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>分类列表</title>

        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="/Public/Js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：分类管理-》分类列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="#">【添加分类】</a>
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
                        <td>分类名称</td>
                      
                        <td align="center">操作</td>
                    
                    <tr>
                     
                        <?php foreach($rows as $k=>$v):?>
                        <tr>
                            <td><?php echo $v['id']; ?></td>
                            <td><?php echo str_repeat('&nbsp;', count(explode('-', $v['path']))*4) . $v['cate_name'];?></td>
							
                            <!-- index.php/Admin/User/edt/id/12.html -->
							
                          <td>
						  
                                <a href="<?php echo U('Category/edt');?>" id="<?php echo $v['id']; ?>">修改</a> 
								 <!--<a href="<?php echo U('Auth/del', array('auth_id' => $v['auth_id']), false);?>">删除</a> -->   
							
                                     <!-- javascript:;是阻止a标签页面跳转行为 -->
                                 
								<a href=" <?php echo U('Category/del'); ?>" class='del' id="<?php echo $v['id']; ?>">删除</a> 


                        
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

        $(".del").click(function(event) {
        // 点击之后 获取主键id 
        var _auth_id = $(this).attr('auth_id');
        var _That = this;
        // 发送ajax请求
        $.ajax({
            url: '/index.php/Admin/Category/ajaxDel',
            type: 'GET',
            dataType: 'json',
            data: {'auth_id' : _auth_id},
            success:function(json){

                if(json.sign == 0){
                    // 系统自带弹出框（模态框）1. 很丑 2. 阻塞代码
                    // 介绍：jbox Artdialog sweetalert
                    swal('提示', json.msg, 'success');
                    // 手工的去把当前的DOM行进行移除
                    $(_That).parent().parent().remove();
                    return true;

                }else if(json.sign == 1){
                     swal('提示', json.msg, 'error');
                    return false;
                }
            }
        });


    });

    </script>
	
</html>