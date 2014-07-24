<?php

/**
 * This is the model class for table "jobs_saved".
 *
 * The followings are the available columns in table 'jobs_saved':
 * @property integer $idsavedjob
 * @property integer $idjob
 * @property integer $iduser
 * @property string $cdate
 * @property string $mdate
 * @property string $note
 */
class JobsSaved extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jobs_saved';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idjobs, iduser, cdate, mdate', 'required'),
			array('idjobs, iduser', 'numerical', 'integerOnly'=>true),
			array('cdate, mdate', 'length', 'max'=>45),
			array('note', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idsavedjob, idjobs, iduser, cdate, mdate, note', 'safe', 'on'=>'search'),
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
			'idsavedjob' => 'Idsavedjob',
			'idjobs' => 'Idjobs',
			'iduser' => 'Iduser',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
			'note' => 'Note',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idsavedjob',$this->idsavedjob);
		$criteria->compare('idjob',$this->idjobs);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JobsSaved the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
