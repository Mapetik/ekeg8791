<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h5 class="box-title">Kelola POK - Program</h5>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div><!-- /.box-tools -->
	        </div><!-- /.box-header -->
	        <div class="box-body">
	        	<p>
					Tabel berikut menyajikan daftar Layanan yang telah tercatat dalam database 
					lengkap dengan rinciannya. <br> <br> Terakhir ditambah : 08-11-2015 oleh Alfian Faiz
				</p>
          		<form action="<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/layanan/<?php echo $id_program ?>" method="post">
          			<div class="input-group input-group-sm">
	                	<input type="text" class="form-control" placeholder="Nama Layanan" name="nama_layanan">
	                    <span class="input-group-btn">
	                    	<input type="hidden" name="id_program" value="<?php echo $id_program ?>">
	                      	<button class="btn btn-info btn-flat" type="submit" id="btn_cari_nama">Cari Nama</button>
	                    </span>
	                </div><!-- /input-group -->
          		</form>
	          	<hr>
                <div class="form-group">
                	<label class="control-label">Aksi Khusus</label><br>
                	<br>
                	<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modalTambahLayanan">Tambah Layanan</button>
                	<br>
                	<div class="btn-group">
                		<a href="<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/" class="btn bg-olive">Kembali Ke Program</a>
                	</div>
                </div>
	    	</div><!-- /.box-body -->
	    </div><!-- /.box -->
	</div>
	<div class="col-md-9">
		<div class="box box-primary">

			<div class="box-body">
					
				<!-- // Tabel Informasi Umum Program -->
				<table class="table table-bordered">
					<tr>
						<th>Nama Program</th>
						<th>Jumlah Kegiatan</th>
						<th>Tahun Anggaran</th>
					</tr>
					<tr>
						<td><?php echo $nama_program ?></td>
						<td>10</td>
						<td>2015</td>
					</tr>
				</table>
				<br>
				<!-- // Tabel Daftar Program -->
				<table class="table table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Layanan</th>
						<th>Kegiatan</th>
						<th>Aksi</th>
					</tr>
					<?php $i=0; ?>
					<?php foreach ($dataLayanan as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $key->kode_layanan ?></td>
							<td><?php echo $key->nama_layanan ?></td>
							<td><?php echo count($key->kegiatan) ?></td>
							<td> 
								<table>
									<tr>
										<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/kegiatan/<?php echo $key->id ?>" class="btn btn-primary form-control">Detil</a></td>
										<td>
											<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/editLayanan/">
												<input type="hidden" value="<?php echo $key->id; ?>" name="id">
												<input type="hidden" value="<?php echo $key->id_program; ?>" name="id_program">
												<button type="submit" class="btn form-control"><span class="glyphicon glyphicon-edit"></span></button>
											</form>
										</td>
										<td>
											<?php if($key->status=='1') {$statusValue=0;$classBtn = "glyphicon glyphicon-remove";$status = "Hapus";} else {$statusValue=1;$classBtn = "glyphicon glyphicon-ok";$status = "Recover";} ?>
											<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/hapusLayanan/<?php echo $key->id ?>">
												<input type="hidden" value="<?php echo $key->id ?>" name="id">
												<input type="hidden" value="<?php echo $statusValue ?>" name="status">
												<input type="hidden" value="<?php echo $key->id_program ?>" name="id_program">
												<button type="submit" name="btnHapus" class="btn form-control"><span class="glyphicon glyphicon-remove"></span></button>
											</form>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>

		</div>
	</div>
	<!-- Modal Tambah Layanan -->
	<div class="modal fade" id="modalTambahLayanan" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
		<div class="modal-dialog" role="document">
			<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/insertLayanan">
			<div class="modal-content f-modal-wrap modal-sm">
				<div class="modal-haeder">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="labelModalTP"><center>Tambah Layanan</center></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Kode</label>
						<input type="text" name="kodeLy" placeholder="Layanan" value="0024" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Nama Layanan</label>
						<input type="text" name="namaLy" placeholder="Judul" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
				<input type="hidden" name="id_program" value="<?php echo $id_program ?>">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <input type="submit" class="btn btn-primary" value="Simpan">
		      </div>
		      </form>
			</div>
		</div>
	</div>
	<!-- END Modal Tambah Layanan -->
</div>