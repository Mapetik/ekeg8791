<!DOCTYPE html>
<html>
<head>
	<title>POK</title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/css/baru.css">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 4%">
			<div class="col-md-8">
				<div class="jumbotron">
					<h1><font color="green" style="font-size: 2em">E</font>-Kegiatan</h1>
					<h2>Program Pasca Sarjana</h2>
					<h2>Universitas Negeri Semarang</h2>
					<p class="text">
					<br>
						Sistem Informasi E-Kegiatan ditujukan untuk memudahkan administrasi kegiatan yang dilaksanakan Program Pasca Sarjana Universitas Negeri Semarang
					</p>
				</div>
			</div>
			<div class="col-md-3 login-box">
			<h2>Login e-kegiatan</h2>
			<dd>silakan login dengan akun sikadu anda</dd>
			<?php	/*<form class="login-form">
					<table width="100%">
						<tr>
							<td><input type="text" class="form-control f-margin-2" placeholder="username" style="text-align: center"></td>
						</tr>
						<tr>
							<td><input type="password" class="form-control f-margin-2" placeholder="password" style="text-align: center"></td>
						</tr>
						<tr>
							<td><input type="submit" class="btn btn-primary form-control login-btn" value="Login"></td>
						</tr>
					</table>
				</form> */
			?>	





				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>

					
					<div class="row">
						<?php echo $form->labelEx($model,'username'); ?>
						<?php echo $form->textField($model,'username'); ?>
						<?php echo $form->error($model,'username'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password'); ?>
						<?php echo $form->error($model,'password'); ?>
						
					</div>

					<div class="row rememberMe">
						<?php echo $form->checkBox($model,'rememberMe'); ?>
						<?php echo $form->label($model,'rememberMe'); ?>
						<?php echo $form->error($model,'rememberMe'); ?>
					</div>

					<div class="row buttons">
						<?php echo CHtml::submitButton('Login'); ?>
					</div>

				<?php $this->endWidget(); ?>







			</div>
		</div>
	</div>
</body>
</html>