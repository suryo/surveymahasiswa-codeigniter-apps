<?php      
defined('BASEPATH') OR exit('No direct script access allowed');     
class Model_aipt_dokumen extends CI_Model {                                
	function __construct () {                                          
        parent::__construct ();                                     
    }                                                               
    public function get_all_data_aipt_dokumen()                    
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('aipt_dokumen');                            
		$this->db->order_by('aipt_dokumen.id', 'desc');             
		return $this->db->get()->result();                               
    }                                                               
    public function get_data_aipt_dokumen($id)                     
	{                                                                  
		$this->db->select('*');                                          
		$this->db->from('aipt_dokumen');                            
		$this->db->where('id', $id);                                     
		return $this->db->get()->row();                                  
	}                                                                  
	public function add_aipt_dokumen($data)                           
	{                                                                  
		$this->db->insert('aipt_dokumen', $data);                   
	}                                                                  
	public function edit_aipt_dokumen($data)                          
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->update('aipt_dokumen', $data);                   
	}                                                                  
	public function delete_aipt_dokumen($data)                        
	{                                                                  
		$this->db->where('id', $data['id']);                             
		$this->db->delete('aipt_dokumen', $data);                   
	}                                                                  
	function import_aipt_dokumen($arrData) {                          
        foreach ($arrData as $each_data){                           
                $data = array(                                      
	 'id_dokumen' => $each_data['1'],                          
	 'id_butir' => $each_data['2'],                          
	 'nama_dokumen' => $each_data['3'],                          
	 'lokasi' => $each_data['4'],                          
	 'status' => $each_data['5'],                          
	 'nama_file' => $each_data['6'],                          
                );                                                  
                $this->db->insert('aipt_dokumen', $data);      
            }                                                       
        if ($this->db->affected_rows() > 0){                        
            return TRUE;                                            
        } else {                                                    
            return FALSE;                                           
        }                                                           
	}                                                                  
}                                                                   
