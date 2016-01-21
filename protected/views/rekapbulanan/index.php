 
<div class="row">
	
		<div class="panel panel-primary">
				<div class="f-box f-padding-1">

							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4>Daftar Realisasi Tercatat</h4>
								</div>
								<div class="panel-body">
									<div class="f-box  f-padding-1 alert alert-success clearfix">
										<form class="form-inline" action="#" method="post">
											<div class="form-group">
												<select name="tahunAnggaran" class="form-control">
													<option value="0">-- Pilih tahun -- </option>
													<?php for ($i=date('Y'); $i > date('Y')-5; $i--) { 
														if(isset($tahunAnggaran) && $tahunAnggaran == $i) $selectTahun = "selected=selected"; else $selectTahun = "";
														echo "<option value=$i $selectTahun>$i</option>";
													} ?>
												</select>
											</div>
											<div class="form-group">
												<select name="bulanRealisasi" class="form-control">
													<option>-- Pilih Bulan -- </option>
													<?php for ($i=1; $i < 13; $i++) { 
														if(isset($bulan) && $bulan == $i) $selectBulan = "selected=selected"; else $selectBulan = "";
														echo "<option value=$i $selectBulan>".date('M',mktime(0,0,0,$i+1,0,0))."</option>";
													} ?>
												</select>
											</div>
											<div class="form-group  pull-right">
												<input type="submit" name="cariRealisasi" value="Tampilkan Daftar" class="btn btn-danger form-control" >

											</div>
										</form>
									</div>
									<div class="f-box">
									<div id="tableProgram">
									<?php //if (isset($dataKegiatan)): ?>
									<?php //$this->renderPartial('_rekapbulan',array('dataKegiatan'=>$dataKegiatan)); ?>
								    <?php// endif ?>
									</div>
												

<?php //================================================================================= ?>



<div class="panel-body" style="overflow: scroll;height: 600px;table-layout: fixed;width: 100%;padding: 20px">








				<table class="table table-bordered">
					<?php //if (isset($dataKegiatan)): ?>
						<?php if (empty($dataKegiatan)): ?>
							<tr>
					  			<td colspan="12"><div class="alert alert-danger">Data Kosong untuk tahun anggaran dan bulan tersebut, Silakan pilih tanggal lain</div></td>
							</tr>
						<?php endif ?>
					<?php //endif ?>

					
							

							

				<tr>
								<th rowspan="2" style="width:120px"><center>Kode</center></th>
								<th rowspan="2"  style="width:130px">Uraian Unit / Program / Kegiatan / Output / Akun Belanja / Detil Belanja</th>
								<th colspan="5"><center>TA 2015</center></th>
								<th rowspan="2" style="width:130px">Februari</th>
								<th rowspan="2" style="width:130px"><center>Realisasi s.d bulan ini</center></th>
								<th rowspan="2" style="width:130px">Saldo</th>
								<th rowspan="2" style="width:90px">%</th>
								<th rowspan="2" style="width:130px">Penanggung Jawab</th>
								<th rowspan="2" style="width:130px">Bulan</th>
							</tr>
							<tr>
								<th style="width:150px"><center>Volume</center></th>
								<th style="width:220px"><center>Satuan</center></th>
								<th style="width:140px">Harga Satuan</th>
								<th style="width:140px"><center>Target</center></th>
								<th style="width:90px">SD</th>
							</tr>

								
							
							
						
				
						
					<tr>
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
								<td></td>
							</tr>	



<?php if (isset($dataKegiatan)): ?>
							<?php $i++; ?>		
					<?php $i=0; ?>
					<?php foreach ($dataKegiatan as $key): ?>


							
						<tr>
							<td><?php echo $key['kode_program'] ?></td>
							<td><?php echo "=$key[nama_program]" ?></td>
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
								<td></td>
								<?php 	$layanan=$this->actionListLayanan($key['id']);	foreach ($layanan as $key2): ?>
											<tr>
												
												<td><?php echo $key2 ['kode_layanan']?></td>
												<td><?php  echo $key2 ['nama_layanan'] ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td><?php echo AlatUmum::changeCurrency($key2['target']) ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td><?php echo AlatUmum::changeCurrency($key2['target']) ?></td>
												<td></td>
												<td></td>
												<td></td>
												<?php 	$kegiatan=$this->actionListKegiatan($key2['id']);	foreach ($kegiatan as $key3): ?>
														<tr>
															<td></td>
															<td><?php  echo "-$key3[nama_kegiatan]" ?></td>
															<td><?php echo $key3['volume'] ?></td>
															<td><?php echo $key3['satuan'] ?></td>
															<td><?php echo AlatUmum::changeCurrency($key3['harga_satuan']) ?></td>
															<td><?php echo AlatUmum::changeCurrency($key3['target']) ?></td>
															<td><?php echo $key3['sumber_dana'] ?></td>
															<td><?php echo "-" ?></td>
															<td>
															
															<?php 
															
															$realisasi=$this->realisasi($key3['id'],$_POST['bulanRealisasi']);
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
															<td><?php echo $saldo=$key3['target']- $key4['total']?></td>
															<td></td>
															<td><?php echo $key3['penanggung_jawab'] ?></td>
															<td><?php //echo AlatUmum::tampil_bulan($key3['bulan']) ?></td>
														</tr>
												<?php endforeach ?>
											</tr>
							
							<?php endforeach ?>
							
								
						</tr>
							
											
						
					<?php endforeach ?>
					<?php endif ?>
						
						
						</table>


</div>



<?php //================================================================================= ?>
</div>


























								</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>