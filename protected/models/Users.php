<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $uid
 * @property string $last_name
 * @property string $first_name
 * @property string $company
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $call_with
 * @property string $call_up
 * @property string $sub_email
 * @property string $skype
 * @property string $sign_datetime
 * @property string $role
 * @property string $vk
 * @property string $fb
 * @property string $tw
 * @property string $gp
 * @property string $type_account
 * @property string $locking_user
 * @property string $access_user
 *
 * The followings are the available model relations:
 * @property RealEstate[] $realEstates
 */
class Users extends CActiveRecord
{

    const SCENARIO_REGISTRATION       = 'registration';

    // Scenario for _form 1 add objetc
    const SCENARIO_ADD_OBJECT_ONE     = 'addObjectOne';

    // Scenario for _form 2 add objetc
    const SCENARIO_ADD_OBJECT_TWO     = 'addObjectTwo';

    // Scenario for _form 3 add objetc
    const SCENARIO_ADD_OBJECT_THREE   = 'addObjectThree';

    // Scenario for _form 4 add objetc
    const SCENARIO_ADD_OBJECT_FOUR    = 'addObjectFour';

    // Scenario for _form 5 add objetc
    const SCENARIO_ADD_OBJECT_FIVE    = 'addObjectFive';




	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(
                'first_name, email, password', 'required',
                'on'      =>  self::SCENARIO_REGISTRATION,
                'message' => '{attribute} не заполнен'
            ),
            array('email', 'unique',
                'on'      => self::SCENARIO_REGISTRATION,
                'message' => 'Этот {attribute} уже занят'
            ),
            array('email', 'email',
                'on'      => self::SCENARIO_REGISTRATION,
                'message' => '{attribute} содержит ошибку'
            ),
            array('password', 'length',
                'on'    => self::SCENARIO_REGISTRATION,
                'min'   => 7, 'max' => 32,
                'message' => '{attribute} должен состоять от 7 до 32 символов'
            ),
            // ADD OBJECT FORM 1,2,3,4,5 ---
            array(
                'last_name, phone', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_ONE,
                'message' => '{attribute} не указано'
            ),
            array(
                'sub_email', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_ONE,
                'message' => '{attribute} не заполнен'
            ),
            array('sub_email', 'email',
                'on'      => self::SCENARIO_ADD_OBJECT_ONE,
                'message' => '{attribute} содержит ошибку'
            ),










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
			'realEstates' => array(self::HAS_MANY, 'RealEstate', 'fk_uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
        return array(
            'uid' => 'Uid',
            'last_name' => 'контактное лицо',
            'first_name' => 'имя',
            'company' => 'компания',
            'email' => 'email',
            'password' => 'пароль',
            'phone' => 'контактный номер',
            'call_with'=>'звонить с',
            'call_up'=>'звонить до',
            'sub_email' => 'электропочта',
            'skype'=>'Skype аккаунт',
            'sign_datetime' => 'дата регистрации',
            'role' => 'Role',
            'vk' => 'Vk',
            'fb' => 'Fb',
            'tw' => 'Tw',
            'gp' => 'Gp',
            'type_account' => 'Тип учетной записи',
            'locking_user' => 'Locking User',
            'access_user' => 'Access User',
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

		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('call_with',$this->call_with,true);
		$criteria->compare('call_up',$this->call_up,true);
		$criteria->compare('sub_email',$this->sub_email,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('sign_datetime',$this->sign_datetime,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('vk',$this->vk,true);
		$criteria->compare('fb',$this->fb,true);
		$criteria->compare('tw',$this->tw,true);
		$criteria->compare('gp',$this->gp,true);
		$criteria->compare('type_account',$this->type_account,true);
		$criteria->compare('locking_user',$this->locking_user,true);
		$criteria->compare('access_user',$this->access_user,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /*
    public function beforeSave() {
        $this->password = md5('reester_2014'.$this->password);
        return parent::beforeSave();
    }*/
}