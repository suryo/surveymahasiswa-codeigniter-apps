<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

	

	public function __construct()

	{

		parent::__construct();

		$this->load->model("model_users");
		//if($this->model_users->isNotLogin()) redirect(base_url());

	}
	
public function index()
	{
		$data=[
            'title' => 'User',
            'artikel' => $this->model_users->get_users(),
			'isi' => 'users/v_list',
		];
		$this->load->view('layout/v_wrapper', $data);
	}


	public function add()
	{
		$data=[
            'title' => 'Add User',
			'isi' => 'users/v_add',
		];
		$this->load->view('layout/v_wrapper', $data);
	}

	public function save_add()
	{
		$data=[
			'username' => $this->request->getPost('username'),
			'password' => $this->request->getPost('password'),
			'email' => $this->request->getPost('email'),
			'fullname' => $this->request->getPost('fullname'),
			'phone' => $this->request->getPost('phone'),
			'role' => $this->request->getPost('role'),
		];

		$this->model_users->insert_artikel($data);
		session()->setFlashdata('success','Data Berhasil Disimpan');
		return redirect()->to(base_url('users'));
	}

	public function edit($id)
	{
		$data=[
			'title' => 'Edit Users',
			'users' => $this->ArtikelModel->edit_artikel($id),
			'isi' => 'users/v_edit',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function update($id)
	{
		$data=[
			'author' => $this->request->getPost('author'),
			'title' => $this->request->getPost('title'),
			'description' => $this->request->getPost('description'),
			'url' => $this->request->getPost('url'),
			'urltoimage' => $this->request->getPost('urltoimage'),
			'publishedat' => $this->request->getPost('publishedat'),
			'content' => $this->request->getPost('content'),
		];

		$this->ArtikelModel->update_artikel($data, $id);
		session()->setFlashdata('success','Data Berhasil Diupdate');
		return redirect()->to(base_url('users'));

	}

	public function delete($id)
	{
		$this->ArtikelModel->delete_artikel($id);
		session()->setFlashdata('success','Data Berhasil dihapus');
		return redirect()->to(base_url('users'));
	}

	//--------------------------------------------------------------------



	

	 }