<script type="text/javascript">
	function aturAnggaran(id){
		$.ajax({
			type:'POST',
			data:{id_layanan:id},
			url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/GetModalAnggaranLayanan/',
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
                	<input type="text" class="form-control" placeholder="Nama Layanan" id="nama_layanan">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" id="btn_cari_nama">Cari Nama</button>
                    </span>
                </div><!-- /input-group -->
	          	<hr>
                <div class="form-group">
                	<label class="control-label">Kembali Ke</label><br>
                	<div class="btn-group">
                		<a href="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggaran/" class="btn bg-olive">Program</a>
                	</div>
                </div>
	    	</div><!-- /.box-body -->
	    </div><!-- /.box -->
	    
	</div>
	<div class="col-md-9">
		<div class="box box-success">
			<div class="box-header">
				<h3>Daftar Layanan</h3>
			</div>
			<div class="box-body" id="content_kelola">
				<?php $this->renderPartial('_aturAnggaran-layanan',array('dataLayanan'=>$dataLayanan)) ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAturAnggaranLayanan" tabindex="-1" role="dialog" aria-labelledby="labelModalTP">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/ubahAnggaran/2">
		<div class="modal-content f-modal-wrap modal-lg" id="modalcontent">
			
		</div>
		</form>
	</div>
</div>
<!-- END Modal Tambah Program -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_cari_nama').click(function(){
			// alert('check');
			var nama_layanan = document.getElementById('nama_layanan').value;
			if(nama_layanan != ""){
				$.ajax({
				type:'POST',
				data:{nama_layanan:nama_layanan},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/aturAnggaranLayanan/<?php echo $id_program ?>',
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
