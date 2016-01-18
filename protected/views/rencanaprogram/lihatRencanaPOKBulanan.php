<div class="row">
	<div class="col-md-16">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Daftar Kegiatan & Rincian Bulan 
			</div>
			<div class="panel-body">
				<!-- // Deskripsi Umum Halaman -->
				<div class="row">
					<div class="col-md-12">
						Tabel berikut menyajikan daftar Kegiatan yang telah tercatat dalam database lengkap dengan rinciannya. <br> Terakhir ditambah : 08-11-2015 oleh Alfian Faiz
					</div>
					<div class="col-md-16">
						<div class="f-box  f-padding-1 alert alert-warning clearfix">
							<form class="form-inline" action="#" method="post">
								<div class="form-group">
									<select name="tahunAnggaran" class="form-control">
										<option>-- Pilih tahun -- </option>
										<?php for ($i=date('Y'); $i > date('Y')-5; $i--) { 
											if(isset($tahunAnggaran) && $tahunAnggaran == $i) $selectTahun = "selected=selected"; else $selectTahun = "";
											echo "<option value=$i $selectTahun>$i</option>";
										} ?>
									</select>
								</div>
								<div class="form-group">
									<select name="bulan" class="form-control">
										<option>-- Pilih Bulan -- </option>
										<?php for ($i=1; $i < 13; $i++) { 
											if(isset($bulan) && $bulan == $i) $selectBulan = "selected=selected"; else $selectBulan = "";
											echo "<option value=$i $selectBulan>".date('M',mktime(0,0,0,$i+1,0,0))."</option>";
										} ?>
									</select>
								</div>
								<div class="form-group  pull-right">
									<input type="submit" name="cariRealisasi" value="Tampilkan Daftar" class="btn btn-danger form-control" >
								</div>
							</form>
						</div>
					</div>
					<?php if(isset($dataKegiatan)) : ?>
					<div class="col-sm-16 col-md-16">
						<table class="table table-bordered">
							<tr>
								<td>Jumlah Kegiatan</td>
								<td>Persentase Realisasi</td>
								<td>Tahun Anggaran</td>
							</tr>
							<tr>
								
							</tr>
						</table>

						<!-- // Tabel Daftar Program -->
						<table class="table table-striped table-bordered">
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Nama Kegiatan</th>
								<th>Target</th>
								<th>Satuan</th>
								<th>Penanggung Jawab</th>
								<th>Sumber Dana</th>
								<th>Aksi</th>
							</tr>
							<?php $no = 1; ?>
							<?php foreach ($dataKegiatan as $key): ?>
								<tr>
									<td><?php echo $no;$no++; ?></td>
									<td><?php echo $key['kode_kegiatan'] ?></td>
									<td><?php echo $key['nama'] ?></td>
									<td><?php echo AlatUmum::changeCurrency($key['target']) ?></td>
										<?php $jumlah=0 ?>
									</td>
									<td><?php echo $key['satuan'] ?></td>
									<td><?php echo $key['penanggung_jawab'];?></td>
									<td><?php echo $key['sumber_dana'] ?></td>
									<td width="90px">
										<div class="row">
											<div class="col-md-8">
											<div class="col-md-8">
											</div>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endif ?>
				<!-- // Tabel Informasi Umum Kegiatan -->
			</div>
		</div>
	</div>
</div>