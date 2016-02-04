<!-- 
	Ini bagian Halaman Kelengkapan
	alamat : url/kelengkapan 
-->

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<center>Sumber Dana</center>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<th>Sumber Dana</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
					<?php foreach ($dataSD as $key): ?>
						<tr>
							<td><?php echo $key->nama ?></td>
							<td><?php echo $key->deskripsi ?></td>
							<td>
								<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/kelengkapan/hapusSD">
								<?php $status = ($key->status == '1')? "1" : "0"?>
								<?php $statusValue = ($key->status == '1')? "0" : "1"?>
								<?php $statusClass = ($key->status == '1')? "btn btn-success" : "btn btn-danger"?>
									<input type="submit" class="<?php echo $statusClass ?>" value="<?php echo $status ?>" name="button">
									<input type="hidden" name="id" value="<?php echo $key->id ?>">
									<input type="hidden" name="status" value="<?php echo $statusValue ?>">
								</form>
							</td>
						</tr>
					<?php endforeach ?>
					<tr>
						<td colspan="3">
							<button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#modalSumberDana">Tambah</button>
						</td>
					</tr>
				</table>
			</div>
			<!-- Modal Tambah Sumber Dana -->
			<div class="modal fade" id="modalSumberDana" tabindex="-1" role="dialog" aria-labelledby="labelModalSD">
				<div class="modal-dialog" role="document">
					<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/kelengkapan/insertSumberDana">
					<div class="model-content f-modal-wrap modal-sm">
						<div class="modal-haeder">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="labelModalSD"><center>Tambah Sumber Dana</center></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Sumber Dana</label>
								<input type="text" name="namaSD" placeholder="Sumber Dana" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input type="text" name="deskripsiSD" placeholder="Deskripsi" class="form-control" required="required">
							</div>
						</div>
						<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <input type="submit" class="btn btn-primary" value="Simpan">
				        </div>
				      </div>
				      </form>
				</div>
			</div>
			<!-- END Modal Tambah Sumber Dana -->
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary f-panel">
			<div class="panel-heading">
				<center>Penanggung Jawab</center>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<th>Penanggung Jawab</th>
						<th>Aksi</th>
					</tr>
					<?php foreach ($dataPJ as $key): ?>
					<tr>
						<td><?php echo $key->nama ?></td>
						<td>
							<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/kelengkapan/hapusPJ">
								<?php $status = ($key->status == '1')? "1" : "0"?>
								<?php $statusValue = ($key->status == '1')? "0" : "1"?>
								<?php $statusClass = ($key->status == '1')? "btn btn-success" : "btn btn-danger"?>
								<input type="submit" class="<?php echo $statusClass ?>" value="<?php echo $status ?>" name="button">
								<input type="hidden" name="id" value="<?php echo $key->id ?>">
								<input type="hidden" name="status" value="<?php echo $statusValue ?>">
							</form>
						</td>
					</tr>	
					<?php endforeach ?>
					<tr>
						<td colspan="3">
							<button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#modalPenanggungJawab">Tambah</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary f-panel">
		<div class="panel-heading">
			<center>Satuan</center>
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<tr>
					<th>Satuan</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
				</tr>
				<?php foreach ($dataSt as $key): ?>
				<tr>
					<td><?php echo $key->nama ?></td>
					<td><?php echo $key->deskripsi ?></td>
					<td>
						<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/kelengkapan/hapusSt">
							<?php $status = ($key->status == '1')? "1" : "0"?>
							<?php $statusValue = ($key->status == '1')? "0" : "1"?>
							<?php $statusClass = ($key->status == '1')? "btn btn-success" : "btn btn-danger"?>
							<input type="submit" class="<?php echo $statusClass ?>" value="<?php echo $status ?>" name="button">
							<input type="hidden" name="id" value="<?php echo $key->id ?>">
							<input type="hidden" name="status" value="<?php echo $statusValue ?>">
						</form>
					</td>
				</tr>	
				<?php endforeach ?>
				<tr>
					<td colspan="3">
						<button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#modalSatuan">Tambah</button>
					</td>
				</tr>
			</table>
			</div>
		</div>
	</div>
</div>
	

	<!-- Modal Tambah Penanggung Jawab -->
			<div class="modal fade" id="modalPenanggungJawab" tabindex="-1" role="dialog" aria-labelledby="labelModalPJ">
				<div class="modal-dialog" role="document">
					<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/kelengkapan/InsertPenanggungJawab">
					<div class="model-content f-modal-wrap modal-sm">
						<div class="modal-haeder">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="labelModalPJ"><center>Tambah Penanggung Jawab</center></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Penanggung Jawab</label>
								<input type="text" name="namaPJ" placeholder="Penanggung Jawab" class="form-control" required="required">
							</div>
						</div>
						<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <input type="submit" class="btn btn-primary" value="Simpan">
				      </div>
				      </form>
					</div>
				</div>
			</div>
			<!-- END Modal Tambah Penanggung Jawab -->

	<!-- Modal Tambah Satuan -->
			<div class="modal fade" id="modalSatuan" tabindex="-1" role="dialog" aria-labelledby="labelModalSatuan">
				<div class="modal-dialog" role="document">
					<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/kelengkapan/InsertSatuan">
					<div class="model-content f-modal-wrap modal-sm">
						<div class="modal-haeder">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="labelModalSatuan"><center>Tambah Satuan</center></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Satuan</label>
								<input type="text" name="namaSt" placeholder="Satuan" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input type="text" name="deskripsiSt" placeholder="Deskripsi" class="form-control" required="required">
							</div>
						</div>
						<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <input type="submit" class="btn btn-primary" value="Simpan">
				      </div>
				      </form>
					</div>
				</div>
			</div>
			<!-- END Modal Tambah Penanggung Jawab -->

</div>