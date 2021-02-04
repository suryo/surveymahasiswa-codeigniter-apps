		<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
				$query = $this->db->query("select count(distinct id_angket_mahasiswa) as jumlah_respon from ".$periode."_bpm_survey_value");

foreach ($query->result() as $row)
{
	$jumlah_respon = $row->jumlah_respon;
        echo $row->jumlah_respon;

}
				?>
				</h3>

                <p>Respon Angket</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
        </div>
		
		 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
				$query = $this->db->query("select count(distinct nim) as jumlah_mahasiswa from ".$periode."_akademik_ak_perwalian");

foreach ($query->result() as $row)
{
	$jumlah_mahasiswa = $row->jumlah_mahasiswa;
        echo $row->jumlah_mahasiswa;

}
				?>
				</h3>

                <p>Jumlah Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa");

foreach ($query->result() as $row)
{
	$jumlah_angket = $row->jumlah_angket;
	//echo "-";
        echo $row->jumlah_angket;

}
				?></h3>

                <p>Jumlah Angket</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
				<?php
        if (($jumlah_respon<>0)&&($jumlah_angket<>0))
        {
          $respon = round($jumlah_respon/$jumlah_angket*100);
        }
        else
        {
          $respon = 0;
        }
				//echo "-";
				echo $respon;
				
				?>
				
				
				<sup style="font-size: 20px">%</sup></h3>

                <p>Respon Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             
            </div>
          </div>
		  
		  
		  
		  
			