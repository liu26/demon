<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
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
                <span style="float:left">当前位置是：添加商品-》添加商品</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
			<!--图片上传必须使用enctype属性!-->
            <form action="/index.php/Admin/Goods/add" method="POST" enctype="multipart/form-data" id='add_user_form'/>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
					
                    <td><input type="text" name="goods_name" placeholder='goods_name'/></td>
                </tr>

				 <tr>
                    <td>商品分类</td>
                    <td>
                        <select name="cate_id">

                            <option value="">请选择</option>
							<option value='0'>上级分类</option>
                        <?php foreach($rows as $k=>$v):?>
						<option value="<?php echo $v['id'];?>"><?php echo str_repeat('+',count(explode('-',$v['path']))). $v['cate_name'];?></option>
						<?php endforeach;?>
						</select>
                    </td>
                </tr>
					
					 <tr>
                    <td>商品类型</td>
                    <td>
                        <select name="type_id" class='goods_type'>

                            <option value="">请选择</option>
							 <?php foreach($types as $k=>$v):?>
							<option value="<?php echo $v['type_id'] ?>"><?php echo $v['type_name']; ?></option>
							<?php endforeach;?>
						
						
						</select>
                    </td>
                </tr>
				<tr>
                    <td>商品价格</td>
					
                    <td><input type="text" name="goods_price" placeholder='goods_price'/></td>
                </tr>

				<tr>
                    <td>商品库存</td>
					
                    <td><input type="text" name="goods_number" placeholder='goods_number'/></td>
                </tr>

				<tr>
                    <td>商品货号</td>
					
                    <td><input type="text" name="goods_sn" placeholder='goods_sn'/><font color='red'>*如果不写系统自动生成</font></td>
                </tr>
               
			   <tr>
                    <td>是否上架</td>
                    <td>
                        是<input type="radio" name="is_sale" value="1"  checked="checked" />
                        否<input type="radio" name="is_sale" value="0" />
                    </td>
                </tr>

				<tr>
                    <td>是否新品</td>
                    <td>
                        是<input type="radio" name="is_new" value="1"  checked="checked" />
                        否<input type="radio" name="is_new" value="0" />
                    </td>
                </tr>

				<tr>
                    <td>是否精品</td>
                    <td>
                        是<input type="radio" name="is_best" value="1"  checked="checked" />
                        否<input type="radio" name="is_best" value="0" />
                    </td>
                </tr>
               
				<tr>
                    <td>是否热销</td>
                    <td>
                        是<input type="radio" name="is_hot" value="1"  checked="checked" />
                        否<input type="radio" name="is_hot" value="0" />
                    </td>
                </tr>

					<tr>
                    <td>商品图片</td>
					
                    <td><input type="file" name="goods_img"/></td>

                </tr>

				<tr>
                    <td>商品时间</td>
					
                    <td><input type="text" name="add_time" id="add_time"/><font color='red'>*如果不写系统自动生成</font></td>
					
                </tr>

                <tr>
                    <td>关联商品</td>
                    
                    <td><select name="is_relation[]" multiple="multiple">
                        <option>请选择...</option>
                            <?php foreach ($lines as $k=>$v):?>
                            <option value="<?php $v['id'];?>"><?php echo $v['goods_name'];?></option>
                    <?php endforeach;?>
                    </select></td>
                    
                </tr>

				<tr>
                    <td>商品描述</td>
					
                    <td><textarea cols=30 rows=6 name='goods_descp'
					id='content'></textarea></td>

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
 <script type="text/javascript" src='/Public/laydate/laydate.js'></script>
 <script type="text/javascript" src='/Public/ueditor/ueditor.config.js'></script>
 <script type="text/javascript" src='/Public/ueditor/ueditor.all.min.js'></script> 
 <script type="text/javascript" src='/Public/ueditor/lang/zh-cn.js'></script>
   <script type="text/javascript">
    $('.goods_type').change(function(){
		
			$id = $(this).val();
			$.ajax({
			
				url:'/index.php/Admin/Goods/ajaxGetAttr';
				type:'get',
				datatype:'json',
				data:{'type_id':$id},

			success:function(){
			
				
			
			
			
			
			}
			
			
			})
	
	})
</script>
<script type="text/javascript">
  UE.getEditor('content',{
	initialFrameWidth:600, 
    initialFrameHeight:320,
  
  });
   
   </script>
</html>