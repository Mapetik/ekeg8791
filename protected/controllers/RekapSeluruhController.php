<?php

class RekapSeluruhController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
//	public function actionIndex()
//	{
//		$this->render("index");
//	}
	
	

	public function actionIndex()
	{
			$this->render("index",array());
			
	}
		
	
	public function actionopenData($id=null)
	{
		if($id==null)
			{
				$connection = Yii::app()->db;
				$sql = "SELECT `nama_kegiatan`,`nama_program`,kegiatan.target 
						FROM `kegiatan`,`layanan`,`program` 
						WHERE kegiatan.id_layanan=layanan.id && layanan.id_program=program.id && program.tahun_anggaran=0";
				$command = $connection->createCommand($sql);
				$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
				$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
				$result=$command->queryAll();
				$this->render("openData",array("id"=>$id,"result"=>$result));
			}
		else 
			{
			    $connection = Yii::app()->db;
				$sql = "SELECT `nama_kegiatan`,`nama_program`,kegiatan.target,kegiatan.id 
						FROM `kegiatan`,`layanan`,`program` 
						WHERE kegiatan.id_layanan=layanan.id && layanan.id_program=program.id && program.tahun_anggaran=$id";
				$command = $connection->createCommand($sql);
				$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
				$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
			
				$result=$command->queryAll();
				$this->render("openData",array("id"=>$id,"result"=>$result));
			
			}
	}	




	public function realisasi($id)
	{
		$connection = Yii::app()->db;
		$sql = "SELECT realisasi.bulan,realisasi.tanggal_input, SUM(realisasi.nominal) AS 'total' ,kegiatan.nama_kegiatan 
				FROM `realisasi`,`kegiatan` 
				WHERE realisasi.id_kegiatan=kegiatan.id && realisasi.bulan<=12&&kegiatan.id=$id";
		$command = $connection->createCommand($sql);
		$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
		$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
		$result=$command->queryAll();
		return $result;
	}



	public function realisasisd($id)
	{
		$connection = Yii::app()->db;
		$sql = "SELECT  SUM(realisasi.nominal) AS 'total' 
				FROM `realisasi`
				WHERE realisasi.bulan <= $id";
		$command = $connection->createCommand($sql);
		$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
		$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
		$result=$command->queryAll();
		return $result;
	}

	public function realisasipada($id)
	{
		$connection = Yii::app()->db;
		$sql = "SELECT SUM(realisasi.nominal) AS 'total' FROM `realisasi` WHERE realisasi.bulan=$id";
		$command = $connection->createCommand($sql);
		$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
		$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
		$result=$command->queryAll();
		return $result;
	}


	public function realisasitriwulan($bawah,$atas)
	{
		$connection = Yii::app()->db;
		$sql = "SELECT  SUM(realisasi.nominal) AS 'total' 
				FROM `realisasi`
				WHERE realisasi.bulan>=$bawah  && realisasi.bulan <=$atas";
		$command = $connection->createCommand($sql);
		$command->bindParam(':STATUS',$_POST['status'],PDO::PARAM_STR);
		$command->bindParam(':ID',$_POST['id'],PDO::PARAM_STR);
		$result=$command->queryAll();
		return $result;
	}
}
	
	
