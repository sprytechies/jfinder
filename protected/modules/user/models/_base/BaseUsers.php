<?php

/**
 * This is the model base class for the table "users".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Users".
 *
 * Columns in table "users" available as properties of the model,
 * followed by relations of table "users" available as properties of the model.
 *
 * @property integer $idusers
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $cdate
 * @property string $mdate
 * @property string $activkey
 * @property integer $type
 * @property integer $status
 *
 * @property CompanyUsers[] $companyUsers
 * @property JobsApplied[] $jobsApplieds
 * @property UserEdu[] $userEdus
 * @property UserExp[] $userExps
 * @property UserProfile[] $userProfiles
 */
abstract class BaseUsers extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'users';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Users|Users', $n);
	}

	public static function representingColumn() {
		return 'username';
	}

	public function rules() {
		return array(
			array('type, status', 'numerical', 'integerOnly'=>true),
			array('username, email, password, activkey', 'length', 'max'=>128),
			array('cdate, mdate', 'safe'),
			array('username, email, password, cdate, mdate, activkey, type, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idusers, username, email, password, cdate, mdate, activkey, type, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'companyUsers' => array(self::HAS_MANY, 'CompanyUsers', 'idusers'),
			'jobsApplieds' => array(self::HAS_MANY, 'JobsApplied', 'idusers'),
			'userEdus' => array(self::HAS_MANY, 'UserEdu', 'idusers'),
			'userExps' => array(self::HAS_MANY, 'UserExp', 'idusers'),
			'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'idusers'),
                        'userProfiles0' => array(self::HAS_ONE, 'UserProfile', 'idusers'),
                        //'company' => array(self::HAS_ONE, 'UserProfile', 'idusers'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idusers' => Yii::t('app', 'Idusers'),
			'username' => Yii::t('app', 'Username'),
			'email' => Yii::t('app', 'Email'),
			'password' => Yii::t('app', 'Password'),
			'cdate' => Yii::t('app', 'Cdate'),
			'mdate' => Yii::t('app', 'Mdate'),
			'activkey' => Yii::t('app', 'Activkey'),
			'type' => Yii::t('app', 'Type'),
			'status' => Yii::t('app', 'Status'),
			'companyUsers' => null,
			'jobsApplieds' => null,
			'userEdus' => null,
			'userExps' => null,
			'userProfiles' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idusers', $this->idusers);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('cdate', $this->cdate, true);
		$criteria->compare('mdate', $this->mdate, true);
		$criteria->compare('activkey', $this->activkey, true);
		$criteria->compare('type', $this->type);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        public function searchNormal_User() {
		$criteria = new CDbCriteria;

		$criteria->compare('idusers', $this->idusers);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('cdate', $this->cdate, true);
		$criteria->compare('mdate', $this->mdate, true);
		$criteria->compare('activkey', $this->activkey, true);
		$criteria->compare('type', 1);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        public function searchComp_User() {
		$criteria = new CDbCriteria;

		$criteria->compare('idusers', $this->idusers);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('cdate', $this->cdate, true);
		$criteria->compare('mdate', $this->mdate, true);
		$criteria->compare('activkey', $this->activkey, true);
		$criteria->compare('type', 2);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}