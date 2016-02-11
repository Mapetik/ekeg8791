<!-- 			// Tabel Daftar Program -->
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th align="center">Nama Program</th>
						<th align="center">Aktif</th>
						<th align="center">Riwayat Update</th>
					</tr>
					<?php if (empty($dataProgram)): ?>
						<tr>
							<td colspan="8"><div class="alert alert-warning"><center>Data Kosong untuk tahun anggaran tersebut, Silakan pilih tanggal lain</center></div></td>
						</tr>
					<?php endif ?>
					<?php $i=0;$counterProgram =0 ?>
					<?php if(!empty($dataProgram)) foreach ($dataProgram as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $key->nama_program ?></td>
							<td>
								<?php if($key->status=='1') {$statusValue=0;$classBtn = "glyphicon glyphicon-remove";$status = "Hapus";} else {$statusValue=1;$classBtn = "glyphicon glyphicon-ok";$status = "Recover";} ?>
								<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/recoverdata/hapusProgram/<?php echo $key->id ?>">
									<input type="hidden" value="<?php echo $key->id ?>" name="id">
									<input type="hidden" value="<?php echo $statusValue ?>" name="status">
									<button type="submit" name="btnHapus" class="btn btn-default"><span class="<?php echo $classBtn ?>"></span></button>
								</form>
							</td>
							<td>
								<button id="riwayat" onClick="showRiwayatProgram(<?php echo $key->id ?>)" class="btn btn-info">Riwayat</button>
							</td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th>No</th>
							<th align="center">Nama Program</th>
							<th align="center">Aktif</th>
							<th align="center">Riwayat Update</th>
						</tr>
				</table>

