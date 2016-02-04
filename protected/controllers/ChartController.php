<?php 
/**
* Chart Controller
*/
class ChartController extends Controller
{
	public $layout = "mainlayout";

	public function actionIndex(){
		$dataKegiatan = Kegiatan::model()->find('id=1');
		$bulan;
		$dataChart = array();
		$i = 1;
		foreach ($dataKegiatan->realisasi as $key) {
			// $dataChart[date('M',mktime(0,0,0,$i+1,0,0))] = $key->nominal;
			array_push($dataChart, $key->nominal);
			// print_r($dataChart[date('M',mktime(0,0,0,$i+1,0,0))]);
			$i++;
		}

		// print_r($dataChart);
        $this->render('index',array('dataChart'=>$dataChart));
	}

	public function actionHighChart(){
		// $dataKegiatan = Kegiatan::model()->find('id=1');
		// $dataLayanan = Layanan::model()->find('id=1');
		$dataLayanan = "";
		$dataKegiatan = "";
		$dataProgram = $dataTargetProgram = $dataSeluruh = "";
		for($i=1;$i<13;$i++){
			// array_push($dataLayanan, array(date('M',mktime(0,0,0,$i+1,0,0)) => DatabaseUmum::getRealisasiOnMonthFromLayanan('1',$i)));
			// $dataLayanan[date('M',mktime(0,0,0,$i+1,0,0))] = DatabaseUmum::getRealisasiOnMonthFromLayanan('1',$i);
			$dataKegiatan = $dataKegiatan.DatabaseUmum::getRealisasi('1',$i);
			$dataLayanan = $dataLayanan.DatabaseUmum::getRealisasiOnMonthFromLayanan('1',$i);
			$dataProgram = $dataProgram.DatabaseUmum::getRealisasiOnMonthFromProgram('1',$i);
			$dataSeluruh = $dataSeluruh.DatabaseUmum::getRealisasiOnMonth($i);
			$dataTargetProgram = $dataTargetProgram.DatabaseUmum::getTargetOnMonthFromProgram('1',$i);
			if($i+1!=13) {
				$dataLayanan = $dataLayanan.",";
				$dataKegiatan = $dataKegiatan.",";
				$dataProgram = $dataProgram.",";
				$dataSeluruh = $dataSeluruh.",";
				$dataTargetProgram = $dataTargetProgram.",";
			}
		}
		// print_r($dataProgram);
		// echo DatabaseUmum::getRealisasiOnMonthFromLayanan('1','1');
		//
		// $bulan;
		// $dataKegiatan = "";
		// $i = 1;
		// foreach ($dataKegiatan->realisasi as $key) {
		// 	$dataKegiatan = $dataKegiatan.$key->nominal;
		// 	if($i+1!=13) $dataLayanan = $dataLayanan.",";
		// }
		// $dataLayanan = "1,2,3,4,5,6,7,8,9,0,11,12";
		$this->render('HighChart',array(
										'data'=>$dataLayanan,
										'layanan'=>'layanan ID 1',
										'dataKegiatan'=>$dataKegiatan,
										'dataProgram'=>$dataProgram,
										'dataSeluruh'=>$dataSeluruh,
										'dataTargetProgram'=>$dataTargetProgram));
	}
}

 ?>