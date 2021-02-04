
         <div class="box box-warning">
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
                           <th>Nama</th>
                           <th>Kode MK</th>
                           <th>Nama MK</th>
						   <th>Kelas MK</th>
						   <th>Periode</th>
						   <th>Kode Unit</th>	
						   <th>Detail Laporan</th>	
						
						  
 
                        </tr>
                     </thead>
                     <tbody id="tbody_bpm_angket_mahasiswa">
                     <?php 
					 $no=1;
					 foreach($hasdsn as $hasdsn): ?>
                        <tr>
                           <td width="5">
                              <?php echo $no;  
							  $no=$no+1;

						

 

							  
							  ?>
                           </td> 
						   <td><?php echo($hasdsn->nip); ?></td>
						   <td><?php echo($hasdsn->nama); ?></td>
                           <td><?php echo($hasdsn->kodemk); ?></td>
                           <td><?php echo($hasdsn->namamk); ?></td> 
                          <td><?php echo($hasdsn->kelasmk); ?></td> 
                          <td><?php echo($hasdsn->periode); ?></td> 
						  <td><?php echo($hasdsn->kodeunit); ?></td> 
						  <td><button type="button" class="btn btn-success" onclick="window.location='<?php echo base_url("report/dosen_detail_result?periode=".$hasdsn->periode."&nip=".$hasdsn->nip."&kodemk=".$hasdsn->kodemk."&kelasmk=".$hasdsn->kelasmk);?>'">Hasil</button></td>
						   
						  
						   
                       
                        </tr>
                      <?php endforeach; ?>
                     
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
              
            </div>
            <!--/box body -->
         </div> 
         <!--/box -->

