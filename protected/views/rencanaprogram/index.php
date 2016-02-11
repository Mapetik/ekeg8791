<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h5 class="box-title">Kelola POK - Program</h5>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div><!-- /.box-tools -->
	        </div><!-- /.box-header -->
	        <div class="box-body">
	        	<p>
					Tabel berikut menyajikan daftar program yang telah tercatat dalam database 
					lengkap dengan rinciannya. <br> <br> Terakhir ditambah : 08-11-2015 oleh Alfian Faiz
				</p>
          		<div class="input-group input-group-sm">
                	<input type="text" class="form-control" placeholder="Nama Program" id="nama_program">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" id="btn_cari_nama">Cari Nama</button>
                    </span>
                </div><!-- /input-group -->
	          	<hr>
                <div class="form-group">
                	<label class="control-label">Aksi Khusus</label><br>
                	<br>
                	<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modalTambahProgram">Tambah Program</button>
                </div>
	    	</div><!-- /.box-body -->
	    </div><!-- /.box -->
	</div>
	<div class="col-md-9">
		<!-- Error Message -->
		<?php foreach (Yii::app()->user->getFlashes() as $key => $value): ?>
		<div class="alert alert-success">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Pesan :</span>			
			<?php echo $value ?>
		</div>
		<?php endforeach ?>
		<div class="box box-success">
			<div class="box-body">
				<table class="table table-bordered">
					<tr>
						<th>Jumlah Program</th>
						<th>Jumlah Layanan</th>
						<th>Jumlah Kegiatan</th>
						<th>Tahun Anggaran</th>
					</tr>
					<tr>
						<td><?php echo count($dataProgram) ?></td>
						<td><?php echo count(Layanan::model()->findAll()) ?></td>
						<td><?php echo count(Kegiatan::model()->findAll()) ?></td>
						<td>
							<select class="form-control" id="tahun_anggaran">
								<?php AlatUmum::activeOptListYears(Yii::app()->request->cookies['tahun_anggaran']->value) ?>
							</select>
						</td>
					</tr>
				</table>
				<br>
				<div id="tableProgram">
					<?php $this->renderPartial('_program',array('dataProgram'=>$dataProgram)); ?>
				</div>
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
		$('#btn_cari_nama').click(function(){
			// alert('check');
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			var nama_program = document.getElementById('nama_program').value;
			// alert(nama_program);
			if(nama_program != ""){
				$.ajax({
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran,
					   nama_program:nama_program},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/ProgramPartial/',
				success:function(msg){
					$('#tableProgram').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
			} else alert('no please fill them');
		})
	})
</script>

