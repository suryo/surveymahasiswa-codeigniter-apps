<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Aipt_dokumen extends CI_Controller {    
public function __construct()          
	{                                     
parent::__construct();                 
$this->load->model("model_aipt_dokumen");     
}

public function index()                
    {                                  
        $data=[                                       
            'title' => 'aipt_dokumen', 
            'aipt_dokumen' => $this->model_aipt_dokumen->get_all_data_aipt_dokumen(),     
			'isi' => 'aipt_dokumen/v_list_aipt_dokumen',               
		];                                                              
		$this->load->view('layout/v_wrapper', $data, FALSE);            
    }                                  
    public function aipt_dokumen()          
    {                                                 
        $data=[                                       
            'title' => 'aipt_dokumen', 
            'aipt_dokumen' => $this->model_aipt_dokumen->get_all_data_aipt_dokumen(),     
			'isi' => 'aipt_dokumen/v_list_aipt_dokumen',               
		];                                                              
		$this->load->view('layout/v_wrapper', $data, FALSE);            
    }                                                              
	public function aipt_dokumen_add()                               
	{                                                                 
		$this->form_validation->set_rules('id_dokumen', 'id_dokumen', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('id_butir', 'id_butir', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('nama_dokumen', 'nama_dokumen', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('lokasi', 'lokasi', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('status', 'status', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('nama_file', 'nama_file', 'required', array(               
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
					'title' => 'Add aipt_dokumen',                                                            
					'error_upload' => $this->upload->display_errors(),                                         
					'isi' => 'aipt_dokumen/aipt_dokumen',                                                        
				);                                                                                           
				$this->load->view('layout/v_wrapper', $data, FALSE);                                         
			} else {                                                                                       
				$upload_data	= array('uploads' => $this->upload->data());                                   
				$config['image_library'] = 'gd2';                                                            
				$config['source_image'] = './assets/file/' . $upload_data['uploads']['file_name'];           
				$this->load->library('image_lib', $config);                                                  
				$data = array(                                                                                       
					'id_dokumen' => $this->input->post('id_dokumen'),                                 
					'id_butir' => $this->input->post('id_butir'),                                 
					'nama_dokumen' => $this->input->post('nama_dokumen'),                                 
					'lokasi' => $this->input->post('lokasi'),                                 
					'status' => $this->input->post('status'),                                 
					'nama_file'	=> $upload_data['uploads']['file_name'],                                           
				);                                                                                           
				$this->model_aipt_dokumen->add_aipt_dokumen($data);                                                
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');                     
				redirect('aipt_dokumen');                                                             
			}                                                                                              
		}                                                                                                
		$data = array(                                                                                   
			'title' => 'Add aipt_dokumen',                                                                
			'data' => $this->model_aipt_dokumen->get_all_data_aipt_dokumen(),                                
			'isi' => 'aipt_dokumen/v_add_aipt_dokumen',                                                            
		);                                                                                               
		$this->load->view('layout/v_wrapper', $data, FALSE);                                             
	}                                                                                                  
	public function aipt_dokumen_edit($id = NULL)                                              
	{                                                                                                           
		$this->form_validation->set_rules('id_dokumen', 'id_dokumen', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('id_butir', 'id_butir', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('nama_dokumen', 'nama_dokumen', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('lokasi', 'lokasi', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('status', 'status', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('nama_file', 'nama_file', 'required', array(               
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
					'title' => 'Edit aipt_dokumen',                                                                  
					'aipt_dokumen'  => $this->model_aipt_dokumen->get_data_aipt_dokumen($id),                                        
					'error_upload' => $this->upload->display_errors(),                                         
					'isi' => 'aipt_dokumen/v_edit_aipt_dokumen',                                                                  
				);                                                                                           
				$this->load->view('layout/v_wrapper', $data, FALSE);                                 
			} else {                                                                                       
				$aipt_dokumen = $this->model_aipt_dokumen->get_data_aipt_dokumen($id);                                             
				if ($aipt_dokumen->file != "") {                                                                 
					unlink('./assets/file/' . $aipt_dokumen->file);                                              
				}                                                                                            
				$upload_data	= array('uploads' => $this->upload->data());                                   
				$config['image_library'] = 'gd2';                                                            
				$config['source_image'] = './assets/file/' . $upload_data['uploads']['file_name'];         
				$this->load->library('image_lib', $config);                                                  
				$data = array(                                                                               
					'id'	  => $id,                                                               
					'id_butir' => $this->input->post('id_butir'),                                 
					'nama_dokumen' => $this->input->post('nama_dokumen'),                                 
					'lokasi' => $this->input->post('lokasi'),                                 
					'status' => $this->input->post('status'),                                 
					'nama_file'	=> $upload_data['uploads']['file_name'],                                           
				);                                                                                           
				$this->model_aipt_dokumen->edit_aipt_dokumen($data);                                                                
				$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');                         
				redirect('aipt_dokumen');                                                                          
			}                                                                                              
			$data = array(                                                                                 
				'id'	  => $id,                                                                 
					'id_butir' => $this->input->post('id_butir'),                                 
					'nama_dokumen' => $this->input->post('nama_dokumen'),                                 
					'lokasi' => $this->input->post('lokasi'),                                 
					'status' => $this->input->post('status'),                                 
			);                                                                                             
			$this->model_aipt_dokumen->edit_aipt_dokumen($data);                                                                  
			$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');                           
			redirect('aipt_dokumen');                                                                            
		}                                                                                                
		$data = array(                                                                                   
			'title' => 'Edit aipt_dokumen',                                                                      
			'aipt_dokumen'  => $this->model_aipt_dokumen->get_data_aipt_dokumen($id),                                            
			'isi' => 'aipt_dokumen/v_edit_aipt_dokumen',                                                                       
		);                                                                                               
		$this->load->view('layout/v_wrapper', $data, FALSE);                                     
	}                                                                                                  
	public function aipt_dokumen_delete($id = NULL)                                            
	{                                                                                                  
		$aipt_dokumen = $this->model_aipt_dokumen->get_data_aipt_dokumen($id);                                                 
		if ($aipt_dokumen->file != "") {                                                                     
			unlink('./assets/file/' . $aipt_dokumen->file);                                                  
		}                                                                                                
		$data = array('id' => $id);                                                        
		$this->model_aipt_dokumen->delete_aipt_dokumen($data);                                                                  
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');                             
		redirect('aipt_dokumen');                                                                              
	}                                                                                                  
	public function import_aipt_dokumen()                                                             
    {                                                                                               
		$data=[                                                                                          
			'title' => 'Import aipt_dokumen',                                                             
			'isi' => 'aipt_dokumen/v_import_aipt_dokumen',                                                         
		];                                                                                               
		$this->load->view('layout/v_wrapper', $data);                                                    
    }                                                                                               
	public function aipt_dokumen_import(){                                                            
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
				$worksheet = $objPHPExcel->getSheetByName('aipt_dokumen');                                  
				$highestRow = $worksheet->getHighestRow(); // e.g. 12                                        
				$highestColumn = $worksheet->getHighestColumn(); // e.g M                                    
				$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7             
				for ($row = 2; $row <= $highestRow; ++$row) {                                                
					for ($col = 1; $col <= $highestColumnIndex; ++$col) {                                      
						$dataList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();             
						}                                                                                        
						array_push ($dataListArray, $dataList);                                                  
				}                                                                                            
				if($this->model_aipt_dokumen->import_aipt_dokumen($dataListArray) == TRUE){                        
					redirect('aipt_dokumen');                                                           
				} else {                                                                                     
					redirect('index.php/admin');                                                               
				}                                                                                            
			}                                                                                              
		}                                                                                                
		}                                                                                                
