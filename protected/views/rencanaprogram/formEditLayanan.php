<div class="row">
	<div class="col-md-4 f-margin-2 f-padding-2 f-border-lightgrey alert alert-warning">
		<h3>Data Tersimpan</h3>
		<table class="table">
			<tr>
				<td>Kode Layanan</td>
				<td>:</td>
				<td><?php echo $dataLayanan['kode_layanan'] ?></td>
			</tr>
			<tr>
				<td>Nama Layanan</td>
				<td>:</td>
				<td><?php echo $dataLayanan['nama_layanan'] ?></td>
			</tr>
			<tr>
				<td>Nominal/Target Anggaran</td>
				<td>:</td>
				<td><?php 
					echo AlatUmum::changeCurrency($dataLayanan['target']);
				?></td>
			</tr>
		</table>			
	</div>
	<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/UpdateLayanan/">
	<div class="col-md-7">
		<div class="box box-danger">
			<div class="box-body">
				<input type="hidden" name="id" value="<?php echo $dataLayanan['id'] ?>">
				<input type="hidden" name="id_program" value="<?php echo $dataLayanan['id_program'] ?>">
				<div class="form-group">
					<label>Kode</label>
					<input type="text" name="kodeLy" placeholder="Layanan" value="<?php echo $dataLayanan['id_program'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<label>Nama Layanan</label>
					<input type="text" name="namaLy" placeholder="Judul" class="form-control"  value="<?php echo $dataLayanan['nama_layanan'] ?>" required>
				</div>
				<div class="form-group">
					<label>Nominal/Target Anggaran</label>
					<input type="number" name="targetLy" placeholder="Nominal" class="form-control" value="<?php echo intval($dataLayanan['target']) ?>" max="<?php echo intval($dataLayanan['target']) ?>" required>
					<dd>Maksimal : <?php echo AlatUmum::changeCurrency($dataLayanan['target']) ?></dd>
				</div>

			<a href="<?php echo Yii::app()->user->returnUrl ?>" class="btn">Kembali</a>
		    <input type="submit" class="btn btn-primary" value="Simpan">
			</div>
		</div>
	</div>
	</form>
</div>
		