<div class="row">
	<div class="col-md-16">
		<!-- Error Message -->
		<?php foreach (Yii::app()->user->getFlashes() as $key => $value): ?>
		<div class="alert alert-success">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Pesan :</span>			
			<?php echo $value ?>
		</div>
		<?php endforeach ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				POK -- PPS UNNES
			</div>
			<div class="panel-body">
			

				<!-- // Deskripsi Umum Halaman -->
				<div class="row">
					<div class="col-md-13">
						<p>
						Tabel berikut menyajikan daftar program yang telah tercatat dalam database lengkap dengan rinciannya. <br> Terakhir ditambah : 08-11-2015 oleh Alfian Faiz
						</p>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTambahProgram">Tambah Program</button>
					</div>
				</div>
				<!-- // Tabel Informasi Umum Program -->
				<table class="table table-bordered">
					<tr>
						<td>Jumlah Program</td>
						<td>Jumlah Layanan</td>
						<td>Jumlah Kegiatan</td>
						<td>Persentase Realisasi</td>
						<td>Tahun Anggaran</td>
					</tr>
					<tr>
						<td><?php echo count($dataProgram) ?></td>
						<td><?php echo count(Layanan::model()->findAll()) ?></td>
						<td><?php echo count(Kegiatan::model()->findAll()) ?></td>
						<td><?php echo DatabaseUmum::getPersentaseRealisasi("all","1") ?> (<a href="#">halaman rekap</a>)</td>
						<td>
							<select class="form-control" id="tahun_anggaran">
								<?php for ($i=date('Y')+4; $i > date('Y')-5; $i--) {
								$select_tahun = "";
								if (isset($tahun_anggaran) && $i == $tahun_anggaran) $select_tahun = "selected=selected";
									echo "<option value=$i $select_tahun>$i</option>";
								} ?>
							</select>
						</td>
					</tr>
				</table>
				<div id="tableProgram">
					<?php $this->renderPartial('_program',array('dataProgram'=>$dataProgram)); ?>
				</div>
				
			</div>

			<!-- // Footer Halaman Daftar Program-->
			<div class="panel-footer">
				Jika anda hendak menambahkan program lainnya, silakan klik tombol berikut <br> 
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTambahProgram">Tambah Program</button>
			</div>
		</div>
	</div>

	<!-- Modal Tambah Program -->
	<div class="modal fade" id="modalTambahProgram" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
		<div class="modal-dialog" role="document">
			<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/insertProgram">
			<div class="modal-content f-modal-wrap modal-sm">
				<div class="modal-haeder">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="labelModalTP"><center>Tambah Program</center></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Kode</label>
						<input type="text" name="kodeTP" value="50123.241" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama Program</label>
						<input type="text" name="namaTP" placeholder="Judul" class="form-control">
					</div>
					<div class="form-group">
						<label>Tahun Anggaran</label>
						<select name="tahunTP" class="form-control">
							<?php AlatUmum::optListYears() ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nominal/Target Anggaran</label>
						<input type="number" name="targetTP" placeholder="Nominal" class="form-control">
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
	<!-- END Modal Tambah Program -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tahun_anggaran').change(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/programPartial',
				success:function(msg){
					$('#tableProgram').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
	})
</script>

