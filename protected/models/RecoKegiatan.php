<?php

/**
 * This is the model class for table "reco_kegiatan".
 *
 * The followings are the available columns in table 'reco_kegiatan':
 * @property integer $id
 * @property string $kode_kegiatan
 * @property integer $id_layanan
 * @property string $nama_kegiatan
 * @property integer $target
 * @property integer $volume
 * @property integer $harga_satuan
 * @property string $satuan
 * @property string $sumber_dana
 * @property string $penanggung_jawab
 * @property integer $id_rekaman
 * @property integer $status
 * @property integer $bulan
 * @property integer $id_kegiatan
 * @property string $waktu_update
 */
class RecoKegiatan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RecoKegiatan the static model class
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
		return 'reco_kegiatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_kegiatan, id_layanan, nama_kegiatan, target, volume, harga_satuan, satuan, sumber_dana, penanggung_jawab, id_rekaman, id_kegiatan, waktu_update', 'required'),
			array('id_layanan, target, volume, harga_satuan, id_rekaman, status, bulan, id_kegiatan', 'numerical', 'integerOnly'=>true),
			array('kode_kegiatan', 'length', 'max'=>10),
			array('nama_kegiatan', 'length', 'max'=>200),
			array('satuan, sumber_dana', 'length', 'max'=>20),
			array('penanggung_jawab', 'length', 'max'=>70),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_kegiatan, id_layanan, nama_kegiatan, target, volume, harga_satuan, satuan, sumber_dana, penanggung_jawab, id_rekaman, status, bulan, id_kegiatan, waktu_update', 'safe', 'on'=>'search'),
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
			'kode_kegiatan' => 'Kode Kegiatan',
			'id_layanan' => 'Id Layanan',
			'nama_kegiatan' => 'Nama Kegiatan',
			'target' => 'Target',
			'volume' => 'Volume',
			'harga_satuan' => 'Harga Satuan',
			'satuan' => 'Satuan',
			'sumber_dana' => 'Sumber Dana',
			'penanggung_jawab' => 'Penanggung Jawab',
			'id_rekaman' => 'Id Rekaman',
			'status' => 'Status',
			'bulan' => 'Bulan',
			'id_kegiatan' => 'Id Kegiatan',
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
		$criteria->compare('kode_kegiatan',$this->kode_kegiatan,true);
		$criteria->compare('id_layanan',$this->id_layanan);
		$criteria->compare('nama_kegiatan',$this->nama_kegiatan,true);
		$criteria->compare('target',$this->target);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('harga_satuan',$this->harga_satuan);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('sumber_dana',$this->sumber_dana,true);
		$criteria->compare('penanggung_jawab',$this->penanggung_jawab,true);
		$criteria->compare('id_rekaman',$this->id_rekaman);
		$criteria->compare('status',$this->status);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('id_kegiatan',$this->id_kegiatan);
		$criteria->compare('waktu_update',$this->waktu_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}