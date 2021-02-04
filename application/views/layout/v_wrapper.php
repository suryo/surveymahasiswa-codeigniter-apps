<?php
	
$start_time = microtime(TRUE);

$this->load->view('layout/v_head.php');
$this->load->view('layout/v_header.php');
$this->load->view('layout/v_nav.php');
$this->load->view('layout/v_content.php');

$end_time = microtime(TRUE);
$time_taken =($end_time - $start_time);
$time_taken = round($time_taken,2);


            
         
 
echo '<div class="col-lg-12">Page generated in '.$time_taken.' seconds. </div>';

$this->load->view('layout/v_footer.php');

