
<div class="modal-haeder">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="labelModalTP"><center>Tambah Kegiatan</center></h4>
</div>
<div class="modal-body">
	<div class="form-group">
		<label>Kode</label>
		<input type="hidden" name="id_kegiatan" value="<?php echo $dataKegiatan->id ?>" class="form-control" readonly>
		<input type="text" id="kode_kegiatan" name="kode_kegiatan" value="<?php echo $dataKegiatan->kode_kegiatan ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Nama Kegiatan</label>
		<input type="text" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $dataKegiatan->nama_kegiatan ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Target</label>
		<input type="text" id="nominal" name="nominal" onchange="check()" value="<?php echo $dataKegiatan->target ?>" class="form-control">
	</div>
	<div class="form-group">
		<label>Volume</label>
		<input type="number" id="volume" name="volume" onchange="check()" value="<?php echo $dataKegiatan->volume ?>" placeholder="Volume" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Harga Satuan</label>
		<input type="number" id="harga_satuan" name="harga_satuan" onchange="check()" value="<?php echo $dataKegiatan->harga_satuan ?>" placeholder="Harga Satuan" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Satuan</label>
		<select id="satuan" name="satuan" class="form-control" onchange="check()" required>
			<?php foreach ($dataSatuan as $key): ?>
				<option value="<?php echo $key->id ?>" <?php if($key->id == $dataKegiatan->satuan) echo "selected=\"selected\"" ?>> <?php echo $key->nama ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Sumber Dana</label>
		<select id="sumber_dana" name="sumber_dana" onchange="check()" class="form-control" required>
			<?php foreach ($dataSumberDana as $key): ?>
				<option value="<?php echo $key->id ?>" <?php if($key->id == $dataKegiatan->sumber_dana) echo "selected=\"selected\"" ?>><?php echo $key->nama ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Penanggung Jawab</label>
		<select id="penanggung_jawab" name="penanggung_jawab" onchange="check()" class="form-control" required>
			<?php foreach ($dataPenanggungJawab as $key): ?>
				<option value="<?php echo $key->id ?>" <?php if($key->id == $dataKegiatan->penanggung_jawab) echo "selected=\"selected\"" ?>> <?php echo $key->nama ?></option>
			<?php endforeach ?>
		</select>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input id="submit" type="submit" class="btn btn-primary" value="Simpan">
</div>
<script type="text/javascript">
	function check(){
		var nominal = document.getElementById('nominal').value;
		var volume = document.getElementById('volume').value;
		var satuan = document.getElementById('satuan').value;
		var sumber_dana = document.getElementById('sumber_dana').value;
		var penanggung_jawab = document.getElementById('penanggung_jawab').value;
		if (nominal == "" || volume == "" || satuan == "" || sumber_dana == "" || penanggung_jawab == ""){
			$('#submit').setAttr('disabled');
			// alert('disabled');
		} else
			// $('#submit').disabled = false;
			$('#submit').removeAttr('disabled');
	}

</script>