<?php

class KelengkapanController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{
		$dataSD = SumberDana::model()->findAll("'1' ORDER BY status DESC");
		$dataPJ = PenanggungJawab::model()->findAll("'1' ORDER BY status DESC");
		$dataSt = Satuan::model()->findAll("'1' ORDER BY status DESC");
		$this->render("index",array('dataSD'=>$dataSD,"dataPJ" => $dataPJ,"dataSt"=>$dataSt));
	}
	
	public function actionInsertSumberDana(){
		if($_POST){
		$cek = DatabaseUmum::cekExist("sumber_dana","nama",$_POST['namaSD']);  // cek menggunakan component DatabaseUmum
			if($cek <= 0 ){
				$SumberDana = new SumberDana;

				$SumberDana->nama = $_POST['namaSD'];
				$SumberDana->deskripsi = $_POST['deskripsiSD'];

				if($SumberDana->save()){
					$this->redirect(array('index'));
				} else {
					Yii::app()->user->setFlash('error','Maaf, simpan gagal');
					$this->redirect(array('/errPage/errDB'));
				}
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan Sumber Dana gagal. Data sudah ada');
				$this->redirect(array('/errPage/errDB'));
			}
		}
		else $this->actionIndex();
	}


	public function actionInsertPenanggungJawab(){
		if($_POST){
		$cek = DatabaseUmum::cekExist("penanggung_jawab","nama",$_POST['namaPJ']); 	// cek menggunakan component DatabaseUmum
			if($cek <= 0 ){
				$SumberDana = new PenanggungJawab;

				$SumberDana->nama = $_POST['namaPJ'];

				if($SumberDana->save()){
					$this->redirect(array('index'));
				} else {
					Yii::app()->user->setFlash('error','Maaf, simpan gagal');
					$this->redirect(array('/errPage/errDB'));
				}
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan Penanggung Jawab gagal. Data sudah ada');
				$this->redirect(array('/errPage/errDB'));
			}
		}
		else $this->actionIndex();
	}

	public function actionInsertSatuan(){
		if($_POST){
		$cek = DatabaseUmum::cekExist("satuan","nama",$_POST['namaSt']); 	// cek menggunakan component DatabaseUmum
			if($cek <= 0 ){
				$SumberDana = new Satuan;

				$SumberDana->nama = $_POST['namaSt'];
				$SumberDana->deskripsi = $_POST['deskripsiSt'];

				if($SumberDana->save()){
					$this->redirect(array('index'));
				} else {
					Yii::app()->user->setFlash('error','Maaf, simpan gagal');
					$this->redirect(array('/errPage/errDB'));
				}
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan Satuan gagal. Data sudah ada');
				$this->redirect(array('/errPage/errDB'));
			}
		}
		else $this->actionIndex();
	}


	public function cekExist($atribut,$isi){

	}


	public function actionhapusSD(){
		if ($_POST) {
			$connection = Yii::app()->db;
			$sql = "UPDATE `sumber_dana` SET `status` = :STATUS WHERE `id` = :ID";
			$command = $connection->createCommand($sql);
			$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
			$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);


			if($command->execute()){
				$this->redirect(array('index'));
			}
			//SumberDana::model()->updateByPk($_POST['id'],'status',$criteria->condition,$criteria->params);
			//$this->redirect(array('index'));
		}
	}

	public function actionhapusPJ(){
		if ($_POST) {
			$connection = Yii::app()->db;
			$sql = "UPDATE `penanggung_jawab` SET `status` = :STATUS WHERE `id` = :ID";
			$command = $connection->createCommand($sql);
			$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
			$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);

			if($command->execute()){
				$this->redirect(array('index'));
			}
			//SumberDana::model()->updateByPk($_POST['id'],'status',$criteria->condition,$criteria->params);
			//$this->redirect(array('index'));
		}
	}

	public function actionhapusSt(){
		if ($_POST) {
			$connection = Yii::app()->db;
			$sql = "UPDATE `satuan` SET `status` = :STATUS WHERE `id` = :ID";
			$command = $connection->createCommand($sql);
			$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
			$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);

			if($command->execute()){
				$this->redirect(array('index'));
			}
			//SumberDana::model()->updateByPk($_POST['id'],'status',$criteria->condition,$criteria->params);
			//$this->redirect(array('index'));
		}
	}

}