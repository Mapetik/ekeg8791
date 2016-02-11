<?php

class RecoverDataController extends Controller
{
	public $layout = "mainlayout";

	/**
	 * Declares defualt home for index
	 */


	// public function filters(){ 
	// 	return array(
	// 	'accessControl',
	// 	);
	// }

	// public function accessRules()
	// {
	// 	return array(
	// 				array('allow',
	// 				'actions'=>array('index','view'),
	// 				'users'=>array('@'),
	// 				),
	// 				array('allow', 
	// 				'actions'=>array('admin','DaftarRealisasi','GetProgram','GetLayanan','GetKegiatan','WriteRealisasi','MaxRealisasi'),
	// 				'expression'=>'$user->isAdmin()',
	// 				),
	// 				array('deny',
	// 				'users'=>array('*'),
	// 				),
	// 	);
	// }

	public function actionIndex()
	{
		$this->actionProgram();
	}

	public function actionProgram()
	{
		$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
		
		if(Yii::app()->request->isAjaxRequest && isset($_POST['tahun_anggaran'])){
			AlatUmum::setCookieTahun($_POST['tahun_anggaran']);
			if(isset($_POST['nama_program'])) {
				$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran AND nama_program LIKE :nama_program',
					array(':tahun_anggaran' => AlatUmum::getCookieTahun(),
						':nama_program'=>'%'.$_POST['nama_program'].'%'));
			}
				else 
			$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
			$this->renderPartial('partial/_aturAnggaran-program',array('dataProgram'=>$dataProgram));
		} else {
			$this->render('recoverprogram',array('dataProgram'=>$dataProgram));
		}
	}

	public function actionhapusProgram(){
		if ($_POST) {
			$connection = Yii::app()->db;
			$sql = "UPDATE `program` SET `status` = :STATUS WHERE `id` = :ID";
			$command = $connection->createCommand($sql);
			$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
			$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);

			if($command->execute()){
				Yii::app()->user->setFlash("success","Operasi Hapus Berhasil !");
				$this->redirect(array('index','tahun_anggaran'=>'2015'));
			} else {
				Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
				$this->redirect(array('/errPage/errDB'));
			}
			//SumberDana::model()->updateByPk($_POST['id'],'status',$criteria->condition,$criteria->params);
			//$this->redirect(array('index'));
		}
	}

	public function actionShowRiwayatProgram(){
		if(Yii::app()->request->isAjaxRequest){	
			if($_POST['id_program']){
				$recoProgram = RecoProgram::model()->findAll('id_program=:id_program',array(':id_program'=>$_POST['id_program']));
				$dataProgram = Program::model()->findAll('id=:id',array(':id' => $_POST['id_program']));
				$this->renderPartial('partial/_riwayatprogram',array('dataProgram'=>$dataProgram,
																		'recoProgram'=>$recoProgram));
			}
		}
	}

	public function actionShowModelDetilRecoProgram(){
		if(Yii::app()->request->isAjaxRequest){	
			if($_POST['id_reco']){
				$recoProgram = RecoProgram::model()->find('id=:id_reco',array(':id_reco'=>$_POST['id_reco']));
				$this->renderPartial('partial/_modelDetilRecoProgram',array('recoProgram'=>$recoProgram));
			}
		}
	}

	public function actionLayanan()
	{
		$dataLayanan = "";
		$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
		
		if(Yii::app()->request->isAjaxRequest){
			$dataLayanan = Layanan::model()->findAll("id_program=:id_program",
				array(':id_program'=>$_POST['id_program']));
			$this->renderPartial('partial/_recoverlayanan',array('dataLayanan'=>$dataLayanan));
		} else {
			$this->render('recoverlayanan',array('dataLayanan'=>$dataLayanan,
											'dataProgram'=>$dataProgram));
		}
	}

	public function actionShowRiwayatLayanan(){
		// echo $_POST['id_layanan'];
		if(Yii::app()->request->isAjaxRequest){	
			if(isset($_POST['id_layanan'])){
				$recoLayanan = RecoLayanan::model()->findAll('id_layanan=:id_layanan',array(':id_layanan'=>$_POST['id_layanan']));
				$this->renderPartial('partial/_riwayatlayanan',array('recoLayanan'=>$recoLayanan));
			}
		}
	}

	public function actionShowModelDetilRecoLayanan(){
		if(Yii::app()->request->isAjaxRequest){	
			if($_POST['id_reco']){
				$recoLayanan = RecoLayanan::model()->find('id=:id_reco',array(':id_reco'=>$_POST['id_reco']));
				$this->renderPartial('partial/_modelDetilrecoLayanan',array('recoLayanan'=>$recoLayanan));
			}
		}
	}

	public function actionhapusLayanan(){
		if ($_POST) {
			$connection = Yii::app()->db;
			$sql = "UPDATE `layanan` SET `status` = :STATUS WHERE `id` = :ID";
			$command = $connection->createCommand($sql);
			$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
			$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);

			if($command->execute()){
				Yii::app()->user->setFlash("success","Operasi Hapus Berhasil !");
				$this->redirect(array('recoverdata/layanan','tahun_anggaran'=>'2015'));
			} else {
				Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
				$this->redirect(array('/errPage/errDB'));
			}
			//SumberDana::model()->updateByPk($_POST['id'],'status',$criteria->condition,$criteria->params);
			//$this->redirect(array('index'));
		}
	}



	public function actionKegiatan()
	{
		$dataKegiatan = "";
		$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
		
		if(Yii::app()->request->isAjaxRequest){
			$dataKegiatan = Kegiatan::model()->findAll("id_layanan=:id",array(':id'=>$_POST['id_layanan']));
			$this->renderPartial('partial/_recoverkegiatan',array('dataKegiatan'=>$dataKegiatan));
		} else {
			$this->render('recoverkegiatan',array('dataKegiatan'=>$dataKegiatan,
											'dataProgram'=>$dataProgram));
		}
	}

	public function actionhapusKegiatan(){
		if ($_POST) {
			$connection = Yii::app()->db;
			$sql = "UPDATE `kegiatan` SET `status` = :STATUS WHERE `id` = :ID";
			$command = $connection->createCommand($sql);
			$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
			$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);

			if($command->execute()){
				Yii::app()->user->setFlash("success","Operasi Hapus Berhasil !");
				$this->redirect(array('recoverdata/kegiatan','tahun_anggaran'=>'2015'));
			} else {
				Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
				$this->redirect(array('/errPage/errDB'));
			}
			//SumberDana::model()->updateByPk($_POST['id'],'status',$criteria->condition,$criteria->params);
			//$this->redirect(array('index'));
		}
	}
	public function actionRealisasi()
	{
		$this->render("recoverrealisasi");
	}

}