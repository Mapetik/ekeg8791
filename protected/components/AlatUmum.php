<?php 
	class AlatUmum{
		//membuat function untuk format Uang
		public static function changeCurrency($value){
			$number = intval($value);
			return "Rp ".number_format($number,2,',','.');
		}

		public static function formatDecimal($value){
			$number = intval($value);
			return number_format($number,1,'.','');
			
		}

		public static function optListYears(){
			for ($i=date('Y')+5; $i > date('Y')-5; $i--) { 
				echo "<option value=\"$i\">$i</option>";
			}
		}

		public static function activeOptListYears($tahun_anggaran){
			$select_tahun = "";
			for ($i=date('Y')+5; $i > date('Y')-5; $i--) { 
				if ($i == $tahun_anggaran) $select_tahun = "selected=selected"; else $select_tahun = "";
				echo "<option value=\"$i\" $select_tahun >$i</option>";
			}
		}

		public static function optListMonth(){
			for ($i=1; $i < 13; $i++) { 
				echo "<option value=$i>".date('M',mktime(0,0,0,$i+1,0,0))."</option>";
			}
		}

		public static function activeOptListMonth($bulan){
			for ($i=1; $i < 13; $i++) { 
				if($i==$bulan) $select_bulan = "selected=selected"; else $select_bulan ="";
				echo "<option value=$i $select_bulan>".date('M',mktime(0,0,0,$i+1,0,0))."</option>";
			}
		}

		public static function setCookieTahun($tahun_anggaran){
			Yii::app()->request->cookies['tahun_anggaran'] = new CHttpCookie('tahun_anggaran', $tahun_anggaran);
		}
		public static function getCookieTahun(){
			if(isset(Yii::app()->request->cookies['tahun_anggaran']->value))
				return Yii::app()->request->cookies['tahun_anggaran']->value; else
			Yii::app()->request->cookies['tahun_anggaran'] = new CHttpCookie('tahun_anggaran', date('Y'));
		}
	}
	

 ?>