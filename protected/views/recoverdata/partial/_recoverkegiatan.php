<!-- // Tabel Daftar Program -->
				<table class="table table-bordered">
					<tr>
						<th align="center">Kode Kegiatan</th>
						<th align="center">Nama Kegiatan</th>
						<th align="center">Aktif</th>
						<th align="center">Riwayat</th>
					</tr>
					<?php if (empty($dataKegiatan)): ?>
						<tr>
							<td colspan="8"><div class="alert alert-warning"><center>Data Kosong untuk tahun anggaran tersebut, Silakan pilih tanggal lain</center></div></td>
						</tr>
					<?php endif ?>
					<?php $i=0;$counterKegiatan =0 ?>
					<?php if(!empty($dataKegiatan)) foreach ($dataKegiatan as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $key->kode_kegiatan ?></td>
							<td><?php echo $key->nama_kegiatan ?></td>
							<td><?php echo $key->tanggal ?></td>
							<td>
								<?php if($key->status=='1') {$statusValue=0;$classBtn = "glyphicon glyphicon-remove";$status = "Hapus";} else {$statusValue=1;$classBtn = "glyphicon glyphicon-ok";$status = "Recover";} ?>
								<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/recoverdata/hapusKegiatan/<?php echo $key->id ?>">
									<input type="hidden" value="<?php echo $key->id ?>" name="id">
									<input type="hidden" value="<?php echo $statusValue ?>" name="status">
									<button type="submit" name="btnHapus" class="btn btn-default"><span class="<?php echo $classBtn ?>"></span></button>
								</form>
							</td>
							<td><button id="riwayat" onClick="showRiwayatKegiatan(<?php echo $key->id ?>)" class="btn btn-info">Riwayat</button></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th align="center">Kode Kegiatan</th>
							<th align="center">Nama Kegiatan</th>
							<th align="center">Aktif</th>
							<th align="center">Riwayat</th>
						</tr>
				</table>

