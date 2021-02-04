

            <div class="box-body ">

               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  
<b>Periode</b><br>
Isi Periode Dengan Tahun diikuti 1(untuk gasal) dan 2 (untuk Genap)<br><br>
<b>Daftar Kode Unit (Program Studi)</b>
				  <br>			 	  
10202	Teknik Mesin <br>
10207	Teknik Industri  <br>
10208	Teknologi Informasi  <br>
10404	Agribisnis  <br>
20101	Ekonomi Pembangunan  <br>
20102	Manajemen  <br>
20103	Akuntansi  <br>
20201	Administrasi Publik  <br>
20401	Hukum  <br>
20602	Bahasa Inggris <br>
61101	Magister Manajemen  <br>
63101	Magister Administrasi Publik <br>
74101	Magister Hukum <br>
81	Psikologi <br>  <br>

				  
                  <form name="form_bpm_angket_mahasiswa" id="form_bpm_angket_mahasiswa" action="<?= base_url('report/prodi_result'); ?>">
                  
				
				Periode : <input type="text" name="periode" placeholder = "isikan periode" value="20192">  
				Kode Unit Prodi : <input type="text" name="program_studi" placeholder = "isikan program studi" value="10208">
				
				   
				<br>
				<br>    
				 
<button type="submit" class="btn btn-default">Cek Data Dosen</button>
                  </form> 
               </div>

               
            </div>

