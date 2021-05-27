<?php 

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model{ 
    protected $table = 'users';

    public function getName($id){
        return $this->where(['id' => $id])->first();
    }
}
?>