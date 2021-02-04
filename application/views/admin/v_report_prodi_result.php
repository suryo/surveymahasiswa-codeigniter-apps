       
		   <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                 


                  <form name="form_bpm_angket_mahasiswa" id="form_bpm_angket_mahasiswa" action="<?= base_url('administrator/bpm_angket_mahasiswa/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            No
                           </th>
                           <th>NIP</th>
                           <th>nama</th>
                           <th>Kode MK</th>
                           <th>Mata Kuliah</th>
                           <th>Kelas</th>
						   <th>Periode</th>
                           <th>Nilai Rata-Rata</th> 
                        </tr>
                     </thead>
                     <tbody id="tbody_bpm_angket_mahasiswa">
                     <?php 
					 $no=1;
					 foreach($dosenmengajar as $dosenmengajar): ?>
					 
		
					 
					     
					 
					 
					 
                        <tr>
                           <td width="5">
                              <?php echo $no;  
							  $no=$no+1;
$periode=intval($this->input->get('periode'));
$kodeunit=$this->input->get('program_studi');

		

 

							  
							  ?>
                           </td> 
                           <td><?php echo ($dosenmengajar->nip); ?></td>
                           <td><?php echo ($dosenmengajar->nama); ?></td> 
                           <td><?php echo ($dosenmengajar->kodemk); ?></td> 
                           <td><?php echo ($dosenmengajar->namamk); ?></td> 
                           <td><?php echo ($dosenmengajar->kelasmk); ?></td> 
						   <td><?php echo ($dosenmengajar->periode); ?></td>
						   
						   <td>
						   <?php    

							
							 // $jumlahangketterisi = $this->db->query("select COUNT(DISTINCT aktmhs.nim) as jumlah from 
// ".$periode."_bpm_angket_mahasiswa as aktmhs, ".$periode."_bpm_survey_value as hslsrv
// where aktmhs.periode = ".$dosenmengajar->periode." and 
// aktmhs.kodeunit = ".$kodeunit." and 
// aktmhs.id=hslsrv.id_angket_mahasiswa and  
// aktmhs.kelasmk = '".$dosenmengajar->kelasmk."' and
// aktmhs.iddosen = '".$dosenmengajar->nip."' and 
// aktmhs.kodemk = '".$dosenmengajar->kodemk."';");    
						 
						 // foreach ($jumlahangketterisi->result() as $jumlahangketterisi)  
							// {
								// echo "Jumlah Angket Terisi : ".$jumlahangketterisi->jumlah;
							// } 
 
$ratarata = $this->db->query("select ROUND(AVG(hslsrv.skor),2) as avg from 
".$periode."_bpm_angket_mahasiswa as aktmhs  
inner join ".$periode."_bpm_survey_value as hslsrv
on aktmhs.id=hslsrv.id_angket_mahasiswa
where aktmhs.periode = ".$dosenmengajar->periode." and 
aktmhs.kodeunit = ".$kodeunit." and 
aktmhs.kelasmk = '".$dosenmengajar->kelasmk."' and
aktmhs.iddosen = '".$dosenmengajar->nip."' and 
aktmhs.kodemk = '".$dosenmengajar->kodemk."';");       
						 
						 foreach ($ratarata->result() as $ratarata)  
							{
								if ($ratarata->avg==null)
								{echo "null";}
							else
							{
								echo $ratarata->avg;
							}
							} 							
						 
						 
						
						   ?>
						   
						   </td>
						   
                         
                        </tr>
                      <?php endforeach; 
					  echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';

					  ?>
                     
                     </tbody>
                  </table>
                  </div>
				  
				  
				  
               </div>
               <hr>
               
            </div>
            <!--/box body -->
         
		 