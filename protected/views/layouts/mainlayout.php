<!DOCTYPE html>
<html>
<head>
	<title>POK</title>
	<!-- 
			Bagian StyleSheet
			Berisi : 
				bootstrap.min.css
				baru.css
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/baru.css">
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/assets/js/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">
		<!-- 
			Bagian Header
			Berisi : 
				Logo, Menu Khusus, Tombol Log Out
		 -->
		<div class="col-md-16 nav-top">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					<img src="<?php echo Yii::app()->request->baseUrl ?>/assets/img/logo.jpg" height="40px">
				</div>
				<div class="col-sm-11 col-md-11 col-md-offset-1">
					<div class="f-box info-top">
						<marquee>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</marquee>
					</div>
				</div>
			</div>
		</div>

		<!-- 
			Bagian Navigasi Kiri / Sidebar
			Berisi : 
				Detail Pengguna, Menu Utama dan Footer
		 -->
		<div class="col-sm-3 col-md-3 sidebar">
			<div class="row">
				<div class="col-md-16">
					<div class="f-box">
						<ul>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> &nbsp Dashboard</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kelengkapan"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> &nbsp Kelola Kelengkapan</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp Kelola POK</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/lihatpokbulanan"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp Rencana Kegiatan Bulanan</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/lihatpokbulananV2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp Rencana Kegiatan Bulanan V2</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/lihatpoktriwulan"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp Rencana Kegiatan Triwulanan</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/lihatpoksemester"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp Rencana Kegiatan Semester</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/inputrealisasi"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> &nbsp Kelola Realisasi</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rekapseluruh/openData"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> &nbsp Rekap Realisasi Seluruh</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rekapbulanan"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp Rekap Realisasi Bulanan</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/downloadrekap"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp Download Realisasi</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-16 footer">
						Copyleft @2015 
						<a href="">SIM Profil Mahasiswa</a>
						<a href="">SIM Kegiatan Akademik</a>
						<a href="">SIM Kegiatan NonAkademik</a>
						<a href="">POK</a> 
						<a href="">About</a>
						<a href="">Pasca Sarjana</a>
						<a href=""></a>
				</div>	
			</div>
		</div>
		<!-- 
			Bagian Isi / Content
			Berisi : 
				Konten Website
		 -->
		<div class="col-sm-13 col-md-13 content">
			<div class="row">
				<div class="col-md-16 main-content">
					<?php echo $content ?>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>