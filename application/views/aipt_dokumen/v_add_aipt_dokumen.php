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
                    
		echo form_open_multipart('aipt_dokumen/aipt_dokumen_add') ?>                    
		<div class="form-group">                    
			<label>id_dokumen</label>                    
			<input name="id_dokumen" class="form-control" placeholder="id_dokumen"                    
				value="<?= set_value('id_dokumen') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>id_butir</label>                    
			<input name="id_butir" class="form-control" placeholder="id_butir"                    
				value="<?= set_value('id_butir') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>nama_dokumen</label>                    
			<input name="nama_dokumen" class="form-control" placeholder="nama_dokumen"                    
				value="<?= set_value('nama_dokumen') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>lokasi</label>                    
			<input name="lokasi" class="form-control" placeholder="lokasi"                    
				value="<?= set_value('lokasi') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>status</label>                    
			<input name="status" class="form-control" placeholder="status"                    
				value="<?= set_value('status') ?>">                    
		</div>                    
				<div class="form-group">                    
					<label>File</label>                    
					<input type="file" name="file" class="form-control" id="preview_file">                    
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
