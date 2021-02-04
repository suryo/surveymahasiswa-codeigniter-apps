<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_angket extends CI_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'bpm_angket_mahasiswa'; 
	private $field_search 	= ['id_angket', 'nim', 'periode', 'active'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all( $periode = null, $q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= $periode."_bpm_angket_mahasiswa.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . $periode."_bpm_angket_mahasiswa.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . $periode."_bpm_angket_mahasiswa.".$field . " LIKE '%" . $q . "%' )";
        }

		$this->join_avaiable($periode);
        $this->db->where($where);
		$query = $this->db->get($periode."_".$this->table_name);

		return $query->num_rows();
	}

	public function get($periode, $q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= $period."_bpm_angket_mahasiswa.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . $period."_bpm_angket_mahasiswa.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . $period."_bpm_angket_mahasiswa.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by($period.'_bpm_angket_mahasiswa.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable($p = null) {
		$this->db->join('bpm_angket', 'bpm_angket.id = '.$p.'_bpm_angket_mahasiswa.id_angket', 'LEFT');
	    
    	return $this;
	}
	
	public function get_mhskrs() {
		$this->db->select('mhs.nim');  
$this->db->select('mhs.nama as nama'); 
$this->db->select('krs.periode'); 
$this->db->select('krs.kodeunit');
$this->db->select('krs.kodemk');
$this->db->select('krs.kelasmk');
$this->db->select('krs.kodeunit');
$this->db->select('ajr.nipdosen');	
$this->db->from('20192_akademik_ak_krs as krs');
$this->db->join('20192_akademik_ms_mahasiswa as mhs', 'mhs.nim = krs.nim');
$this->db->join('20192_akademik_ak_mengajar as ajr', 'ajr.kelasmk = krs.kelasmk', 'ajr.periode = krs.periode', 'ajr.thnkurikulum = krs.thnkurikulum', 'ajr.kodemk = krs.kodemk');
$this->db->where('krs.periode = 20192');
$this->db->where('krs.kodeunit = 10208');
$query = $this->db->get();
	    
    	return $query->result();
	}
	
	

}

/* End of file Model_bpm_angket_mahasiswa.php */
/* Location: ./application/models/Model_bpm_angket_mahasiswa.php */