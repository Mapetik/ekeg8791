<div class="row">
	<div class="col-md-16">
		<div class="panel panel-success">
			<div class="f-box f-padding-1">
				<center><h3>Laporan Realisasi Alokasi Penggunaan Anggaran PPS UNNES 2015</h3></center>
				<table class="table table-bordered">
					<tr>
						<td width="150px">Judul</td>
						<td>Laporan Realisasi Alokasi Penggunaan Anggaran PPS UNNES </td>
					</tr>
					<tr>
						<td>Reakap Bulan</td>
						<td></td>
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
						<td>Lihat Rekap Bulan</td>
						<td>
						
						
							<?php echo CHtml::beginForm(); 
							
								if($id==null)
						{
							$last=' - ';
							
						}
						else
						{
							$last=$id;
							
						}
							
							
							?>
						<?php echo CHtml::dropDownList('the_cats','select_value',array('Pilih Bulan',1=>'Januari',2=>'Frebuari',3=>'Maret',4=>'April',5=>'Mei'),array('onchange' => 'document.location.href = "../openData/" + this.value','class'=>'btn btn-danger'));?>
						<?php echo CHtml::endForm(); ?>
					</td>
					</tr>
								
				</table>
			</div>
			  <div class="panel-body" style="overflow: scroll;height: 600px;table-layout: fixed;width: 100%;padding: 20px">
				<table class="table table-bordered">
					<tr>
								<th rowspan="2" style="width:120px"><center>Kode</center></th>
								<th rowspan="2"  style="width:130px">Uraian Unit / Program / Kegiatan / Output / Akun Belanja / Detil Belanja</th>
								<th colspan="5"><center>TA 2015</center></th>
								<th rowspan="2" style="width:130px">Februari</th>
								<th rowspan="2" style="width:130px"><center>Realisasi s.d bulan ini</center></th>
								<th rowspan="2" style="width:130px">Saldo</th>
								<th rowspan="2" style="width:90px">%</th>
								<th rowspan="2" style="width:130px">Penanggung Jawab</th>
							</tr>
							<tr>
								<th style="width:150px"><center>Volume</center></th>
								<th style="width:220px"><center>Satuan</center></th>
								<th style="width:140px">Harga Satuan</th>
								<th style="width:140px"><center>Target</center></th>
								<th style="width:90px">SD</th>
							</tr>
							<tr>
								<td>023.04.08</td>
								<td>Program Pendidikan Tinggi</td>
								<td>volume</td>
								<td> satuan</td>
								<td>harga satuan</td>
								<td> 9,438,780,000 </td>
								<td>SD</td>
								<td>-</td>
								<td>-</td>
								<td> 9,438,780,000 </td>
								<td>0</td>
								<td></td>
							</tr>
							<tr>
								<td>5308</td>
								<td>Layanan Tridharma di Perguruan Tinggi</td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> 9,438,780,000 </td>
								<td> </td>
								<td>-</td>
								<td>-</td>
								<td> 9,438,780,000 </td>
								<td>0</td>
								<td></td>
							</tr>	
										
					<?php $i=0; ?>
					<?php foreach ($result as $key): ?>
						<?php $i++; ?>
				
						<tr>
							<td><?php echo $key['kode_program'] ?></td>
							<td><?php echo $key['nama_program'] ?></td>
								<td>volume</td>
								<td> satuan</td>
								<td>harga satuan</td>
								<td><?php echo AlatUmum::changeCurrency($key['target']) ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td><?php echo AlatUmum::changeCurrency($key['target']) ?></td>
								<td></td>
								<td></td>
								<?php 	$layanan=$this->actionListLayanan($key['id']);	foreach ($layanan as $key2): ?>
											<tr>
												
												<td><?php echo $key2->kode_layanan?></td>
												<td><?php  echo "+$key2->nama_layanan" ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td><?php echo AlatUmum::changeCurrency($key2->target) ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td><?php echo AlatUmum::changeCurrency($key2->target) ?></td>
												<td></td>
												<td></td>
												<?php 	$kegiatan=$this->actionListKegiatan($key2->id);	foreach ($kegiatan as $key3): ?>
														<tr>
															<td></td>
															<td><?php  echo "-$key3->nama_kegiatan" ?></td>
															<td><?php echo $key3->volume ?></td>
															<td><?php echo $key3->satuan ?></td>
															<td><?php echo AlatUmum::changeCurrency($key3->harga_satuan) ?></td>
															<td><?php echo AlatUmum::changeCurrency($key3->target) ?></td>
															<td><?php echo $key3->sumber_dana ?></td>
															<td></td>
															<td>
															
															<?php 
															
															$realisasi=$this->realisasi($key3->id);
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
															<td><?php echo $saldo=$key3->target- $key4['total']?></td>
															<td></td>
															<td><?php echo $key3->penanggung_jawab ?></td>
														</tr>
												<?php endforeach ?>
											</tr>
							
							<?php endforeach ?>
							
								
						</tr>
							
											
						
					<?php endforeach ?>
					
						
						
						</table>
					</div>
				</div>
	</div>
</div>