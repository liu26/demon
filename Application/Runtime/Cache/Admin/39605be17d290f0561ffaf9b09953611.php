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
            <form action="/index.php/Admin/test/add" method="POST" enctype="multipart/form-data" id='add_user_form'/>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>名称</td>
					
                    <td><input type="text" name="name" placeholder='name'/></td>
                </tr>

				 <tr>
                    <td>年龄</td>
                   
                       <td><input type="text" name="age" placeholder='age'/></td>
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
 <script type="text/javascript" src='/Public/laydate/laydate.js'></script>
 <script type="text/javascript" src='/Public/ueditor/ueditor.config.js'></script>
 <script type="text/javascript" src='/Public/ueditor/ueditor.all.min.js'></script> 
 <script type="text/javascript" src='/Public/ueditor/lang/zh-cn.js'></script>
   <script type="text/javascript">
    laydate({
        elem: "#add_time",
        istime: true,
        format: 'YYYY-MM-DD hh:mm:ss',
        choose: function(datas){
            // 选择完成后是否有其他的需求。 如果是一个好的插件，一般都会预留一个回调函数（callback）用户可以自己的扩展
           // alert(datas);
           // 插件：moment.js插件
           // http://momentjs.cn/docs/ 写接口的时候，返回的数据一般时间都是一个时间戳，需要在前台在自己去格式化时间
          }
    });
</script>
<script type="text/javascript">
  UE.getEditor('content',{
	initialFrameWidth:600, 
    initialFrameHeight:320,
  
  });
   
   </script>
</html>