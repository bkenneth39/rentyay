<?php

namespace App\Controllers;

use App\Models\RentListModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\HomeModel;

class Cart extends BaseController
{
    protected $rentListModel;
    protected $orderModel;
    protected $orderDetailModel;

    public function __construct()
    {
        $this->rentListModel = new RentListModel();
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
        $this->HomeModel = new HomeModel();
    }

    public function index()
    {

        // Call the cart service
        $cart = \Config\Services::cart();

        // $cart->insert(array(
        //     'id'      => $this->request->getPost('id_products'),
        //     'qty'     => $this->request->getPost('day'),
        //     'price'   => $this->request->getPost('harga'),
        //     'name'    => $this->request->getPost('name')
        //  ));

        $cart->insert(array(
            'id'      => intval($this->request->getPost('id_products')),
            'qty'     => intval(1),
            'price'   => intval($this->request->getPost('harga')),
            'name'    => $this->request->getPost('name'),
            'options' => array('Gambar' => $this->request->getPost('gambar'))
        ));

        $carts = ($cart->contents());

        // d($carts);

        // foreach($carts as $key=>$value){
        //     d($value['id']);
        //     d($value['qty']);
        //     d($value['price']);
        //     d($value['name']);
        //     foreach($value['options'] as $opt){
        //         d($opt);
        //     }
        // }

        $cart->contents();

        session()->setFlashdata('message', 'Barang berhasil ditambahkan');

        return redirect()->to(base_url() . '/rentlist');
    }

    public function check()
    {
        if (logged_in()) {
            $id = user_id();
            $data = [
                'title' => "check",
                'cart' => \Config\Services::cart(),
                'user' => $this->HomeModel->getName($id)
            ];
        } else {
            $data = [
                'title' => "check",
                'cart' => \Config\Services::cart(),
            ];
        }

        return view('cust-site/cart', $data);
    }

    public function remove()
    {
        $cart = \Config\Services::cart();

        $cart->remove($_POST['rowid']);

        if((count($cart->contents()) === 0)){
            return redirect()->to(base_url().'/rentlist');
        }
        else{
            return redirect()->to(base_url() . '/cart/check');
        }
        
    }

    public function checkout(){
        $cart = \Config\Services::cart();
        $cartcontent = $cart->contents();
        $iduser = user_id();
        // dd();
        $counter = 1;
       
        function generateRandomString($length = 5) 
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            
            $charactersLength = strlen($characters);
            
            $randomString = '';
            
            for ($i = 0; $i < $length; $i++) {
            
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            
            }
            
            return $randomString;
        }

        $token = generateRandomString();
        
       
        // dd(date("j-m-Y"));

        foreach($cartcontent as $key=>$value){
            $repeat = 1;
            while($repeat==1){
                $uniqueCode = generateRandomString();
                if($uniqueCode!=$token){
                    $repeat = 0;
                }
            }
            
            $this->orderModel->save([
                'id_user' => $iduser,
                'transaction_date' => date("Y-m-j"),
                'total' => intval($value['price']) * intval($value['qty']),
                'status' => "Sedang Dikirim",
                'uniqueCode' => $uniqueCode,
                'token' => $token
            ]);
            $idorder = $this->orderModel->where(['uniqueCode'=>$uniqueCode]);
            $idorder = $this->orderModel->findColumn('id_order');
           
           
            $this->orderDetailModel->save([
                'id_order' => intval($idorder[0]),
                'id_products' => intval($value['id']),
                'day' => intval($value['qty'])
            ]);

            $stokproduct = $this->rentListModel->where(['id_products'=>$value['id']]);
            $stokproduct = $this->rentListModel->findColumn('stock');
            $stok = intval($stokproduct[0]);
            $stok--;
            $this->rentListModel->save([
                'id_products' => $value['id'],
                'stock' => $stok
            ]);

        } 

        $cart->destroy();
        return redirect()->to(base_url());

    }

    public function calculate(){
        $cart = \Config\Services::cart();
        
        // $cart->update(array(
        //     'rowid' => 'c99754250277f4e9efaf649e3f9fe241',
        //     'id' => 1,
        //     'qty' => $this->request->getPost('day'),
        //     'price' => 110000,
        //     'name' => 'PlayStation 5 Console',
        //     'options' => array('Gambar' => 'ps5.png')
        // ));

        foreach($cart->contents() as $value){
            // d($value['options']['Gambar']);

            $cart->update(array(
                'rowid'   => $value['rowid'],
                'id'      => intval($value['id']),
                'qty'     => intval($this->request->getPost('day')),
                'price'   => intval($value['price']),
                'name'    => $value['name'],
                'options' => array('Gambar' => $value['options']['Gambar'])
            ));

        }
        return redirect()->to(base_url().'/cart/check');
    }
}
