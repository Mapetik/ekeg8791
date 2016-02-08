
<div class="modal-haeder">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="labelModalTP"><center>Tambah Program</center></h4>
</div>
<div class="modal-body">
	<div class="form-group">
		<label>Kode</label>
		<input type="hidden" name="id_kegiatan" value="<?php echo $dataKegiatan->id ?>">
		<input type="text" name="kodeTP" value="<?php echo $dataKegiatan->kode_kegiatan ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Nama Kegiatan</label>
		<input type="text" name="namaTP" value="<?php echo $dataKegiatan->nama_kegiatan ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
	    <style type="text/css">
	      .datepicker { z-index: 10000 !important; }
	    </style>
		<input name="tanggal" value="<?php echo $dataKegiatan->tanggal ?>" type="text" id="datePicker" class="form-control" placeholder="Atur Tanggal">
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input type="submit" class="btn btn-primary" value="Simpan">
</div>
