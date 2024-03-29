<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Bpm_manual_spmi extends CI_Controller {    
public function __construct()          
	{                                     
parent::__construct();                 
$this->load->model("model_bpm_manual_spmi");     
}

public function index()                
    {                                  
        $data=[                                       
            'title' => 'BPM Manual SPMI', 
            'bpm_manual_spmi' => $this->model_bpm_manual_spmi->get_all_data_bpm_manual_spmi(),     
			'isi' => 'bpm_manual_spmi/v_list_bpm_manual_spmi',               
		];                                                              
		$this->load->view('layout/v_wrapper', $data, FALSE);            
    }                                  
    public function bpm_manual_spmi()          
    {                                                 
        $data=[                                       
            'title' => 'BPM Manual SPMI', 
            'bpm_manual_spmi' => $this->model_bpm_manual_spmi->get_all_data_bpm_manual_spmi(),     
			'isi' => 'bpm_manual_spmi/v_list_bpm_manual_spmi',               
		];                                                              
		$this->load->view('layout/v_wrapper', $data, FALSE);            
    }                                                              
	public function bpm_manual_spmi_add()                               
	{                                                                 
		   
		$this->form_validation->set_rules('edisi', 'edisi', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('tahun', 'tahun', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('periode', 'periode', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array(               
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
					'title' => 'Add bpm_manual_spmi',                                                            
					'error_upload' => $this->upload->display_errors(),                                         
					'isi' => 'bpm_manual_spmi/bpm_manual_spmi',                                                        
				);                                                                                           
				$this->load->view('layout/v_wrapper', $data, FALSE);                                         
			} else {                                                                                       
				$upload_data	= array('uploads' => $this->upload->data());                                   
				$config['image_library'] = 'gd2';                                                            
				$config['source_image'] = './assets/file/' . $upload_data['uploads']['file_name'];           
				$this->load->library('image_lib', $config);                                                  
				$data = array(                                                                                       
					'id' => $this->input->post('id'),                                 
					'edisi' => $this->input->post('edisi'),                                 
					'tahun' => $this->input->post('tahun'),                                 
					'periode' => $this->input->post('periode'),                                 
					'deskripsi' => $this->input->post('deskripsi'),                                 
					'file'	=> $upload_data['uploads']['file_name'],                                           
				);                                                                                           
				$this->model_bpm_manual_spmi->add_bpm_manual_spmi($data);                                                
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');                     
				redirect('bpm_manual_spmi');                                                             
			}                                                                                              
		}                                                                                                
		$data = array(                                                                                   
			'title' => 'Add bpm_manual_spmi',                                                                
			'data' => $this->model_bpm_manual_spmi->get_all_data_bpm_manual_spmi(),                                
			'isi' => 'bpm_manual_spmi/v_add_bpm_manual_spmi',                                                            
		);                                                                                               
		$this->load->view('layout/v_wrapper', $data, FALSE);                                             
	}                                                                                                  
	public function bpm_manual_spmi_edit($id = NULL)                                              
	{                                                                                                           
		  
		$this->form_validation->set_rules('edisi', 'edisi', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('tahun', 'tahun', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('periode', 'periode', 'required', array(               
			'required' => '%s Harus Diisi !!!'                                                             
		));   
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array(               
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
					'title' => 'Edit BPM Manual SPMI',                                                                  
					'bpm_manual_spmi'  => $this->model_bpm_manual_spmi->get_data_bpm_manual_spmi($id),                                        
					'error_upload' => $this->upload->display_errors(),                                         
					'isi' => 'bpm_manual_spmi/v_edit_bpm_manual_spmi',                                                                  
				);                                                                                           
				$this->load->view('layout/v_wrapper', $data, FALSE);                                 
			} else {                                                                                       
				$bpm_manual_spmi = $this->model_bpm_manual_spmi->get_data_bpm_manual_spmi($id);                                             
				if ($bpm_manual_spmi->file != "") {                                                                 
					unlink('./assets/file/' . $bpm_manual_spmi->file);                                              
				}                                                                                            
				$upload_data	= array('uploads' => $this->upload->data());                                   
				$config['image_library'] = 'gd2';                                                            
				$config['source_image'] = './assets/file/' . $upload_data['uploads']['file_name'];         
				$this->load->library('image_lib', $config);                                                  
				$data = array(                                                                               
					'id'	  => $id,                                                               
					'edisi' => $this->input->post('edisi'),                                 
					'tahun' => $this->input->post('tahun'),                                 
					'periode' => $this->input->post('periode'),                                 
					'deskripsi' => $this->input->post('deskripsi'),                                 
					'file'	=> $upload_data['uploads']['file_name'],                                           
				);                                                                                           
				$this->model_bpm_manual_spmi->edit_bpm_manual_spmi($data);                                                                
				$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');                         
				redirect('bpm_manual_spmi');                                                                          
			}                                                                                              
			$data = array(                                                                                 
				'id'	  => $id,                                                                 
					'edisi' => $this->input->post('edisi'),                                 
					'tahun' => $this->input->post('tahun'),                                 
					'periode' => $this->input->post('periode'),                                 
					'deskripsi' => $this->input->post('deskripsi'),                                 
			);                                                                                             
			$this->model_bpm_manual_spmi->edit_bpm_manual_spmi($data);                                                                  
			$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');                           
			redirect('bpm_manual_spmi');                                                                            
		}                                                                                                
		$data = array(                                                                                   
			'title' => 'Edit BPM Manual SPMI',                                                                      
			'bpm_manual_spmi'  => $this->model_bpm_manual_spmi->get_data_bpm_manual_spmi($id),                                            
			'isi' => 'bpm_manual_spmi/v_edit_bpm_manual_spmi',                                                                       
		);                                                                                               
		$this->load->view('layout/v_wrapper', $data, FALSE);                                     
	}                                                                                                  
	public function bpm_manual_spmi_delete($id = NULL)                                            
	{                                                                                                  
		$bpm_manual_spmi = $this->model_bpm_manual_spmi->get_data_bpm_manual_spmi($id);                                                 
		if ($bpm_manual_spmi->file != "") {                                                                     
			unlink('./assets/file/' . $bpm_manual_spmi->file);                                                  
		}                                                                                                
		$data = array('id' => $id);                                                        
		$this->model_bpm_manual_spmi->delete_bpm_manual_spmi($data);                                                                  
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');                             
		redirect('bpm_manual_spmi');                                                                              
	}                                                                                                  
	public function import_bpm_manual_spmi()                                                             
    {                                                                                               
		$data=[                                                                                          
			'title' => 'Import BPM Manual SPMI',                                                             
			'isi' => 'bpm_manual_spmi/v_import_bpm_manual_spmi',                                                         
		];                                                                                               
		$this->load->view('layout/v_wrapper', $data);                                                    
    }                                                                                               
	public function bpm_manual_spmi_import(){                                                            
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
				$worksheet = $objPHPExcel->getSheetByName('bpm_manual_spmi');                                  
				$highestRow = $worksheet->getHighestRow(); // e.g. 12                                        
				$highestColumn = $worksheet->getHighestColumn(); // e.g M                                    
				$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7             
				for ($row = 2; $row <= $highestRow; ++$row) {                                                
					for ($col = 1; $col <= $highestColumnIndex; ++$col) {                                      
						$dataList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();             
						}                                                                                        
						array_push ($dataListArray, $dataList);                                                  
				}                                                                                            
				if($this->model_bpm_manual_spmi->import_bpm_manual_spmi($dataListArray) == TRUE){                        
					redirect('bpm_manual_spmi');                                                           
				} else {                                                                                     
					redirect('index.php/admin');                                                               
				}                                                                                            
			}                                                                                              
		}                                                                                                
		}                                                                                                
