<?php


function removeXSS($val){

	static $obj = null;

	if($obj === null){

		require './Public/HTMLPurifier/HTMLPurifier.includes.php';

		$obj = new HTMLPurifier();
	}

	return $obj->purify($val);
}

	/*function sendMail($to, $from, $object,$content){

		header("Content-type:text/html;charset=utf-8");
		//引入邮件类
		require './PHPMailer/class.phpmailer.php';
		
		$mail = new PHPMailer();

		//服务器相关信息
		$mail->IsSMTP();
		$mail->SMTPAuth   = true;
		//设置 SMTP 服务器, 自己注册邮箱服务器地址(建议使用163)
		$mail->Host       = 'smtp.163.com';    

		//需要自己手工的配置 不要加域名
		$mail->Username   = 'lym741530381';
		$mail->Password   = 'liu123';  
		//发信人的邮箱授权码，千万不要写成密码了

		//内容信息
		$mail->IsHTML(true); 	//指定邮件内容格式为：html，代表在邮件的内容里面可以正常的解析html代码，不会吧html代码转换为普通字符串输出
		$mail->CharSet    ="UTF-8";	//编码
		
		//【注意】发件人完整的邮箱名称
		$mail->From       = 'lym741530381@163.com';	 
		
		$mail->FromName   = $from;	 //发信人署名
		$mail->Subject    = "PHP邮件测试";  	 //信的标题
		$mail->MsgHTML( $content );  	//发信主体内容

		//发送邮件 添加收件人地址
		$mail->AddAddress( $to );  //收件人地址
				
		//使用send函数进行发送
		if( $mail->Send() ) {

			echo "发送邮件成功！☺";
		  	// return true;

		} else {
		    	//如果发送失败，则返回错误提示	
		    	
		    	echo $mail->ErrorInfo;
		    	echo "发送邮件失败！";
		    	// return false;
		}

	}
	$url = "<a href='http://www.baidu.com'>点击激活</a>";

	sendMail('741530381@qq.com', '刘宇梅', '测试邮件 '. $url );*/

 ?>
