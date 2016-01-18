<?php 
class Kategori extends CActiveRecord{
	public static function model($className=__CLASS__)	{
		return parent::model($className);
	}
	public function tableName(){
		return 'kategori';
	}

	public function attributeLabels(){
		return array(
			'id_kategori'=>'ID',
			'nama_kategori'=>'Nama Kategori',
			);
	}

	public function rules(){
		return array(
				array('nama_kategori','required'),
				);
	}
	
} 
?>