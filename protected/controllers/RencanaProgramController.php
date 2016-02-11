<?php

class RencanaProgramController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{
		// "status=:status",array(':status'=>"1")
		$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
		if(isset($_GET['tahun_anggaran'])){
			AlatUmum::setCookieTahun($_GET['tahun_anggaran']);
			$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));			
			Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
			$this->render("index",array("dataProgram"=>$dataProgram,"tahun_anggaran"=>AlatUmum::getCookieTahun()));
		}

		Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
		// echo AlatUmum::getCookieTahun();
		$this->render("index",array("dataProgram"=>$dataProgram,"tahun_anggaran"=>AlatUmum::getCookieTahun()));
	}

	public function actionProgramPartial(){
		if(Yii::app()->request->isAjaxRequest){
			if(isset($_POST['tahun_anggaran'])){
				AlatUmum::setCookieTahun($_POST['tahun_anggaran']);
				$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran'=>$_POST['tahun_anggaran']));
				if(isset($_POST['nama_program'])){
					$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran AND nama_program LIKE :nama_program',
						array(':tahun_anggaran'=>$_POST['tahun_anggaran'],
								':nama_program'=>'%'.$_POST['nama_program'].'%'));	
				}
				$this->renderPartial('_program',array("dataProgram"=>$dataProgram));
				// echo "Yeah2";
			}

		}

	}

	public static function getRealisasiFromProgram($id){
		$connection = Yii::app()->db;
		$sql = "SELECT sum(realisasi.nominal) as jumlah FROM program, layanan, kegiatan, realisasi WHERE program.id = layanan.id_program AND layanan.id = kegiatan.id_layanan AND realisasi.id_kegiatan = kegiatan.id AND program.id = $id";
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		return $result[0]['jumlah'];
	}

	public static function getRealisasiFromLayanan($id){
		$connection = Yii::app()->db;
		$sql = "SELECT sum(realisasi.nominal) as jumlah FROM  layanan, kegiatan, realisasi WHERE layanan.id = kegiatan.id_layanan AND realisasi.id_kegiatan = kegiatan.id AND layanan.id = $id";
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		return $result[0]['jumlah'];
	}

	
	public function actionLayanan($id)
	{
		Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
		$dataLayanan = Layanan::model()->findAll("id_program=:id",array(':id'=>$id));
		if (isset($_POST['nama_layanan'])) {
			$dataLayanan = Layanan::model()->findAll("id_program=:id AND nama_layanan LIKE :nama_layanan",array(':id'=>$id,':nama_layanan'=>'%'.$_POST['nama_layanan'].'%'));
		}
		$dataMaxTarget = Program::model()->find('id=:id',array(':id'=>$id));
		$dataProgram = Program::model()->find('id=:id',array(':id'=>$id));
		$this->render("layanan",array("id"=>$id,
			"dataLayanan"=>$dataLayanan,
		"dataMaxTarget"=>$dataMaxTarget['target'],
		'nama_program'=>$dataProgram['nama_program'],
		'id_program'=>$dataProgram['id']));
	}

	public function actionLayananPartial(){
		if(Yii::app()->request->isAjaxRequest){
			if(isset($_POST['tahun_anggaran'])){
				$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran'=>$_POST['tahun_anggaran']));
				$this->renderPartial('_program',array("dataProgram"=>$dataProgram));
			}
		}
	}
	
	public function actionKegiatan($id)
	{
		Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
		$dataKegiatan = Kegiatan::model()->findAll("id_layanan=:id",array(':id'=>$id));
		if (isset($_POST['nama_kegiatan'])) {
			$dataKegiatan = Kegiatan::model()->findAll("id_layanan=:id AND nama_kegiatan LIKE :nama_kegiatan",array(':id'=>$id,'nama_kegiatan'=>'%'.$_POST['nama_kegiatan'].'%'));
		}
		$dataMaxTarget = Layanan::model()->find('id=:id',array(':id'=>$id));
		$dataLayanan = Layanan::model()->findAll('id=:id',array(':id'=>$id));
		$dataSatuan = Satuan::model()->findAll('status=:status',array(":status"=>1));
		$dataSumberDana = SumberDana::model()->findAll('status=:status',array(":status"=>1));
		$dataPenanggungJawab = PenanggungJawab::model()->findAll('status=:status',array(":status"=>1));
		$this->render("kegiatan",array("id_layanan"=>$id,
										"id_program"=>$dataMaxTarget['id_program'],
										"dataKegiatan"=>$dataKegiatan,
										"dataMaxTarget"=>$dataMaxTarget['target'],
										'dataLayanan'=>$dataLayanan,
										'dataSatuan'=>$dataSatuan,
										'dataSumberDana'=>$dataSumberDana,
										'dataPenanggungJawab'=>$dataPenanggungJawab));
	}

	public function actionInsertProgram(){
		Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
		if($_POST){
		$cek = DatabaseUmum::cekExist2('program','nama_program','tahun_anggaran',$_POST['namaTP'],$_POST['tahunTP']);
			if($cek <= 0 ){
				$program = new Program;

				$program->nama_program = $_POST['namaTP'];
				$program->kode_program = $_POST['kodeTP'];
				$program->target = "0";
				$program->tahun_anggaran = $_POST['tahunTP'];
				$program->id_rekaman = 0;
				
				if($program->validate()){
					$program->save();
					// echo $program->nama_program;
					$this->redirect(array('index'));
				} else {
					Yii::app()->user->setFlash('error','Maaf, simpan Program gagal. Mohon periksa kembali data yang anda inputkan');
					$this->redirect(array('/errPage/errDB'));
				}
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan Program gagal. Data sudah ada');
				$this->redirect(array('/errPage/errDB'));
			}
		}
		else $this->actionIndex();
	}

	public function actionInsertLayanan(){
		Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
		if($_POST){
		$cek = DatabaseUmum::cekExist("layanan","nama_layanan",$_POST['namaLy']); 	// cek menggunakan component DatabaseUmum
			if($cek <= 0 ){
				$layanan = new Layanan;

				$layanan->nama_layanan = $_POST['namaLy'];
				$layanan->kode_layanan = $_POST['kodeLy'];
				$layanan->id_program = $_POST['id_program'];
				$layanan->target = 0;
				$layanan->id_rekaman = 0;
				$layanan->versi = 0;
				
				if($layanan->validate()){
					$layanan->save();
					$this->redirect(array('layanan','id'=>$_POST['id_program']));
				} else {
					Yii::app()->user->setFlash('error','Maaf, simpan Program gagal. Mohon periksa kembali data yang anda inputkan');
					$this->redirect(array('/errPage/errDB'));
				}
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan Program gagal. Data sudah ada');
				$this->redirect(array('/errPage/errDB'));
			}
		}
		else $this->actionIndex();
	}

	public function actionInsertKegiatan(){
		Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
		if($_POST){
		$cek = DatabaseUmum::cekExist("kegiatan","nama_kegiatan",$_POST['namaKg']); 	// cek menggunakan component DatabaseUmum
			if($cek <= 0 ){
				$kegiatan = new Kegiatan;

				echo $kegiatan->nama_kegiatan = $_POST['namaKg'];
				echo $kegiatan->kode_kegiatan = $_POST['kodeKg'];
				echo $kegiatan->id_layanan = $_POST['id_layanan'];
				$kegiatan->target = 0;
				$kegiatan->bulan = 0;
				$kegiatan->tanggal = 0;
				$kegiatan->volume = 0;
				$kegiatan->harga_satuan = 0;
				$kegiatan->satuan = 0;
				$kegiatan->sumber_dana = 0;
				$kegiatan->penanggung_jawab = 0;
				$kegiatan->id_rekaman = 0;
				$kegiatan->versi = 0;
				$kegiatan->status = 1;
				
				if($kegiatan->validate()){
					$kegiatan->save();
					$this->redirect(array('kegiatan','id'=>$_POST['id_layanan']));
				} else {
					Yii::app()->user->setFlash('error','Maaf, simpan Program gagal. Mohon periksa kembali data yang anda inputkan');
					$this->redirect(array('/errPage/errDB'));
				 }
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan Program gagal. Data sudah ada');
				$this->redirect(array('/errPage/errDB'));
			}
		}
		else $this->actionIndex();
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

	public function actionhapusLayanan(){
		if ($_POST) {
			$sql = "UPDATE `layanan` SET `status` = :STATUS WHERE `id` = :ID";
			
			if($this->changeStatus($sql,$_POST['status'],$_POST['id'])){
				$this->redirect(array('layanan','id'=>$_POST['id_program']));
			} else {
				$this->redirect(array('/errPage/errDB'));
			}
		}
	}

	public function actionhapusKegiatan(){
		if ($_POST) {
			$sql = "UPDATE `kegiatan` SET `status` = :STATUS WHERE `id` = :ID";
			
			if($this->changeStatus($sql,$_POST['status'],$_POST['id'])){
				$this->redirect(array('kegiatan','id'=>$_POST['id_layanan']));
			} else {
				$this->redirect(array('/errPage/errDB'));
			}
		}
	}


	function changeStatus($sql,$status,$id){
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$command->bindParam(':STATUS',$status,PDO::PARAM_STR);
		$command->bindParam(':ID',$id,PDO::PARAM_STR);

		if($command->execute()){
			Yii::app()->user->setFlash("success","Operasi Hapus Berhasil !");
			return 1;
		} else {
			Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
			return 0;
		}
	}

	public function actionEditProgram(){
		if($_POST){
			Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
			$dataProgram = Program::model()->find('id=:id',array(':id'=>$_POST['id']));
			$this->render('formeditprogram',array('dataProgram'=>$dataProgram));
		}
	}

	public function actionUpdateProgram(){
		if($_POST){
			$program = Program::model()->find('id=:id',array(':id'=>$_POST['id']));
			
			$backup = $this->updateTheProgram($program);

			$program->nama_program = $_POST['namaTP'];
			$program->kode_program = $_POST['kodeTP'];
			$program->target = $_POST['targetTP'];
			$program->tahun_anggaran = $_POST['tahunTP'];
			$program->id_rekaman = 0;

			if($backup == 1&& $program->validate()){
				$program->save();
				// // echo $program->nama_program;
				$this->redirect(array('index'));
			} else {
				echo "gagal";
				// Yii::app()->user->setFlash('error','Maaf, simpan Program gagal. Mohon periksa kembali data yang anda inputkan');
				// $this->redirect(array('/errPage/errDB'));
			}
		}
	}

	function updateTheProgram($program){
		$recoProgram = new RecoProgram;

		$recoProgram->nama_program = $program->nama_program;
		$recoProgram->kode_program = $program->kode_program;
		$recoProgram->target = $program->target;
		$recoProgram->tahun_anggaran = $program->tahun_anggaran;
		$recoProgram->id_rekaman = $program->id_rekaman;
		$recoProgram->id_program = $program->id;
		$recoProgram->waktu_update = date('Y-m-d G:i:s',time());

		if($recoProgram->validate()){
			$recoProgram->save();
			return 1;
		} return 0;
	}

	public function actionEditLayanan(){
		if($_POST){
			Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
			$dataLayanan = Layanan::model()->find('id=:id AND id_program=:id_program ',array(':id'=>$_POST['id'],':id_program'=>$_POST['id_program']));
			$dataMaxTarget = Program::model()->find('id=:id',array(':id'=>$_POST['id_program']));
			$this->render('formeditLayanan',array('dataLayanan'=>$dataLayanan,'dataMaxTarget'=>$dataMaxTarget));
		}
	}

	public function actionUpdateLayanan(){
		if($_POST){
			$layanan = Layanan::model()->find('id=:id',array(':id'=>$_POST['id']));

			$backup = $this->updateTheLayanan($layanan);

			$layanan->nama_layanan = $_POST['namaLy'];
			$layanan->kode_layanan = $_POST['kodeLy'];
			$layanan->id_program = $_POST['id_program'];
			$layanan->target = $_POST['targetLy'];
			$layanan->id_rekaman = 0;
			$layanan->versi = 0;
			$layanan->status = 1;
			
			if($backup == 1 && $layanan->validate()){
				$layanan->save();
				// echo $layanan->nama_program;
				$this->actionLayanan($_POST['id_program']);
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan Layanan gagal. Mohon periksa kembali data yang anda inputkan');
				$this->redirect(array('/errPage/errDB'));
			}
		}
	}

	function updateTheLayanan($layanan){
		$recoLayanan = new RecoLayanan;

		$recoLayanan->nama_layanan = $layanan->nama_layanan;
		$recoLayanan->kode_layanan = $layanan->kode_layanan;
		$recoLayanan->id_program = $layanan->id_program ;
		$recoLayanan->target = $layanan->target;
		$recoLayanan->id_rekaman = $layanan->id_rekaman;
		$recoLayanan->status = 1;
		$recoLayanan->id_layanan = $layanan->id;
		$recoLayanan->waktu_update = date('Y-m-d G:i:s',time()); 

		if($recoLayanan->validate()){
			$recoLayanan->save();
			return 1;
		} return 0;
	}

	public function actionEditKegiatan(){
		if($_POST){
			Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
			$dataKegiatan = Kegiatan::model()->find('id=:id AND id_layanan=:id_layanan ',array(':id'=>$_POST['id'],':id_layanan'=>$_POST['id_layanan']));
			$dataMaxTarget = Layanan::model()->find('id=:id',array(':id'=>$_POST['id_layanan']));
			$dataSatuan = Satuan::model()->findAll('status=:status',array(':status'=>'1'));
			$dataPenanggungJawab = PenanggungJawab::model()->findAll('status=:status',array(':status'=>'1'));
			$dataSumberDana = SumberDana::model()->findAll('status=:status',array(':status'=>'1'));
			$this->render('formeditKegiatan',array('dataKegiatan'=>$dataKegiatan,
													'dataMaxTarget'=>$dataMaxTarget,
													'dataSatuan'=>$dataSatuan,
													'dataPenanggungJawab'=>$dataPenanggungJawab,
													'dataSumberDana'=>$dataSumberDana));
		}
	}

	public function actionUpdateKegiatan(){
		if($_POST){
			$kegiatan = Kegiatan::model()->find('id=:id',array(':id'=>$_POST['id']));

			$backup = $this->updateTheKegiatan($kegiatan);

			$kegiatan->nama_kegiatan = $_POST['namaKg'];
			$kegiatan->kode_kegiatan = $_POST['kodeKg'];
			$kegiatan->id_layanan = $_POST['id_layanan'];
			$kegiatan->target = $_POST['targetKg'];
			$kegiatan->bulan = $_POST['bulanKg'];
			$kegiatan->volume = $_POST['volumeKg'];
			$kegiatan->harga_satuan = $_POST['harga_satuanKg'];
			$kegiatan->satuan = $_POST['satuanKg'];
			$kegiatan->sumber_dana = $_POST['sumber_danaKg'];
			$kegiatan->penanggung_jawab = $_POST['penanggung_jawabKg'];
			$kegiatan->id_rekaman = 0;
			$kegiatan->versi = 0;
			$kegiatan->status = 1;
			
			if($backup == 1 && $kegiatan->validate()){
				Yii::app()->user->setFlash('success','Selamat, update kegiatan berhasil');
				$kegiatan->save();
				// echo $kegiatan->nama_program;
				$id_layanan=$_POST['id_layanan'];
				$this->actionKegiatan($id_layanan);
			} else {
				Yii::app()->user->setFlash('error','Maaf, simpan kegiatan gagal. Mohon periksa kembali data yang anda inputkan');
				$this->redirect(array('/errPage/errDB'));
			}
		}
	}

	function updateTheKegiatan($kegiatan){
		$recoKegiatan = new RecoKegiatan;

		$recoKegiatan->nama_kegiatan = $kegiatan->nama_kegiatan;
		$recoKegiatan->kode_kegiatan = $kegiatan->kode_kegiatan;
		$recoKegiatan->id_layanan = $kegiatan->id_layanan;
		$recoKegiatan->target = $kegiatan->target;
		$recoKegiatan->volume = $kegiatan->volume;
		$recoKegiatan->harga_satuan = $kegiatan->harga_satuan;
		$recoKegiatan->satuan = $kegiatan->satuan;
		$recoKegiatan->sumber_dana = $kegiatan->sumber_dana;
		$recoKegiatan->penanggung_jawab = $kegiatan->penanggung_jawab;
		$recoKegiatan->id_rekaman = $kegiatan->id_rekaman;
		$recoKegiatan->status = '1';
		$recoKegiatan->bulan = $kegiatan->bulan;
		$recoKegiatan->id_kegiatan = $kegiatan->id;
		$recoKegiatan->waktu_update = date('Y-m-d G:i:s',time()); 

		if($recoKegiatan->validate()){
			$recoKegiatan->save();
			return 1;
		} return 0;
	}

	public function actionLihatPOKBulanan(){
		if(isset($_POST['tahunAnggaran']) && isset($_POST['bulan'])){
			AlatUmum::setCookieTahun($_POST['tahunAnggaran']);
			$connection = Yii::app()->db;
			$sql = "SELECT 
					kegiatan.id as id,
					kegiatan.kode_kegiatan as kode_kegiatan,
					kegiatan.nama_kegiatan as nama,
					kegiatan.target as target,
					satuan.nama as satuan,
					sumber_dana.nama as sumber_dana,
					penanggung_jawab.nama as penanggung_jawab,
					program.tahun_anggaran as tahun_anggaran
					FROM 
					kegiatan,layanan,program,satuan,sumber_dana,penanggung_jawab
					WHERE program.id = layanan.id_program 
					AND layanan.id = kegiatan.id_layanan 
					AND kegiatan.satuan = satuan.id
					AND kegiatan.penanggung_jawab = penanggung_jawab.id
					AND kegiatan.sumber_dana = sumber_dana.id
					AND kegiatan.status = '1'
					AND layanan.status = '1'
					AND program.status = '1'
					AND (program.tahun_anggaran = :tahun_anggaran
						AND kegiatan.bulan = :bulan)";
			$command = $connection->createCommand($sql);
			$command->bindParam(':tahun_anggaran',$_POST['tahunAnggaran'],PDO::PARAM_STR);
			$command->bindParam(':bulan',$_POST['bulan'],PDO::PARAM_STR);
			$dataKegiatan = $command->queryAll();

			// $dataKegiatan = Kegiatan::model()->findAll('bulan=:bulan',array(':bulan'=>'1'));
			$this->render('lihatRencanaPOKBulanan',array('dataKegiatan'=>$dataKegiatan,
														'tahunAnggaran'=>$_POST['tahunAnggaran'],
														'bulan'=>$_POST['bulan']));
			// echo $_POST['bulan'];
		} else
		{
			$this->render('lihatRencanaPOKBulanan');
		}
	}


	public function actionLihatPOKBulananV2(){
		if(isset($_POST['tahun_anggaran'])){
			$tahun_anggaran = $_POST['tahun_anggaran'];
		} else {$tahun_anggaran = date('Y');}

		$dataSeluruh = "";
		// Query Graphics
		for($i=1;$i<13;$i++){
			$dataSeluruh = $dataSeluruh.DatabaseUmum::getRealisasiOnMonth($i);
			if($i+1!=13) {
				$dataSeluruh = $dataSeluruh.",";
			}
		}


		$sql = "SELECT kegiatan.id as id,
				kegiatan.kode_kegiatan as kode_kegiatan,
				kegiatan.nama_kegiatan as nama_kegiatan,
				kegiatan.bulan  as bulan
				FROM 
				kegiatan,layanan,program 
				WHERE 
				program.id = layanan.id_program 
				AND layanan.id = kegiatan.id_layanan 
				AND program.status = '1' 
				AND layanan.status = '1' 
				AND kegiatan.status = '1' 
				AND program.tahun_anggaran = :tahun_anggaran";

		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$command->bindParam(':tahun_anggaran',$_POST['tahun_anggaran'],PDO::PARAM_STR);
		$dataKegiatan = $command->queryAll();
		$this->render('lihatRencanaPOKBulananV2',array('dataKegiatan'=>$dataKegiatan,
													'tahun_anggaran'=>$tahun_anggaran,
													'dataGrafikSeluruh'=>$dataSeluruh));
	}

	public function actionLihatPOKTriwulan($id=1){
		if(isset($_POST['tahun_anggaran'])){
			$tahun_anggaran = $_POST['tahun_anggaran'];
		} else $tahun_anggaran = date('Y');

		switch ($id) {
			case 1:
				$max = 3; $min = 1;
				break;
			case 2:
				$max = 6; $min = 4;
				break;
			case 3:
				$max = 9; $min = 7;
				break;
			case 4:
				$max = 12; $min = 10;
				break;
			default:
				$max = 3; $min = 1;
				break;
		}
		$sql ="SELECT kegiatan.id as id,
				kegiatan.kode_kegiatan as kode_kegiatan,
				kegiatan.nama_kegiatan as nama_kegiatan,
				kegiatan.bulan  as bulan
				FROM 
				kegiatan,layanan,program 
				WHERE 
				program.id = layanan.id_program 
				AND layanan.id = kegiatan.id_layanan 
				AND program.status = '1' 
				AND layanan.status = '1' 
				AND kegiatan.status = '1' 
				AND program.tahun_anggaran = :tahun_anggaran
				AND kegiatan.bulan BETWEEN $min AND $max";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':tahun_anggaran',$tahun_anggaran,PDO::PARAM_STR);
			$dataKegiatan = $command->queryAll($sql);

		if(Yii::app()->request->isAjaxRequest){
			$this->renderPartial('_triwulan',array('dataKegiatan'=>$dataKegiatan,
												'max'=>$max,'min'=>$min));
		} else 
		$this->render('rencanapoktriwulan',array('dataKegiatan'=>$dataKegiatan,
													'max'=>$max,'min'=>$min,'id'=>$id,
													'tahun_anggaran'=>$tahun_anggaran));
	}

	public function actionLihatPOKTriwulanPartial($id=2){
		if(isset($_POST['tahun_anggaran'])){
			$tahun_anggaran = $_POST['tahun_anggaran'];
		} else $tahun_anggaran = date('Y');

		if(Yii::app()->request->isAjaxRequest){
			switch ($id) {
			case 1:
				$max = 3; $min = 1;
				break;
			case 2:
				$max = 6; $min = 4;
				break;
			case 3:
				$max = 9; $min = 7;
				break;
			case 4:
				$max = 12; $min = 10;
				break;
		}
			$sql ="SELECT kegiatan.id as id,
				kegiatan.kode_kegiatan as kode_kegiatan,
				kegiatan.nama_kegiatan as nama_kegiatan,
				kegiatan.bulan  as bulan
				FROM 
				kegiatan,layanan,program 
				WHERE 
				program.id = layanan.id_program 
				AND layanan.id = kegiatan.id_layanan 
				AND program.status = '1' 
				AND layanan.status = '1' 
				AND kegiatan.status = '1' 
				AND program.tahun_anggaran = :tahun_anggaran
				AND kegiatan.bulan BETWEEN $min AND $max";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->bindParam(':tahun_anggaran',$tahun_anggaran,PDO::PARAM_STR);
			$dataKegiatan = $command->queryAll($sql);
			$this->renderPartial('_triwulan',array('dataKegiatan'=>$dataKegiatan,
													'max'=>$max,'min'=>$min));
		} 
	}

	public function actionLihatPOKSemester($id=1){
		if(isset($_POST['tahun_anggaran'])){
			$tahun_anggaran = $_POST['tahun_anggaran'];
		} else $tahun_anggaran = date('Y');

		switch ($id) {
			case 1:
				$min = 1; $max = 6;
				break;
			case 2:
				$min = 7; $max = 12;
				break;
			default:
				$min = 1; $max = 6;
				break;
		}

		$sql = "SELECT kegiatan.id as id,
				kegiatan.kode_kegiatan as kode_kegiatan,
				kegiatan.nama_kegiatan as nama_kegiatan,
				kegiatan.bulan  as bulan
				FROM 
				kegiatan,layanan,program 
				WHERE 
				program.id = layanan.id_program 
				AND layanan.id = kegiatan.id_layanan 
				AND program.status = '1' 
				AND layanan.status = '1' 
				AND kegiatan.status = '1' 
				AND program.tahun_anggaran = :tahun_anggaran
				AND kegiatan.bulan BETWEEN $min AND $max";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$command->bindParam(':tahun_anggaran',$tahun_anggaran,PDO::PARAM_STR);
		$dataKegiatan = $command->queryAll();

		if(Yii::app()->request->isAjaxRequest){
			$this->renderPartial('_semester',array('dataKegiatan'=>$dataKegiatan,'max'=>$max,'min'=>$min));
		} else {
			$this->render('rencanapoksemester',array('dataKegiatan'=>$dataKegiatan,
												'max'=>$max,'min'=>$min,'id'=>$id,
												'tahun_anggaran'=>$tahun_anggaran));
		}
	}
	
	public function actionKelolaJadwal(){
		$dataKegiatan = "";
		$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
		
		if(Yii::app()->request->isAjaxRequest){
			$dataKegiatan = Kegiatan::model()->findAll("id_layanan=:id AND status = 1",array(':id'=>$_POST['id_layanan']));
			$this->renderPartial('_kelolaJadwal',array('dataKegiatan'=>$dataKegiatan));
		} else {
			$this->render('KelolaJadwal',array('dataKegiatan'=>$dataKegiatan,
											'dataProgram'=>$dataProgram));
		}
	}

	public function actionSearchByCode(){
		if(Yii::app()->request->isAjaxRequest){
			$dataKegiatan = Kegiatan::model()->findAll("nama_kegiatan LIKE :nama_kegiatan AND status = 1",array(':nama_kegiatan'=>'%'.$_POST['nama_kegiatan'].'%'));
			$this->renderPartial('_kelolaJadwal',array('dataKegiatan'=>$dataKegiatan));
		} else {
			$this->redirect(array('/errPage/errDB'));
		}
	}

	public function actionGetModalKegiatan(){
		$dataKegiatan = Kegiatan::model()->find('id=:id',array(':id'=>$_POST['id_kegiatan']));
		$this->renderPartial('_modalKegiatan',array('dataKegiatan'=>$dataKegiatan),false,false);
	}

	public function actionSimpanJadwal(){
		// echo date('m',strtotime($_POST['tanggal']));
		$kegiatan = Kegiatan::model()->find('id=:id',array(':id'=>$_POST['id_kegiatan']));
		$backup = $this->updateTheKegiatan($kegiatan);
		
		$sql = "UPDATE kegiatan SET bulan=:bulan, tanggal=:tanggal WHERE id=:id";
		$conn = Yii::app()->db;
		$cmd = $conn->createCommand($sql);
		$cmd->bindParam(':tanggal',$_POST['tanggal'],PDO::PARAM_STR);
		$cmd->bindParam(':bulan',date('m',strtotime($_POST['tanggal'])),PDO::PARAM_STR);
		$cmd->bindParam(':id',$_POST['id_kegiatan'],PDO::PARAM_STR);
		
		if($backup == 1 && $cmd->execute()){
			Yii::app()->user->setFlash("success","Operasi Update Berhasil !");
			$this->redirect(Yii::app()->request->urlReferrer);
		} else {
			Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
			$this->redirect(array('/errPage/errDB'));
		} 
	}

	public function actionGetProgram(){
		if(Yii::app()->request->isAjaxRequest){
			if($_POST){
				AlatUmum::setCookieTahun($_POST['tahun_anggaran']);
				$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran AND status = 1',array(':tahun_anggaran'=>$_POST['tahun_anggaran']));
				$this->renderPartial('_formprogram',array('dataProgram'=>$dataProgram));
			}
		}
	}

	public function actionGetLayanan(){
		if(Yii::app()->request->isAjaxRequest){
			if($_POST){
				$dataLayanan = Layanan::model()->findAll('id_program=:id AND status = 1',array(':id'=>$_POST['id_program']));
				$this->renderPartial('_formlayanan',array('dataLayanan'=>$dataLayanan));
			}
		}
	}


	public function actionAturAnggaran(){
		// $dataKegiatan = "";
		$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran AND status = 1',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
		
		if(Yii::app()->request->isAjaxRequest && isset($_POST['tahun_anggaran'])){
			AlatUmum::setCookieTahun($_POST['tahun_anggaran']);
			if(isset($_POST['nama_program'])) {
				$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran AND nama_program LIKE :nama_program AND status = 1',
					array(':tahun_anggaran' => AlatUmum::getCookieTahun(),
						':nama_program'=>'%'.$_POST['nama_program'].'%'));
			}
				else 
			$dataProgram = Program::model()->findAll('tahun_anggaran=:tahun_anggaran AND status = 1',array(':tahun_anggaran' => AlatUmum::getCookieTahun()));
			$this->renderPartial('_aturAnggaran-program',array('dataProgram'=>$dataProgram));
		} else {
			$this->render('AturAnggaran',array('dataProgram'=>$dataProgram));
		}
	}

	public function actionGetModalAnggaranProgram(){
		$dataProgram = Program::model()->find('id=:id',array(':id'=>$_POST['id_program']));
		$this->renderPartial('modal_atur_anggaran/_program',array('dataProgram'=>$dataProgram));
	}

	public function actionAturAnggaranLayanan($id){
		$dataLayanan = Layanan::model()->findAll('id_program=:id_program AND status = 1',array('id_program'=>$id));
		
		if(Yii::app()->request->isAjaxRequest && isset($_POST['nama_layanan'])){
			if(isset($_POST['nama_layanan'])) {
				$dataLayanan = Layanan::model()->findAll('nama_layanan LIKE :nama_layanan AND id_program =:id_program AND status = 1',
					array(':nama_layanan'=>'%'.$_POST['nama_layanan'].'%',
							':id_program'=>$id));
			}
			$this->renderPartial('_aturAnggaran-layanan',array('dataLayanan'=>$dataLayanan));
		} else {
			$this->render('AturAnggaranLayanan',array('dataLayanan'=>$dataLayanan,'id_program'=>$id));
		}
	}

	public function actionGetModalAnggaranLayanan(){
		$dataLayanan = Layanan::model()->find('id=:id',array(':id'=>$_POST['id_layanan']));
		$this->renderPartial('modal_atur_anggaran/_layanan',array('dataLayanan'=>$dataLayanan));
	}

	public function actionAturAnggaranKegiatan($id){
		$dataKegiatan = Kegiatan::model()->findAll('id_layanan=:id_layanan AND status = 1',array('id_layanan'=>$id));
		
		if(Yii::app()->request->isAjaxRequest && isset($_POST['nama_kegiatan'])){
			if(isset($_POST['nama_kegiatan'])) {
				$dataKegiatan = Kegiatan::model()->findAll('nama_kegiatan LIKE :nama_kegiatan AND id_layanan =:id_layanan AND status = 1',
					array(':nama_kegiatan'=>'%'.$_POST['nama_kegiatan'].'%',
							':id_layanan'=>$id));
			}
			$this->renderPartial('_aturAnggaran-kegiatan',array('dataKegiatan'=>$dataKegiatan));
		} else {
			$dataLayanan = Layanan::model()->find('id=:id',array(':id'=>$id));
			$this->render('AturAnggaranKegiatan',array('dataKegiatan'=>$dataKegiatan,
														'id_layanan'=>$id,
														'id_program'=>$dataLayanan->id_program));
		}
	}

	public function actionGetModalAnggaranKegiatan(){
		$dataSatuan = Satuan::model()->findAll('status=:status',array(":status"=>1));
		$dataSumberDana = SumberDana::model()->findAll('status=:status',array(":status"=>1));
		$dataPenanggungJawab = PenanggungJawab::model()->findAll('status=:status',array(":status"=>1));
		
		$dataKegiatan = Kegiatan::model()->find('id=:id',array(':id'=>$_POST['id_kegiatan']));
		$this->renderPartial('modal_atur_anggaran/_kegiatan',array('dataKegiatan'=>$dataKegiatan,
																	'dataSatuan'=>$dataSatuan,
																	'dataSumberDana'=>$dataSumberDana,
																	'dataPenanggungJawab'=>$dataPenanggungJawab));
	}

	public function actionUbahAnggaran($id){
		$sql = "";
		switch ($id) {
			case '1':
				$sql = "UPDATE program SET target = :target WHERE id=:id";
				$program = Program::model()->find('id=:id',array(':id'=>$_POST['id_program']));
				$backup = $this->updateTheProgram($program);
				$conn = Yii::app()->db;
				$cmd = $conn->createCommand($sql);
				$cmd->bindParam(':target',$_POST['nominal'],PDO::PARAM_STR);
				$cmd->bindParam(':id',$_POST['id_program'],PDO::PARAM_STR);
				break;
			case '2':
				$sql = "UPDATE layanan SET target = :target WHERE id=:id";
				$layanan = Layanan::model()->find('id=:id',array(':id'=>$_POST['id_layanan']));
				$backup = $this->updateTheLayanan($layanan);
				$conn = Yii::app()->db;
				$cmd = $conn->createCommand($sql);
				$cmd->bindParam(':target',$_POST['nominal'],PDO::PARAM_STR);
				$cmd->bindParam(':id',$_POST['id_layanan'],PDO::PARAM_STR);
				break;
			case '3':
				$sql = "UPDATE 
				kegiatan 
				SET 
				target = :target, 
				harga_satuan = :harga_satuan,
				volume = :volume,
				sumber_dana = :sumber_dana,
				penanggung_jawab = :penanggung_jawab
				WHERE id=:id";
				$kegiatan = Kegiatan::model()->find('id=:id',array(':id'=>$_POST['id_kegiatan']));
				$backup = $this->updateTheKegiatan($kegiatan);
				$conn = Yii::app()->db;
				$cmd = $conn->createCommand($sql);
				$cmd->bindParam(':target',$_POST['nominal'],PDO::PARAM_STR);
				$cmd->bindParam(':harga_satuan',$_POST['harga_satuan'],PDO::PARAM_STR);
				$cmd->bindParam(':id',$_POST['id_kegiatan'],PDO::PARAM_STR);
				$cmd->bindParam(':volume',$_POST['volume'],PDO::PARAM_STR);
				$cmd->bindParam(':sumber_dana',$_POST['sumber_dana'],PDO::PARAM_STR);
				$cmd->bindParam(':penanggung_jawab',$_POST['penanggung_jawab'],PDO::PARAM_STR);
				break;
		}
		if($backup == 1 && $cmd->execute()){
			Yii::app()->user->setFlash("success","Operasi Update Berhasil !");
			$this->redirect(Yii::app()->request->urlReferrer);
		} else {
			Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
			$this->redirect(array('/errPage/errDB'));
		}
	}

}