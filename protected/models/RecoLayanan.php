<?php

/**
 * This is the model class for table "reco_layanan".
 *
 * The followings are the available columns in table 'reco_layanan':
 * @property integer $id
 * @property string $kode_layanan
 * @property integer $id_program
 * @property string $nama_layanan
 * @property string $target
 * @property integer $id_rekaman
 * @property integer $status
 * @property integer $id_layanan
 * @property string $waktu_update
 */
class RecoLayanan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RecoLayanan the static model class
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
		return 'reco_layanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_layanan, id_program, nama_layanan, target, id_rekaman, id_layanan, waktu_update', 'required'),
			array('id_program, id_rekaman, status, id_layanan', 'numerical', 'integerOnly'=>true),
			array('kode_layanan', 'length', 'max'=>10),
			array('nama_layanan', 'length', 'max'=>200),
			array('target', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_layanan, id_program, nama_layanan, target, id_rekaman, status, id_layanan, waktu_update', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode_layanan' => 'Kode Layanan',
			'id_program' => 'Id Program',
			'nama_layanan' => 'Nama Layanan',
			'target' => 'Target',
			'id_rekaman' => 'Id Rekaman',
			'status' => 'Status',
			'id_layanan' => 'Id Layanan',
			'waktu_update' => 'Waktu Update',
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
		$criteria->compare('kode_layanan',$this->kode_layanan,true);
		$criteria->compare('id_program',$this->id_program);
		$criteria->compare('nama_layanan',$this->nama_layanan,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('id_rekaman',$this->id_rekaman);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_layanan',$this->id_layanan);
		$criteria->compare('waktu_update',$this->waktu_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}