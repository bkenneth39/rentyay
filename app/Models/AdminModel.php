<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_products';
    protected $allowedFields = ['nama', 'id_category', 'harga', 'description', 'gambar', 'stock'];

    public function getProduct($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_products' => $id])->first();
    }
}
