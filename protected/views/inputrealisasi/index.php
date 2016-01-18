<div class="row">
	<div class="col-md-6 f-margin-3 f-margin-top-false f-padding-2 f-border-lightgrey alert alert-success">
		<h3>Input Realisasi Kegiatan</h3>
		<p>
			Halaman ini adalah halaman untuk mencatat Realisasi yang dilaksanakan pada bulan tertentu<p>
			Anda dapat memilih tahun anggaran, bulan realisasi, nama program, layanan dan kegiatan. ada beberapa peraturan terkait input ini yakni :
			<ol>
				<li>Realisasi adalah yang dilakukan dalam bulan terpilih</li>
				<li>Realisasi akan ditambahkan secara keseluruhan untuk satu tahunnya</li>
				<li>Setiap kegiatan memiliki maksimal realisasi yang dapat diinputkan (akan muncul setelah memilih kegiatan</li>
				<li>Apabila anda sudah menginputkan realisasi pada bulan ini, maka akan dicatat sebagai perubahan pada bulan ini dan dihitung seperti realisasi yang seharusnya</li>
			</ol>
		</p>

		<a href="<?php echo Yii::app()->request->baseUrl; ?>/inputrealisasi/daftarrealisasi" class="btn btn-danger form-control"><h4>Halaman Edit Realisasi</h4></a>
	</div>
	<div class="col-md-9">
		
		<?php foreach (Yii::app()->user->getFlashes() as $key => $value): ?>
		<div class="alert alert-success">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Pesan :</span>			
			<?php echo $value ?>
		</div>
		<?php endforeach ?>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Input Data Realisasi</h4>
			</div>
			<div class="panel-body">
			<form method="post" action="<?php echo Yii::app()->request->baseUrl ?>/inputrealisasi/writerealisasi">
				<table class="table">
					<tr>
						<td>Tahun Anggaran</td>
						<td>:</td>
						<td>
							<select class="form-control" name="bulan" id="tahun_anggaran" required="required">
								<?php for ($i=date('Y'); $i > date('Y')-5; $i--) { 
									echo "<option value=$i>$i</option>";
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Bulan Anggaran</td>
						<td>:</td>
						<td>
							<select class="form-control" name="bulan" required="required">
								<?php for ($i=1; $i < 13; $i++) { 
									echo "<option value=$i>".date('M',mktime(0,0,0,$i+1,0,0))."</option>";
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nama Program</td>
						<td>:</td>
						<td>
							<select class="form-control" id="program" name="program" required="required">
								<?php $this->renderPartial('_program',array('dataProgram'=>$dataProgram)); ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Layanan</td>
						<td>:</td>
						<td>
							<select class="form-control" id="layanan" name="layanan" required="required">
								<?php $this->renderPartial('_layanan'); ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nama Kegiatan</td>
						<td>:</td>
						<td>
							<select class="form-control" id="kegiatan" name="kegiatan" required="required">
								<?php $this->renderPartial('_kegiatan'); ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Maksimal Realisasi</td>
						<td>:</td>
						<td>
							<Input type="text" id="makstarget" value="" disabled="disabled">
						</td>
					</tr>
					<tr>
						<td>Nominal Realisasi</td>
						<td>:</td>
						<td>
							<Input type="number" id="nominal" name="nominal" placeholder="Nominal" class="form-control" required="required">
						</td>
					</tr>
					<tr>
						<td colspan="3"><Input type="submit" value="Simpan" name="btnsimpan" class="btn btn-primary form-control"></td>
					</tr>
				</table>
			</form>
			</div>
			<div class="panel-footer">
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tahun_anggaran').change(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/inputrealisasi/getProgram/',
				success:function(msg){
					$('#program').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#program').change(function(){
			var idprogram = document.getElementById('program').value;
			$.ajax({
				type:'POST',
				data:{id_program:idprogram},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/inputrealisasi/getLayanan/',
				success:function(msg){
					$('#layanan').html(msg);
				}
			})
		})
		$('#layanan').change(function(){
			var idlayanan = document.getElementById('layanan').value;
			$.ajax({
				type:'POST',
				data:{id_layanan:idlayanan},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/inputrealisasi/getKegiatan/',
				success:function(msg){
					$('#kegiatan').html(msg);
				}
			})
		})
		$('#kegiatan').change(function(){
			var idkegiatan = document.getElementById('kegiatan').value;
			
			$.ajax({
				type:'POST',
				data:{id_kegiatan:idkegiatan},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/inputrealisasi/GetMaxRealisasi/',
				success:function(msg){
					document.getElementById('nominal').setAttribute("max",msg);
					document.getElementById('makstarget').value = msg;
				},
				error:function(msg){
					alert("no");	
				},
			})
		})
	})
</script>