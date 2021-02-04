<?php      
defined('BASEPATH') OR exit('No direct script access allowed');     
class Model_bpm_format_laporan_monev extends CI_Model {                                
	function __construct () {                                          
        parent::__construct ();                                     
    }                                                               
    public function get_all_data_bpm_format_laporan_monev()                    
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('bpm_format_laporan_monev');                            
		$this->db->order_by('bpm_format_laporan_monev.id', 'desc');             
		return $this->db->get()->result();                               
    }                                                               
    public function get_data_bpm_format_laporan_monev($id)                     
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('bpm_format_laporan_monev');                            
		$this->db->where('id', $id);                                     
		return $this->db->get()->row();                                  
	}                                                                  
	public function add_bpm_format_laporan_monev($data)                           
	{                                                                  
		$this->db->insert('bpm_format_laporan_monev', $data);                   
	}                                                                  
	public function edit_bpm_format_laporan_monev($data)                          
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->update('bpm_format_laporan_monev', $data);                   
	}                                                                  
	public function delete_bpm_format_laporan_monev($data)                        
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->delete('bpm_format_laporan_monev', $data);                   
	}                                                                  
	function import_bpm_format_laporan_monev($arrData) {                          
        foreach ($arrData as $each_data){                           
                $data = array(                                      
	 //'id' => $each_data['1'],                          
	 'edisi_format' => $each_data['2'],                          
	 'tahun_format' => $each_data['3'],                          
	 'deskripsi' => $each_data['4'],                          
	 'file' => $each_data['5'],                          
                );                                                  
                $this->db->insert('bpm_format_laporan_monev', $data);      
            }                                                       
        if ($this->db->affected_rows() > 0){                        
            return TRUE;                                            
        } else {                                                    
            return FALSE;                                           
        }                                                           
	}                                                                  
}                                                                   
