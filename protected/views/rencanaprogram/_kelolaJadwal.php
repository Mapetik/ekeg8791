<!-- // Tabel Daftar Program -->
				<table class="table table-bordered">
					<tr>
						<th align="center">Kode Kegiatan</th>
						<th align="center">Nama Kegiatan</th>
						<th align="center">Jadwal Pelaksanaan</th>
						<th align="center">Aksi</th>
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
							<td><button class="btn btn-warning btnatur" data-toggle="modal" data-target="#modalAturJadwal" onclick="aturjadwal(<?php echo $key->id ?>)">Atur Jadwal</button></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th align="center">Kode Kegiatan</th>
							<th align="center">Nama Kegiatan</th>
							<th align="center">Jadwal Pelaksanaan</th>
							<th align="center">Aksi</th>
						</tr>
				</table>

