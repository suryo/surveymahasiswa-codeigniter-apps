<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Set_angket extends CI_Controller {

	

	public function __construct()

	{

		parent::__construct();

$this->load->model('model_angket_mahasiswa');

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
	
	public function view_dosen()
	{
		$queryperiode = $this->db->query("select * from periode_aktif where aktif = 1");

		$rowperiode = $queryperiode->row();

		if (isset($rowperiode))
		{
		$periode = $rowperiode->periode;
		}
	$data=[
			'periode' => $periode,
            'title' => 'Set Angket Dosen',
			'isi' => 'admin/v_set_angket_dosen',
		];
		$this->load->view('layout/v_wrapper', $data);
									
	} 
	
	public function add_set_dosen()
	{
			
			$periode=intval($this->input->get('periode'));
		    $kodeunit=$this->input->get('program_studi');
		    $kelasmk=$this->input->get('kelas');	
			$this->data['periode'] = $periode;
			$this->data['kodeunit'] = $kodeunit;

				$query = $this->db->query("select mhs.nim, mhs.nama, krs.periode, krs.kodeunit ,krs.kodemk,krs.kelasmk,krs.kodeunit,ajr.nipdosen from 
".$periode."_akademik_ms_mahasiswa as mhs,
".$periode."_akademik_ak_krs as krs,
".$periode."_akademik_ak_mengajar as ajr
WHERE
mhs.nim = krs.nim and
ajr.kelasmk = krs.kelasmk and
ajr.periode = krs.periode AND
ajr.thnkurikulum = krs.thnkurikulum AND
ajr.kodemk = krs.kodemk  AND
ajr.kelasmk = krs.kelasmk and
ajr.kodeunit = krs.kodeunit AND
krs.periode = ".$periode." and
krs.kodeunit = ".$kodeunit." and krs.kelasmk = '".$kelasmk."' order by krs.nim asc")->result();   



				  
		// $this->template->title('Data KRS Mahasiswa');
		// $this->render('backend/standart/administrator/bpm_angket_mahasiswa/mahasiswa_krs_list', $this->data);				

$data=[
            'title' => 'Set Angket Dosen',
			'periode' => $periode, 
			'kodeunit' => $kodeunit,
			'kelasmk' =>  $kelasmk,
			'mhskrs' => $query,
			'isi' => 'admin/v_set_angket_dosen_add',
		];
		$this->load->view('layout/v_wrapper', $data);
		
	}
	
	

	public function view_biro()
	{
	// $this->template->title('Data KRS Mahasiswa');
	// $this->render('backend/standart/administrator/bpm_angket_mahasiswa/view_set_angket_biro', $this->data);				
	$queryperiode = $this->db->query("select * from periode_aktif where aktif = 1");

		$rowperiode = $queryperiode->row();

		if (isset($rowperiode))
		{
		$periode = $rowperiode->periode;
		}


	$data=[
		'periode' => $periode,
            'title' => 'Set Angket Biro',
			'isi' => 'admin/v_set_angket_biro',
		];
		$this->load->view('layout/v_wrapper', $data);	
	}
	
	
	public function add_set_biro()
	{		
			$periode=intval($this->input->get('periode'));
		    $kodeunit=$this->input->get('program_studi');
		    $kelasmk=$this->input->get('kelas');	
			$this->data['periode'] = $periode;
			$this->data['kodeunit'] = $kodeunit;
			$this->data['kelasmk'] = $kelasmk; 


				$query=$this->db->query("select DISTINCT(mhs.nim), mhs.nama from ".$periode."_akademik_ms_mahasiswa as mhs,
".$periode."_akademik_ak_krs as krs,
".$periode."_akademik_ak_mengajar as ajr
WHERE
mhs.nim = krs.nim and
ajr.kelasmk = krs.kelasmk and
ajr.periode = krs.periode AND
ajr.thnkurikulum = krs.thnkurikulum AND
ajr.kodemk = krs.kodemk  AND
ajr.kelasmk = krs.kelasmk and
ajr.kodeunit = krs.kodeunit AND
krs.periode = ".$periode." and
krs.kodeunit = ".$kodeunit." and krs.kelasmk = '".$kelasmk."' order by krs.nim asc;
 ")->result();   
 
				  
		// $this->template->title('Data KRS Mahasiswa');
		// $this->render('backend/standart/administrator/bpm_angket_mahasiswa/mahasiswa_krs_list_biro', $this->data);				


$data=[
            'title' => 'Set Angket Biro',
			'periode' => $periode, 
			'kodeunit' => $kodeunit,
			'kelasmk' =>  $kelasmk,
			'mhskrs' => $query,
			'isi' => 'admin/v_set_angket_biro_add',
		];
		$this->load->view('layout/v_wrapper', $data);
		
	}
		
	
	



	//--------------------------------------------------------------------



	

	 }