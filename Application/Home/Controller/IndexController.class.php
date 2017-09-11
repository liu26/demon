<?php
namespace Home\Controller;
use Think\Controller;

        class IndexController extends Controller{

    		public function index(){
    			$model = D('Admin/category');
    			$rows=$model->getdata();
    			//dump($rows);die();
    			$this->assign('rows',$rows);
    			//首页栏
    			$row=$model->where('pid=0 and is_show=1')->select();
    			$this->assign('row',$row);

    			
    			/*$good=$goodsmodel->select();
    			//dump($good);die();
    			$this->assign('good',$good);*/

    			$goodsModel = D("Admin/Goods");
        		$this->assign(array(
            'crazyData' => $goodsModel->getGoods('is_crazy', 2),
            'guessData' => $goodsModel->getGoods('is_guess', 3),
            'newData' => $goodsModel->getGoods('is_new', 4),
            'bestData' => $goodsModel->getGoods('is_best'),
            'hotData' => $goodsModel->getGoods('is_hot', 1),

        		));

      			$this->display();

    		
    		}

    		public function detail(){

    			 $goodsId = I('get.goods_id');
		        $goodsModel = D("Admin/Goods");
		        $goodsInfo = $goodsModel->find($goodsId);
		        dump($goodsInfo);die();
		        $this->assign('goodsInfo', $goodsInfo);


    			$this->display();
    			
    		}

}