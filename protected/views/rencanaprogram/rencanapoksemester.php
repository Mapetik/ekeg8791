<div class="row">
	<div class="col-md-16">
		<div class="row">
			<div class="col-md-16 f-panel-2">
				<div class="f-panel-heading">
					<h2>Jadwal POK Semester</h2>
				</div>
					<select class="col-md-3 btn f-button f-background-blue" id="tahun_anggaran">
						<?php AlatUmum::activeOptListYears($tahun_anggaran) ?>
					</select>
					<button id="S1" class="col-md-3 btn f-button ">Semester 1</button>
					<button id="S2" class="col-md-3 btn f-button ">Semester 2</button>
					
			</div>
			<div class="col-md-16">
				<div class="panel">
					<div class="panel-body" id="semester">
						<?php $this->renderPartial('_semester',array('dataKegiatan'=>$dataKegiatan,'max'=>$max,'min'=>$min)) ?>
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
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaprogram/lihatpoksemester/<?php echo $id ?>',
				success:function(msg){
					$('#semester').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#S1').click(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				//LOAD URL 
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/lihatpoksemester/1',
				success:function(msg){
					$('#semester').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
		$('#S2').click(function(){
			var tahun_anggaran = document.getElementById('tahun_anggaran').value;
			$.ajax({
				//LOAD URL 
				type:'POST',
				data:{tahun_anggaran:tahun_anggaran},
				url:'<?php echo Yii::app()->request->baseUrl;?>/rencanaProgram/lihatpoksemester/2',
				success:function(msg){
					$('#semester').html(msg);
				},
				error:function(msg){
					alert('gagal');
				}
			})
		})
	})
</script>
</div>
