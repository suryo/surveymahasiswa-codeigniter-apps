<?php      
defined('BASEPATH') OR exit('No direct script access allowed');     
class Model_bpm_instrumen_monev extends CI_Model {                                
	function __construct () {                                          
        parent::__construct ();                                     
    }                                                               
    public function get_all_data_bpm_instrumen_monev()                    
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('bpm_instrumen_monev');                            
		$this->db->order_by('bpm_instrumen_monev.id', 'desc');             
		return $this->db->get()->result();                               
    }                                                               
    public function get_data_bpm_instrumen_monev($id)                     
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('bpm_instrumen_monev');                            
		$this->db->where('id', $id);                                     
		return $this->db->get()->row();                                  
	}                                                                  
	public function add_bpm_instrumen_monev($data)                           
	{                                                                  
		$this->db->insert('bpm_instrumen_monev', $data);                   
	}                                                                  
	public function edit_bpm_instrumen_monev($data)                          
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->update('bpm_instrumen_monev', $data);                   
	}                                                                  
	public function delete_bpm_instrumen_monev($data)                        
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->delete('bpm_instrumen_monev', $data);                   
	}                                                                  
	function import_bpm_instrumen_monev($arrData) {                          
        foreach ($arrData as $each_data){                           
                $data = array(                                      
	 //'id' => $each_data['1'],                          
	 'tahun_instrumen' => $each_data['2'],                          
	 'kode_instrumen' => $each_data['3'],                          
	 'instrumen_monev' => $each_data['4'],                          
	 'deskripsi_instrumen' => $each_data['5'],                          
	 'file' => $each_data['6'],                          
                );                                                  
                $this->db->insert('bpm_instrumen_monev', $data);      
            }                                                       
        if ($this->db->affected_rows() > 0){                        
            return TRUE;                                            
        } else {                                                    
            return FALSE;                                           
        }                                                           
	}                                                                  
}                                                                   
