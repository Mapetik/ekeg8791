<?php

/**
 * This is the model class for table "realisasi".
 *
 * The followings are the available columns in table 'realisasi':
 * @property integer $id
 * @property string $tanggal_input
 * @property string $id_kegiatan
 * @property integer $nominal
 * @property integer $bulan
 * @property integer $id_rekaman
 * @property string $versi
 * @property integer $recoverable
 */
class Realisasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Realisasi the static model class
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
		return 'realisasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_input, id_kegiatan, nominal, bulan, id_rekaman, versi', 'required'),
			array('nominal, bulan, id_rekaman, recoverable', 'numerical', 'integerOnly'=>true),
			array('id_kegiatan, versi', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tanggal_input, id_kegiatan, nominal, bulan, id_rekaman, versi, recoverable', 'safe', 'on'=>'search'),
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
			'kegiatan'=>array(self::BELONGS_TO,'Kegiatan','id_kegiatan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal_input' => 'Tanggal Input',
			'id_kegiatan' => 'Id Kegiatan',
			'nominal' => 'Nominal',
			'bulan' => 'Bulan',
			'id_rekaman' => 'Id Rekaman',
			'versi' => 'Versi',
			'recoverable' => 'Recoverable',
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
		$criteria->compare('tanggal_input',$this->tanggal_input,true);
		$criteria->compare('id_kegiatan',$this->id_kegiatan,true);
		$criteria->compare('nominal',$this->nominal);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('id_rekaman',$this->id_rekaman);
		$criteria->compare('versi',$this->versi,true);
		$criteria->compare('recoverable',$this->recoverable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}