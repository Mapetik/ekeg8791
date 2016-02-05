<div class="row">
	<div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>Keuangan</h3>
          <p>Login sebagai bagian keuangan</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>
          <p>Persentase Realisasi</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>44</h3>
          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
	<div class="col-md-3">
		<!-- Profile Image -->
	    <div class="box box-primary">
	       <div class="box-body box-profile">
	        <img class="profile-user-img img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/themes/adminlte/dist/img/user4-128x128.jpg" alt="User profile picture">
	        <h3 class="profile-username text-center">Nina Mcintire</h3>
	        <p class="text-muted text-center">Software Engineer</p>

	        <ul class="list-group list-group-unbordered">
	            <li class="list-group-item">
	              <b>Terakhir Login</b> <a class="pull-right">1,322</a>
	            </li>
	            <li class="list-group-item">
	              <b>Jabatan</b> <a class="pull-right">543</a>
	            </li>
	            <li class="list-group-item">
	              <b>Alamat</b> <a class="pull-right">13,287</a>
	            </li>
	            <li class="list-group-item">
	              <b>No. Hp</b> <a class="pull-right">13,287</a>
	            </li>
	        </ul>

	        <a href="#" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
	        </div><!-- /.box-body -->
	    </div><!-- /.box -->
	</div>
	<div class="col-md-5">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Quick Panel</h3>
            </div>
            <div class="box-body">
              <p>Menu Yang dapat Anda Akses</p>
              <center>
	              <a class="btn btn-app" href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram">
	                <i class="fa fa-edit"></i> Kelola POK
	              </a>
	              <a class="btn btn-app">
	                <i class="fa fa-play"></i> Kelola Jadwal
	              </a>
	              <a class="btn btn-app">
	                <i class="fa fa-repeat"></i> Kelola Anggaran
	              </a>
	              <a class="btn btn-app" href="<?php echo Yii::app()->request->baseUrl; ?>/rencanaprogram/lihatpokbulananV2">
	                <i class="fa fa-pause"></i>Persebaran Jadwal
	              </a>
	              <a class="btn btn-app" href="<?php echo Yii::app()->request->baseUrl; ?>/inputrealisasi">
	                <i class="fa fa-save"></i> Input Realisasi
	              </a>
	              <a class="btn btn-app" href="<?php echo Yii::app()->request->baseUrl; ?>/rekapseluruh/openData">
	                <span class="badge bg-yellow">3</span>
	                <i class="fa fa-bullhorn"></i> Rekap Kegiatan
	              </a>
	              <a class="btn btn-app" href="<?php echo Yii::app()->request->baseUrl; ?>/downloadrekap">
	                <span class="badge bg-green">300</span>
	                <i class="fa fa-barcode"></i> Download
	              </a>
              </center>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
	</div>
	<div class="col-md-4">
		<!-- Calendar -->
              <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>
                  <h3 class="box-title">Calendar</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div><!-- /.box-body -->
                <div class="box-footer text-black">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Progress bars -->
                      <div class="clearfix">
                        <span class="pull-left">Task #1</span>
                        <small class="pull-right">90%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                      </div>

                      <div class="clearfix">
                        <span class="pull-left">Task #2</span>
                        <small class="pull-right">70%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <div class="clearfix">
                        <span class="pull-left">Task #3</span>
                        <small class="pull-right">60%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                      </div>

                      <div class="clearfix">
                        <span class="pull-left">Task #4</span>
                        <small class="pull-right">40%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                      </div>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.box -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->
	</div>
</div>