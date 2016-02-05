<div class="row">
	<div class="col-md-16">
		<div class="box box-primary">
			<div class="box-header">
				Daftar Layanan & Rincian
			</div>
			<div class="box-body">
				<!-- // Deskripsi Umum Halaman -->
					<div class="row">
						<div class="col-md-12">
							Tabel berikut menyajikan daftar Layanan yang telah tercatat dalam database lengkap dengan rinciannya. <br> Terakhir ditambah : 08-11-2015 oleh Alfian Faiz		
						</div>
						<div class="col-md-4">
							<a href="<?php echo Yii::app()->request->baseUrl ?>/rencanaprogram/" class="btn">Ke Program</a>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTambahLayanan">Tambah Layanan</button>
						</div>
					</div>
					
				<!-- // Tabel Informasi Umum Program -->
				<table class="table table-bordered">
					<tr>
						<td>Nama Program</td>
						<td>Jumlah Kegiatan</td>
						<td>Persentase Realisasi</td>
						<td>Tahun Anggaran</td>
					</tr>
					<tr>
						<td><?php echo $nama_program ?></td>
						<td>10</td>
						<td><?php echo DatabaseUmum::getPersentaseRealisasi('layanan',$id_program) ?> (<a href="#">halaman rekap</a>)</td>
						<td>2015</td>
					</tr>
				</table>

				<!-- // Tabel Daftar Program -->
				<table class="table table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Layanan</th>
						<th>Target</th>
						<th>Realisasi</th>
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
							<td><?php echo AlatUmum::changeCurrency($key->target) ?></td>
							<td><?php
									$realisasi = $this->getRealisasiFromLayanan($key->id);
									echo AlatUmum::changeCurrency($realisasi);
							 	?> (<?php if($realisasi!=0){echo AlatUmum::formatDecimal($realisasi/$key->target * 100);} else echo "0"; ?>%)</td>
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
	<div class="modal fade" id="modalTambahLayanan" tabindex="-1" role="dialog" aria-labelledby="labelModalLy">
		<div class="modal-dialog" role="document">
			<form method="post" action="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/insertlayanan/">
			<div class="model-content f-modal-wrap modal-sm">
				<div class="modal-haeder">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="labelModalLy"><center>Tambah Layanan</center></h4>
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
					<div class="form-group">
						<label>Nominal/Target Anggaran</label>
						<input type="number" name="targetLy" placeholder="Nominal" class="form-control" max="<?php echo $dataMaxTarget ?>" required>
						<dd>Maksimal : Rp <?php echo AlatUmum::changeCurrency($dataMaxTarget)?></dd>
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