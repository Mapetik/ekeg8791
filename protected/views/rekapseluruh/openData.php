<?php
			
						if($id==null)
						{
							$last='  ';
							
						}
						else
						{
							$last=$id;
							
						}
						?>
<div class="row">
	<div class="col-md-16">
		<div class="panel panel-success">
			<div class="f-box f-padding-1">
				<center><h3>Laporan Realisasi Alokasi Penggunaan Anggaran PPS UNNES <?php echo $last ?></h3></center>
				<table class="table table-bordered">
					<tr>
						<td>Judul</td>
						<td>Laporan Realisasi Alokasi Penggunaan Anggaran PPS UNNES </td>
					</tr>
					<tr>
						<td>Tahun Anggaran</td>
						<td><?php echo $last ?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
					</tr>
					<tr>
						<td>Detail Atribut</td>
						<td><a href="">Detail</a></td>
					</tr>
					<tr>
						<td width="200px">Lihat Rekap Hingga bulan</td>
						<td>
									
					
						
						<?php echo CHtml::beginForm(); ?>
						
						<?php
			
						echo CHtml::dropDownList('the_cats','select_value',array('Pilih Tahun',2015=>'2015',2014=>'2014',2013=>'2013',2012=>'2012',2011=>'2011'),array('onchange' => 'document.location.href = "'.Yii::app()->request->baseUrl.'/rekapseluruh/openData/" + this.value','class'=>'btn btn-danger','name'=>'tahun'));?>
						<?php echo CHtml::endForm(); ?>
						
						</td>
					</tr>
									</table>
			</div>			
			<div class="f-box f-padding-1">
				<table class="table table-bordered">
					
					
					
					
					<tr>
						<th>No.</th>
						<th>Nama Kegiatan</th>
						<th>Nama Program</th>
						<th>Target Keg.</th>
						<th>Realisasi</th>
						<th>Saldo</th>
					</tr>
				
					
									<?php $i=0; ?>
					<?php foreach ($result as $key): ?>
						<?php $i++; ?>
					
						
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $key['nama_kegiatan'] ?></td>
							<td><?php echo $key['nama_program'] ?></td>
							<td><?php echo AlatUmum::changeCurrency($key['target']) ?></td>
							<td>
							
							<?php 
															
															$realisasi=$this->realisasi($key['id']);
															foreach ($realisasi as $key4):
															
															if ($key4['total']==null)
															{
																echo "0";
															}
															else
															{
											 				echo $key4['total'];
															}
															endforeach
																																												
															?>
							
							
							
							
							
							</td>
							<td><?php echo AlatUmum::changeCurrency($saldoakhir=$key['target']-$key4['total']) ?></td>
							
						</tr>
					<?php endforeach ?>
					
					
					
					
					
				</table>
			</div>
			<div class="panel-footer">
				Jika anda hendak menambahkan program lainnya, silakan klik tombol berikut <br> 
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTambahProgram">Tambah Program</button>
			</div>
		</div>
	</div>
</div>