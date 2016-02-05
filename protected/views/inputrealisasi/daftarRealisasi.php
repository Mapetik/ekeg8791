<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Daftar Realisasi Tercatat</h4>
			</div>
			<div class="panel-body">
				<div class="f-box  f-padding-1 alert clearfix">
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
							<select name="bulanRealisasi" class="form-control">
								<option>-- Pilih Bulan -- </option>
								<?php for ($i=1; $i < 13; $i++) { 
									if(isset($bulan) && $bulan == $i) $selectBulan = "selected=selected"; else $selectBulan = "";
									echo "<option value=$i $selectBulan>".date('M',mktime(0,0,0,$i+1,0,0))."</option>";
								} ?>
							</select>
						</div>
						<div class="form-group ">
							<input type="submit" name="cariRealisasi" value="Tampilkan Daftar" class="btn btn-danger form-control" >
						</div>
					</form>
				</div>
				<div class="f-box">
							<table class="table table-bordered">
								<tr>
									<th>Kode</th>
									<th>Nama Kegiatan</th>
									<th>Realisasi</th>
									<th>Satuan</th>
									<th>Penanggung Jawab</th>
									<th>Tahun Anggaran</th>
									<th>Aksi</th>
								</tr>
								<?php if (isset($dataKegiatan)): ?>
									<?php foreach ($dataKegiatan as $key): ?>
										<tr>
											<td><?php echo $key['kode_kegiatan'] ?></td>
											<td><?php echo $key['nama'] ?></td>
											<td><?php echo $key['nominal'] ?></td>
											<td><?php echo $key['satuan'] ?></td>
											<td><?php echo $key['penanggung_jawab'] ?></td>
											<td><?php echo $key['tahun_anggaran'] ?></td>
											<td><a href="#" class="btn btn-warning">Edit</a></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</table>
						</div>
			</div>
		</div>
	</div>
</div>