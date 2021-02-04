<div class="col-md-12">    
	<div class="card card-primary">       
		<div class="card-header">          
			<h3 class="card-title">Form Edit aipt_dokumen</h3>          
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
			echo form_open_multipart('aipt_dokumen/aipt_dokumen_edit/' . $aipt_dokumen->id) ?>             
		<div class="form-group">                    
			<label>id_dokumen</label>                    
			<input name="id_dokumen" class="form-control" placeholder="id_dokumen"  value="<?= $aipt_dokumen->id_dokumen  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>id_butir</label>                    
			<input name="id_butir" class="form-control" placeholder="id_butir"  value="<?= $aipt_dokumen->id_butir  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>nama_dokumen</label>                    
			<input name="nama_dokumen" class="form-control" placeholder="nama_dokumen"  value="<?= $aipt_dokumen->nama_dokumen  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>lokasi</label>                    
			<input name="lokasi" class="form-control" placeholder="lokasi"  value="<?= $aipt_dokumen->lokasi  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>status</label>                    
			<input name="status" class="form-control" placeholder="status"  value="<?= $aipt_dokumen->status  ?>">                  
		</div>                    
				<div class="form-group">                    
					<label>File</label>                    
					<input type="file" name="file" class="form-control" id="preview_file">                    
				</div>                    
				<div class="col-sm-6">  
					<div class="form-group">   
						<a href="<?= base_url('assets/file/' . $aipt_dokumen->file) ?>" id="file_load" width="400px"><?= $aipt_dokumen->file ?></a> 
					</div>     
				</div>   
			</div>    
			<div class="form-group">          
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>   
				<a href="<?= base_url('aipt_dokumen') ?>" class="btn btn-success btn-sm">Kembali</a>        
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
