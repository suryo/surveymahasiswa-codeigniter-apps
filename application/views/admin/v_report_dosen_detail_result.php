


<!-- Main content -->

      
    
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
                         
						  
						   
                       
                        </tr>
                      <?php endforeach; ?>
                     
                     </tbody>
                  </table>
				  
				   <table class="table table-bordered table-striped dataTable">
				  <th>Kode Instrumen</th>
                  <th>Deskripsi</th>
                  <th>Nilai</th>
				  
				  <tr>
				  <td>I1</td>
				  <td>Kesiapan dosen memberikan kontrak kuliah dan RPS di awal kuliah</td>
				  <td><?php echo($hasdsn->I1); ?></td>
				  </tr>
				  <tr>
				  <td>I2</td>
				  <td>Kesiapan dosen memberikan kuliah dan atau praktikum</td>
				  <td><?php echo($hasdsn->I2); ?></td>
				  </tr>
				  <tr>
				  <td>I3</td>
				  <td>Kesiapan dosen dalam menyampaikan bahan ajar perkuliahan yang sesuai dengan RPS dan diupload di SIM</td>
				  <td><?php echo($hasdsn->I3); ?></td>
				  </tr>
				  <tr>
				  <td>I4</td>
				  <td>Keseuaian dosen dalam menyampaikan materi perkuliahan berdasarkan RPS yang sudah diupload di SIM</td>
				  <td><?php echo($hasdsn->I4); ?></td>
				  </tr>
				  <tr>
				  <td>I5</td>
				  <td>Ketepatan waktu dosen dalam memberikan perkuliahan baik secara tatap muka dan daring/online</td>
				  <td><?php echo($hasdsn->I5); ?></td>
				  </tr>
				  <tr>
				  <td>I6</td>
				  <td>Lama waktu tatap muka dan daring/online (1 sks = 30 menit)</td>
				  <td><?php echo($hasdsn->I6); ?></td>
				  </tr>
				  <tr>
				  <td>I7</td>
				  <td>Ketepatan teknik mengajar dosen dalam menghidupkan suasana kelas pada saat proses belajar mengajar baik secara tatap muka atau daring/online</td>
				  <td><?php echo($hasdsn->I7); ?></td>
				  </tr>
				  <tr>
				  <td>I8</td>
				  <td>Kesesuaian dosen dalam mengarahkan dan memimpin proses diskusi (tanya jawab) dalam perkuliahan baik dengan metode tatap muka dan daring/online</td>
				  <td><?php echo($hasdsn->I8); ?></td>
				  </tr>
				  <tr>
				  <td>I9</td>
				  <td>Ketepatan dosen dalam memanfaatkan teknologi pembelajaran (PPT, Handout, Modul)</td>
				  <td><?php echo($hasdsn->I9); ?></td>
				  </tr>
				  <tr>
				  <td>I10</td>
				  <td>Ketepatan dosen dalam memberikan keragaman sumber bacaan/referensi mata kuliah (buku, jurnal, hasil penelitian dosen pribadi dan lain-lain) berdasarkan RPS yang sudah diupload di SIM</td>
				  <td><?php echo($hasdsn->I10); ?></td>
				  </tr>
				  <tr>
				  <td>I11</td>
				  <td>Ketepatan dosen dalam memberikan tugas terstruktur (paper/ makalah, rangkuman, latihan soal/problem solving, dan lain-lain)</td>
				  <td><?php echo($hasdsn->I11); ?></td>
				  </tr>
				  <tr>
				  <td>I12</td>
				  <td>Ketepatan dosen dalam memberikan umpan balik terhadap tugas yang sudah dikembalikan/dikirimkan melalui e-mail/manual/SIM</td>
				  <td><?php echo($hasdsn->I12); ?></td>
				  </tr>
				  <tr>
				  <td>I13</td>
				  <td>Kesesuaian materi ujian dengan materi perkuliahan yang telah diberikan dalam perkuliahan baik dengan metode tatap muka dan daring/online</td>
				  <td><?php echo($hasdsn->I13); ?></td>
				  </tr>
				  <tr>
				  <td>I14</td>
				  <td>Kesesuaian dosen dalam memberikan nilai dengan komponen/elemen pengukuran yang telah disepakati dalam kontrak kuliah</td>
				  <td><?php echo($hasdsn->I14); ?></td>
				  </tr>
				  <tr>
				  <td>I15</td>
				  <td>Kedalaman dan keluasan dosen pembahasan contoh soal/problem solving</td>
				  <td><?php echo($hasdsn->I15); ?></td>
				  </tr>
				  <tr>
				  <td>I16</td>
				  <td>Ketepatan dosen dalam menjelaskan keterkaitan antara mata kuliah yang diampu dengan mata kuliah lain</td>
				  <td><?php echo($hasdsn->I16); ?></td>
				  </tr>
				  <tr>
				  <td>I17</td>
				  <td>Ketepatan dosen dalam memberikan wawasan tentang topik/tema yang dijelaskan dikaitkan dengan kehidupan sehari-hari/kondisi yang terjadi pada saat ini</td>
				  <td><?php echo($hasdsn->I17); ?></td>
				  </tr>
				  <tr>
				  <td>I18</td>
				  <td>Memiliki rasa percaya diri dan kewibaan dalam mengajar</td>
				  <td><?php echo($hasdsn->I18); ?></td>
				  </tr>
				  <tr>
				  <td>I19</td>
				  <td>Menjadi tauladan (contoh) dalam bersikap dan berperilaku</td>
				  <td><?php echo($hasdsn->I19); ?></td>
				  </tr>
				  <tr>
				  <td>I20</td>
				  <td>Memiliki sikap dan perilaku adil kepada setiap mahasiswa</td>
				  <td><?php echo($hasdsn->I20); ?></td>
				  </tr>
				  <tr>
				  <td>I21</td>
				  <td>Memiliki sikap bijak dalam menerima kritik, saran dan pendapat/usul mahasiswa</td>
				  <td><?php echo($hasdsn->I21); ?></td>
				  </tr>
				  <tr>
				  <td>I22</td>
				  <td>Memiliki kemampuan berkomunikasi dan bergaul dengan baik kepada mahasiswa</td>
				  <td><?php echo($hasdsn->I22); ?></td>
				  </tr>
				  
				  
				  
				  
				  </table>
				  
				  
				  
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
              
            </div>
            <!--/box body -->
         </div> 
         <!--/box -->

