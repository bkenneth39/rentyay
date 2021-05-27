<?php

namespace App\Controllers;

use App\Models\RentListModel;
use App\Models\HomeModel;

class RentList extends BaseController
{
    protected $rentListModel;

    public function __construct()
    {
        $this->rentListModel = new RentListModel();
        $this->HomeModel = new HomeModel();
    }

    public function index($params = '')
    {
        if ($params === '') {
            $list = $this->rentListModel->getAll();
        } else if ($params === 'allGames') {
            $list = $this->rentListModel->getAllGames();
        } else if ($params === 'allAccessories') {
            $list = $this->rentListModel->getAllAccessories();
        } else {
            $list = $this->rentListModel->getByCategory($params);
        }
        if (logged_in()) {
            $id = user_id();
            $data = [
                'title' => 'Store',
                'list' => $list,
                'cart' => \Config\Services::cart(),
                'user' => $this->HomeModel->getName($id)
            ];
        } else {
            $data = [
                'title' => 'Store',
                'list' => $list,
                'cart' => \Config\Services::cart()
            ];
        }

        

        return view('cust-site/products', $data);
    }

    public function detail($params = '')
    {
        $list = $this->rentListModel->getSpecific($params);
        if (logged_in()) {
            $id = user_id();
            $data = [
                'title' => $params,
                'list' => $list,
                'cart' => \Config\Services::cart(),
                'user' => $this->HomeModel->getName($id)
            ];
        } else {
            $data = [
                'title' => $params,
                'list' => $list,
                'cart' => \Config\Services::cart()
            ];
        }

        return view('cust-site/detail', $data);
    }
}
