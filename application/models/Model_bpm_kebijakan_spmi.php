<?php      
defined('BASEPATH') OR exit('No direct script access allowed');     
class Model_bpm_kebijakan_spmi extends CI_Model {                                
	function __construct () {                                          
        parent::__construct ();                                     
    }                                                               
    public function get_all_data_bpm_kebijakan_spmi()                    
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('bpm_kebijakan_spmi');                            
		$this->db->order_by('bpm_kebijakan_spmi.id', 'desc');             
		return $this->db->get()->result();                               
    }                                                               
    public function get_data_bpm_kebijakan_spmi($id)                     
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('bpm_kebijakan_spmi');                            
		$this->db->where('id', $id);                                     
		return $this->db->get()->row();                                  
	}                                                                  
	public function add_bpm_kebijakan_spmi($data)                           
	{                                                                  
		$this->db->insert('bpm_kebijakan_spmi', $data);                   
	}                                                                  
	public function edit_bpm_kebijakan_spmi($data)                          
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->update('bpm_kebijakan_spmi', $data);                   
	}                                                                  
	public function delete_bpm_kebijakan_spmi($data)                        
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->delete('bpm_kebijakan_spmi', $data);                   
	}                                                                  
	function import_bpm_kebijakan_spmi($arrData) {                          
        foreach ($arrData as $each_data){                           
                $data = array(                                      
	 //'id' => $each_data['1'],                          
	 'edisi' => $each_data['2'],                          
	 'tahun' => $each_data['3'],                          
	 'periode' => $each_data['4'],                          
	 'deskripsi' => $each_data['5'],                          
	 'file' => $each_data['6'],                          
                );                                                  
                $this->db->insert('bpm_kebijakan_spmi', $data);      
            }                                                       
        if ($this->db->affected_rows() > 0){                        
            return TRUE;                                            
        } else {                                                    
            return FALSE;                                           
        }                                                           
	}                                                                  
}                                                                   
