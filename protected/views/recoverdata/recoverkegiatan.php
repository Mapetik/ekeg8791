<script type="text/javascript">
	function showRiwayatKegiatan(id){
		$.ajax({
			type:'POST',
			data:{id_layanan:id},
			url:'<?php echo Yii::app()->request->baseUrl;?>/recoverData/showRiwayatKegiatan/',
			success:function(msg){
				$('#content_kelola').html(msg);	
			},
			error:function(msg){
				alert('gagal');
			}
		})
	}
	function modelDetailRecoKegiatan(id){
		$.ajax({
			type:'POST',
			data:{id_reco:id},
			url:'<?php echo Yii::app()->request->baseUrl;?>/recoverData/showModelDetilRecoKegiatan/',
			success:function(msg){
				$('#contentkelola').html(msg);	
			},
			error:function(msg){
				alert('gagal');
			}
		})
	}
</script>
<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h5 class="box-title">Pencarian</h5>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div><!-- /.box-tools -->
	        </div><!-- /.box-header -->
	        <div class="box-body">
	        	<div class="form-group input-group-sm">
          			<label>Tahun Anggaran</label>
          			<select id="tahun_anggaran1" name="tahun_anggaraan" class="form-control">
          				<?php AlatUmum::activeOptListYears(AlatUmum::getCookieTahun()) ?>
          			</select>
          		</div>
          		<div class="input-group input-group-sm">
                	<input type="text" class="form-control" placeholder="Nama Kegiatan" id="nama_kegiatan">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" id="btn_cari_nama">Cari Nama</button>
                    </span>
                </div><!-- /input-group -->
	          	<hr>
          		<div class="form-group input-group-sm">
          			<label>Tahun Anggaran</label>
          			<select id="tahun_anggaran2" name="tahun_anggaraan" class="form-control">
          				<?php AlatUmum::activeOptListYears(AlatUmum::getCookieTahun()) ?>
          			</select>
          		</div>
	          	<div class="form-group input-group-sm">
	            	<label>Program</label>
	            	<select class="form-control" id="select_program">
		               <?php echo $this->renderPartial('partial/_formprogram',array('dataProgram'=>$dataProgram)); ?>
	            	</select>
	            </div>
	            <div class="form-group input-group-sm">
	            	<label>Layanan</label>
	            	<select class="form-control" id="select_layanan">
		                <?php //$this->renderPartial('_formlayanan'); ?>
	            	</select>
	            </div>
	            <div class="form-group input-group-sm">
	            	<button type="submit" class="btn btn-info form-control" id="btn_cari_kegiatan" disabled="disabled">Cari Kegiatan</button>
	            </div>
	          	
	    	</div><!-- /.box-body -->
	    </div><!-- /.box -->
	    
	</div>
	<div class="col-md-8">
		<div class="box box-success">
			<div class="box-header">
				<h3>Daftar kegiatan</h3>
			</div>
			<div class="box-body" id="content_kelola">
				<?php $this->renderPartial('partial/_recoverkegiatan',array('dataKegiatan'=>$dataKegiatan)) ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modelDetilrecoKegiatan" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/insertProgram">
				<div class="modal-haeder">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="labelModalTP"><center>Tambah Program</center></h4>
				</div>
				<div class="modal-body" id="contentkelola">
					
				</div>
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <input type="submit" class="btn btn-primary" value="Recover Data">
		      	</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END Modal Tambah Program -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#tahun_anggaran2').change(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran2').value;
			// alert('you change it');	
			$.ajax({
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/GetProgram/',
				success:function(msg){
					$('#select_program').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#select_program').change(function(){
			var id_program = document.getElementById('select_program').value;
			$.ajax({
				type:'POST',
				data:{id_program:id_program},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/getLayanan/',
				success:function(msg){
					$('#select_layanan').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#select_layanan').change(function(){
			$('#btn_cari_kegiatan').removeAttr('disabled');
		})
		$('#btn_cari_kegiatan').click(function(){
			// alert('i did it');
			var tahun_anggaraan = document.getElementById('tahun_anggaran2').value;
			var id_layanan = document.getElementById('select_layanan').value;
			$.ajax({
				type:'POST',
				data:{tahun_anggaraan:tahun_anggaraan,
					   id_layanan:id_layanan},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/recoverData/kegiatan/',
				success:function(msg){
					$('#content_kelola').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#btn_cari_nama').click(function(){
			// alert('check');
			var tahun_anggaraan = document.getElementById('tahun_anggaran1').value;
			var nama_kegiatan = document.getElementById('nama_kegiatan').value;
			if(tahun_anggaraan != "" && nama_kegiatan != ""){
				$.ajax({
				type:'POST',
				data:{tahun_anggaraan:tahun_anggaraan,
					   nama_kegiatan:nama_kegiatan},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/searchByCode/',
				success:function(msg){
					$('#content_kelola').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
			} else alert('no please fill them');
		})
	});
</script>
