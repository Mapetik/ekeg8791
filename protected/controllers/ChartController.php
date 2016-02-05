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
		$dataLayanan = "";
		$dataKegiatan = "";
		$dataProgram = $dataTargetProgram = $dataSeluruh = "";
		for($i=1;$i<13;$i++){
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