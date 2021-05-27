<?php

namespace App\Models;

use CodeIgniter\Model;

class MyOrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_orders';
    protected $allowedFields = ['id_user', 'transaction_date', 'status', 'uniqueCode', 'token'];

   
}
