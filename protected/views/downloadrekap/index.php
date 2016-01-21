<div class="row">
	<div class="col-md-7 f-panel-2">
		<div class="f-panel-heading">
			<h2>Rencana (POK)</h2>
		</div>
		<div class="f-panel-body">
			<ul class="list-group">
				<li class="list-group-item"><a href="">Program</a>
					<p>
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
					</p>
				</li>
				<li class="list-group-item"><a href="">Layanan</a>
					<p>
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
					</p>
				</li>
				<li class="list-group-item"><a href="">Kegiatan</a>
					<p>
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
					</p>
				</li>
				<li class="list-group-item"><a href="">Kegiatan Bulanan</a>
					<p>
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
					</p>
				</li>
				<li class="list-group-item"><a href="">Kegiatan Triwulanan</a>
					<p>
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
					</p>
				</li>
				<li class="list-group-item"><a href="">Kegiatan Semesteran</a>
					<p>
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
					</p>
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
				<li class="list-group-item"><a href="">Kegiatan Kegiatan dalam Bulan</a>
					<p>
						Halaman ini anda akan mendapatkan laporan kegiatan dalam bulan tertentu
						<div class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListMonth() ?>
							</select>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
					</p>
				</li>
				<li class="list-group-item"><a href="">Kegiatan Kegiatan Hingga Bulan</a>
					<p>
						Halaman ini anda akan mendapatkan laporan kegiatan Hingga bulan tertentu
						<div class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListMonth() ?>
							</select>
						</div>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
					</p>
				</li>
				<li class="list-group-item"><a href="">Kegiatan Seluruh dalam Satu tahun</a>
					<p>
						Halaman ini anda akan mendapatkan laporan kegiatan Hingga bulan tertentu
						<div class="form-group">
							<select class="form-control">
								<?php AlatUmum::optListYears() ?>
							</select>
						<div class="form-group">
							<button class="form-control btn btn-primary">Download Daftar Kegiatan</button>
						</div>
					</p>
				</li>
			</ul>
		</div>
	</div>
</div>