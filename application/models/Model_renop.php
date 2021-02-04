<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Model_renop extends CI_Model {

	function __construct () {
        parent::__construct ();
    }
//==========================================================================start panduan renop===================================
    public function get_all_data_panduan_renop()
	{
		$this->db->select('*');
		$this->db->from('bpm_panduan_renop');
		$this->db->order_by('bpm_panduan_renop.id', 'desc');
		return $this->db->get()->result();
    }
    

    public function get_data_panduan_renop($id)
	{
		$this->db->select('*');
		$this->db->from('bpm_panduan_renop');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	public function add_panduan_renop($data)
	{
		$this->db->insert('bpm_panduan_renop', $data);
	}

	public function edit_panduan_renop($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('bpm_panduan_renop', $data);
	}

	public function delete_panduan_renop($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('bpm_panduan_renop', $data);
	}

	function import_panduan_renop($arrData) {
      
        foreach ($arrData as $each_data){
                $data = array(
                    //'id' => $each_data['1'],
					'edisi_renop' => $each_data['2'],
					'tahun_renop' => $each_data['3'],
					'deskripsi' => $each_data['4'],
					'file' => $each_data['5'],
					
                );
                $this->db->insert('bpm_panduan_renop', $data);
            }

        if ($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
	}
//===================================================================end panduan renop=====================================

//===================================================================start laporan kinerja================================
	public function get_all_data_laporan_kinerja()
	{
		$this->db->select('*');
		$this->db->from('bpm_laporan_kinerja');
		$this->db->order_by('bpm_panduan_renop.id', 'desc');
		return $this->db->get()->result();
    }
    

    public function get_data_laporan_kinerja($id)
	{
		$this->db->select('*');
		$this->db->from('bpm_laporan_kinerja');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	public function add_laporan_kinerja($data)
	{
		$this->db->insert('bpm_laporan_kinerja', $data);
	}

	public function edit_laporan_kinerja($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('bpm_laporan_kinerja', $data);
	}

	public function delete_laporan_kinerja($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('bpm_laporan_kinerja', $data);
	}

	function import_laporan_kinerja($arrData) {
      
        foreach ($arrData as $each_data){
                $data = array(
                    //'id' => $each_data['1'],
					'edisi_renop' => $each_data['2'],
					'tahun_renop' => $each_data['3'],
					'deskripsi' => $each_data['4'],
					'file' => $each_data['5'],
					
                );
                $this->db->insert('bpm_laporan_kinerja', $data);
            }

        if ($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
	}
	
//==================================================================================end laporan kinerja===============================

}

/* End of .php */
