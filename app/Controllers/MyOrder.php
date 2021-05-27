<?php

namespace App\Controllers;


use App\Models\RentListModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\HomeModel;

class MyOrder extends BaseController
{

    protected $rentListModel;
    protected $orderModel;
    protected $orderDetailModel;
    protected $HomeModel;

    public function __construct()
    {
        $this->rentListModel = new RentListModel();
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
        $this->HomeModel = new HomeModel();
    }

    public function index(){
        // $content = $this->orderDetailModel->getData();
        
        // d($this->orderDetailModel->getData());
        // foreach($content as $value){
        //     $nama = explode(',',$value['nama']);
        //     foreach($nama as $nm){
        //         d($nm);
        //     }
        //     d($value['date']);
        //     d($value['day']);
        //     d($value['status']);
        //     d($value['token']);
        // }
        
        if (logged_in()) {
			$id = user_id();
			$data = [
				'cart' => \Config\Services::cart(),
				'user' => $this->HomeModel->getName($id),
                'content' => $this->orderDetailModel->getData()
			];
		} else{
			$data = [
				'cart' => \Config\Services::cart(),
			];
		}
 
        
        return view('cust-site/myorder',$data);
    }

    public function updatestatus(){

	
		$data = $this->orderModel->getByToken($_POST['token']);
		$pesan = $_POST['submit'];
		foreach($data as $value){
			// d($value);
			$this->orderModel->set('status',$pesan);
			$this->orderModel->where('id_order',intval($value['id_order']));
			$this->orderModel->update();
			
		}
		return redirect()->to('/myorder');
	}
}
