<?php

/**
 * This is the model class for table "job_messages".
 *
 * The followings are the available columns in table 'job_messages':
 * @property integer $idjobmessages
 * @property integer $fromto
 * @property string $message
 * @property string $cdate
 * @property string $mdate
 * @property integer $idjobsapplied
 */
class JobMessages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'job_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fromto, message, idjobsapplied', 'required'),
			array('fromto, idjobsapplied', 'numerical', 'integerOnly'=>true),
			array('cdate, mdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idjobmessages, fromto, message, cdate, mdate, idjobsapplied', 'safe', 'on'=>'search'),
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
			'idjobmessages' => 'Idjobmessages',
			'fromto' => 'Fromto',
			'message' => 'Message',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
			'idjobsapplied' => 'Idjobsapplied',
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

		$criteria->compare('idjobmessages',$this->idjobmessages);
		$criteria->compare('fromto',$this->fromto);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
		$criteria->compare('idjobsapplied',$this->idjobsapplied);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        function getMessages($applyid)
        {
            $reply_data=Yii::app()->db->createCommand()
                    ->select('message')
                    ->from('job_messages') 
                    ->where("idjobsapplied=$applyid")
                    ->order('cdate DESC')
                    ->queryAll(); 
            //print_r($reply_data);
            return $reply_data;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JobMessages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
