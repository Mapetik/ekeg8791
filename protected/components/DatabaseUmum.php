<?php 
	class DatabaseUmum{
		//membuat function untuk format tanggal
		public static function cekExist($tabel,$kolom,$isi){
			
			$sql = "SELECT * 
					FROM $tabel
					WHERE $kolom = :isi
					";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':isi',$isi,PDO::PARAM_STR);
			$result = count($command->queryAll());

			//format tanggal ke tgl-namabln-thn
			return $result;
		}

		public static function cekExist2($tabel,$kolom1,$kolom2,$isi1,$isi2){
			
			$sql = "SELECT * 
					FROM $tabel
					WHERE 
					$kolom1 = :isi1
					 AND $kolom2 = :isi2
					";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':isi1',$isi,PDO::PARAM_STR);
			$command->bindParam(':isi2',$isi,PDO::PARAM_STR);
			$result = count($command->queryAll());

			//format tanggal ke tgl-namabln-thn
			return $result;
		}

		public static function cekExist3($tabel,$kolom1,$kolom2,$kolom3,$isi1,$isi2,$isi3){
			
			$sql = "SELECT * 
					FROM $tabel
					WHERE 
					$kolom1 = :isi1
					 AND $kolom2 = :isi2
					 AND $kolom3 = :isi3
					";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':isi1',$isi,PDO::PARAM_STR);
			$command->bindParam(':isi2',$isi,PDO::PARAM_STR);
			$command->bindParam(':isi3',$isi,PDO::PARAM_STR);
			$result = count($command->queryAll());

			//format tanggal ke tgl-namabln-thn
			return $result;
		}

		public static function cekRealisasi($kegiatan,$bulan){
			
			$sql = "SELECT * 
					FROM realisasi
					WHERE id_kegiatan = :id_kegiatan
					AND bulan = :bulan
					";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':id_kegiatan',$kegiatan,PDO::PARAM_STR);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = count($command->queryAll());

			//format tanggal ke tgl-namabln-thn
			return $result;
		}

		public static function getRealisasi($kegiatan,$bulan){
			
			$sql = "SELECT * 
					FROM realisasi
					WHERE id_kegiatan = :id_kegiatan
					AND bulan = :bulan
					";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':id_kegiatan',$kegiatan,PDO::PARAM_STR);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();

			//format tanggal ke tgl-namabln-thn
			if(isset($result[0])){
				return $result[0]['nominal'];
			} else return 0;
		}

		public static function getSumOfRealisasi($kegiatan,$bulan){
			
			$sql = "SELECT SUM(nominal) as nominal
					FROM realisasi
					WHERE id_kegiatan = :id_kegiatan
					AND bulan <= :bulan
					";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':id_kegiatan',$kegiatan,PDO::PARAM_STR);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();

			//format tanggal ke tgl-namabln-thn
			if(isset($result[0]['nominal'])){
				return $result[0]['nominal'];
			} else return 0;
		}

		//membuat function untuk format jam
		public function formatTime($param){
			//format jam ke format AM/PM
			return date("g:i:s A",strtotime($param));
		}

		// Mengambil nilai realisasi dari program
		public static function getRealisasiOnMonthFromProgram($id,$bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(realisasi.nominal) as jumlah 
					FROM program, layanan, kegiatan, realisasi 
					WHERE program.id = layanan.id_program 
					AND layanan.id = kegiatan.id_layanan 
					AND realisasi.id_kegiatan = kegiatan.id 
					AND layanan.status = '1' 
					AND kegiatan.status = '1'
					AND realisasi.bulan = :bulan
					AND program.id = $id";
			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			if($result[0]['jumlah']){
				return $result[0]['jumlah'];
			} else return '0';
		}
		public static function getTargetOnMonthFromProgram($id,$bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(kegiatan.target) as target 
					FROM program,layanan,kegiatan
					WHERE program.id = layanan.id_program 
					AND layanan.id = kegiatan.id_layanan 
					AND layanan.status = '1' 
					AND kegiatan.status = '1'
					AND kegiatan.bulan = :bulan
					AND program.id = $id";
			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			if($result[0]['target']){
				return $result[0]['target'];
			} else return '0';
		}
		public static function getRealisasiUntilMonthFromProgram($id,$bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(realisasi.nominal) as jumlah 
					FROM program, layanan, kegiatan, realisasi 
					WHERE program.id = layanan.id_program 
					AND layanan.id = kegiatan.id_layanan 
					AND realisasi.id_kegiatan = kegiatan.id 
					AND layanan.status = '1' 
					AND kegiatan.status = '1'
					AND realisasi.bulan <= :bulan
					AND program.id = $id";
			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			if($result[0]['jumlah']){
				return $result[0]['jumlah'];
			} else return '0';
		}

		public static function getRealisasiOnMonthFromLayanan($id,$bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(realisasi.nominal) as jumlah 
					FROM layanan, kegiatan, realisasi 
					WHERE 
					layanan.id = kegiatan.id_layanan 
					AND realisasi.id_kegiatan = kegiatan.id 
					AND kegiatan.status = '1' 
					AND realisasi.bulan = :bulan 
					AND layanan.id = $id";
			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			if($result[0]['jumlah']){
				return $result[0]['jumlah'];
			} else return '0';
		}
		public static function getTargetOnMonthFromLayanan($id,$bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(kegiatan.target) as target 
					FROM layanan,kegiatan
					WHERE 
					AND layanan.id = kegiatan.id_layanan  
					AND kegiatan.status = '1'
					AND kegiatan.bulan = :bulan
					AND layanan.id = $id";
			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			if($result[0]['target']){
				return $result[0]['target'];
			} else return '0';
		}
		public static function getRealisasiUntilMonthFromLayanan($id,$bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(realisasi.nominal) as jumlah 
					FROM layanan, kegiatan, realisasi 
					WHERE 
					layanan.id = kegiatan.id_layanan 
					AND realisasi.id_kegiatan = kegiatan.id 
					AND kegiatan.status = '1'
					AND realisasi.bulan <= :bulan
					AND layanan.id = $id";
			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			return $result[0]['jumlah'];
		}
		public static function getRealisasiOnMonth($bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(realisasi.nominal) as jumlah 
					FROM program,layanan, kegiatan, realisasi 
					WHERE 
					layanan.id = kegiatan.id_layanan 
					AND program.id = layanan.id
					AND realisasi.id_kegiatan = kegiatan.id 
					AND kegiatan.status = '1' 
					AND layanan.status = '1' 
					AND program.status = '1' 
					AND realisasi.bulan = :bulan";

			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			if($result[0]['jumlah']){
				return $result[0]['jumlah'];
			} else return '0';
		}
		public static function getRealisasiUntilMonth($bulan){
			$connection = Yii::app()->db;
			$sql = "SELECT 
					sum(realisasi.nominal) as jumlah 
					FROM program,layanan, kegiatan, realisasi 
					WHERE 
					layanan.id = kegiatan.id_layanan 
					AND program.id = layanan.id
					AND realisasi.id_kegiatan = kegiatan.id 
					AND kegiatan.status = '1' 
					AND layanan.status = '1' 
					AND program.status = '1' 
					AND realisasi.bulan <= :bulan";

			$command = $connection->createCommand($sql);
			$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
			$result = $command->queryAll();
			if($result[0]['jumlah']){
				return $result[0]['jumlah'];
			} else return '0';
		}

	public static function getValueOf($tabel,$kolom,$id){
		$sql = "SELECT $kolom FROM $tabel WHERE id = $id";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$result = count($command->queryAll());
	}

	public static function getPersentaseRealisasi($tag,$id){
		if($tag=="layanan"){
			$counter = 0;
			$dataLayanan = Layanan::model()->find('id=:id',array(':id'=>$id));
			$countRealisasi = count($dataLayanan['kegiatan']);
			if ($countRealisasi > 0) {
				foreach ($dataLayanan['kegiatan'] as $key) {
				 	foreach ($key->realisasi as $key2) {
				 		$counter += $key2->nominal;
				 	}
				} 
				return intval($counter/$dataLayanan['target']*100)."% ";
			}
			return "0%";
			 

		}  
		else if($tag=="program"){
			$counter = 0;
			$dataProgram = Program::model()->find('id=:id',array(':id'=>$id));
			foreach ($dataProgram['kegiatan'] as $key) {
			 	foreach ($key->realisasi as $key2) {
			 		$counter += $key2->nominal;
			 	}
			 } 
			 return intval($counter/$dataProgram['target']*100)."% ";

		}
		else if($tag=="all"){
			$counter = 0;
			$counter2 = 0;
			$dataProgram = Program::model()->findAll('status=:status AND tahun_anggaran=:tahun_anggaran',array(':status'=>"1",':tahun_anggaran'=>"2015"));
			foreach ($dataProgram as $key) {
				foreach ($key->kegiatan as $key2) {
				 	foreach ($key2->realisasi as $key3) {
				 		$counter += $key3->nominal;
				 	}
				 } 
				 $counter2 += $key->target;
			}
			 return intval($counter/$counter2*100)."% ";
			}
		}

		public static function changeRecord($tabel,$id,$kolom,$isi){
			$connection = Yii::app()->db;
			$sql = "UPDATE $tabel SET $kolom=:isi WHERE id = :id";
			$command = $connection->createCommand($sql);
			$command->bindParam(':id',$id,PDO::PARAM_STR);
			$command->bindParam(':isi',$isi,PDO::PARAM_STR);

			if($command->execute())
			return 1;
			return 0;
		}

	}

	

 ?>