

<!-- Main content -->

      

      <div class="col-md-12">

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

                           <th>nim</th>

                           <th>nama</th>

                           <th>periode</th>

                           <th>kodeunit</th>

						   <th>Kelas</th>

						   

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

                           <td><?php echo $periode; ?></td> 

                           <td><?php echo $kodeunit; ?></td> 

						   <td><?php echo $kelasmk; ?></td> 

						   

						   

  

						   

						   <td> 

						   <?php  

						   

						   $check_angket_mahasiswa = $this->db->query("select count(*) as jumcheck from ".$periode."_bpm_angket_mahasiswa where id_angket = 1 and nim = ".$mhskrs->nim." and periode = '".$periode."' and kelasmk = '".$kelasmk."'");   

    

						foreach ($check_angket_mahasiswa->result() as $chck)

						{ 

							 

							if (($chck->jumcheck)==0)

							{

								$data = array( 

							'id_angket' => 1,

							'nim' => $mhskrs->nim,

							'periode' => $periode,

							'active' => 'yes',    

							'kodeunit' => $kodeunit,

							'kelasmk' => $kelasmk

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

               

            </div>

            <!--/box body -->

         </div> 

         <!--/box -->

      </div>


