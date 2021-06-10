<?php

namespace App\Controllers;

use App\Models\HomeModel;

class aboutus extends BaseController
{
    protected $HomeModel;
    public function __construct()
    {
        $this->HomeModel = new HomeModel();
    }

    public function index()
    {
        if (logged_in()) {
            $id = user_id();
            $data = [
                'cart' => \Config\Services::cart(),
                'user' => $this->HomeModel->getName($id)
            ];
        } else {
            $data = [
                'cart' => \Config\Services::cart(),
            ];
        }


        return view('cust-site/aboutus', $data);
    }
}
