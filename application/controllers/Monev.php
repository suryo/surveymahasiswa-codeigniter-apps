<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Monev extends CI_Controller {

    public function index()
    {
        //$this->load->view("");
    }

    public function panduan_monev()
    {
        $data=[
			'title' => 'Panduan Monev',
			'isi' => 'monev/panduan_monev',
		];
		$this->load->view('layout/v_wrapper', $data);
    }

    public function instrumen_monev()
    {
        $data=[
			'title' => 'Instrumen Monev',
			'isi' => 'monev/instrumen_monev',
		];
		$this->load->view('layout/v_wrapper', $data);
        
    }

    public function format_laporan_monev()
    {
        $data=[
			'title' => 'Format Laporan Monev',
			'isi' => 'monev/format_laporan_monev',
		];
		$this->load->view('layout/v_wrapper', $data);

    }

    public function laporan_monev()
    {
        $data=[
			'title' => 'Laporan Monev',
			'isi' => 'monev/laporan_monev',
		];
		$this->load->view('layout/v_wrapper', $data);

    }

    public function dokumen_monev()
    {
        $data=[
			'title' => 'Dokumen Monev',
			'isi' => 'monev/dokumen_monev',
		];
		$this->load->view('layout/v_wrapper', $data);
    }

}

/* End of file Controllername.php */
