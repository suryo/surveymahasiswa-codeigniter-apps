<div class="col-md-12">    
	<div class="card card-primary">       
		<div class="card-header">          
			<h3 class="card-title">Form Edit aipt_butir</h3>          
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
			echo form_open_multipart('aipt_butir/aipt_butir_edit/' . $aipt_butir->id) ?>             
		<div class="form-group">                    
			<label>id</label>                    
			<input name="id" class="form-control" placeholder="id"  value="<?= $aipt_butir->id  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>standar</label>                    
			<input name="standar" class="form-control" placeholder="standar"  value="<?= $aipt_butir->standar  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>butir</label>                    
			<input name="butir" class="form-control" placeholder="butir"  value="<?= $aipt_butir->butir  ?>">                  
		</div>                    
		<div class="form-group">                    
			<label>baku_mutu</label>                    
			<input name="baku_mutu" class="form-control" placeholder="baku_mutu"  value="<?= $aipt_butir->baku_mutu  ?>">                  
		</div>                    
				<div class="col-sm-6">  
					<div class="form-group">   
						<a href="<?= base_url('assets/file/' . $aipt_butir->file) ?>" id="file_load" width="400px"><?= $aipt_butir->file ?></a> 
					</div>     
				</div>   
			</div>    
			<div class="form-group">          
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>   
				<a href="<?= base_url('aipt_butir') ?>" class="btn btn-success btn-sm">Kembali</a>        
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
