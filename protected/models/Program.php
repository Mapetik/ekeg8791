<?php

/**
 * This is the model class for table "program".
 *
 * The followings are the available columns in table 'program':
 * @property integer $id
 * @property string $kode_program
 * @property string $nama_program
 * @property string $target
 * @property string $tahun_anggaran
 * @property integer $id_rekaman
 * @property integer $status
 */
class Program extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Program the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'program';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_program, nama_program, target, tahun_anggaran, id_rekaman', 'required'),
			array('id_rekaman, status', 'numerical', 'integerOnly'=>true),
			array('kode_program', 'length', 'max'=>10),
			array('nama_program', 'length', 'max'=>200),
			array('target', 'length', 'max'=>20),
			array('tahun_anggaran', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_program, nama_program, target, tahun_anggaran, id_rekaman, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'layanan'=>array(self::HAS_MANY,'Layanan','id_program'),
			'kegiatan'=>array(self::HAS_MANY,'Kegiatan',array('id_program'=>'id_layanan'),'through'=>'layanan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode_program' => 'Kode Program',
			'nama_program' => 'Nama Program',
			'target' => 'Target',
			'tahun_anggaran' => 'Tahun Anggaran',
			'id_rekaman' => 'Id Rekaman',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('kode_program',$this->kode_program,true);
		$criteria->compare('nama_program',$this->nama_program,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('tahun_anggaran',$this->tahun_anggaran,true);
		$criteria->compare('id_rekaman',$this->id_rekaman);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}