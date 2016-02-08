<script type="text/javascript">
	function aturAnggaran(id){
		$.ajax({
			type:'POST',
			data:{id_kegiatan:id},
			url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/GetModalAnggaranKegiatan/',
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
          		<div class="input-group input-group-sm">
                	<input type="text" class="form-control" placeholder="Nama Kegiatan" id="nama_kegiatan">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" id="btn_cari_nama">Cari Nama</button>
                    </span>
                </div><!-- /input-group -->
                <hr>
                <div class="form-group">
                	<label>Kembali Ke</label>
                	<div class="btn-group">
                		<a href="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggaran/" class="btn bg-olive">Program</a>
                		<a href="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggaranLayanan/<?php echo $id_program ?>" class="btn bg-olive">Layanan</a>
                	</div>
                </div>
	          	<hr>
	    	</div><!-- /.box-body -->
	    </div><!-- /.box -->
	    
	</div>
	<div class="col-md-9">
		<div class="box box-success">
			<div class="box-header">
				<h3>Daftar Kegiatan</h3>
			</div>
			<div class="box-body" id="content_kelola">
				<?php $this->renderPartial('_aturAnggaran-kegiatan',array('dataKegiatan'=>$dataKegiatan)) ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAturAnggaranKegiatan" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/ubahAnggaran/3">
		<div class="modal-content f-modal-wrap modal-sm" id="modalcontent">
			
		</div>
		</form>
	</div>
</div>
<!-- END Modal Tambah Program -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_cari_nama').click(function(){
			// alert('check');
			var nama_kegiatan = document.getElementById('nama_kegiatan').value;
			if(nama_kegiatan != ""){
				$.ajax({
				type:'POST',
				data:{nama_kegiatan:nama_kegiatan},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggarankegiatan/<?php echo $id_layanan ?>',
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
