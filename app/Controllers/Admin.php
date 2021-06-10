<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\HomeModel;
use App\Models\RentListModel;
use \Mpdf\Mpdf;

class Admin extends BaseController
{
	protected $AdminModel;
	protected $rentListModel;
	protected $orderModel;
	protected $orderDetailModel;
	public function __construct()
	{
		$this->AdminModel = new AdminModel();
		$this->rentListModel = new RentListModel();
		$this->orderModel = new OrderModel();
		$this->orderDetailModel = new OrderDetailModel();
		$this->HomeModel = new HomeModel();
	}

	// Ke halaman login
	// public function index()
	// {
	// 	$data = [
	// 		'title' => 'Login'
	// 	];
	// 	return view('admin/login', $data);
	// }

	// Dashboard Admin
	public function index()
	{
		if (logged_in()) {
			$iduser = user_id();
			$data = [
				'title' => 'Dashboard',
				'item' => $this->AdminModel->getProduct(),
				'user' => $this->HomeModel->getName($iduser)
			];
		} else {
			$data = [
				'title' => 'Dashboard',
				'item' => $this->AdminModel->getProduct()
			];
		}


		$users = new \Myth\Auth\Models\UserModel();
		$data['users'] = $users->findAll();

		return view('admin/dashboard', $data);
	}

	// Register Admin (sementara doang)
	// Tambah data
	public function add()
	{
		if (logged_in()) {
			$iduser = user_id();
			$data = [
				'title' => 'Add Product',
				'validation' => \Config\Services::validation(),
				'user' => $this->HomeModel->getName($iduser)
			];
		} else {
			$data = [
				'title' => 'Add Product',
				'validation' => \Config\Services::validation()
			];
		}

		return view('admin/add', $data);
	}

	public function save()
	{
		//validasi
		if (!$this->validate([
			'name' => [
				'rules' => 'required|max_length[30]|is_unique[products.nama]',
				'errors' => [
					'required' => 'Nama produk harus diisi.',
					'is_unique' => 'Nama produk sudah ada.',
					'max_length' => 'Nama produk tidak boleh melebihi 30 karakter.'
				]
			],
			'price' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga produk harus diisi.'
				]
			],
			'stock' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Stok produk harus diisi.'
				]
			],
			'gambar' => [
				'rules' => 'uploaded[gambar]|max_size[gambar,4096]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'uploaded' => 'Anda belum memasukkan gambar.',
					'max_size' => 'Ukuran gambar terlalu besar.',
					'is_image' => 'Yang Anda pilih bukan gambar.',
					'mime_in' => 'Yang Anda pilih bukan gambar.'
				]
			]
		])) {
			return redirect()->to(base_url() . '/Admin/add')->withInput();
		}

		// ambil gambar
		$fileGambar = $this->request->getFile('gambar');

		// generate nama gambar random
		$namaGambar = $fileGambar->getRandomName();

		// pindah file ke folder
		$fileGambar->move('img', $namaGambar);


		$this->AdminModel->save([

			'nama' => $this->request->getVar('name'),
			'id_category' => $this->request->getVar('category'),
			'harga' => $this->request->getVar('price'),
			'description' => $this->request->getVar('desc'),
			'gambar' => $namaGambar,
			'stock' => $this->request->getVar('stock')
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to(base_url() . '/Admin');
	}

	// Detail product
	public function detail($id)
	{
		if (logged_in()) {
			$iduser = user_id();
			$data = [
				'title' => 'Detail Product',
				'product' => $this->AdminModel->getProduct($id),
				'user' => $this->HomeModel->getName($iduser)
			];
		} else {
			$data = [
				'title' => 'Detail Product',
				'product' => $this->AdminModel->getProduct($id)
			];
		}


		if (empty($data['product'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Komik dengan id ' . $id . ' tidak ditemukan');
		}

		return view('admin/detail', $data);
	}

	// Edit product
	public function edit($id)
	{
		if (logged_in()) {
			$iduser = user_id();
			$data = [
				'title' => 'Edit Product',
				'validation' => \Config\Services::validation(),
				'product' => $this->AdminModel->getProduct($id),
				'user' => $this->HomeModel->getName($iduser)
			];
		} else {
			$data = [
				'title' => 'Edit Product',
				'validation' => \Config\Services::validation(),
				'product' => $this->AdminModel->getProduct($id)
			];
		}

		return view('admin/edit', $data);
	}
	public function update($id)
	{
		//Cek nama
		$namaLama = $this->AdminModel->getProduct($id);
		if ($namaLama['nama'] == $this->request->getVar('name')) {
			$rule_nama = 'required|max_length[30]';
		} else {
			$rule_nama = 'required|max_length[30]|is_unique[products.nama]';
		}


		if (!$this->validate([
			'name' => [
				'rules' => $rule_nama,
				'errors' => [
					'required' => 'Nama produk harus diisi.',
					'is_unique' => 'Nama produk sudah ada.',
					'max_length' => 'Nama produk tidak boleh melebihi 30 karakter.'
				]
			],
			'price' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga produk harus diisi.',
				]
			],
			'stock' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Stok produk harus diisi.',
				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,4096]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [

					'max_size' => 'Ukuran gambar terlalu besar.',
					'is_image' => 'Yang Anda pilih bukan gambar.',
					'mime_in' => 'Yang Anda pilih bukan gambar.'
				]
			]
		])) {
			return redirect()->to(base_url() . '/Admin/edit/' . $id)->withInput();
		}

		$fileGambar = $this->request->getFile('gambar');

		// cek gambar apakah tetap gambar lama
		if ($fileGambar->getError() == 4) {
			$namaGambar = $this->request->getVar('gambarLama');
		} else {
			// generate nama random
			$namaGambar = $fileGambar->getRandomName();
			// pindahkan gambar
			$fileGambar->move('img', $namaGambar);
			// hapus file lama
			unlink('img/' . $this->request->getVar('gambarLama'));
		}



		$this->AdminModel->save([
			'id_products' => $id,
			'nama' => $this->request->getVar('name'),
			'id_category' => $this->request->getVar('category'),
			'harga' => $this->request->getVar('price'),
			'description' => $this->request->getVar('desc'),
			'gambar' => $namaGambar,
			'stock' => $this->request->getVar('stock')
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to(base_url() . '/Admin');
	}

	// Delete product
	public function delete($id)
	{
		//cari gambar berdasarkan id
		$produk = $this->AdminModel->find($id);

		// hapus gambar
		if ($produk['gambar'] != 'default.jpg') {
			unlink('img/' . $produk['gambar']);
		}

		$this->AdminModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to(base_url() . '/Admin');
	}
	// Page Order
	public function order()
	{
		if (logged_in()) {
			$id = user_id();
			$data = [
				'cart' => \Config\Services::cart(),
				'title' => "Daftar Order",
				'content' => $this->orderDetailModel->getData(),
				'user' => $this->HomeModel->getName($id)
			];
		} else {
			$data = [
				'cart' => \Config\Services::cart(),
			];
		}

		return view('admin/order', $data);
	}

	public function updatestatus()
	{


		$data = $this->orderModel->getByToken($_POST['token']);
		$pesan = $_POST['submit'];
		if ($pesan == 'Order Selesai') {
			foreach ($data as $value) {
				$arrayidproducts = $this->orderDetailModel->getProducts(intval($value['id_order']));
				$idproducts = intval($arrayidproducts[0]['id_products']);

				$arraystocks = $this->rentListModel->getStock($idproducts);

				$newstock = intval($arraystocks[0]['stock']) + 1;

				$this->rentListModel->set('stock', $newstock);
				$this->rentListModel->where('id_products', $idproducts);
				$this->rentListModel->update();
				// d($newstock);	

				// $this->orderModel->set('status',$pesan);
				// $this->orderModel->where('id_order',intval($value['id_order']));
				// $this->orderModel->update();

			}
		}
		foreach ($data as $value) {
			// d($value);
			$this->orderModel->set('status', $pesan);
			$this->orderModel->where('id_order', intval($value['id_order']));
			$this->orderModel->update();
		}
		return redirect()->to('/admin/order');
	}

	public function report()
	{
		$id = user_id();
        $user = $this->HomeModel->getName($id);
		$transaction_date = date("Y-m-j");
		$data = $this->orderModel->getAllOrderDetails();
		
		$totalPricesfinal = $this->orderModel->getTotalPrice();
		$totalPricesfinal = $totalPricesfinal[0]['total'];
		
		
		$html = '<html>
        <head>
        <style>
        body {font-family: sans-serif;
            font-size: 10pt;
        }
        p {	margin: 0pt; }
        table.items {
            border: 0.1mm solid #000000;
        }
        td { vertical-align: top; }
        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        table thead td { background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }
        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }
        .items td.cost {
            text-align: "." center;
        }
        </style>
        </head>
        <body>
        <!--mpdf
        <htmlpageheader name="myheader">
        <table width="100%"><tr>
        <td width="50%" style="color:#00000; "><span style="font-weight: bold; font-size: 14pt;">Rentyay Corp</span><br />Summarecon Digital Center<br />Tangerang Selatan<br />15810<br /></td>
        <td width="50%" style="text-align: right;"><br /><span style="font-weight: bold; font-size: 12pt;">Admin Report</span></td>
        </tr></table>
        </htmlpageheader>
        <htmlpagefooter name="myfooter">
        <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
        Page {PAGENO} of {nb}
        </div>
        </htmlpagefooter>
        <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
        <sethtmlpagefooter name="myfooter" value="on" />
      
        <div style="text-align: right">Printed  Date: ' . $transaction_date . '</div>
        <table width="100%" style="font-family: serif;" cellpadding="10"><tr>
        <td width="45%" ><span style="font-size: 7pt; color: #555555; font-family: sans;">Printed by:</span><br /><br />' . $user['fullname'] . '<br />' . $user['email'] . '<br /><br />' . $user['no_telp'] . '</td>
        
        </tr></table>
        <br />
        <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <thead>
        <tr>
        <td width="20%">Nama User</td>
        <td width="20%">Nama Produk</td>
        <td width="15%">Lama peminjaman</td>
        <td width="15%">Tanggal Transaksi</td>
        <td width="15%">Tanggal Kembali</td>
        <td width="15%">Total Harga</td>
        </tr>
        </thead>
        <tbody>
        <!-- ITEMS HERE -->
        ';

		foreach($data as $d){
			$tanggalkembali = date('Y-m-d', strtotime($d['date']. '+'.intval($d['day'])." days"));
			$html .='
				<tr>
				<td>'.$d['namauser'].'</td>
				<td>'.$d['nama'].'</td>
				<td>'.$d['day'].' hari</td>
				<td>'.$d['date'].'</td>
				<td>'.$tanggalkembali.'</td>
				<td>Rp '.$d['total'].',00</td>
				</tr>
			';
		}
		$html .= '
        </tbody>
        </table>
        <br>
        <br>
        <div style="text-align: center; font-style: italic;">Total: Rp ' . $totalPricesfinal . ',00</div>
        </body>
        </html>
        ';
		$mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 48,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
		$mpdf->WriteHTML($html);
		return redirect()->to($mpdf->Output($user['fullname'].' admin report.pdf','I')); 
	}
}
