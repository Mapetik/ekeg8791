<div class="row">
	<div class="col-md-12">
		<?php foreach (Yii::app()->user->getFlashes() as $key => $value): ?>
		<div class="alert alert-danger">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>			
			<?php echo $value ?>
		</div>
		<?php endforeach ?>
		<?php
			$returnUrl = Yii::app()->user->returnUrl;
		?>
		<a href="<?php echo $returnUrl ?>" class="btn btn-primary">Kembali</a>
	</div>
</div>