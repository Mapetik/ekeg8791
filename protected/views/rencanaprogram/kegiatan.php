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
				<form action="<?php echo Yii::app()->request->baseUrl ?>/rencanaprogram/kegiatan/<?php echo $id_layanan ?>" method="post">
	          		<div class="input-group input-group-sm">
	                	<input type="text" class="form-control" placeholder="Nama Kegiatan" name="nama_kegiatan">
	                    <span class="input-group-btn">
	                      <button class="btn btn-info btn-flat" type="submit" id="btn_cari_nama">Cari Nama</button>
	                    </span>
	                </div><!-- /input-group -->
				</form>
	          	<hr>
                <div class="form-group">
                	<label class="control-label">Aksi Khusus</label><br>
                	<br>
                	<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modalTambahKegiatan">Tambah Kegiatan</button>
                	<br>
                	<div class="btn-group">
                		<a href="<?php echo Yii::app()->request->baseUrl ?>/rencanaprogram/layanan/<?php echo $id_program ?>" class="btn bg-olive">Kembali Ke Layanan</a>
                	</div>
                </div>
	    	</div><!-- /.box-body -->
	    </div><!-- /.box -->
	</div>
	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-body">
				<!-- // Deskripsi Umum Halaman -->
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<table class="table table-bordered">
							<tr>
								<td>Program</td>
								<td>Layanan</td>
								<td>Jumlah Kegiatan</td>
								<td>Persentase Realisasi</td>
								<td>Tahun Anggaran</td>
							</tr>
							<tr>
								<?php foreach ($dataLayanan as $key): ?>
									<td><?php echo $key->nama_layanan ?></td>
									<td><?php echo $key->program->nama_program ?></td>
									<td><?php echo count($key->kegiatan) ?></td>
									<td><?php echo DatabaseUmum::getPersentaseRealisasi('program',$key->id) ?> (<a href="#">halaman rekap</a>)</td>
									<td><?php echo $key->program->tahun_anggaran ?></td>
								<?php endforeach ?>
							</tr>
						</table>

						<!-- // Tabel Daftar Program -->
						<table class="table table-striped table-bordered">
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Nama Kegiatan</th>
								<th>Aksi</th>
							</tr>
							<?php $no = 1; ?>
							<?php foreach ($dataKegiatan as $key): ?>
								<tr>
									<td><?php echo $no;$no++; ?></td>
									<td><?php echo $key->kode_kegiatan ?></td>
									<td><?php echo $key->nama_kegiatan ?></td>
									<td width="90px">
										<table>
											<tr>
												<td>
													<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/editKegiatan/">
														<input type="hidden" value="<?php echo $key->id; ?>" name="id">
														<input type="hidden" value="<?php echo $key->id_layanan ?>" name="id_layanan">
														<button type="submit" class="btn form-control"><span class="glyphicon glyphicon-edit"></span></button>
													</form>
												</td>
												<td>
													<?php if($key->status=='1') {$statusValue=0;$classBtn = "glyphicon glyphicon-remove";$status = "Hapus";} else {$statusValue=1;$classBtn = "glyphicon glyphicon-ok";$status = "Recover";} ?>
													<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/hapusKegiatan/<?php echo $key->id ?>">
														<input type="hidden" value="<?php echo $key->id ?>" name="id">
														<input type="hidden" value="<?php echo $statusValue ?>" name="status">
														<input type="hidden" value="<?php echo $key->id_layanan ?>" name="id_layanan">
														<button type="submit" name="btnHapus" class="btn form-control"><span class="<?php echo $classBtn ?>"></span></button>
													</form>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							<?php endforeach ?>
						</table>
					</div>
				<!-- // Tabel Informasi Umum Kegiatan -->
				
			</div>
		</div>
	</div>


	<!-- Modal Tambah Layanan -->
	<div class="modal fade" id="modalTambahKegiatan" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
		<div class="modal-dialog" role="document">
			<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/insertKegiatan">
			<div class="modal-content f-modal-wrap modal-sm">
				<div class="modal-haeder">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="labelModalTP"><center>Tambah Kegiatan</center></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Kode</label>
						<input type="text" name="kodeKg" value="2" placeholder="Kegiatan" class="form-control" readonly required>
					</div>
					<div class="form-group">
						<label>Nama Kegiatan</label>
						<input type="text" name="namaKg" placeholder="Judul" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
				<input type="hidden" name="id_layanan" value="<?php echo $id_layanan ?>">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <input type="submit" class="btn btn-primary" value="Simpan">
		      </div>
		      </form>
			</div>
		</div>
	</div>
	<!-- END Modal Tambah Layanan -->

</div>