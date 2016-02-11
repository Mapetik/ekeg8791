<!-- // Tabel Daftar Program -->
				<table class="table table-condensed table-bordered table-hover">
					<tr>
						<th>Kode</th>
						<th width="300px">Nama Program</th>
						<th>Program</th>
						<th>Tanggal Update</th>
						<th>Aksi</th>
					</tr>
					<?php if (empty($recoKegiatan)): ?>
						<tr>
							<td colspan="8"><div class="alert alert-warning"><center>Data Kosong untuk tahun anggaran tersebut, Silakan pilih tanggal/keyword lain</center></div></td>
						</tr>
					<?php endif ?>
					<?php $i=0;$counterKegiatan =0 ?>
					<?php foreach ($recoKegiatan as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $key->kode_kegiatan ?></td>
							<td><?php echo $key->nama_kegiatan ?></td>
							<td><?php echo $key->id_layanan ?></td>
							<td><?php echo $key->waktu_update ?></td>
							<td><button class="btn btn-info" onClick="modelDetailRecoKegiatan(<?php echo $key->id ?>)" data-toggle="modal" data-target="#modelDetilrecoKegiatan">Roll It Back</button></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th>Kode</th>
							<th width="300px">Nama Program</th>
							<th>Tahun Anggaran</th>
							<th>Program</th>
							<th>Aksi</th>
						</tr>
				</table>
				<a href="<?php echo Yii::app()->request->baseUrl ?>/recoverdata/kegiatan" class="btn btn-info">Kembali</a>