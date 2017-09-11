<?php 
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model{

	protected  $_validata = array(

		array('cate_name','require','分类名称不能为空'),


		);

	public function getTree(){

		//select * from catetable order by path
		 return $this->order('path')->select();

	}


	public function _after_insert($data,$options){//获取插入成功之后的主键id


			 $cateId = $data['id'];//$data['id']表示表单传过来的id
			 //dump($cateId);die();
			//如果插入的数据是顶级分类，path就等于主键id
			 if($data['pid'] == 0){

			 	$insertdata = array(

			 		'id'=>$cateId,
			 		'path'=>$cateId,

			 		);

			 	$this->save($insertdata);

			 }else{   //表单获取的数据不是顶级分类

			 	$pid = $data['pid'];//表单传递过来的父级ID

			 	//dump($pid);die();
				
			 	$parentinfo = $this->find($pid);//查出表单传的数据的父级ID的数据信息

			 	//dump($parentinfo);

			 	$insertdata = array(

			 		'id'=>$cateId,//更新的条件

					'path'=>$parentinfo['path'].'-'.$cateId,//更新的内容
					);
					
					$this->save($insertdata);
			 }

	}

		public function getdata(){

			/* $rows=$this->select();
			
		 	dump($rows);die();取得分类列表的信息

*/           $data=$this->select();
		 		

		 		$catedate=array();
		 	

		 	
		 		foreach ($data as $k => $v) {


		 		if($v['pid']==0){ //寻找顶级分类
		 				//dump($v);是pid=0的顶级分类
		 			foreach($data as $key=>$value){//当前遍历的$value是$v的子级
		 				

		 				//dump($value);die();
		 				if($v['id']==$value['pid']){//如果子类pid等于$v中的id

		 					foreach($data as $k1=>$v1){
		 							//dump($v1);
		 						if($v1['pid']==$value['id']){

		 							$value['child'][]=$v1;
		 							//dump($v1);
		 							
		 						}
		 					}

		 					$v['child'][]=$value;
		 					//dump($value);

		 				}
		 				
		 				
		 			}
		 			//dump($v);

		 			$catedate[] = $v;//三级分类
		 			//dump($v);


		 		}

		 			
		 		}

		 		  return $catedate;
		 	}


		}

	 

