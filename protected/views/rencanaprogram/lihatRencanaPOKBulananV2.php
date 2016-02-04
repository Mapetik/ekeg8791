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
									<select name="tahun_anggaran" class="form-control">
										<option>-- Pilih tahun -- </option>
										<?php AlatUmum::activeOptListYears(AlatUmum::getCookieTahun()); ?>
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
							<?php if (count($dataKegiatan)>0){ ?>
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Nama Kegiatan</th>
								<?php 
									for($i=1;$i<13;$i++) {
										echo "<th>".date('M',mktime(0,0,0,$i+1,0,0))."</th>";
									}
								?>
							</tr>	

							<?php }else{ ?>
							<div class="col-md-16 alert alert-danger">
								Maaf Data Kosong pada tahun anggaran <b><?php echo $tahun_anggaran ?></b>
							</div>
							<?php } ?>
							
							<?php $no = 1; ?>
							<?php foreach ($dataKegiatan as $key): ?>
								<tr>
									<td><?php echo $no;$no++; ?></td>
									<td><?php echo $key['kode_kegiatan'] ?></td>
									<td><?php echo $key['nama_kegiatan'] ?></td>
									<?php 
									for($i=1;$i<13;$i++) {
										if($i == $key['bulan']) $result = "yes"; else $result = " ";
										echo "<td>$result</td>";
									}
									?>
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