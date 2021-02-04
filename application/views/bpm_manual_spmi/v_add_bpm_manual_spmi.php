<!-- general form elements disabled -->     
<div class="col-md-12">                    
<div class="card card-primary">                    
	<div class="card-header">                    
		<h3 class="card-title">Form BPM Manual SPMI<?=$title;?></h3>                    
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
                    
		echo form_open_multipart('bpm_manual_spmi/bpm_manual_spmi_add') ?>                    
		                    
		<div class="form-group">                    
			<label>edisi</label>                    
			<input name="edisi" class="form-control" placeholder="edisi"                    
				value="<?= set_value('edisi') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>Tahun</label>                    
			<input name="tahun" class="form-control" placeholder="tahun"                    
				value="<?= set_value('tahun') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>Periode</label>                    
			<input name="periode" class="form-control" placeholder="periode"                    
				value="<?= set_value('periode') ?>">                    
		</div>                    
		<div class="form-group">                    
			<label>Deskripsi</label>                    
			<input name="deskripsi" class="form-control" placeholder="deskripsi"                    
				value="<?= set_value('deskripsi') ?>">                    
		</div>                    
				<div class="form-group">                    
					<label>File</label>                    
					<input type="file" name="file" class="form-control" id="preview_file">                    
				</div>                    
		<div class="form-group">                    
			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>                    
			<a href="<?= base_url('index.php/bpm_manual_spmi') ?>" class="btn btn-success btn-sm">Kembali</a>                    
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
