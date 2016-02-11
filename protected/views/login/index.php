<!DOCTYPE html>
<html>
<head>
	<title>POK</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/themes/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/themes/adminlte/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/themes/adminlte/plugins/iCheck/square/blue.css">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 4%">
			<div class="col-md-6 col-md-offset-1	">
				<div >
					<h1><font color="green" style="font-size: 2em">E</font>-Kegiatan</h1>
					<h2>Program Pasca Sarjana<br>
					Universitas Negeri Semarang</h2>
					<p class="text">
					<br>
						Sistem Informasi E-Kegiatan ditujukan untuk memudahkan administrasi kegiatan yang dilaksanakan Program Pasca Sarjana Universitas Negeri Semarang
					</p>
				</div>
			</div>
			<div class="col-md-4 login-box">
				<div class="login-logo">
			        <a href="<?php echo Yii::app()->request->baseUrl ?>/assets/themes/adminlte/index2.html"><b>Admin</b>LTE</a>
			      </div><!-- /.login-logo -->
			      <div class="login-box-body">
			        <p class="login-box-msg">Sign in to start your session</p>
			        <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>			        
			          <div class="form-group has-feedback">
			            <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
			            <?php echo $form->error($model,'username'); ?>
			            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			          </div>
			          <div class="form-group has-feedback">
			            <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
			            <?php echo $form->error($model,'password'); ?>
			            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			          </div>
			          <div class="row">
			            <div class="col-xs-8">
			              <div class="checkbox icheck">
			                <label>
			                  <?php echo $form->checkBox($model,'rememberMe'); ?> Remember Me
			                  <?php echo $form->error($model,'rememberMe'); ?>
			                </label>
			              </div>
			            </div><!-- /.col -->
			            <div class="col-xs-4">
			              <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success btn-block btn-flat')); ?>
			            </div><!-- /.col -->
			          </div>
			        <?php $this->endWidget(); ?>

			        <a href="#">I forgot my password</a><br>
			        <a href="register.html" class="text-center">Register a new membership</a>

			      </div><!-- /.login-box-body -->
			</div>
		</div>
	</div>
	 <!-- jQuery 2.1.4 -->
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/themes/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/themes/adminlte/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/themes/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>