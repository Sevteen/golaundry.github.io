<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    var $folder = 'home/';
    var $layout = 'home/layout';

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'UserModel');
    }

    public function index(){
        $data = ['content' => $this->folder.('home')];
        $this->load->view($this->layout, $data);
    }

	public function ketentuan(){
		$data = ['content'	=> $this->folder.('sk')];
		$this->load->view($this->layout, $data);
	}

    public function status($id=null) {
		$id = $this->input->get('orderID');

		if(!$id){
			$data = [
				'content'	=> $this->folder.('status_order'),
				'tampil' 	=> null,
				'orderid'	=> ''
			];
		}else{
			$result = $this->UserModel->get_order_status($id);

			if(!$result){
				$data = [
					'content'	=> $this->folder.('status_order'),
					'tampil'	=> 'noData',
					'orderid'	=> $id
				];
			}else{
				$data = [
					'content'	=> $this->folder.('status_order'),
					'tampil' 	=> 1,
					'data'		=> $result,
					'orderid'	=> $id
				];
			}
		}
        $this->load->view($this->layout, $data);
    }

	public function harga(){      
		$data = [
			'content'	=> $this->folder.('tarif'),
			'data'		=> $this->UserModel->get_harga('jenispakaian')
		];
		$this->load->view($this->layout, $data);
	}

}