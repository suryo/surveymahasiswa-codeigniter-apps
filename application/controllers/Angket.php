<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Angket extends CI_Controller {

	

	public function __construct()

	{

		parent::__construct();

		$this->load->model('model_angket');

	}
	
	public function index()

	{

		$this->load->view('front_angket');

		

	}
	
	public function redir()

	{

		$something = $this->input->get('nim');

		if ($something =="")

		{
			redirect(base_url('angket'));
		}

		else

		{	
		redirect(base_url('index.php/angket/nim/'.$something));
		}

	}



public function nim()

	{
		$this->load->database();


		$queryperiode = $this->db->query("select * from periode_aktif where aktif = 1");

$rowperiode = $queryperiode->row();

if (isset($rowperiode))
{
	$periode = $rowperiode->periode;

}

		
		//$periode = "20201";

		$filter = $this->uri->segment(3);

		$field 	= 'nim';

		$this->data['bpm_angket_mahasiswas'] = $this->db->query("select *, (select ba.angket from bpm_angket as ba where ba.id = bam.id_angket) as angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.nim = ".$filter)->result();

		$this->data['bpm_angket_mahasiswa_counts'] = $this->db->query("select * from ".$periode."_bpm_angket_mahasiswa where nim like '%".$filter."%'")->num_rows();



		$config = [

			'base_url'     => 'administrator/bpm_angket_mahasiswa/index/',

			'total_rows'   => $this->db->query("select * from ".$periode."_bpm_angket_mahasiswa where nim like '%".$filter."%'")->num_rows(),


			'per_page'     => 100,

			'uri_segment'  => 4,

		]; 

		//$this->data['pagination'] = $this->pagination($config);
		$this->load->view('angket_list', $this->data);

		

	 }

	 

	 }

