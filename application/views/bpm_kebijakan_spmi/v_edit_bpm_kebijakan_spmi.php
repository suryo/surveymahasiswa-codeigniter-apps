<div class="col-md-12">    
	<div class="card card-primary">       
		<div class="card-header">          
			<h3 class="card-title">Form Edit bpm_kebijakan_spmi</h3>          
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
			echo form_open_multipart('bpm_kebijakan_spmi/bpm_kebijakan_spmi_edit/' . $bpm_kebijakan_spmi->id) ?>             
		                   
		<div class="form-group">                    
			<label>Edisi</label>                    
			<input name="edisi" class="form-control" placeholder="edisi"  value="<?= $bpm_kebijakan_spmi->edisi  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Tahun</label>                    
			<input name="tahun" class="form-control" placeholder="tahun"  value="<?= $bpm_kebijakan_spmi->tahun  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Periode</label>                    
			<input name="periode" class="form-control" placeholder="periode"  value="<?= $bpm_kebijakan_spmi->periode  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>Deskripsi</label>                    
			<input name="deskripsi" class="form-control" placeholder="deskripsi"  value="<?= $bpm_kebijakan_spmi->deskripsi  ?>">                  
		</div>                    
				<div class="form-group">                    
					<label>File</label>                    
					<input type="file" name="file" class="form-control" id="preview_file">                    
				</div>                    
				<div class="col-sm-6">  
					<div class="form-group">   
						<a href="<?= base_url('assets/file/' . $bpm_kebijakan_spmi->file) ?>" id="file_load" width="400px"><?= $bpm_kebijakan_spmi->file ?></a> 
					</div>     
				</div>   
			</div>    
			<div class="form-group">          
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>   
				<a href="<?= base_url('index.php/bpm_kebijakan_spmi') ?>" class="btn btn-success btn-sm">Kembali</a>        
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
