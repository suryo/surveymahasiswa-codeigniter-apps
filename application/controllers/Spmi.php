<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spmi extends CI_Controller {

    public function index()
    {
        $this->load->view("spmi/");
    }

    public function kebijakan_spmi()
    {
        $data=[
			'title' => 'Kebijakan SPMI',
			'isi' => 'spmi/kebijakan_spmi',
		];
		$this->load->view('layout/v_wrapper', $data);

    }

    public function standar_spmi()
    {
        $data=[
			'title' => 'Standar SPMI',
			'isi' => 'spmi/standar_spmi',
		];
		$this->load->view('layout/v_wrapper', $data);

    }

    public function manual_spmi()
    {
        $data=[
			'title' => 'Manual SPMI',
			'isi' => 'spmi/manual_spmi',
		];
		$this->load->view('layout/v_wrapper', $data);

    }
    

}

/* End of file Controllername.php */
