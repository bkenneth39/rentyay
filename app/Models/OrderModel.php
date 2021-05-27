<?php 

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model{
    protected $table = 'orders';
    protected $primaryKey = 'id_orders';
    protected $allowedFields = ['id_user', 'transaction_date','status','uniqueCode','token'];


    public function getByToken($token){
        $this->select('id_order');
        $this->select('id_user');
        $this->select('status' );
        $this->select('token' );
        $this->where(['token'=>$token]);
        return $this->findAll();
    }
}