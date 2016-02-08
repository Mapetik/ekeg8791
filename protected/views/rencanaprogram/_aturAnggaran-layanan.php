<!-- // Tabel Daftar layanan -->
				<table class="table table-bordered">
					<tr>
						<th align="center">Kode Layanan</th>
						<th align="center">Nama Layanan</th>
						<th align="center">Target</th>
						<th align="center" colspan="2">Aksi</th>
					</tr>
					<?php if (empty($dataLayanan)): ?>
						<tr>
							<td colspan="8"><div class="alert alert-warning"><center>Data Kosong untuk tahun anggaran tersebut, Silakan pilih tanggal lain</center></div></td>
						</tr>
					<?php endif ?>
					<?php $i=0;?>
					<?php if(!empty($dataLayanan)) foreach ($dataLayanan as $key): ?>
						<?php $i++; ?>
						<tr>
							<td><?php echo $key->kode_layanan ?></td>
							<td><?php echo $key->nama_layanan ?></td>
							<td><?php echo $key->target ?></td>
							<td></td>
							<td><button class="btn btn-warning btnatur" data-toggle="modal" data-target="#modalAturAnggaranLayanan" onclick="aturAnggaran(<?php echo $key->id ?>)">Atur Anggaran</button></td>
							<td><a href="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggarankegiatan/<?php echo $key->id ?>" class="btn btn-info">Atur Kegiatan</a></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<th align="center">Kode Layanan</th>
							<th align="center">Nama Layanan</th>
							<th align="center">Target</th>
							<th align="center">Aksi</th>
						</tr>
				</table>

