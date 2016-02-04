<div class="row">
	<div class="col-md-16">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Daftar Kegiatan & Rincian
			</div>
			<div class="panel-body">
				<!-- // Deskripsi Umum Halaman -->
				<div class="row">
					<div class="col-md-12">
						Tabel berikut menyajikan daftar Kegiatan yang telah tercatat dalam database lengkap dengan rinciannya. <br> Terakhir ditambah : 08-11-2015 oleh Alfian Faiz
					</div>
					<div class="col-md-4">
						<a href="<?php echo Yii::app()->request->baseUrl ?>/rencanaprogram/layanan/<?php echo $id_program ?>" class="btn">Ke Layanan</a>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTambahKKegiatan">Tambah Kegiatan</button>
					</div>
					<div class="col-sm-16 col-md-16">
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
								<th>Target</th>
								<th>Realisasi</th>
								<th>Satuan</th>
								<th>Penanggung Jawab</th>
								<th>Sumber Dana</th>
								<th>Aksi</th>
							</tr>
							<?php $no = 1; ?>
							<?php foreach ($dataKegiatan as $key): ?>
								<tr>
									<td><?php echo $no;$no++; ?></td>
									<td><?php echo $key->kode_kegiatan ?></td>
									<td><?php echo $key->nama_kegiatan ?></td>
									<td><?php echo AlatUmum::changeCurrency($key->target) ?></td>
										<?php $jumlah=0 ?>
									<td><?php foreach ($key->realisasi as $key2): ?>
										<?php $jumlah += $key2->nominal ?>
										<?php endforeach ?>
										<?php echo AlatUmum::changeCurrency($jumlah) ?>
										(<?php echo AlatUmum::formatDecimal($jumlah/$key->target *100)?>%)
										</td>
									</td>
									<td><?php echo $key->Satuan['nama'];?></td>
									<td><?php echo $key->PenanggungJawab['nama'] ?></td>
									<td><?php echo $key->SumberDana['nama'] ?></td>
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

			<!-- // Footer Halaman Daftar Kegiatan-->
			<div class="panel-footer">
				Jika anda hendak menambahkan kegiatan lainnya, silakan klik tombol berikut <br> 
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTambahKKegiatan">Tambah Kegiatan</button>
				<a href="<?php echo Yii::app()->user->returnUrl ?>" class="btn">Ke Layanan</a>
			</div>
		</div>
	</div>

	<!-- Modal Tambah kegiatan -->
	<div class="modal fade" id="modalTambahKKegiatan" tabindex="-1" role="dialog" aria-labelledby="labelModalTK">
		<div class="modal-dialog" role="document">
			<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/insertkegiatan">
			<div class="model-content f-modal-wrap modal-md">
				<div class="modal-haeder">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="labelModalTK"><center>Tambah Kegiatan</center></h4>
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
					<div class="form-group">
						<label>Nominal/Target Anggaran</label>
						<input type="number" name="targetKg" placeholder="Nominal" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Bulan Rencana</label>
						<select class="form-control" name="bulanKg" required="required">
							<?php for ($i=1; $i < 13; $i++) { 
								echo "<option value=$i>".date('M',mktime(0,0,0,$i+1,0,0))."</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<label>Volume</label>
						<input type="number" name="volumeKg" placeholder="Judul" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Harga Satuan</label>
						<input type="number" name="harga_satuanKg" placeholder="Judul" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select name="satuanKg" class="form-control" required>
							<?php foreach ($dataSatuan as $key): ?>
								<option value="<?php echo $key->id ?>"> <?php echo $key->nama ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Sumber Dana</label>
						<select name="sumber_danaKg" class="form-control" required>
							<?php foreach ($dataSumberDana as $key): ?>
								<option value="<?php echo $key->id ?>"><?php echo $key->nama ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Penanggung Jawab</label>
						<select name="penanggung_jawabKg" class="form-control" required>
							<?php foreach ($dataPenanggungJawab as $key): ?>
								<option value="<?php echo $key->id ?>"> <?php echo $key->nama ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <input type="hidden" name="id_layanan" value="<?php echo $id_layanan ?>">
		        <input type="submit" class="btn btn-primary" value="Simpan">
		      </div>
		      </form>
			</div>
		</div>
	</div>
	<!-- END Modal Tambah Kegiatan -->

</div>