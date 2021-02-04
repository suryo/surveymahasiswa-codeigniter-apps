<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

	

	public function __construct()

	{

		parent::__construct();

		$this->load->model("model_users");
		if($this->model_users->isNotLogin()) redirect(base_url());

	}
	
	public function index()
	{

		$queryperiode = $this->db->query("select * from periode_aktif where aktif = 1");

		$rowperiode = $queryperiode->row();

		if (isset($rowperiode))
		{
		$periode = $rowperiode->periode;
		}

		$data=[
			'periode' => $periode,
			'title' => 'DASHBOARD',
			'isi' => 'v_home',
		];
		$this->load->view('layout/v_wrapper', $data);
	}

	public function dashboard()
	{
		$queryperiode = $this->db->query("select * from periode_aktif where aktif = 1");

		$rowperiode = $queryperiode->row();

		if (isset($rowperiode))
		{
		$periode = $rowperiode->periode;
		}

		$data=[
			'periode' => $periode,
			'title' => 'DASHBOARD',
			'isi' => 'v_home',
		];
		$this->load->view('layout/v_wrapper', $data);
	}
	
		public function dashboard2()
	{
		$queryperiode = $this->db->query("select * from periode_aktif where aktif = 1");

		$rowperiode = $queryperiode->row();

		if (isset($rowperiode))
		{
		$periode = $rowperiode->periode;
		}

		$data=[
			'periode' => $periode,
			'title' => 'DASHBOARD 2',
			'isi' => 'v_home2',
		];
		$this->load->view('layout/v_wrapper', $data);
	}

		public function das10208()
	{
		$data=[
			'title' => 'DASHBOARD Informatika',
			'isi' => 'v_home_10208',
		];
		$this->load->view('layout/v_wrapper', $data);
	}

	public function set_angket_dosen()
	{
		$data=[
			'title' => 'SET ANGKET DOSEN',
			'isi' => 'v_home',
		];
		$this->load->view('layout/v_wrapper', $data);
	}

	public function set_angket_biro()
	{
		$data=[
			'title' => 'SET ANGKET BIRO',
			'isi' => 'v_home',
		];
		$this->load->view('layout/v_wrapper', $data);
	}
	






	 

	 }
