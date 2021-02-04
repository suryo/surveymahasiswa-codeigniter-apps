     

      <div class="col-md-12">

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

                           <th>nim</th>

                           <th>nama</th>

                           <th>periode</th>

                           <th>kodeunit</th>

                           <th>kodemk</th>

						   <th>kelasmk</th>

                           <th>status kuisioner</th>

                        </tr>

                     </thead>

                     <tbody id="tbody_bpm_angket_mahasiswa">

                     <?php 

					 $no=1;

					 foreach($mhskrs as $mhskrs): ?>

                        <tr>

                           <td width="5">

                              <?php echo $no;  

							  $no=$no+1;



						



 



							  

							  ?>

                           </td> 

                           <td><?php echo($mhskrs->nim); ?></td>

                           <td><?php echo($mhskrs->nama); ?></td> 

                           <td><?php echo($mhskrs->periode); ?></td> 

                           <td><?php echo($mhskrs->kodeunit); ?></td> 

                           <td><?php echo($mhskrs->kodemk); ?></td> 

						   <td><?php echo($mhskrs->kelasmk); ?></td>

						   

						   <td>

						   <?php  

						   

						   $check_angket_mahasiswa = $this->db->query("select count(*) as jumcheck from ".$periode."_bpm_angket_mahasiswa where id_angket = 2 and nim = ".$mhskrs->nim." and periode = '".$periode."' and kodeunit = ".$kodeunit." and kodemk = '".$mhskrs->kodemk."' and iddosen ='".$mhskrs->nipdosen."' and kelasmk = '".$mhskrs->kelasmk."'");   

    

						foreach ($check_angket_mahasiswa->result() as $chck)

						{

							

							if (($chck->jumcheck)==0)

							{

								$data = array( 

							'id_angket' => 2,

							'nim' => $mhskrs->nim,

							'periode' => $mhskrs->periode,

							'active' => 'yes',    

							'kodeunit' => $mhskrs->kodeunit,

							'iddosen' => $mhskrs->nipdosen,

							'kodemk' => $mhskrs->kodemk,

							'kelasmk' => $mhskrs->kelasmk

							

							

							);



							$this->db->insert($periode.'_bpm_angket_mahasiswa', $data);

							echo "angket berhasil dibuat";

							}

							else

							{

							

							

							  

							echo "angket sudah ada";  

							}     

							

						}

						   ?>

						   

						   </td>

						   


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

      </div>


