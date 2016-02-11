<!-- // Tabel Daftar Program -->
				<table class="table table-condensed table-bordered table-hover">
					<tr>
						<th>Kode</th>
						<th width="300px">Nama Program</th>
						<th>Tahun Anggaran</th>
						<th>Tanggal Update</th>
						<th>Aksi</th>
					</tr>
					<?php if (empty($recoProgram)): ?>
						<tr>
							<td colspan="8"><div class="alert alert-warning"><center>Data Kosong untuk tahun anggaran tersebut, Silakan pilih tanggal/keyword lain</center></div></td>
						</tr>
					<?php endif ?>
					<?php $i=0;$counterKegiatan =0 ?>
					<?php foreach ($recoProgram as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $key->kode_program ?></td>
							<td><?php echo $key->nama_program ?></td>
							<td><?php echo $key->tahun_anggaran ?></td>
							<td><?php echo $key->waktu_update ?></td>
							<td><button class="btn btn-info" onClick="modelDetailRecoProgram(<?php echo $key->id ?>)" data-toggle="modal" data-target="#modelDetilRecoProgram">Roll It Back</button></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th>Kode</th>
							<th width="300px">Nama Program</th>
							<th>Tahun Anggaran</th>
							<th>Tanggal Update</th>
							<th>Aksi</th>
						</tr>
				</table>
				<a href="<?php echo Yii::app()->request->baseUrl ?>/recoverdata/" class="btn btn-info">Kembali</a>