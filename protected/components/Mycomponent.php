<?php 
	class Mycomponent{
		//membuat function untuk format tanggal
		public static function formatDate($param){
			//format tanggal ke tgl-namabln-thn
			return date('m-F-Y',strtotime($param));
		}

		//membuat function untuk format jam
		public function formatTime($param){
			//format jam ke format AM/PM
			return date("g:i:s A",strtotime($param));
		}
	}

 ?>