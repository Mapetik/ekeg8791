
<div class="modal-haeder">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="labelModalTP"><center>Tambah Layanan</center></h4>
</div>
<div class="modal-body">
	<div class="form-group">
		<label>Kode</label>
		<input type="hidden" name="id_layanan" value="<?php echo $dataLayanan->id ?>" class="form-control" readonly>
		<input type="text" name="kode_layanan" value="<?php echo $dataLayanan->kode_layanan ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Nama Layanan</label>
		<input type="text" name="nama_layanan" value="<?php echo $dataLayanan->nama_layanan ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Target</label>
		<input type="text" name="nominal" value="<?php echo $dataLayanan->target ?>" class="form-control">
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input type="submit" class="btn btn-primary" value="Simpan">
</div>
