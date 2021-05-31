<?php 

namespace App\Models;

use CodeIgniter\Model;

class RentListModel extends Model{ 
    protected $table = 'products';
    protected $primaryKey = 'id_products';
    protected $allowedFields = ['nama', 'id_category', 'harga', 'description', 'gambar', 'stock'];
    public function getAll(){
        $this->orderBy('id_category', 'ASC');
        return $this->findAll();
    }

    public function getAllGames(){
        $this->where('id_category >=', 2);
        $this->where('id_category <=', 5);
        $this->orderBy('id_category', 'ASC');
        return $this->findAll();
    }

    public function getStock($idproducts){
       
        $this->where('id_products',$idproducts);
        $this->select('stock');
        return $this->findAll();
        
        
    }

    public function getAllAccessories(){
        $this->where('id_category >=', 6);
        $this->where('id_category <=', 9);
        $this->orderBy('id_category', 'ASC');
        return $this->findAll();
    }

    public function getByCategory($category){
        $this->join('category', 'category.id_category = products.id_category', 'INNER');
        $this->select('products.*');
        $this->where(['category.jenis_category' => $category]);
        $this->orderBy('products.id_category', 'ASC');
        return $this->findAll();
    }

    public function getSpecific($nama){
        return $this->where(['nama' => $nama])->first();
    }
}