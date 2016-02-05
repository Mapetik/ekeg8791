<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 f-panel-2">
				<div class="f-panel-heading">
					<h2>Jadwal POK Triwulan</h2>
				</div>
					<select class="col-md-2 btn f-button f-background-blue" id="tahun_anggaran">
						<?php AlatUmum::activeOptListYears($tahun_anggaran) ?>
					</select>
					<button id="T1" class="col-md-2 btn f-button ">Triwulan 1</button>
					<button id="T2" class="col-md-2 btn f-button ">Triwulan 2</button>
					<button id="T3" class="col-md-3 btn f-button ">Triwulan 3</button>
					<button id="T4" class="col-md-3 btn f-button ">Triwulan 4</button>
			</div>
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-body" id="triwulan">
						<?php $this->renderPartial('_triwulan',array('dataKegiatan'=>$dataKegiatan,'max'=>$max,'min'=>$min)) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#T1').click(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			// alert("tahyn yea");
			$.ajax({
				//LOAD URL 
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/lihatpoktriwulan/1',
				success:function(msg){
					$('#triwulan').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#T2').click(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				//LOAD URL 
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/lihatpoktriwulan/2',
				success:function(msg){
					$('#triwulan').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#T3').click(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				//LOAD URL 
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/lihatpoktriwulan/3',
				success:function(msg){
					$('#triwulan').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#T4').click(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				//LOAD URL 
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/lihatpoktriwulan/4',
				success:function(msg){
					$('#triwulan').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#tahun_anggaran').change(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				//LOAD URL 
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/lihatpoktriwulan/<?php echo $id ?>',
				success:function(msg){
					$('#triwulan').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
	})
</script>