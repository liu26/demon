<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>回收列表</title>

        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="/Public/Js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：回收管理-》回收列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="#">【添加回收信息】</a>
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
                        <td>商品名称</td>
                        <td>商品价格</td>
                        <td>商品库存</td>
                        <td>商品货号</td>
                        <td>是否上架</td>
                        <td>是否新品</td>
                       
                        <td></td>
                        <td align="center">操作</td>
                    
                    <tr>
                     
                        <?php foreach($modeldata as $k=>$v):?>
                        <tr>
                            <td><?php echo $v['id']; ?></td>
                            <td><?php echo $v['goods_name'];?></td>
							<td><?php echo $v['goods_price']; ?></td>
                            <td><?php echo $v['goods_number'];?></td>
                            <td><?php echo $v['goods_sn']; ?></td>
							<td><?php echo $v['is_sale']==1? '上架':'下架'; ?></td>
                            <td><?php echo $v['is_new']==1?'是':'否';?></td>
							<td><?php echo date('Y-m-d H:i:s', $v['add_time']); ?></td>
                           
                            <!-- index.php/Admin/User/edt/id/12.html -->
							
                           <td>
						  
                            <a href = "<?php echo U('Recovery/reback', array(id=>$v['id']),false); ?>">还原</a> 

								 <!--<a href="<?php echo U('Auth/del', array('auth_id' => $v['auth_id']), false);?>">删除</a> -->   
							
                                     <!-- javascript:;是阻止a标签页面跳转行为 -->
                                 
								<a href="<?php echo U('Recovery/del', array('id' => $v['id']), false);?>" class='del' >删除</a> 


                        
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
            url: '/index.php/Admin/Recovery/ajaxDel',
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