<?php
namespace Admin\Model;
use Think\Model;
header("Content-type:text/html;charset=UTF-8");

class GoodsModel extends Model{

	protected $_validate  = array(//自动验证

		array('goods_name','require','商品名必填'),
		array('goods_price','require','商品价格必填'),
		array('goods_number','require','库存必填'),
		//array('goods_sn','require','商品货号必填'),

		);

	protected $_auto = array(//自动完成

		array('goods_sn','_checkSn',1,'callback'),//调用_checkSn函数
		array('add_time','_checkTime',1,'callback'),//调用_checkTime函数

		);

	public function _checkSn($goods_sn){
		//dump($goods_sn);die();
			if($goods_sn){

				return $goods_sn;
			}else{
				return 'goods_sn_'.date('YmdH').uniqid('',ture);//uniqid的用法和date的用法
			}

	}


	public function _checkTime($time){
		//dump(234);die();
		if($time){
			return strtotime($time);//转化为时间戳
		}
			else{

			return time();//z转化为时间戳
	}



	}

	public function _before_insert(&$data,$options){  //文件上传

		//$data['is_relation'] = implode(',', $data['is_relation']);

			//dump($data);die();//传过来的是表单传递过来的数据但是没有goods_img
		$rootPath = C('UPLOAD_ROOT_PATH');//上传图片保存的路径

		$phpinifilesize = (int)ini_get('upload_max_filesize');//从PHP配置文件中读取上传图片文件的大小
		//dump($phpinifilesize);die();//最大的上传文件的大小是2M

		$configfilesize = (int)C('UPLOAD_FILE_SIZE');//重新设置上传的图片的大小
		//dump($configfilesize);die();
		
		$filesize = min($phpinifilesize,$configfilesize);//min函数返回最小的数?

		//dump($filesize);die();
		$exts = C('UPLOAD_ALLOW_EXTS');//允许上传的文件后缀
		//dump($exts);die();
		
	
		//完成上传
		$config = array(    'maxSize'    =>   $filesize *1024*1024,  //单位换算不太会  
							'rootPath'   =>    $rootPath,    
							'saveName'   =>    array('uniqid',''), //uniqid什么意思？   
							'exts'       =>    $exts,    
							'savePath'   =>    'Goods/',//保存路径是从二级目录开始
							
					);

		//实例化上传类
	
		$upload = new \Think\Upload($config);

		$info = $upload->upload();//失败返回false，否则返回数组
			
			//dump($upload);die();
			if($info){

				//dump($info);die();
				//上传图片的保存路径
			 $url = $info['goods_img']['savepath'].$info['goods_img']['savename'];

			 $data['goods_img'] = $url;

			 $thumbname = $info['goods_img']['savepath'].'thumb_'.$info['goods_img']['savename'];
			 $data['goods_thumb'] =  $thumbname;

			$image = new \Think\Image(); 

			$image->open($rootPath.$url);
			//将图片裁剪为400x400并保存为corp.jpg
			$image->thumb(400,400)->save($rootPath.$thumname);

			}else{

				$error = $upload->getError();
				$this->$error = $error;
				return false;
			}

		
	}

	public function _before_delete($options){

		$goodsID = $options['where']['id'];

		//dump($goodsID);die();

	}

	  public function _before_update(&$data,$options){
	  	//dump($options);die();//打印的是表名、模型名还有where下有个id值
	  	//$_FILES:
				if($_FILES['goods_img']['error'] == 0){

					$goodsId =$options['where']['id'];

					$info  = $this->field('goods_img,goods_thumb')->find($goodsId);
					//dump($info);die();//good_img和good_thumb的地址

					foreach ($info as $k => $v){

						//dump($k);die();//图片的链接地址
						$path = C('UPLOAD_ROOT_PATH').$V;//图片的全路径

						@unlink($path);
					}

					return $this->_uploadImg($data,$options);

				}




	}

	public function getgoods($type,$number=5){

		$where = array(
			'is_delete'=>0,
			'is_sale'=>1,

			);
		if($type=='is_crazy'){

			return $this->where($where)->order('goods_price asc')->limit($number)->select();


		}
		if($type=='is_guess'){

			return $this->where($where)->order('rand')->limit($number)->select();
		}

		$where[$type] = 1;
		// " is_delete = 0 and is_sale = 1 and is_new = 1";
		return $this->where($where)->limit($number)->select();

			
		
	}
}

			



		