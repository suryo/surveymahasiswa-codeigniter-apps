
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                      
                       
					   
					     <?= form_open(base_url('report/dosenresult'), [
                            'name'    => 'form_bpm_angket_mahasiswa', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_bpm_angket_mahasiswa', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'GET'
                            ]); ?> 
						 
						 
					   <div class="form-group ">
                            <label for="gelar" class="col-sm-2 control-label">Periode
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="periode" id="periode" placeholder="periode" value="20192">
                                <small class="info help-block">
                                <b>Input Periode</b> exp: 20181.</small>
                            </div>
                        </div>
					   
					    		
						
					   
					   
					    <div class="form-group ">
                            <label for="Dosen" class="col-sm-2 control-label">Dosen 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="nip" id="nip" data-placeholder="Select Dosen" >
                                    <option value=""></option>	
									<?php  
										$query=$this->db->query("select * from data_dosen order by nama asc")->result();
									?>
									 
                                    <?php foreach ($query as $row): ?>  
                                    <option value="<?= $row->nip ?>"><?= $row->nama."-".$row->nip; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                
                            </div>
                        </div>
					  
					   
					   <button type="submit" class="btn btn-default">Cek Data Dosen</button>
                   <?= form_close(); ?> 
					   
					   
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
     
