		
		
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
				$respon = round($jumlah_respon/$jumlah_angket*100);
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
		  
		  
		  
		  
			
		  

<div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 10202");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 10202
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Teknik Mesin</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 10207");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 10207
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Teknik Industri</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 10208");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 10208
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Teknik Informatika</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 10404");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 10404
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Agribisnis</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 20101");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 20101
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Ekonomi Pembangunan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 20102");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 20102
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Manajamen</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 20103");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 20103
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Akuntansi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 20201");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 20201
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Administrasi Negara</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 20401");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 20401
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Ilmu Hukum</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div> 
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 20602");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 20602
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3> 
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Sastra Inggris</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 61101");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 61101
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Magister Manajemen</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 63101");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 63101
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Magister Administrasi Publik</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 74101");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 74101
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Magister Hukum</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		  		  <div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from ".$periode."_bpm_angket_mahasiswa as bam where bam.kodeunit = 81");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select bam.id,bam.id_angket,bam.nim, count(bsv.skor)
from ".$periode."_bpm_angket_mahasiswa as bam 
	right join ".$periode."_bpm_survey_value as bsv
	on bsv.id_angket_mahasiswa = bam.id
where bam.periode = ".$periode." and bam.kodeunit = 81
group by bam.id"); 

$jumlah_respon = $query->num_rows();				 
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respon Rate Psikologi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		 