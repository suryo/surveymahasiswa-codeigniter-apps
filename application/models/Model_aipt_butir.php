<?php      
defined('BASEPATH') OR exit('No direct script access allowed');     
class Model_aipt_butir extends CI_Model {                                
	function __construct () {                                          
        parent::__construct ();                                     
    }                                                               
    public function get_all_data_aipt_butir()                    
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('aipt_butir');                            
		$this->db->order_by('aipt_butir.id', 'desc');             
		return $this->db->get()->result();                               
    }                                                               
    public function get_data_aipt_butir($id)                     
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('aipt_butir');                            
		$this->db->where('id', $id);                                     
		return $this->db->get()->row();                                  
	}                                                                  
	public function add_aipt_butir($data)                           
	{                                                                  
		$this->db->insert('aipt_butir', $data);                   
	}                                                                  
	public function edit_aipt_butir($data)                          
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->update('aipt_butir', $data);                   
	}                                                                  
	public function delete_aipt_butir($data)                        
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->delete('aipt_butir', $data);                   
	}                                                                  
	function import_aipt_butir($arrData) {                          
        foreach ($arrData as $each_data){                           
                $data = array(                                      
	 'id' => $each_data['1'],                          
	 'standar' => $each_data['2'],                          
	 'butir' => $each_data['3'],                          
	 'baku_mutu' => $each_data['4'],                          
                );                                                  
                $this->db->insert('aipt_butir', $data);      
            }                                                       
        if ($this->db->affected_rows() > 0){                        
            return TRUE;                                            
        } else {                                                    
            return FALSE;                                           
        }                                                           
	}                                                                  
}                                                                   
