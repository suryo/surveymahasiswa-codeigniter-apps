<?php      
defined('BASEPATH') OR exit('No direct script access allowed');     
class Model_gate_ms_unit extends CI_Model {                                
	function __construct () {                                          
        parent::__construct ();                                     
    }                                                               
    public function get_all_data_gate_ms_unit()                    
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('gate_ms_unit');                            
		$this->db->order_by('gate_ms_unit.kodeunit', 'asc');             
		return $this->db->get()->result();                               
    }                                                               
    public function get_data_gate_ms_unit($id)                     
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('gate_ms_unit');                            
		$this->db->where('kodeunit', $id);                                     
		return $this->db->get()->row();                                  
	}                                                                  
	public function add_gate_ms_unit($data)                           
	{                                                                  
		$this->db->insert('gate_ms_unit', $data);                   
	}                                                                  
	public function edit_gate_ms_unit($data)                          
	{                                                                  
		$this->db->where('kodeunit', $data['kodeunit']);                             
		$this->db->update('gate_ms_unit', $data);                   
	}                                                                  
	public function delete_gate_ms_unit($data)                        
	{                                                                  
		$this->db->where('kodeunit', $data['kodeunit']);                             
		$this->db->delete('gate_ms_unit', $data);                   
	}                                                                  
	function import_gate_ms_unit($arrData) {                          
        foreach ($arrData as $each_data){                           
                $data = array(                                      
	 'id' => $each_data['1'],                          
	 'edisi' => $each_data['2'],                          
	 'tahun' => $each_data['3'],                          
	 'periode' => $each_data['4'],                          
	 'deskripsi' => $each_data['5'],                          
	 'file' => $each_data['6'],                          
                );                                                  
                $this->db->insert('gate_ms_unit', $data);      
            }                                                       
        if ($this->db->affected_rows() > 0){                        
            return TRUE;                                            
        } else {                                                    
            return FALSE;                                           
        }                                                           
	}                                                                  
}                                                                   
