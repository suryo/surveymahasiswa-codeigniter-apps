<div class="col-md-12">    
	<div class="card card-primary">       
		<div class="card-header">          
			<h3 class="card-title">Form Edit BPM Laporan Kinerja</h3>          
		</div>                      
		<div class="card-body">    
			<?php               
			echo validation_errors('<div class="alert alert-danger alert-dismissible">        
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>     
			<h5><i class="icon fas fa-info"></i>', '</h5> </div>');                                      
			if (isset($error_upload)) {                     
				echo '<div class="alert alert-danger alert-dismissible">         
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>    
				<h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';                       
			}                               
			echo form_open_multipart('bpm_laporan_kinerja/bpm_laporan_kinerja_edit/' . $bpm_laporan_kinerja->id) ?>             
		<div class="form-group">                    
			<label>id</label>                    
			<input name="id" class="form-control" placeholder="id"  value="<?= $bpm_laporan_kinerja->id  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Kode unit</label>                    
			<input name="kodeunit" class="form-control" placeholder="kodeunit"  value="<?= $bpm_laporan_kinerja->kodeunit  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Tahun Laporan Kinerja</label>                    
			<input name="tahun_laporan_kinerja" class="form-control" placeholder="tahun_laporan_kinerja"  value="<?= $bpm_laporan_kinerja->tahun_laporan_kinerja  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Periode Laporan Kinerja</label>                    
			<input name="periode_laporan_kinerja" class="form-control" placeholder="periode_laporan_kinerja"  value="<?= $bpm_laporan_kinerja->periode_laporan_kinerja  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Deskripsi Laporan Kinerja</label>                    
			<input name="deskripsi_laporan_kinerja" class="form-control" placeholder="deskripsi_laporan_kinerja"  value="<?= $bpm_laporan_kinerja->deskripsi_laporan_kinerja  ?>">                  
		</div>                    
				<div class="form-group">                    
					<label>File</label>                    
					<input type="file" name="file" class="form-control" id="preview_file">                    
				</div>                    
		<div class="form-group">                    
			<label>Saran Evaluasi</label>                    
			<input name="saran_evaluasi" class="form-control" placeholder="saran_evaluasi"  value="<?= $bpm_laporan_kinerja->saran_evaluasi  ?>">                  
		</div>                    
				<div class="col-sm-6">  
					<div class="form-group">   
						<a href="<?= base_url('assets/file/' . $bpm_laporan_kinerja->file_laporan_kinerja) ?>" id="file_load" width="400px"><?= $bpm_laporan_kinerja->file_laporan_kinerja ?></a> 
					</div>     
				</div>   
			</div>    
			<div class="form-group">          
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>   
				<a href="<?= base_url('index.php/bpm_laporan_kinerja') ?>" class="btn btn-success btn-sm">Kembali</a>        
			</div>          
			<?php echo form_close() ?>       
		</div>                             
	</div>                               
</div>                                
<script>                            
	function bacaGambar(input) {        
		if (input.files && input.files[0]) {     
			var reader = new FileReader();      
			reader.onload = function(e) {      
				$('#gambar_load').attr('src', e.target.result);    
			}                                          
			reader.readAsDataURL(input.files[0]);     
		}                                        
	}                                          
	$("#preview_gambar").change(function() {   
		bacaGambar(this);                        
	});                                       
</script>                                  
