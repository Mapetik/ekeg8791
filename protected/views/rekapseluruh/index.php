<div class="row">
			<table class="table table-bordered">
				<tr>
					<td colspan="13"><div class="alert alert-success"><center><b>Rekap Serapan 2015</b></center></div></td>
				</tr>
				<tr>
					<th style="width:150px"><center></center></th>
					<th style="width:150px"><center>Januari</center></th>
					<th style="width:150px"><center>Februari</center></th>
					<th style="width:150px"><center>Maret</center></th>
					<th style="width:150px"><center>April</center></th>
					<th style="width:150px"><center>Mei</center></th>
					<th style="width:150px"><center>Juni</center></th>
					<th style="width:150px"><center>Juli</center></th>
					<th style="width:150px"><center>Agustus</center></th>
					<th style="width:150px"><center>September</center></th>
					<th style="width:150px"><center>Oktober</center></th>
					<th style="width:150px"><center>November</center></th>
					<th style="width:150px"><center>Desember</center></th>
				</tr>
					<th style="width:150px"><center>S/d.</center></th>
						<?php for ($i=1; $i < 13; $i++) 
						{ 
							$hasil=$this->realisasisd($i); 
								foreach ($hasil as $tampil):
									echo "<td style='width:150px'><center>$tampil[total]</center></td>";
									endforeach;
						} 
						?>
				</tr>
				</tr>
					<th style="width:150px"><center>Pada</center></th>
						<?php for ($i=1; $i < 13; $i++) 
							{ 
								$hasil=$this->realisasipada($i); 
									foreach ($hasil as $tampil):
										if($tampil['total']==null)
											{
														echo "<td style='width:150px'><center>0</center></td>";
											}
										else
											{
												echo "<td style='width:150px'><center>$tampil[total]</center></td>";
											}
									endforeach;
							} 
						?>
				</tr>
				<tr>
					<th rowspan="4"><center></center></th>
					<th colspan="3"><center>Triwulan I</center></th>
					<th colspan="3"><center>Triwulan II</center></th>
					<th colspan="3"><center>Triwulan III</center></th>
					<th colspan="3"><center>Triwulan IV</center></th>
				</tr>
				<tr>
					<?php for ($i=3; $i < 13; $i=$i+3) 
						{ 
							$hasil=$this->realisasitriwulan($i-2,$i); 
								foreach ($hasil as $tampil):
									if($tampil['total']==null)
										{
											echo "<td colspan='3'><center>"; echo AlatUmum::ChangeCurrency(0); echo"</center></td>";
										}
									else
										{
											echo "<td colspan='3'><center>"; echo AlatUmum::ChangeCurrency($tampil['total']); echo"</center></td>";
										}
								endforeach;
						}
					?>
									
				<tr>
					<th colspan="12"><center>Tahun Aanggaran 2015</center></th>
				</tr>
				<tr>
					<?php $hasil=$this->realisasisd(12); 
						foreach ($hasil as $tampil):
							if($tampil['total']==null)
								{
									echo "<td colspan='3'><center>0</center></td>";
								}
							else
								{
									echo "<td colspan='12'><center>"; echo AlatUmum::ChangeCurrency($tampil['total']); echo"</center></td>";
								}
						endforeach;

					?>
				</tr>
			</table>

			<table class="table table-bordered">
				<tr>
					<td colspan="13"><div class="alert alert-danger"><center><b>Detail Rekap Data Kegiatan</b></center></div></td>
				</tr>
			</table>


			<div class="col-md-5 panel panel-primary f-panel">
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
				  			<td colspan="13"><div class="alert alert-success"><center><b>Triwulan</b></center></div></td>
						</tr>
						<tr>
							<td colspan="3">
								<form action="<?php echo Yii::app()->request->baseUrl; ?>/rekapseluruh/openData/0">
									<button type="submit" class="btn btn-danger form-control" data-target="#modalSumberDana">Lihat Rekap</button>
								<form>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="col-md-5 panel panel-primary f-panel">
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
				  			<td colspan="13"><div class="alert alert-success"><center><b>Semester</b></center></div></td>
						</tr>
						<tr>
						</tr>
						<tr>
							<td colspan="3">
								<button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#modalPenanggungJawab">Lihat Rekap</button>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="col-md-5 panel panel-primary f-panel">
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
				  			<td colspan="13"><div class="alert alert-success"><center><b>Tahun</b></center></div></td>
						</tr>
						<tr>
						</tr>
						<tr>
							<td colspan="3">
								<button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#modalSatuan">Lihat Rekap</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
</div>