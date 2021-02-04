<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Bpm Survey Value Controller
*| --------------------------------------------------------------------------
*| Bpm Survey Value site
*|
*/
class Survey_value extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_survey_value');
		$this->load->model('model_soal');
	}

	/**
	* show all Bpm Survey Values
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		//$this->is_allowed('bpm_survey_value_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['bpm_survey_values'] = $this->model_bpm_survey_value->get($filter, $field, $this->limit_page, $offset);
		$this->data['bpm_survey_value_counts'] = $this->db->query("select * from bpm_survey_value")->num_rows();



		$config = [
			'base_url'     => 'administrator/bpm_survey_value/index/',
			'total_rows'   => $this->model_bpm_survey_value->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		]; 

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Bpm Survey Value List');
		$this->render('backend/standart/administrator/bpm_survey_value/bpm_survey_value_list', $this->data);
	}
	 
	
	public function isi_angket($offset = 0)
	{

$this->load->database();
		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');				
		$periode = $this->input->get('periode');
		$this->data['namadosen'] = $this->input->get('namadsn');
		$this->data['namamk'] = $this->input->get('namamk');
		$this->data['bpm_soal_counts'] = $this->db->query("select soal from bpm_soal")->num_rows();
		$nim =  $this->input->get('nim');
		$this->data['nim'] = $nim;
		$this->data['periode'] = $this->input->get('periode');
		
		
		
		
		
		$id_angket = $this->input->get('angket');
		$id_angket_mahasiswa = $this->input->get('id_angket_mahasiswa');
		//query lama
		// $this->data['bpm_soals'] = $this->db->query("select ba.id,ba.angket,bs.id as id_soal, bs.soal, (select bsv.skor from ".$periode."_bpm_survey_value as bsv where bsv.id_angket = ba.id and bsv.npm = ".$nim." and bsv.id_angket_mahasiswa = ".$id_angket_mahasiswa."  and bsv.id_soal = bs.id) as hasil 
// from bpm_angket as ba, bpm_soal as bs,bpm_angket_detail as bad where 
// bad.id_angket = ba.id 
// and bad.id_soal = bs.id
// and ba.id = ".$id_angket.";")->result();

		//query baru
		$this->data['bpm_soals'] = $this->db->query("select ba.id,ba.angket,bs.id as id_soal, bs.soal, bsv.skor as hasil
from (bpm_angket as ba, bpm_soal as bs,bpm_angket_detail as bad)
LEFT JOIN ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket = ba.id and bsv.npm =  ".$nim." and bsv.id_angket_mahasiswa = ".$id_angket_mahasiswa." and bsv.id_soal = bs.id
where 
bad.id_angket = ba.id 
and bad.id_soal = bs.id
and ba.id = ".$id_angket.";")->result();

		

		$config = [
			'base_url'     => 'administrator/bpm_soal/index/',
			'total_rows'   => $this->db->query("select soal from bpm_soal")->num_rows(),
			'per_page'     => 100,
			'uri_segment'  => 4
		];
		
		 
		$this->data['angket'] = $this->input->get('angket');
		$this->data['id_angket_mahasiswa'] = $this->input->get('id_angket_mahasiswa');

	
		if($this->data['namadosen']=='biro')
		{
		$this->data['title'] = 'Angket Kepuasan Mahasiswa Terhadap Biro';
		}
		else
		{
		 $this->data['title'] = 'Angket Kepuasan Mahasiswa Terhadap Dosen '.$this->data['namadosen']."-".$this->data['namamk'];
		}
		
		$this->load->view('isi_angket', $this->data);
		
		
	}
	
	public function simpan_value_angket()
	{	
$this->load->database();	
	$periode = $this->input->post('periode');
echo "npm ".$this->input->post('npm');
echo "nama ".$this->input->post('nama');
echo "id_angket ".$this->input->post('id_angket');
echo "asik";


		
		
		$query = $this->db->query("select bs.id from bpm_angket as ba, bpm_soal as bs,bpm_angket_detail as bad where 
bad.id_angket = ba.id 
and bad.id_soal = bs.id
and ba.id = ".$this->input->post('id_angket').";");
		
		

		foreach ($query->result() as $row)
		{
				echo $row->id;
				$data = $this->input->post('angketvalue'.$row->id);
		print_r($data);
		
		echo "<br>";
		
		if ($this->input->post('angketvalue'.$row->id)==null)
		{
			$skor=0;
		}
		else
		{
			$skor=$this->input->post('angketvalue'.$row->id);
		}
		
		$data = array( 
		'tgl_isi' => date('Y-m-d H:i:s'), 
        'npm' => $this->input->post('npm'),
        'id_angket' => $this->input->post('id_angket'),
		'id_angket_mahasiswa' => $this->input->post('id_angket_mahasiswa'),
        'id_soal' => $row->id,
		'skor' => $skor, 
		
		);   
		
		$cari = $this->db->query("select * from ".$periode."_bpm_survey_value as bsv where bsv.id_angket_mahasiswa = ".$this->input->post('id_angket_mahasiswa')." and bsv.id_angket = ".$this->input->post('id_angket')." and bsv.npm = ".$this->input->post('npm')." and bsv.id_soal = ".$row->id.";");

		if(empty($cari->result())){
			$this->db->insert($periode.'_bpm_survey_value', $data);
			echo "check-add data-";
		} else {
			
			$this->db->set('skor', $skor, FALSE);
			$this->db->where('id_angket_mahasiswa', $this->input->post('id_angket_mahasiswa'));
			$this->db->where('id_angket', $this->input->post('id_angket'));
			$this->db->where('npm', $this->input->post('npm'));
			$this->db->where('id_soal', $row->id); 
			$this->db->update($periode.'_bpm_survey_value');
			
		}
		
		    
		
		}   
		 
		
		redirect(base_url('/angket/nim/').$this->input->post('npm'), 'refresh');
		
	}
	

	public function add()
	{
		$this->is_allowed('bpm_survey_value_add');

		$this->template->title('Bpm Survey Value New');
		$this->render('backend/standart/administrator/bpm_survey_value/bpm_survey_value_add', $this->data);
	}


	public function add_save()
	{
		if (!$this->is_allowed('bpm_survey_value_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('tgl_isi', 'Tgl Isi', 'trim|required');
		$this->form_validation->set_rules('id_fakultas', 'Id Fakultas', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_prodi', 'Id Prodi', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('npm', 'Npm', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_angket', 'Id Angket', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_soal', 'Id Soal', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('skor', 'Skor', 'trim|required|max_length[255]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'tgl_isi' => $this->input->post('tgl_isi'),
				'id_fakultas' => $this->input->post('id_fakultas'),
				'id_prodi' => $this->input->post('id_prodi'),
				'npm' => $this->input->post('npm'),
				'id_angket' => $this->input->post('id_angket'),
				'id_soal' => $this->input->post('id_soal'),
				'skor' => $this->input->post('skor'),
			];

			
			$save_bpm_survey_value = $this->model_bpm_survey_value->store($save_data);

			if ($save_bpm_survey_value) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_bpm_survey_value;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/bpm_survey_value/edit/' . $save_bpm_survey_value, 'Edit Bpm Survey Value'),
						anchor('administrator/bpm_survey_value', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/bpm_survey_value/edit/' . $save_bpm_survey_value, 'Edit Bpm Survey Value')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/bpm_survey_value');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/bpm_survey_value');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Bpm Survey Values
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('bpm_survey_value_update');

		$this->data['bpm_survey_value'] = $this->model_bpm_survey_value->find($id);

		$this->template->title('Bpm Survey Value Update');
		$this->render('backend/standart/administrator/bpm_survey_value/bpm_survey_value_update', $this->data);
	}

	/**
	* Update Bpm Survey Values
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('bpm_survey_value_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('tgl_isi', 'Tgl Isi', 'trim|required');
		$this->form_validation->set_rules('id_fakultas', 'Id Fakultas', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_prodi', 'Id Prodi', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('npm', 'Npm', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_angket', 'Id Angket', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_soal', 'Id Soal', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('skor', 'Skor', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tgl_isi' => $this->input->post('tgl_isi'),
				'id_fakultas' => $this->input->post('id_fakultas'),
				'id_prodi' => $this->input->post('id_prodi'),
				'npm' => $this->input->post('npm'),
				'id_angket' => $this->input->post('id_angket'),
				'id_soal' => $this->input->post('id_soal'),
				'skor' => $this->input->post('skor'),
			];

			
			$save_bpm_survey_value = $this->model_bpm_survey_value->change($id, $save_data);

			if ($save_bpm_survey_value) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/bpm_survey_value', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/bpm_survey_value');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/bpm_survey_value');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Bpm Survey Values
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('bpm_survey_value_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'bpm_survey_value'), 'success');
        } else {
            set_message(cclang('error_delete', 'bpm_survey_value'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Bpm Survey Values
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('bpm_survey_value_view');

		$this->data['bpm_survey_value'] = $this->model_bpm_survey_value->join_avaiable()->find($id);

		$this->template->title('Bpm Survey Value Detail');
		$this->render('backend/standart/administrator/bpm_survey_value/bpm_survey_value_view', $this->data);
	}
	
	/**
	* delete Bpm Survey Values
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$bpm_survey_value = $this->model_bpm_survey_value->find($id);

		
		
		return $this->model_bpm_survey_value->remove($id);
	}
	
	
	
}


/* End of file bpm_survey_value.php */
/* Location: ./application/controllers/administrator/Bpm Survey Value.php */