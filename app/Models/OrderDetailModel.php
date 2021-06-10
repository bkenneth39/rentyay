<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'orderdetails';
    protected $allowedFields = ['id_order', 'id_products', 'day'];
    public function getData()
    {
        $this->join('products', 'products.id_products = orderdetails.id_products', 'INNER');
        $this->join('orders', 'orders.id_order = orderdetails.id_order', 'INNER');
        $this->select('GROUP_CONCAT(products.nama) AS nama');
        $this->select('orders.transaction_date AS date');
        $this->select('orderdetails.day AS day');
        $this->select('orders.status AS status');
        $this->select('orders.token AS token');
        $this->groupby('orders.token');
        $this->orderby('date','desc');


        return $this->findAll();
    }

    public function getProducts($idorder){
        $this->where('id_order',$idorder);
        $this->select('id_products');
        return $this->findAll();
    }
}
