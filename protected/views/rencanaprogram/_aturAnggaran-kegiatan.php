<!-- // Tabel Daftar Kegiatan -->
				<table class="table table-bordered">
					<tr>
						<th align="center">No</th>
						<th align="center">Nama Kegiatan</th>
						<th align="center">Target</th>
						<th align="center">Harga Satuan</th>
						<th align="center">Sumber Dana</th>
						<th align="center">PJ</th>
						<th align="center">Aksi</th>
					</tr>
					<?php if (empty($dataKegiatan)): ?>
						<tr>
							<td colspan="8"><div class="alert alert-warning"><center>Data Kosong untuk tahun anggaran tersebut, Silakan pilih tanggal lain</center></div></td>
						</tr>
					<?php endif ?>
					<?php $i=0; ?>
					<?php if(!empty($dataKegiatan)) foreach ($dataKegiatan as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $key->nama_kegiatan ?></td>
							<td><?php echo AlatUmum::changeCurrency($key->target) ?></td>
							<td><?php echo AlatUmum::changeCurrency($key->harga_satuan) ?></td>
							<td><?php echo $key->SumberDana['nama'] ?></td>
							<td><?php echo $key->PenanggungJawab['nama'] ?></td>
							<td><button class="btn btn-warning btnatur" data-toggle="modal" data-target="#modalAturAnggaranKegiatan" onclick="aturAnggaran(<?php echo $key->id ?>)">Atur Anggaran</button></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th align="center">No</th>
							<th align="center">Nama Kegiatan</th>
							<th align="center">Target</th>
							<th align="center">Harga Satuan</th>
							<th align="center">Sumber Dana</th>
							<th align="center">PJ</th>
							<th align="center">Aksi</th>
						</tr>
				</table>

