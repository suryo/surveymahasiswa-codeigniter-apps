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
                    
		echo form_open_multipart('bpm_laporan_kinerja/bpm_laporan_kinerja_add') ?>

			<!--<div class="form-group">
				<label>Kode unit</label>
				<input name="kodeunit" class="form-control" placeholder="kodeunit" value="<?= set_value('kodeunit') ?>">
			</div>-->

			<div class="form-group">
                  <label>Kode Unit</label>
				  <select name="kodeunit" class="form-control select2" style="width: 100%;">
				  <?php $no = 1;                                                                                     
					foreach ($unit as $key => $value) { ?>                                                    
					                                                                                             
					<option value="<?= $value->kodeunit?>"><?= $value->kodeunit.'-'.$value->namaunit ?></option>                                                    
							                                                                                           
					<?php } ?>     
                    
                  </select>
                </div>

			<div class="form-group">
				<label>Tahun Laporan Kinerja</label>
				<input name="tahun_laporan_kinerja" class="form-control" placeholder="tahun_laporan_kinerja"
					value="<?= set_value('tahun_laporan_kinerja') ?>">
			</div>
			

			<div class="form-group">
			<label>Periode Laporan Kinerja</label>
				<div class="form-check">
					<input class="form-check-input" value="ganjil" type="radio" name="periode_laporan_kinerja" checked>
					<label class="form-check-label">Ganjil</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" value="genap" type="radio" name="periode_laporan_kinerja" >
					<label class="form-check-label">Genap</label>
				</div>

			</div>


			<div class="form-group">
				<label>Deskripsi Laporan Kinerja</label>
				<textarea name="deskripsi_laporan_kinerja" class="form-control" placeholder="deskripsi_laporan_kinerja"
					value="<?= set_value('deskripsi_laporan_kinerja') ?>"></textarea>
				
			</div>
			<div class="form-group">
				<label>File</label>
				<input type="file" name="file" class="form-control" id="preview_file">
			</div>
			<div class="form-group">
				<label>Saran Evaluasi</label>
				<textarea name="saran_evaluasi" class="form-control" placeholder="saran_evaluasi"
					value="<?= set_value('saran_evaluasi') ?>"></textarea>
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
