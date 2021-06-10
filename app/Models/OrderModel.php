<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_orders';
    protected $allowedFields = ['id_user', 'transaction_date', 'total', 'status', 'uniqueCode', 'token'];

    public function getByToken($token)
    {
        $this->select('id_order');
        $this->select('id_user');
        $this->select('status');
        $this->select('token');
        $this->where(['token' => $token]);
        return $this->findAll();
    }

    public function getAllOrderDetails()
    {
        $this->join('products', 'products.id_products = orders.id_order', 'INNER');
        $this->join('orderdetails', 'orderdetails.id_order = orders.id_order', 'INNER');
        $this->join('users', 'users.id = orders.id_user', 'INNER');
        $this->select('GROUP_CONCAT(products.nama) AS nama');
        $this->select('users.fullname AS namauser');
        $this->select('orders.transaction_date AS date');
        $this->select('orderdetails.day AS day');
        $this->select('orders.total AS total');
        $this->groupby('orders.token');
        $this->orderby('date', 'desc');
        return $this->findAll();
    }

    public function getTotalPrice(){
        $this->selectSum('total');
        return $this->findAll();
    }
}
