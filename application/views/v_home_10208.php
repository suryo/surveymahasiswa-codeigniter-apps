
		  

<div class="col-lg-3 col-6">
            <div class="small-box">
              <div class="inner">
			  <?php
				$query = $this->db->query("select count(*) as jumlah_angket from 20192_bpm_angket_mahasiswa as bam where bam.kodeunit = 10208");
				$jumlah_respon = 0;
				foreach ($query->result() as $row)
				{
					$jumlah_angket = $row->jumlah_angket;
				}
				$query = $this->db->query("select *, if ((select count(*) as jumlah from 20192_bpm_survey_value as bsv where bsv.id_angket_mahasiswa = bam.id and (bsv.skor <> null or bsv.skor <> 0))<(select count(bs.id) from bpm_angket_detail as bad, bpm_angket as ba, bpm_soal as bs where bad.id_angket = ba.id and bad.id_soal = bs.id and ba.id = bam.id_angket),'0','1') as status_isi from 20192_bpm_angket_mahasiswa as bam where bam.periode = 20192 and bam.kodeunit = 10208");
				 foreach ($query->result() as $row)
				 {
					$jumlah_respon = $jumlah_respon + $row->status_isi;
				 }		
				echo "Angket : ".$jumlah_angket;
				echo "<br>";
				echo "Respon : ".$jumlah_respon;
				echo "<br>";						
				$respon = round($jumlah_respon/$jumlah_angket*100);
				?>
                <h3>
				<?php echo $respon;?>
				<sup style="font-size: 20px">%</sup></h3>
                <p>Respopn Rate Teknik Mesin</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
		  
		