<div class="row">
	<div class="col-md-6 f-margin-2 f-padding-2 f-border-lightgrey alert alert-warning">
		<h3>Data Tersimpan</h3>
		<table class="table">
			<tr>
				<td>Kode Program</td>
				<td>:</td>
				<td><?php echo $dataProgram['kode_program'] ?></td>
			</tr>
			<tr>
				<td>Tahun Anggaran</td>
				<td>:</td>
				<td><?php echo $dataProgram['nama_program'] ?></td>
			</tr>
			<tr>
				<td>Tahun Anggaran</td>
				<td>:</td>
				<td><?php echo $dataProgram['tahun_anggaran'] ?></td>
			</tr>
			<tr>
				<td>Nominal/Target Anggaran</td>
				<td>:</td>
				<td><?php 
					echo AlatUmum::changeCurrency($dataProgram['target']);
				?></td>
			</tr>
		</table>			
	</div>
	<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/UpdateProgram/">
	<div class="col-md-8 col-md-offset-1">
			<div class="form-group">
				<label>Kode</label>
				<input type="text" name="kodeTP" value="<?php echo $dataProgram['kode_program'] ?>" class="form-control" >
			</div>
			<div class="form-group">
				<label>Nama Program</label>
				<input type="text" name="namaTP" placeholder="Judul" value="<?php echo $dataProgram['nama_program'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Tahun Anggaran</label>
				<select name="tahunTP" class="form-control">
					<?php AlatUmum::activeOptListYears("2016") ?>
				</select>
			</div>
			<div class="form-group">
				<label>Nominal/Target Anggaran</label>
				<input type="number" name="targetTP" placeholder="Nominal" value="<?php echo intval($dataProgram['target']) ?>" class="form-control">
			</div>
			<p>Perhatikan data yang anda inputkan kembali</p>
			<a href="<?php echo Yii::app()->user->returnUrl ?>" class="btn">Kembali</a>
			<input type="hidden" name="id" value="<?php echo $dataProgram['id'] ?>">
		    <input type="submit" class="btn btn-primary" value="Simpan">
	</div>
	</form>
</div>
		