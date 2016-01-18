<?php

class InputRealisasiController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{
		$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran'=>date('Y')));
		$this->render("index",array('dataProgram' => $dataProgram));
	}

	public function actionDaftarRealisasi(){
		if(isset($_POST['tahunAnggaran']) && isset($_POST['bulanRealisasi'])){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					kegiatan.id as id,
					kegiatan.kode_kegiatan as kode_kegiatan,
					kegiatan.nama_kegiatan as nama,
					kegiatan.target as target,
					-- kegiatan.satuan as satuan,
					-- kegiatan.sumber_dana as sumber_dana,
					-- kegiatan.penanggung_jawab as penanggung_jawab,
					satuan.nama as satuan,
					sumber_dana.nama as sumber_dana,
					penanggung_jawab.nama as penanggung_jawab,
					realisasi.nominal as nominal,
					program.tahun_anggaran as tahun_anggaran
					FROM 
					kegiatan,realisasi,layanan,program,satuan,sumber_dana,penanggung_jawab
					WHERE program.id=layanan.id_program 
					AND layanan.id = kegiatan.id 
					AND kegiatan.id = realisasi.id_kegiatan 
					AND kegiatan.satuan = satuan.id
					AND kegiatan.penanggung_jawab = penanggung_jawab.id
					AND kegiatan.sumber_dana = sumber_dana.id
					AND (program.tahun_anggaran = :tahun_anggaran 
						AND realisasi.bulan = :bulan)";
			$command = $connection->createCommand($sql);
			$command->bindParam(':tahun_anggaran',$_POST['tahunAnggaran'],PDO::PARAM_STR);
			$command->bindParam(':bulan',$_POST['bulanRealisasi'],PDO::PARAM_STR);
			$result = $command->queryAll();

			$this->render('daftarrealisasi',array('dataKegiatan'=>$result,'tahunAnggaran'=>$_POST['tahunAnggaran'],'bulan'=>$_POST['bulanRealisasi']));
		}
		 else $this->render('daftarrealisasi');
	}

	public function actionGetProgram(){
		if(Yii::app()->request->isAjaxRequest){
			if($_POST){
				$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran AND status = 0',array(':tahun_anggaran'=>$_POST['tahun_anggaran']));
				$this->renderPartial('_program',array('dataProgram'=>$dataProgram));
			}
		}
	}

	public function actionGetLayanan(){
		if(Yii::app()->request->isAjaxRequest){
			if($_POST){
				$dataLayanan = Layanan::model()->findAll('id_program=:id AND status = 0',array(':id'=>$_POST['id_program']));
				$this->renderPartial('_layanan',array('dataLayanan'=>$dataLayanan));
			}
		}
	}

	public function actionGetKegiatan(){
		if(Yii::app()->request->isAjaxRequest){
			if($_POST){
				$dataKegiatan = Kegiatan::model()->findAll('id_layanan=:id AND status = 0',array(':id'=>$_POST['id_layanan']));
				$this->renderPartial('_kegiatan',array('dataKegiatan'=>$dataKegiatan));
			}
		}
	}

	public function actionWriteRealisasi(){
		if($_POST){

			if(DatabaseUmum::cekRealisasi($_POST['kegiatan'],$_POST['bulan']) == 0){
				Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
				$dataRealisasi = new Realisasi;
				// echo date('Y-m-d');
				$dataRealisasi->tanggal_input = date('Y-m-d');
				$dataRealisasi->id_kegiatan = $_POST['kegiatan'];
				$dataRealisasi->nominal = $_POST['nominal'];
				$dataRealisasi->bulan = $_POST['bulan'];
				$dataRealisasi->id_rekaman = '1';
				$dataRealisasi->versi = '1';

				if($dataRealisasi->validate()){
					$dataRealisasi->save();
					Yii::app()->user->setFlash('success','Selamat, Insert data realisasi berhasil');
					$this->redirect(array('index'));
				} else {
					Yii::app()->user->setFlash('error','Maaf, Insert Realisasi Gagal. Silakan coba kembali');
					$this->redirect(array('errPage/errDB'));
				}
			} else {
				Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
				$idRealisasi = Realisasi::model()->find('id_kegiatan=:id_kegiatan AND bulan=:bulan',array(':id_kegiatan'=>$_POST['kegiatan'],':bulan'=>$_POST['bulan']));
				$connection = Yii::app()->db;
				$iniIdinya = $idRealisasi['id'];
				$sql = "UPDATE realisasi SET nominal = :nominal WHERE id=:id";
				echo $_POST['nominal'];
				$command = $connection->createCommand($sql);
				$command->bindParam(':nominal',$_POST['nominal'],PDO::PARAM_STR);
				$command->bindParam(':id',$iniIdinya,PDO::PARAM_STR);
				if($command->execute()){
					Yii::app()->user->setFlash('success','Selamat, Update realisasi berhasil');
					$this->redirect(array('index'));
				} else{
					Yii::app()->user->setFlash('error','Maaf, Update Realisasi Gagal. Silakan coba kembali');
					$this->redirect(array('errPage/errDB'));
				}
			}	



			// 
		}
	}

	public function actionGetMaxRealisasi(){
		if(Yii::app()->request->isAjaxRequest){
			$maxRealisasi = Kegiatan::model()->find("id=:id",array(':id'=>$_POST['id_kegiatan']));
			echo $maxRealisasi['target'];
		}
	}
}