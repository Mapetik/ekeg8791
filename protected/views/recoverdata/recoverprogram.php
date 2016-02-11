<script type="text/javascript">
	function showRiwayatProgram(id){
		$.ajax({
			type:'POST',
			data:{id_program:id},
			url:'<?php echo Yii::app()->request->baseUrl;?>/recoverData/showRiwayatProgram/',
			success:function(msg){
				$('#content_kelola').html(msg);	
			},
			error:function(msg){
				alert('gagal');
			}
		})
	}
	function modelDetailRecoProgram(id){
		$.ajax({
			type:'POST',
			data:{id_reco:id},
			url:'<?php echo Yii::app()->request->baseUrl;?>/recoverData/showModelDetilRecoProgram/',
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
          			<select id="tahun_anggaran" name="tahun_anggaran" class="form-control">
          				<?php AlatUmum::optListYears() ?>
          			</select>
          		</div>
          		<div class="input-group input-group-sm">
                	<input type="text" class="form-control" placeholder="Nama Program" id="nama_program">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" id="btn_cari_nama">Cari Nama</button>
                    </span>
                </div><!-- /input-group -->
	          	<hr>
	    	</div><!-- /.box-body -->
	    </div><!-- /.box -->
	    
	</div>
	<div class="col-md-9">
		<div class="box box-success">
			<div class="box-header">
				<h3>Daftar Program</h3>
			</div>
			<div class="box-body" id="content_kelola">
				<?php $this->renderPartial('partial/_aturAnggaran-program',array('dataProgram'=>$dataProgram)) ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modelDetilRecoProgram" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
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
		$('#tahun_anggaran').change(function(){
			// alert('i did it');
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/recoverdata/program/',
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
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			var nama_program = document.getElementById('nama_program').value;
			if(tahun_anggaran != "" && nama_program != ""){
				$.ajax({
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran,
					   nama_program:nama_program},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/recoverdata/program/',
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
