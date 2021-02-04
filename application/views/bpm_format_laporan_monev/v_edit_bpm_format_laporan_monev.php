<div class="col-md-12">    
	<div class="card card-primary">       
		<div class="card-header">          
			<h3 class="card-title">Form Edit BPM Format Laporan Monev</h3>          
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
			echo form_open_multipart('bpm_format_laporan_monev/bpm_format_laporan_monev_edit/' . $bpm_format_laporan_monev->id) ?>             
		<div class="form-group">                    
			<label>id</label>                    
			<input name="id" class="form-control" placeholder="id"  value="<?= $bpm_format_laporan_monev->id  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Edisi Format</label>                    
			<input name="edisi_format" class="form-control" placeholder="edisi_format"  value="<?= $bpm_format_laporan_monev->edisi_format  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Tahun Format</label>                    
			<input name="tahun_format" class="form-control" placeholder="tahun_format"  value="<?= $bpm_format_laporan_monev->tahun_format  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>deskripsi</label>                    
			<input name="deskripsi" class="form-control" placeholder="deskripsi"  value="<?= $bpm_format_laporan_monev->deskripsi  ?>">                  
		</div>                    
				<div class="form-group">                    
					<label>File</label>                    
					<input type="file" name="file" class="form-control" id="preview_file">                    
				</div>                    
				<div class="col-sm-6">  
					<div class="form-group">   
						<a href="<?= base_url('assets/file/' . $bpm_format_laporan_monev->file) ?>" id="file_load" width="400px"><?= $bpm_format_laporan_monev->file ?></a> 
					</div>     
				</div>   
			</div>    
			<div class="form-group">          
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>   
				<a href="<?= base_url('index.php/bpm_format_laporan_monev') ?>" class="btn btn-success btn-sm">Kembali</a>        
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
