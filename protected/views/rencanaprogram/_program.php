<!-- // Tabel Daftar Program -->
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th>Kode</th>
						<th width="300px">Nama Program</th>
						<th>Target</th>
						<th>Realisasi</th>
						<th>Layanan</th>
						<th>Kegiatan</th>
						<th>Aksi</th>
					</tr>
					<?php if (empty($dataProgram)): ?>
						<tr>
							<td colspan="8"><div class="alert alert-warning"><center>Data Kosong untuk tahun anggaran tersebut, Silakan pilih tanggal lain</center></div></td>
						</tr>
					<?php endif ?>
					<?php $i=0;$counterKegiatan =0 ?>
					<?php foreach ($dataProgram as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $key->kode_program ?></td>
							<td><?php echo $key->nama_program ?></td>
							<td><?php echo AlatUmum::changeCurrency($key->target) ?></td>
							<td><?php
									echo $realisasi = $this->getRealisasiFromProgram($key->id)
							 	?> (<?php if($realisasi!=0){echo AlatUmum::formatDecimal($realisasi/$key->target * 100);} else echo "0"; ?>%)</td>
							<td><?php echo count($key->layanan) ?></td>
							<td>
								<?php foreach ($key->layanan as $key2) {
								$counterKegiatan += count($key2->kegiatan);
								} 
								echo $counterKegiatan; 
								$counterKegiatan = 0;
								?>
								</td>
							<td >
								<div class="row">
									<div class="col-md-6">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/layanan/<?php echo $key->id ?>" class="btn">Detil</a>
									</div>
									<div class="col-md-5">
										<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/editProgram/">
											<input type="hidden" value="<?php echo $key->id; ?>" name="id">
											<button type="submit" class="btn form-control"><span class="glyphicon glyphicon-edit"></span></button>
										</form>
									</div>
									<div class="col-md-5">
										<?php if($key->status=='1') {$statusValue=0;$classBtn = "glyphicon glyphicon-remove";$status = "Hapus";} else {$statusValue=1;$classBtn = "glyphicon glyphicon-ok";$status = "Recover";} ?>
									<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/hapusProgram/<?php echo $key->id ?>">
										<input type="hidden" value="<?php echo $key->id ?>" name="id">
										<input type="hidden" value="<?php echo $statusValue ?>" name="status">
										<button type="submit" name="btnHapus" class="btn form-control"><span class="<?php echo $classBtn ?>"></span></button>
									</form>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
				</table>