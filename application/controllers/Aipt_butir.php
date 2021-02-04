<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class aipt_butir extends CI_Controller {    
public function __construct()          
	{                                     
parent::__construct();                 
$this->load->model("model_aipt_butir");     
}

public function index()                
    {                                  
        $data=[                                       
            'title' => 'aipt_butir', 
            'aipt_butir' => $this->model_aipt_butir->get_all_data_aipt_butir(),     
			'isi' => 'aipt_butir/v_list_aipt_butir',               
		];                                                              
		$this->load->view('layout/v_wrapper', $data, FALSE);            
    }                                  
    public function aipt_butir()          
    {                                                 
        $data=[                                       
            'title' => 'aipt_butir', 
            'aipt_butir' => $this->model_aipt_butir->get_all_data_aipt_butir(),     
			'isi' => 'aipt_butir/v_list_aipt_butir',               
		];                                                              
		$this->load->view('layout/v_wrapper', $data, FALSE);            
    }                                                              
	public function aipt_butir_add()                               
	{                                                                 
		$this->form_validation->set_rules('id', 'id', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('standar', 'standar', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('butir', 'butir', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('baku_mutu', 'baku_mutu', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		if ($this->form_validation->run() == TRUE) {                                                     
			$config['upload_path'] = './assets/file/';                                                     
			$config['allowed_types'] = 'pdf|doc|docx';                                                     
			$config['max_size']     = '20000';                                                             
			$this->upload->initialize($config);                                                            
			$field_name = "file";                                                                          
			if (!$this->upload->do_upload($field_name)) {                                                  
				$data = array(                                                                               
					'title' => 'Add aipt_butir',                                                            
					'error_upload' => $this->upload->display_errors(),                                         
					'isi' => 'aipt_butir/aipt_butir',                                                        
				);                                                                                           
				$this->load->view('layout/v_wrapper', $data, FALSE);                                         
			} else {                                                                                       
				$upload_data	= array('uploads' => $this->upload->data());                                   
				$config['image_library'] = 'gd2';                                                            
				$config['source_image'] = './assets/file/' . $upload_data['uploads']['file_name'];           
				$this->load->library('image_lib', $config);                                                  
				$data = array(                                                                                       
					'id' => $this->input->post('id'),                                 
					'standar' => $this->input->post('standar'),                                 
					'butir' => $this->input->post('butir'),                                 
					'baku_mutu' => $this->input->post('baku_mutu'),                                 
				);                                                                                           
				$this->model_aipt_butir->add_aipt_butir($data);                                                
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');                     
				redirect('aipt_butir');                                                             
			}                                                                                              
		}                                                                                                
		$data = array(                                                                                   
			'title' => 'Add aipt_butir',                                                                
			'data' => $this->model_aipt_butir->get_all_data_aipt_butir(),                                
			'isi' => 'aipt_butir/v_add_aipt_butir',                                                            
		);                                                                                               
		$this->load->view('layout/v_wrapper', $data, FALSE);                                             
	}                                                                                                  
	public function aipt_butir_edit($id = NULL)                                              
	{                                                                                                           
		$this->form_validation->set_rules('id', 'id', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('standar', 'standar', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('butir', 'butir', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('baku_mutu', 'baku_mutu', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		if ($this->form_validation->run() == TRUE) {                                                     
			$config['upload_path'] = './assets/file/';                                                     
			$config['allowed_types'] = 'pdf|doc|docx';                                                     
			$config['max_size']     = '20000';                                                             
			$this->upload->initialize($config);                                                            
			$field_name = "file";                                                                          
			if (!$this->upload->do_upload($field_name)) {                                                  
				$data = array(                                                                               
					'title' => 'Edit aipt_butir',                                                                  
					'aipt_butir'  => $this->model_aipt_butir->get_data_aipt_butir($id),                                        
					'error_upload' => $this->upload->display_errors(),                                         
					'isi' => 'aipt_butir/v_edit_aipt_butir',                                                                  
				);                                                                                           
				$this->load->view('layout/v_wrapper', $data, FALSE);                                 
			} else {                                                                                       
				$aipt_butir = $this->model_aipt_butir->get_data_aipt_butir($id);                                             
				if ($aipt_butir->file != "") {                                                                 
					unlink('./assets/file/' . $aipt_butir->file);                                              
				}                                                                                            
				$upload_data	= array('uploads' => $this->upload->data());                                   
				$config['image_library'] = 'gd2';                                                            
				$config['source_image'] = './assets/file/' . $upload_data['uploads']['file_name'];         
				$this->load->library('image_lib', $config);                                                  
				$data = array(                                                                               
					'id'	  => $id,                                                               
					'standar' => $this->input->post('standar'),                                 
					'butir' => $this->input->post('butir'),                                 
					'baku_mutu' => $this->input->post('baku_mutu'),                                 
				);                                                                                           
				$this->model_aipt_butir->edit_aipt_butir($data);                                                                
				$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');                         
				redirect('aipt_butir');                                                                          
			}                                                                                              
			$data = array(                                                                                 
				'id'	  => $id,                                                                 
					'standar' => $this->input->post('standar'),                                 
					'butir' => $this->input->post('butir'),                                 
					'baku_mutu' => $this->input->post('baku_mutu'),                                 
			);                                                                                             
			$this->model_aipt_butir->edit_aipt_butir($data);                                                                  
			$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');                           
			redirect('aipt_butir');                                                                            
		}                                                                                                
		$data = array(                                                                                   
			'title' => 'Edit aipt_butir',                                                                      
			'aipt_butir'  => $this->model_aipt_butir->get_data_aipt_butir($id),                                            
			'isi' => 'aipt_butir/v_edit_aipt_butir',                                                                       
		);                                                                                               
		$this->load->view('layout/v_wrapper', $data, FALSE);                                     
	}                                                                                                  
	public function aipt_butir_delete($id = NULL)                                            
	{                                                                                                  
		$aipt_butir = $this->model_aipt_butir->get_data_aipt_butir($id);                                                 
		if ($aipt_butir->file != "") {                                                                     
			unlink('./assets/file/' . $aipt_butir->file);                                                  
		}                                                                                                
		$data = array('id' => $id);                                                        
		$this->model_aipt_butir->delete_aipt_butir($data);                                                                  
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');                             
		redirect('aipt_butir');                                                                              
	}                                                                                                  
	public function import_aipt_butir()                                                             
    {                                                                                               
		$data=[                                                                                          
			'title' => 'Import aipt_butir',                                                             
			'isi' => 'aipt_butir/v_import_aipt_butir',                                                         
		];                                                                                               
		$this->load->view('layout/v_wrapper', $data);                                                    
    }                                                                                               
	public function aipt_butir_import(){                                                            
			$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');              
			if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {         
				$arr_file = explode('.', $_FILES['file']['name']); //get file                                
				$extension = end($arr_file); //get file extension                                            
				if('csv' == $extension) {                                                                    
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();                                      
				} else if ('xlsx'){                                                                          
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();                                     
				} else {                                                                                     
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();                                      
				}                                                                                            
				$dataList = array();                                                                         
				$dataListArray = array();                                                                    
				$reader->setReadDataOnly(true);                                                              
				$objPHPExcel = $reader->load($_FILES['file']['tmp_name']);                                   
				$worksheet = $objPHPExcel->getSheetByName('aipt_butir');                                  
				$highestRow = $worksheet->getHighestRow(); // e.g. 12                                        
				$highestColumn = $worksheet->getHighestColumn(); // e.g M                                    
				$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7             
				for ($row = 2; $row <= $highestRow; ++$row) {                                                
					for ($col = 1; $col <= $highestColumnIndex; ++$col) {                                      
						$dataList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();             
						}                                                                                        
						array_push ($dataListArray, $dataList);                                                  
				}                                                                                            
				if($this->model_aipt_butir->import_aipt_butir($dataListArray) == TRUE){                        
					redirect('aipt_butir');                                                           
				} else {                                                                                     
					redirect('index.php/admin');                                                               
				}                                                                                            
			}                                                                                              
		}                                                                                                
		}                                                                                                
