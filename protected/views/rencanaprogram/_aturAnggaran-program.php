<!-- // Tabel Daftar Program -->
				<table class="table table-bordered">
					<tr>
						<th align="center">Nama Program</th>
						<th align="center">Target</th>
						<th align="center" colspan="2">Aksi</th>
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
							<td><?php echo $key->nama_program ?></td>
							<td><?php echo AlatUmum::changeCurrency($key->target) ?></td>
							<td><button class="btn btn-warning btnatur" data-toggle="modal" data-target="#modalAnggaran" onclick="aturAnggaran(<?php echo $key->id ?>)">Atur Anggaran</button></td>
							<td><a href="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggaranlayanan/<?php echo $key->id ?>" class="btn btn-info">Atur Layanan</a></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th align="center">Kode Program</th>
							<th align="center">Nama Program</th>
							<th align="center">Target</th>
							<th align="center">Aksi</th>
						</tr>
				</table>

