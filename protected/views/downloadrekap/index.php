<div class="row">
	<div class="col-md-7 f-panel-2">
		<div class="f-panel-heading">
			<h2>Rencana (POK)</h2>
		</div>
		<div class="f-panel-body">
			<ul class="list-group">
				<li class="list-group-item"><a data-toggle="collapse" href="#program" class="link-fullwidth">Download Daftar Program</a>
					<div id="program" class="collapse">
						Daftar Program Aktif pada Tahun Anggaran tertentu
						<div class="form-inline">
							<div class="form-group">
								<select class="form-control">
									<?php AlatUmum::optListYears() ?>
								</select>
							</div>
							<div class="form-group">
								<button class="form-control btn btn-primary">Download Daftar Program</button>
							</div>
						</div>
					</div>
				</li>
				<li class="list-group-item"><a data-toggle="collapse" href="#layanan" class="link-fullwidth">Download Daftar Layanan</a>
					<div id="layanan" class="collapse">
						Daftar Layanan Aktif pada Tahun Anggaran tertentu
						<div class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
				
						<div class="form-group">
							<select class="form-control">
								<option>-- Pilih Program --</option>
							</select>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Layanan</button>
						</div>
					</div>
				</li>
				<li class="list-group-item"><a data-toggle="collapse" href="#kegiatan" class="link-fullwidth">Download Daftar Kegiatan</a>
					<div id="kegiatan" class="collapse">
						Daftar Kegiatan Aktif pada Tahun Anggaran tertentu
						<div class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
				
						<div class="form-group">
							<select class="form-control">
								<option>-- Pilih Program --</option>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control">
								<option>-- Pilih Layanan --</option>
							</select>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
					</div>
				</li>
				<li class="list-group-item"><a data-toggle="collapse" href="#bulanan" class="link-fullwidth">Download Daftar Kegiatan Bulanan</a>
					<div id="bulanan" class="collapse">
						<div class="form-group">
							<select name="tahun_anggaran" class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
						<div class="form-group">
							<select name="bulan" class="form-control">
								<?php AlatUmum::optListMonth() ?>
							</select>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
					</div>
				</li>
				<li class="list-group-item"><a data-toggle="collapse" href="#triwulan" class="link-fullwidth">Download Daftar Kegiatan Triwulanan</a>
					<div id="triwulan" class="collapse">
						Daftar Kegiatan Per Triwulan
						<div class="form-group">
							<select name="tahun_anggaran" class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									Triwulan 1
								</div>
								<div class="col-md-4">
									Triwulan 2
								</div>
								<div class="col-md-4">
									Triwulan 3
								</div>
								<div class="col-md-4">
									Triwulan 4
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
					</div>
				</li>
				<li class="list-group-item"><a data-toggle="collapse" href="#semester" class="link-fullwidth">Download Daftar Kegiatan Semesteran</a>
					<div id="semester" class="collapse">
						Daftar Kegiatan Per Semester
						<div class="form-group">
							<select name="tahun_anggaran" class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									Semester 1
								</div>
								<div class="col-md-4">
									Semester 2
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-7 f-panel-2">
		<div class="f-panel-heading">
			<h2>Rekap Realisasi</h2>
		</div>
		<div class="f-panel-body">
			<ul class="list-group">
				<li class="list-group-item"><a data-toggle="collapse" href="#dalambulan" class="link-fullwidth">Download Realisasi Kegiatan dalam Bulan</a>
					<div id="dalambulan" class="collapse">
						Halaman ini anda akan mendapatkan laporan kegiatan dalam bulan tertentu
						<form method="post" action="<?php echo Yii::app()->request->baseUrl ?>/downloadrekap/downloadv2">
						<div class="form-group">
							<input type="hidden" name="pada" value="bulan">
							<select name="tahun_anggaran" class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
						<div name="bulan" class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListMonth() ?>
							</select>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
						</form>
					</div>
				</li>
				<li class="list-group-item"><a data-toggle="collapse" href="#hinggabulan" class="link-fullwidth">Download Realisasi Kegiatan Hingga Bulan</a>
					<div id="hinggabulan" class="collapse">
						Halaman ini anda akan mendapatkan laporan kegiatan Hingga bulan tertentu
						<form method="post" action="<?php echo Yii::app()->request->baseUrl ?>/downloadrekap/downloadv2">
						<div class="form-group">
							<select name="tahun_anggaran" class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
						<div class="form-group">
							<select name="bulan"  class="form-control">
								<?php AlatUmum::optListMonth() ?>
							</select>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
						</form>
					</div>
				</li>
				<li class="list-group-item"><a data-toggle="collapse" href="#satutahun" class="link-fullwidth">Download Realisasi Seluruh dalam Satu tahun</a>
					<div id="satutahun" class="collapse">
						Halaman ini anda akan mendapatkan laporan kegiatan Pada Tahun tertentu
						<form method="post" action="<?php echo Yii::app()->request->baseUrl ?>/downloadrekap/downloadv2">
						<div class="form-group">
							<select name="tahun_anggaran" class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
						</div>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>