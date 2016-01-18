<?php

class RekapBulananController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{
		if(isset($_POST['tahunAnggaran']) && isset($_POST['bulanRealisasi']))
			{
				$connection = Yii::app()->db;
				$sql = "SELECT *
						FROM program 
						WHERE tahun_anggaran= $_POST[tahunAnggaran]";
				$command = $connection->createCommand($sql);
				$command->bindParam(':tahun_anggaran',$_POST['tahunAnggaran'],PDO::PARAM_STR);
				$command->bindParam(':bulan',$_POST['bulanRealisasi'],PDO::PARAM_STR);
				$result = $command->queryAll();
				$this->render('index',array('dataKegiatan'=>$result,'tahunAnggaran'=>$_POST['tahunAnggaran'],'bulan'=>$_POST['bulanRealisasi']));
			}
		 else $this->render('index');
	}

	public function actionListLayanan($id)
	{
		Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
		$dataProgram = Layanan::model()->findAll('id_program=:id',array(':id'=>$id));
		return $dataProgram;
	}

	public function actionListKegiatan($id)
	{
		$connection = Yii::app()->db;
		$sql = "SELECT *
				FROM `kegiatan` 
				WHERE kegiatan.id_layanan=$id";
		$command = $connection->createCommand($sql);
		$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
		$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
		$kegiatan=$command->queryAll();
		return $kegiatan;
	}
	
	public function realisasi($id,$bulan)
	{
		$connection = Yii::app()->db;
		$sql = "SELECT realisasi.bulan, realisasi.tanggal_input, SUM(realisasi.nominal) AS 'total' , kegiatan.nama_kegiatan 
				FROM `realisasi`,`kegiatan` 
				WHERE realisasi.id_kegiatan=kegiatan.id && realisasi.bulan<=$bulan && kegiatan.id=$id";
		$command = $connection->createCommand($sql);
		$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
		$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
		$result=$command->queryAll();
		return $result;
		
		
	}
	
	
	
}