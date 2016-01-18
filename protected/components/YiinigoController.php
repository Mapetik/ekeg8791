<?php 
//class dengan nama YiinigoController extends Controller
class YiinigoController extends Controller{
	
	// ..... disinilah tempat kita membuat function

	//function untuk convert mata uang IDR
	public function idrCurency($val){
		return number_format($val,0,'','.');
	}

	/* function untuk create excel dengan parameter $fileName,
	 * $fileName akan bersifat sensitive case
	 */

	public function createExcel($fileName){
		/* tentukan mime/format data, dalam hal ini excel dan a
		 * dan akan melakukan force download
		 */
		header("content-type: application/vnd.ms-excel;
			charset=utf-8");

		//menentukan lampiran/file dan nama filenya
		header("content-Disposition:attachment;
			filename=$fileName.xls");
	}

	public function createWord($fileName){
		//tentukan mime/format data dalam hal ini word
		header("content-type:application/msword;charset=utf-8");

		//menentukan lampiran/file dengan nama filenya
		header("content-Disposition:attachment; filename=$fileName.doc");
	}
}
	
 ?>