<!-- general form elements disabled -->     
<div class="col-md-12">                    
<div class="card card-primary">                    
	<div class="card-header">                    
		<h3 class="card-title">Form <?=$title;?></h3>                    
	</div>                    
	<!-- /.card-header -->                    
	<div class="card-body">                    
		<?php                    
		//notifikasi form kosong                    
		echo validation_errors('<div class="alert alert-danger alert-dismissible">                    
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
		<h5><i class="icon fas fa-info"></i>', '</h5> </div>');                    
		//notifikasi gagal upload gambar                    
		if (isset($error_upload)) {                    
			echo '<div class="alert alert-danger alert-dismissible">                    
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
			<h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';                    
		}                    
                    
		echo form_open_multipart('aipt_butir/aipt_butir_add') ?>                    
		<div class="form-group">                    
			<label>id</label>                    
			<input name="id" class="form-control" placeholder="id"                    
				value="<?= set_value('id') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>standar</label>                    
			<input name="standar" class="form-control" placeholder="standar"                    
				value="<?= set_value('standar') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>butir</label>                    
			<input name="butir" class="form-control" placeholder="butir"                    
				value="<?= set_value('butir') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>baku_mutu</label>                    
			<input name="baku_mutu" class="form-control" placeholder="baku_mutu"                    
				value="<?= set_value('baku_mutu') ?>">                    
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
		reader.onload = function (e) {                    
			$('#gambar_load').attr('src', e.target.result);                    
		}                    
		reader.readAsDataURL(input.files[0]);                    
	}                    
}                    
                    
$("#preview_gambar").change(function () {                    
	bacaGambar(this);                    
});                    
                    
</script>                    
