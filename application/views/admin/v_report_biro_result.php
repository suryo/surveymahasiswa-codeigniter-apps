
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
               

                  <form name="form_bpm_angket_mahasiswa" id="form_bpm_angket_mahasiswa" action="<?= base_url('administrator/bpm_angket_mahasiswa/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            No
                           </th>
                           <th>Instrumen</th>
                           <th>Skor AVG</th>

                        </tr>
                     </thead>
                     <tbody id="tbody_bpm_angket_mahasiswa">
                     <?php 
					 $no=1;
					 foreach($instrumenbiro as $instrumenbiro): ?>
                        <tr>
                           <td width="5">
                              <?php echo $no;  
							  $no=$no+1;

						

 

							  
							  ?>
                           </td> 
                           <td><?php echo($instrumenbiro->soal); ?></td>
                           <td><?php echo($instrumenbiro->avg); ?></td> 
                  
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

