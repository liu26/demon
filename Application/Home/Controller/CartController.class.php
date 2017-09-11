<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=UTF-8");

      class CartController extends Controller{

		public function addtoCart(){

				$goodsattrData = I('post.');
				//dump($goodsattrData);
				unset($goodsattrData['goods_id']);
				unset($goodsattrData['amount']);
				//dump($goodsattrData);

				$goods_id = I('post.goods_id');
				$goodsnumber = I('post.amount');
				$goodsAttrId = implode(',', $goodsattrData);

				$cartModel = D('Cart');
				$cartModel = addtoCart($goodsAttrId,$goodsnumber,$goodsAttrId);

				$this->success('添加成功',U('Cartlist'));exit();
		}

}