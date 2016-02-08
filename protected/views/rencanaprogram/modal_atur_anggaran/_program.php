
<div class="modal-haeder">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="labelModalTP"><center>Tambah Program</center></h4>
</div>
<div class="modal-body">
	<div class="form-group">
		<label>Kode</label>
		<input type="hidden" name="id_program" value="<?php echo $dataProgram->id ?>" class="form-control" readonly>
		<input type="text" name="kode_program" value="<?php echo $dataProgram->kode_program ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Nama Program</label>
		<input type="text" name="nama_program" value="<?php echo $dataProgram->nama_program ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Target</label>
		<input type="text" name="nominal" value="<?php echo $dataProgram->target ?>" class="form-control">
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input type="submit" class="btn btn-primary" value="Simpan">
</div>
