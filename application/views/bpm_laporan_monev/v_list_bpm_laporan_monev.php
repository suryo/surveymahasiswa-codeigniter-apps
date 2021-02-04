<div class="col-md-12">                                
	<div class="card card-primary">                       
		<div class="card-header">                           
			<h3 class="card-title">Data BPM Laporan Monev</h3>    
			<div class="card-tools">                          
				<a href="<?= base_url('index.php/bpm_laporan_monev/bpm_laporan_monev_add') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>                          
				<a href="<?= base_url('index.php/bpm_laporan_monev/import_bpm_laporan_monev') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Import From Excel</a>         
			</div>                                            
			<!-- /.card-tools -->                             
		</div>                                              
		<!-- /.card-header -->                              
		<div class="card-body">                             
			<?php                                             
			if ($this->session->flashdata('pesan')) {         
				echo '<div class="alert alert-success alert-dismissible">                                            
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>         
				<h5><i class="icon fas fa-check"></i>';                                                              
				echo $this->session->flashdata('pesan');                                                             
				echo '</h5></div>';                                                                                  
			}                                                                                                      
			?>                                                                                                     
			<table class="table table-bordered" id="example1">                                                     
				<thead class="text-center">                                                                          
					<tr>                                                                                               
						<th>No</th>                                                                                      
						<th>Kode unit</th>                                                                             
						<th>Tahun Laporan Monev</th>                                                                             
						<th>Periode Laporan Monev</th>                                                                             
						<th>Deskripsi Laporan Monev</th>                                                                             
						<th>File Laporan Monev</th>                                                                             
						<th>Saran Evaluasi</th>                                                                             
						<th>Action</th>                                                                                  
					</tr>                                                                                              
				</thead>                                                                                             
				<tbody>                                                                                              
					<?php $no = 1;                                                                                     
					foreach ($bpm_laporan_monev as $key => $value) { ?>                                                    
						<tr>                                                                                             
							<td class="text-center"><?= $no++; ?></td>                                                     
							<td class="text-center"><?= $value->kodeunit ?></td>                                        
							<td class="text-center"><?= $value->tahun_laporan_monev ?></td>                                        
							<td class="text-center"><?= $value->periode_laporan_monev ?></td>                                        
							<td class="text-center"><?= $value->deskripsi_laporan_monev ?></td>                                        
							<td class="text-center"><a href="<?= base_url('assets/file/' . $value->file_laporan_monev) ?>" ><?=$value->file_laporan_monev?></a></td>                                    
							<td class="text-center"><?= $value->saran_evaluasi ?></td>                                        
							<td class="text-center">                                                                       
								<a href="<?= base_url('index.php/bpm_laporan_monev/bpm_laporan_monev_edit/' . $value->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>            
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id ?>"><i class="fas fa-trash"></i></button>        
							</td>                                                                                          
						</tr>                                                                                            
					<?php } ?>                                                                                         
				</tbody>                                                                                             
			</table>                                                                                               
		</div>                                                                                                   
		<!-- /.card-body -->                                                                                     
	</div>                                                                                                     
	<!-- /.card -->                                                                                            
</div>                                                                                                      
<!--modal delete -->                                                                                        
<?php foreach ($bpm_laporan_monev as $key => $value) { ?>                                                       
	<div class="modal fade" id="delete<?= $value->id ?>">                                                      
		<div class="modal-dialog">                                                                               
			<div class="modal-content">                                                                            
				<div class="modal-header">                                                                           
					<h4 class="modal-title">Delete <?= $value->id ?></h4>                                     
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">                       
						<span aria-hidden="true">&times;</span>                                                          
					</button>                                                                                          
				</div>                                                                                               
				<div class="modal-body">                                                                             
					<h5>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h5>                                            
				</div>                                                                                               
				<div class="modal-footer justify-content-between">                                                   
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                  
					<a href="<?= base_url('index.php/bpm_laporan_monev/bpm_laporan_monev_delete/' . $value->id) ?>" class="btn btn-primary">Delete</a>      
				</div>                                                                                               
			</div>                                                                                                 
			<!-- /.modal-content -->                                                                               
		</div>                                                                                                   
		<!-- /.modal-dialog -->                                                                                  
	</div>                                                                                                     
<?php } ?>                                                                                                  
