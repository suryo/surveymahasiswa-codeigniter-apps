<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Renop extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_renop');
	}

    public function index()
    {
        //$this->load->view('front_angket');
    }

    public function panduan_renop()
    {
        $data=[
            'title' => 'Panduan Renop',
            'panduan_renop' => $this->model_renop->get_all_data_panduan_renop(),
			'isi' => 'renop/panduan_renop',
		];
		$this->load->view('layout/v_wrapper', $data, FALSE);
    }

    // Add a new item
	public function panduan_renop_add()
	{
		$this->form_validation->set_rules('edisi_renop', 'Edisi renop', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('tahun_renop', 'Tahun Renop', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		



		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/file/';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size']     = '20000';
			$this->upload->initialize($config);
			$field_name = "file";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Add Panduan Renop',
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'renop/panduan_renop_add',
				);
				$this->load->view('layout/v_wrapper', $data, FALSE);
			} else {
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/file/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'edisi_renop' => $this->input->post('edisi_renop'),
					'tahun_renop' => $this->input->post('tahun_renop'),
					'deskripsi' => $this->input->post('deskripsi'),
					'file'	=> $upload_data['uploads']['file_name'],
				);
				$this->model_renop->add_panduan_renop($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				redirect('renop/panduan_renop');
			}
		}

		$data = array(
			'title' => 'Add Panduan Renop',
			'kategori' => $this->model_renop->get_all_data_panduan_renop(),
			'isi' => 'renop/panduan_renop_add',
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	//Update one item
	public function panduan_renop_edit($id_barang = NULL)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('berat', 'Berat', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/file/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "file";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Barang',
					'kategori' => $this->m_kategori->get_all_data(),
					'barang'  => $this->m_barang->get_data($id_barang),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'barang/v_edit',
				);
				$this->load->view('layout/v_wrapper_backend', $data, FALSE);
			} else {
				//hapus gambar
				$barang = $this->m_barang->get_data($id_barang);
				if ($barang->gambar != "") {
					unlink('./assets/gambar/' . $barang->gambar);
				}
				//end hapus gambar
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang'	  => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar'	=> $upload_data['uploads']['file_name'],
				);
				$this->m_barang->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
				redirect('barang');
			}
			//jika tanpa ganti gambar
			$data = array(
				'id_barang'	  => $id_barang,
				'nama_barang' => $this->input->post('nama_barang'),
				'id_kategori' => $this->input->post('id_kategori'),
				'harga' => $this->input->post('harga'),
				'berat' => $this->input->post('berat'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_barang->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
			redirect('barang');
		}

		$data = array(
			'title' => 'Edit Barang',
			'kategori' => $this->m_kategori->get_all_data(),
			'barang'  => $this->m_barang->get_data($id_barang),
			'isi' => 'barang/v_edit',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	//Delete one item
	public function panduan_renop_delete($id_barang = NULL)
	{
		//hapus gambar
		$barang = $this->m_barang->get_data($id_barang);
		if ($barang->gambar != "") {
			unlink('./assets/gambar/' . $barang->gambar);
		}
		//end hapus gambar
		$data = array('id_barang' => $id_barang);
		$this->m_barang->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('barang');
	}

	public function import_panduan_renop()
    {
		$data=[
			'title' => 'Import Panduan Renop',
			'isi' => 'renop/panduan_renop_import',
		];
		$this->load->view('layout/v_wrapper', $data);
        
    }

	    // import function
	public function panduan_renop_import(){
        
			//file type
			$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	
			if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
	
				$arr_file = explode('.', $_FILES['file']['name']); //get file
				$extension = end($arr_file); //get file extension
	
				// select spreadsheet reader depends on file extension
				if('csv' == $extension) {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} else if ('xlsx'){
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				}
	
				//'Data' Table
				$dataList = array();
				$dataListArray = array();
	
				$reader->setReadDataOnly(true);
	
				//Get filename
				$objPHPExcel = $reader->load($_FILES['file']['tmp_name']);
				
				//Get sheet by name
				$worksheet = $objPHPExcel->getSheetByName('panduan_renop');
	
				/*
				* Get sheet by index
				* Get the second sheet in the workbook
				* Note that sheets are indexed from 0
				*/ 
				// $spreadsheet->getSheet(1);
	
				/*
				* Get current active sheet
				*/ 
				//$spreadsheet->getActiveSheet();
	
				$highestRow = $worksheet->getHighestRow(); // e.g. 12
				$highestColumn = $worksheet->getHighestColumn(); // e.g M'
	
				$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7
				//Ignoring first row (As it contains column name)
				for ($row = 2; $row <= $highestRow; ++$row) {
					//A row selected
					for ($col = 1; $col <= $highestColumnIndex; ++$col) {
						// values till $cityList['1'] till $cityList['last_column_no'] 
						$dataList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue(); 
						} 
						array_push ($dataListArray, $dataList);
						//next row, from top
				}
				
				if($this->model_renop->import_panduan_renop($dataListArray) == TRUE){
					// what to do if import successfull
					redirect('renop/panduan_renop');
				} else {
					// what to do if import failed
					redirect('index.php/admin');
				}
	
			}
		}

    public function laporan_kinerja()
    {
        $data=[
			'title' => 'Laporan Kinerja',
			'isi' => 'renop/laporan_kinerja',
		];
		$this->load->view('layout/v_wrapper', $data);
	}
	
	// Add a new item
	public function laporan_kinerja_add()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('berat', 'Berat', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Add Barang',
					'kategori' => $this->m_kategori->get_all_data(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'barang/v_add',
				);
				$this->load->view('layout/v_wrapper_backend', $data, FALSE);
			} else {
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar'	=> $upload_data['uploads']['file_name'],
				);
				$this->m_barang->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				redirect('barang');
			}
		}

		$data = array(
			'title' => 'Add Barang',
			'kategori' => $this->m_kategori->get_all_data(),
			'isi' => 'barang/v_add',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	//Update one item
	public function laporan_kinerja_edit($id_barang = NULL)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('berat', 'Berat', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Barang',
					'kategori' => $this->m_kategori->get_all_data(),
					'barang'  => $this->m_barang->get_data($id_barang),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'barang/v_edit',
				);
				$this->load->view('layout/v_wrapper_backend', $data, FALSE);
			} else {
				//hapus gambar
				$barang = $this->m_barang->get_data($id_barang);
				if ($barang->gambar != "") {
					unlink('./assets/gambar/' . $barang->gambar);
				}
				//end hapus gambar
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang'	  => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar'	=> $upload_data['uploads']['file_name'],
				);
				$this->m_barang->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
				redirect('barang');
			}
			//jika tanpa ganti gambar
			$data = array(
				'id_barang'	  => $id_barang,
				'nama_barang' => $this->input->post('nama_barang'),
				'id_kategori' => $this->input->post('id_kategori'),
				'harga' => $this->input->post('harga'),
				'berat' => $this->input->post('berat'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_barang->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
			redirect('barang');
		}

		$data = array(
			'title' => 'Edit Barang',
			'kategori' => $this->m_kategori->get_all_data(),
			'barang'  => $this->m_barang->get_data($id_barang),
			'isi' => 'barang/v_edit',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	//Delete one item
	public function laporan_kinerja_delete($id_barang = NULL)
	{
		//hapus gambar
		$barang = $this->m_barang->get_data($id_barang);
		if ($barang->gambar != "") {
			unlink('./assets/gambar/' . $barang->gambar);
		}
		//end hapus gambar
		$data = array('id_barang' => $id_barang);
		$this->m_barang->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('barang');
	}


}

/* End of file Controllername.php */
