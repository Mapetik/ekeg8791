<?php

class DownloadRekapController extends Controller
{
	public $layout = "mainlayout";
	/**
	 * Declares defualt home for index
	 */
	public function actionIndex()
	{	
		
		$this->render("index");
	}

	public function actionPreview(){
		
	}

	public function actionDownloadV1(){
		if(isset($_POST['tahun_anggaran'])) $tahun_anggaran = $_POST['tahun_anggaran']; 
		else $tahun_anggaran = '2015';
		$dataProgram = Program::model()->findAll('status=:status AND tahun_anggaran=:tahun_anggaran',array(':status'=>'1',':tahun_anggaran'=>$tahun_anggaran));
		Yii::import('ext.PHPExcel.Classes.PHPExcel');
		$objPHPExcel = new PHPExcel;

		$objPHPExcel->getProperties()->setCreator("PPS Universitas Negeri Semarang")
                             ->setLastModifiedBy("TIM Web E-POK PPS UNNES")
                             ->setTitle("Rekap Kegiatan PPS UNNES Tahun $tahun_anggaran");

        // SET THE HEADER DOCUMENT
        for ($m=0; $m < 12; $m++) { 
        	// SET THE HEADER DOCUMENT
        	$month = date('Y');
        	$objPHPExcel->createSheet($m);
        	$objPHPExcel->setActiveSheetIndex($m)->setTitle(date('M',mktime(0,0,0,$m+2,0,0)));
        	// Header Document
        	$objPHPExcel->setActiveSheetIndex($m)
			->mergeCells('A1:L1')
			->mergeCells('A2:L2')
			->mergeCells('A3:L3')
			->mergeCells('A4:L4')
		    ->setCellValue('A1', 'LAPORAN REALISASI ALOKASI PENGGUNAAN ANGGARAN')
		    ->setCellValue('A2', 'PROGRAM PASCASARJANA UNNES')
		    ->setCellValue('A3', 'TAHUN ANGGARAN 2015')
		    ->setCellValue('D2', 'world!');
		    $objPHPExcel->getActiveSheet()->getStyle('A1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		    $objPHPExcel->getActiveSheet()->getStyle('A1:L6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		    $objPHPExcel->getActiveSheet()->getStyle('A1:L6')->getAlignment()->setWrapText(true);


		    //Header Table
		    $objPHPExcel->setActiveSheetIndex($m)
		    ->mergeCells('A6:A7')
		    ->mergeCells('B6:B7')
		    ->mergeCells('C6:G6')
		    ->mergeCells('H6:H7')
		    ->mergeCells('I6:I7')
		    ->mergeCells('J6:J7')
		    ->mergeCells('K6:K7')
		    ->mergeCells('L6:L7')
		    ->setCellValue('A6','Kode')
		    ->setCellValue('B6','Uraian Unit/Program/Kegiatan/Output/Akun Belanja/Detil Belanja')
		    ->setCellValue('C6','TA 2015')
		    ->setCellValue('C7','Volume')
		    ->setCellValue('D7','Satuan')
		    ->setCellValue('E7','Harga Satuan')
		    ->setCellValue('F7','Target')
		    ->setCellValue('G7','SD')
		    ->setCellValue('H6','Bulan')
		    ->setCellValue('I6','Realisasi s.d Bulan Ini')
		    ->setCellValue('J6','Saldo')
		    ->setCellValue('K6','%')
		    ->setCellValue('L6','Penanggung Jawab');

		    $i = 9;
	        foreach ($dataProgram as $key) {
	        	$realisasiProgram = DatabaseUmum::getRealisasiOnMonthFromProgram($key->id,$m);
	        	$realisasiProgramUntilMonth = DatabaseUmum::getRealisasiUntilMonthFromProgram($key->id,$m);
	        	$objPHPExcel->getActiveSheet()
			    ->setCellValue("A$i",$key->kode_program)
			    ->setCellValue("B$i",$key->nama_program)
			    ->setCellValue("C$i","-")
			    ->setCellValue("D$i","-")
			    ->setCellValue("E$i","-")
			    ->setCellValue("F$i",$key->target)
			    ->setCellValue("G$i","-")
			    ->setCellValue("H$i",$realisasiProgram)
			    ->setCellValue("I$i",$realisasiProgramUntilMonth)
			    ->setCellValue("J$i","=F$i-I$i")
			    ->setCellValue("K$i","=I$i/F$i * 100");
			    $i++;
			    foreach ($key->layanan as $key2) {
			    	$realisasiLayanan = DatabaseUmum::getRealisasiOnMonthFromLayanan($key->id,$m);
	        		$realisasiLayananUntilMonth = DatabaseUmum::getRealisasiUntilMonthFromLayanan($key->id,$m);
			    	$objPHPExcel->getActiveSheet()
			    	->setCellValue("A$i",$key2->kode_layanan)
				    ->setCellValue("B$i",$key2->nama_layanan)
				    ->setCellValue("C$i","-")
				    ->setCellValue("D$i","-")
				    ->setCellValue("E$i","-")
				    ->setCellValue("F$i",$key2->target)
				    ->setCellValue("G$i","-")
				    ->setCellValue("H$i",$realisasiLayanan)
				    ->setCellValue("I$i",$realisasiLayananUntilMonth)
				    ->setCellValue("K$i","%")
				    ->setCellValue("J$i","=F$i-I$i")
				    ->setCellValue("K$i","=I$i/F$i * 100");
				    $i++;
				     foreach ($key2->kegiatan as $key3) {
				     	$realisasi = DatabaseUmum::getRealisasi($key3->id,$m);
				     	$realisasiSampaiBulan = DatabaseUmum::getSumOfRealisasi($key3->id,$m);;
				    	$objPHPExcel->getActiveSheet()
				    	->setCellValue("A$i",$key3->kode_kegiatan)
					    ->setCellValue("B$i",$key3->nama_kegiatan)
					    ->setCellValue("C$i",$key3->volume)
					    ->setCellValue("D$i",$key3->satuan)
					    ->setCellValue("E$i",$key3->harga_satuan)
					    ->setCellValue("F$i",$key3->target)
					    ->setCellValue("G$i",$key3->SumberDana->nama)
					    ->setCellValue("H$i",$realisasi)
					    ->setCellValue("I$i",$realisasiSampaiBulan)
					    ->setCellValue("J$i","=F$i-I$i")
					    ->setCellValue("K$i","=I$i/F$i * 100")
					    ->setCellValue("L$i",$key3->PenanggungJawab->nama);

					    // $objPHPExcel->getActiveSheet()->getStyle("E$i")->getNumberFormat()->setFormatCode('_-Rp* #.##0_-;-Rp* #.##0_-;_-Rp* "-"_-;_-@_-');

					    $i++;
				    }
			    }
			    
	        }

	         $objPHPExcel->getActiveSheet()->getStyle('A6:L7')->applyFromArray(
			    array(
			        'fill' => array(
			            'type' => PHPExcel_Style_Fill::FILL_SOLID,
			            'color' => array('rgb' => '236A04'),
			        ),
			        'font' => array(
			        	'bold'=> true,
			        	'color' => array('rgb' => 'FFFFFF'),
			        )
			    )
			);	


	        // normalize all column width
	         $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("9.86");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("53.57");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth("12.75");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth("7.14");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("9.86");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth("12.71");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth("14.71");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth("16");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth("14.71");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth("8.43");
	        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth("24.29");
        }

	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="test.xls"');
	    header('Cache-Control: max-age=0');
	    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	    $objWriter->save('php://output');
	}

	public function actionDownloadV2(){
		if(isset($_POST['tahun_anggaran'])) $tahun_anggaran = $_POST['tahun_anggaran']; 
		else $tahun_anggaran = '2015';
		if(isset($_POST['bulan'])) $bulan = $_POST['bulan']; else $bulan = 12; 
		if(isset($_POST['pada'])) {
			$operasi = "=";
			$title = "Monitoring Kegiatan Sianggar $tahun_anggaran Pada Bulan $bulan";
		} else {
			$operasi = "<=";
			$title = "Monitoring Kegiatan Sianggar $tahun_anggaran Hingga Bulan ".date('F',mktime(0,0,0,$bulan +1,0,0))."";
		}
		// $dataProgram = Kegiatan::model()->findAll('status=:status AND tahun_anggaran=:tahun_anggaran',array(':status'=>'1',':tahun_anggaran'=>$tahun_anggaran));
		$sql = "SELECT kegiatan.nama_kegiatan as nama_kegiatan,
				kegiatan.target as target,
				realisasi.nominal as nominal
				FROM 
				kegiatan,layanan,program,realisasi 
				WHERE 
				program.id = layanan.id_program 
				AND layanan.id = kegiatan.id_layanan 
				AND program.status = '1' 
				AND layanan.status = '1' 
				AND kegiatan.status = '1' 
				AND kegiatan.id = realisasi.id_kegiatan 
				AND realisasi.bulan $operasi :bulan
				AND program.tahun_anggaran = :tahun_anggaran";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$command->bindParam(':tahun_anggaran',$tahun_anggaran,PDO::PARAM_STR);
		$command->bindParam(':bulan',$bulan,PDO::PARAM_STR);
		$dataKegiatan = $command->queryAll();

		Yii::import('ext.PHPExcel.Classes.PHPExcel');
		$objPHPExcel = new PHPExcel;

		$objPHPExcel->getProperties()->setCreator("PPS Universitas Negeri Semarang")
                             ->setLastModifiedBy("TIM Web E-POK PPS UNNES")
                             ->setTitle("Rekap Kegiatan PPS UNNES Tahun 2015");

        // SET THE HEADER DOCUMENT
        $objPHPExcel->createSheet(0);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()
        ->mergeCells('A1:E1')
        ->setCellValue('A1',$title)
        ->setCellValue('A3','No')
        ->setCellValue('B3','Rincian Detil Kegiatan')
        ->setCellValue('C3','Total Dana')
        ->setCellValue('D3','Realisasi(SPP)')
        ->setCellValue('E3','Saldo');
       	$objPHPExcel->getActiveSheet()->getStyle('A1:E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $objPHPExcel->getActiveSheet()->getStyle('A1:E3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	    $objPHPExcel->getActiveSheet()->getStyle('A1:E3')->getAlignment()->setWrapText(true);


        $i = 3;
        $num = 0;
        foreach ($dataKegiatan as $key) {
        	$i++;$num++;
        	$objPHPExcel->getActiveSheet()
	        ->setCellValue("A$i","$num")
	        ->setCellValue("B$i",$key['nama_kegiatan'])
	        ->setCellValue("C$i",$key['target'])
	        ->setCellValue("D$i",$key['nominal'])
	        ->setCellValue("E$i","=C$i-D$i");
        }


	    $objPHPExcel->getActiveSheet()->getStyle('A3:E3')->applyFromArray(
		    array(
		        'fill' => array(
		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
		            'color' => array('rgb' => '236A04'),
		        ),
		        'font' => array(
		        	'bold'=> true,
		        	'color' => array('rgb' => 'FFFFFF'),
		        )
		    )
		);	


	        // normalize all column width
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("4.71");
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("44.43");
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth("11.86");
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth("13.86");
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("13.14");
        

        // print_r( DatabaseUmum::getSumOfRealisasi('4','12'));
        

	   	// foreach (range('A,L', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
	    //     $objPHPExcel->getActiveSheet()
	    //             ->getColumnDimension($col);
	    //             // ->setAutoSize(true);
	    // } 

	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="test.xls"');
	    header('Cache-Control: max-age=0');
	    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	    $objWriter->save('php://output');
	}
	
}