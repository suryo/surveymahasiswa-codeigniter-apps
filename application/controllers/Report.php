<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Report extends CI_Controller {

	

	public function __construct()

	{

		parent::__construct();

		$this->load->model("model_users");
		if($this->model_users->isNotLogin()) redirect(base_url());

	}
	
	public function prodi()
	{
		
		
		//$this->render('backend/standart/administrator/report/bpm_view_report_prodi_dosen', $this->data);
		$data=[
			'title' => 'Report Dosen / Prodi',
			'isi' => 'admin/v_report_prodi',
		];
		$this->load->view('layout/v_wrapper', $data);
	}
	
	public function prodi_result()
	{
		
		$periode=intval($this->input->get('periode'));
		$kodeunit=$this->input->get('program_studi');
		
		$this->data['kodeunit']=$kodeunit;		
		$this->data['periode']=$periode;
		
		if (!empty($kodeunit))
		{
 
				$result_query = $this->db->query("select DISTINCT ajr.kelasmk, peg.nip, peg.nama, ajr.kodemk, kur.namamk,ajr.periode
from kepegawaian_ms_pegawai as peg, ".$periode."_akademik_ak_mengajar as ajr, ".$periode."_akademik_ak_kurikulum as kur where 
ajr.nipdosen = peg.nip and
ajr.kodemk = kur.kodemk and
ajr.kodeunit = kur.kodeunit and
ajr.periode = ".$periode." AND
ajr.kodeunit = ".$kodeunit."
ORDER BY peg.nip, ajr.kodemk, ajr.kelasmk");   
		}
		 
		$data=[
			'title' => 'Report Dosen / Prodi',
			'isi' => 'admin/v_report_prodi_result',
			'dosenmengajar' => $result_query->result(),
			'jumlah' => $result_query->num_rows(),
			'periode' => $periode,
		];
		$this->load->view('layout/v_wrapper', $data);
		 
			
	}
	
	

	public function biro()
	{
		
				
		// $this->template->title('Report Biro');
		// $this->render('backend/standart/administrator/report/bpm_view_report_biro', $this->data);	

		$data=[
			'title' => 'Report Biro',
			'isi' => 'admin/v_report_biro',
		];
		$this->load->view('layout/v_wrapper', $data);		
			
	}
	
	public function biro_result()
	{
		 
		$periode=intval($this->input->get('periode'));
		$this->data['periode'] = $periode;
		$result_query = $this->db->query("select ba.id, bs.soal,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs, ".$periode."_bpm_survey_value as hslsrv
where aktmhs.periode = ".$periode." and 
aktmhs.id=hslsrv.id_angket_mahasiswa and
hslsrv.id_angket = 1 and hslsrv.id_soal = bad.id_soal),2) as avg
 from bpm_angket as ba, bpm_soal as bs, bpm_angket_detail as bad 
where  ba.id = bad.id_angket and
bad.id_soal = bs.id AND
ba.id = 1;")->result();
		
		
		// $this->template->title('Report Dosen');
		// $this->render('backend/standart/administrator/report/instrumen_biro_list', $this->data);	

		$data=[
			'title' => 'Report Biro',
			'isi' => 'admin/v_report_biro_result',
			'instrumenbiro' => $result_query,
			'periode' => $periode,
		];
		$this->load->view('layout/v_wrapper', $data);
		
	}
	
	public function dosen()
	{
		
				
		// $this->template->title('Report Dosen');
		// $this->render('backend/standart/administrator/report/bpm_view_report_dosen', $this->data);	

		$data=[
			'title' => 'Report Dosen',
			'isi' => 'admin/v_report_dosen',
		];
		$this->load->view('layout/v_wrapper', $data);	
			
	}
	
		public function dosenv2()
	{
		
				
		// $this->template->title('Report Dosen');
		// $this->render('backend/standart/administrator/report/bpm_view_report_dosen', $this->data);	

		$data=[
			'title' => 'Report Dosen',
			'isi' => 'admin/v_report_dosen_two',
		];
		$this->load->view('layout/v_wrapper', $data);	
			
	}
	
	public function dosen_result()
	{ 
	$periode=intval($this->input->get('periode'));
	$nip=($this->input->get('nip'));
	$this->data['periode'] = $periode;
	$this->data['nip'] = $nip;
	$result_query = $this->db->query("select peg.nip, peg.nama, ajr.kodemk, kur.namamk, ajr.kelasmk,ajr.periode,ajr.kodeunit,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=84),2) as I1,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=85),2) as I2,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=86),2) as I3,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=87),2) as I4,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=88),2) as I5,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=89),2) as I6,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=90),2) as I7,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=91),2) as I8,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=92),2) as I9,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=93),2) as I10,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=94),2) as I11,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=95),2) as I12,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=96),2) as I13,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=97),2) as I14,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=98),2) as I15,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=99),2) as I16,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=100),2) as I17,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=101),2) as I18,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=102),2) as I19,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=103),2) as I20,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=104),2) as I21,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=105),2) as I22
from kepegawaian_ms_pegawai as peg, ".$periode."_akademik_ak_mengajar as ajr, ".$periode."_akademik_ak_kurikulum as kur where 
ajr.nipdosen = peg.nip and
ajr.kodemk = kur.kodemk and
ajr.kodeunit = kur.kodeunit and
ajr.periode = ".$periode." AND
ajr.nipdosen = '".$nip."'
GROUP BY peg.nip, ajr.kodemk, ajr.kelasmk,ajr.kodeunit
ORDER BY peg.nip, ajr.kodemk, ajr.kelasmk;
")->result();  
	   
		// $this->template->title('Report Dosen');
		// $this->render('backend/standart/administrator/report/dosen_report_list', $this->data);	


		$data=[
			'title' => 'Report Dosen',
			'isi' => 'admin/v_report_dosen_result',
			'hasdsn' => $result_query,
			'periode' => intval($this->input->get('periode')),
			'nip'=>($this->input->get('nip')),
		];
		$this->load->view('layout/v_wrapper', $data);
		
		
	}
	
	public function dosenresult()
	{ 
	$periode=intval($this->input->get('periode'));
	$nip=($this->input->get('nip'));
	$this->data['periode'] = $periode;
	$this->data['nip'] = $nip;
	$result_query = $this->db->query("select peg.nip, peg.nama, ajr.kodemk, kur.namamk, ajr.kelasmk,ajr.periode,ajr.kodeunit
from kepegawaian_ms_pegawai as peg, ".$periode."_akademik_ak_mengajar as ajr, ".$periode."_akademik_ak_kurikulum as kur where 
ajr.nipdosen = peg.nip and
ajr.kodemk = kur.kodemk and
ajr.kodeunit = kur.kodeunit and
ajr.periode = ".$periode." AND
ajr.nipdosen = '".$nip."'
GROUP BY peg.nip, ajr.kodemk, ajr.kelasmk,ajr.kodeunit
ORDER BY peg.nip, ajr.kodemk, ajr.kelasmk;
")->result();  
	   
		// $this->template->title('Report Dosen');
		// $this->render('backend/standart/administrator/report/dosen_report_list', $this->data);	


		$data=[
			'title' => 'Report Dosen',
			'isi' => 'admin/v_report_dosen_result_two',
			'hasdsn' => $result_query,
			'periode' => intval($this->input->get('periode')),
			'nip'=>($this->input->get('nip')),
		];
		$this->load->view('layout/v_wrapper', $data);
		
		
	}
	
		public function dosen_detail_result()
	{ 
	$periode=intval($this->input->get('periode'));
	$nip=($this->input->get('nip'));
	$this->data['periode'] = $periode;
	$this->data['nip'] = $nip;
	$kodemk = $this->input->get('kodemk') ;
    $kelasmk = $this->input->get('kelasmk') ;
	$result_query = $this->db->query("select peg.nip, peg.nama, ajr.kodemk, kur.namamk, ajr.kelasmk,ajr.periode,ajr.kodeunit,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=84),2) as I1,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=85),2) as I2,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=86),2) as I3,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=87),2) as I4,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=88),2) as I5,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=89),2) as I6,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=90),2) as I7,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=91),2) as I8,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=92),2) as I9,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=93),2) as I10,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=94),2) as I11,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=95),2) as I12,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=96),2) as I13,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=97),2) as I14,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=98),2) as I15,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=99),2) as I16,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=100),2) as I17,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=101),2) as I18,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=102),2) as I19,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=103),2) as I20,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=104),2) as I21,
ROUND((select avg(hslsrv.skor) from 
".$periode."_bpm_angket_mahasiswa as aktmhs
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ajr.periode and 
aktmhs.kodeunit = ajr.kodeunit and 
aktmhs.kelasmk = ajr.kelasmk and  
aktmhs.iddosen = ajr.nipdosen and 
aktmhs.kodemk = ajr.kodemk AND
hslsrv.id_soal=105),2) as I22
from kepegawaian_ms_pegawai as peg, ".$periode."_akademik_ak_mengajar as ajr, ".$periode."_akademik_ak_kurikulum as kur where 
ajr.nipdosen = peg.nip and
ajr.kodemk = kur.kodemk and
ajr.kodeunit = kur.kodeunit and
ajr.periode = ".$periode." AND
ajr.nipdosen = '".$nip."' and
ajr.kodemk = '".$kodemk."' and
ajr.kelasmk = '".$kelasmk."'
GROUP BY peg.nip, ajr.kodemk, ajr.kelasmk,ajr.kodeunit
ORDER BY peg.nip, ajr.kodemk, ajr.kelasmk;
")->result();  



		// $this->template->title('Report Dosen');
		// $this->render('backend/standart/administrator/report/dosen_report_list', $this->data);	


		$data=[
			'title' => 'Report Dosen',
			'isi' => 'admin/v_report_dosen_detail_result',
			'hasdsn' => $result_query,
			'periode' => intval($this->input->get('periode')),
			'nip'=>($this->input->get('nip')),
		];
		$this->load->view('layout/v_wrapper', $data);
		
		
	}
	






	 

	 }

