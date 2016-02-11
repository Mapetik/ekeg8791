<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $nama
 * @property integer $level
 * @property integer $status
 * @property string $nip
 * @property string $tlp
 * @property string $unitbagian
 * @property integer $recoverable
 * @property string $username
 * @property string $password
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, level, status, nip, tlp, unitbagian, username, password', 'required'),
			array('level, status, recoverable', 'numerical', 'integerOnly'=>true),
			array('nama, username', 'length', 'max'=>32),
			array('nip, unitbagian', 'length', 'max'=>20),
			array('tlp', 'length', 'max'=>14),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, level, status, nip, tlp, unitbagian, recoverable, username, password', 'safe', 'on'=>'search'),
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
			'nama' => 'Nama',
			'level' => 'Level',
			'status' => 'Status',
			'nip' => 'Nip',
			'tlp' => 'Tlp',
			'unitbagian' => 'Unitbagian',
			'recoverable' => 'Recoverable',
			'username' => 'Username',
			'password' => 'Password',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('status',$this->status);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('tlp',$this->tlp,true);
		$criteria->compare('unitbagian',$this->unitbagian,true);
		$criteria->compare('recoverable',$this->recoverable);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}