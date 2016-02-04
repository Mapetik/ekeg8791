<div class="row">
	<div class="col-md-4 f-margin-2 f-padding-2 f-border-lightgrey alert alert-warning">
		<h3>Data Tersimpan</h3>
		<table class="table">
			<tr>
				<td>Kode Kegiatan</td>
				<td>:</td>
				<td><?php echo $dataKegiatan['kode_kegiatan'] ?></td>
			</tr>
			<tr>
				<td>Nama Kegiatan</td>
				<td>:</td>
				<td><?php echo $dataKegiatan['nama_kegiatan'] ?></td>
			</tr>
			<tr>
				<td>Nominal/Target Anggaran</td>
				<td>:</td>
				<td><?php 
					echo AlatUmum::changeCurrency($dataKegiatan['target']);
				?></td>
			</tr>
			<tr>
				<td>Satuan</td>
				<td>:</td>
				<td><?php echo $dataKegiatan['Satuan']['nama'] ?></td>
			</tr>
			<tr>
				<td>Harga Satuan</td>
				<td>:</td>
				<td><?php echo AlatUmum::changeCurrency($dataKegiatan['harga_satuan']) ?></td>
			</tr>
			<tr>
				<td>Sumber Dana</td>
				<td>:</td>
				<td><?php echo $dataKegiatan['SumberDana']['nama'] ?></td>
			</tr>
			<tr>
				<td>Penanggung Jawab</td>
				<td>:</td>
				<td><?php echo $dataKegiatan['PenanggungJawab']['nama'] ?></td>
			</tr>
		</table>			
	</div>
	<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/UpdateKegiatan/">
	<div class="col-md-7">
		<input type="hidden" name="id" value="<?php echo $dataKegiatan['id'] ?>">
		<input type="hidden" name="id_layanan" value="<?php echo $dataKegiatan['id_layanan'] ?>">
		<div class="form-group">
			<label>Kode</label>
			<input type="text" name="kodeKg" placeholder="Kegiatan" value="<?php echo $dataKegiatan['id_layanan'] ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Nama Kegiatan</label>
			<input type="text" name="namaKg" placeholder="Judul" class="form-control"  value="<?php echo $dataKegiatan['nama_kegiatan'] ?>" required>
		</div>
		<div class="form-group">
			<label>Nominal/Target Anggaran</label>
			<input type="number" name="targetKg" placeholder="Nominal" class="form-control" value="<?php echo intval($dataKegiatan['target']) ?>" required>
			<dd>Maksimal : <?php echo AlatUmum::changeCurrency($dataKegiatan['target']) ?></dd>
		</div>
		<div class="form-group">
			<label>Bulan Rencana</label>
			<select class="form-control" name="bulanKg" required="required">
				<?php AlatUmum::activeOptListMonth($dataKegiatan['bulan']) ?>
			</select>
		</div>
		<div class="form-group">
			<label>Volume</label>
			<input type="number" value="<?php echo $dataKegiatan['volume'] ?>"name="volumeKg" placeholder="Judul" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Satuan</label>
			<select name="satuanKg" required class="form-control">
				<?php foreach ($dataSatuan as $key): ?>
					<option value="<?php echo $key->id ?>" <?php if($key->id == $dataKegiatan['Satuan']['id']) echo "selected" ?>><?php echo $key->nama ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label>Harga Satuan</label>
			<input type="number" name="harga_satuanKg" placeholder="Nominal" class="form-control" max="<?php echo $dataKegiatan['target'] ?>" value="<?php echo intval($dataKegiatan['harga_satuan']) ?>" required>
		</div>
		<div class="form-group">
			<label>Sumber Dana</label>
			<select name="sumber_danaKg" class="form-control" required>
				<?php foreach ($dataSumberDana as $key): ?>
					<option value="<?php echo $key->id ?>" <?php if($key->id == $dataKegiatan['SumberDana']['id']) echo "selected" ?>><?php echo $key->nama ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label>Penanggung Jawab</label>
			<select name="penanggung_jawabKg" class="form-control" required>
				<?php foreach ($dataPenanggungJawab as $key): ?>
					<option value="<?php echo $key->id ?>" <?php if($key->id == $dataKegiatan['PenanggungJawab']['id']) echo "selected" ?>><?php echo $key->nama ?></option>
				<?php endforeach ?>
			</select>
		</div>
	<a href="<?php echo Yii::app()->user->returnUrl ?>" class="btn">Kembali</a>
    <input type="submit" class="btn btn-primary" value="Simpan">
	</div>
	</form>
</div>
		