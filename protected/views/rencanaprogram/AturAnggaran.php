<script type="text/javascript">
	function aturAnggaran(id){
		$.ajax({
			type:'POST',
			data:{id_program:id},
			url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/GetModalAnggaranProgram/',
			success:function(msg){
				$('#modalcontent').html(msg);	
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
				<?php $this->renderPartial('_aturAnggaran-program',array('dataProgram'=>$dataProgram)) ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAnggaran" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/ubahAnggaran/1">
		<div class="modal-content f-modal-wrap modal-sm" id="modalcontent">
			
		</div>
		</form>
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
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggaran/',
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
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggaran/',
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
