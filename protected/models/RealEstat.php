<?php

/**
 * This is the model class for table "real_estate".
 *
 * The followings are the available columns in table 'real_estate':
 * @property string $apart_id
 * @property string $type_estate
 * @property string $operations
 * @property string $market
 * @property string $room
 * @property string $general_area
 * @property string $human_area
 * @property string $kitchen_area
 * @property string $price
 * @property string price_of_m2
 * @property string $plan
 * @property string $store
 * @property string $balcony
 * @property string $place_cars
 * @property string $parking
 * @property string $covered_space
 * @property string $club_type
 * @property string $mortgage
 * @property string $discount
 * @property string $free_sale
 * @property string $photos
 * @property string $ownership
 * @property string $furniture
 * @property string $house_applian
 * @property string $temp_registry
 * @property string $multimedia
 * @property string $deadline
 * @property string $developer
 * @property string $isolated
 * @property string $fz_214
 * @property string $finished
 * @property string $cost_renting
 * @property string $create_data
 * @property string $add_info
 * @property string $currency
 * @property string $status
 * @property string $sanitare
 * @property string $window
 * @property string $period
 * @property string $lease
 * @property string $prepayment
 * @property string $stage
 * @property string $fk_uid
 * @property string $fk_house_id
 *
 * The followings are the available model relations:
 * @property Users $fkU
 */
class RealEstat extends CActiveRecord
{

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



    /** ---
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RealEstat the static model class
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
		return 'real_estate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		return array(

            // ADD OBJECT FORM 1 ---
			array('room, store, general_area, human_area, kitchen_area, deadline, stage, price', 'required',
                  'on'      =>  self::SCENARIO_ADD_OBJECT_ONE,
                  'message' => '{attribute} не указана'),
            array(
                'general_area, human_area, kitchen_area, price',
                'numerical',
                'integerOnly' => true,
                'on'          =>  self::SCENARIO_ADD_OBJECT_ONE,
                'message'     => '{attribute} должно быть числом'),


            // ADD OBJECT FORM 2 ---
            array('room, store, general_area, human_area, kitchen_area, status, stage, price', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_TWO,
                'message' => '{attribute} не указана'),
            array(
                'general_area, human_area, kitchen_area, price',
                'numerical',
                'integerOnly' => true,
                'on'          =>  self::SCENARIO_ADD_OBJECT_TWO,
                'message'     => '{attribute} должно быть числом'),


            // ADD OBJECT FORM 4 ---
            array('room, store, general_area, human_area, kitchen_area, price', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_FOUR,
                'message' => '{attribute} не указана'
            ),

            array(
                'general_area, human_area, kitchen_area, price',
                'numerical',
                'integerOnly' => true,
                'on'          =>  self::SCENARIO_ADD_OBJECT_FOUR,
                'message'     => '{attribute} должно быть числом'
            ),


            // ADD OBJECT FORM 5 ---
            array('room, store, general_area, human_area, kitchen_area, status, deadline, stage, price', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_FIVE,
                'message' => '{attribute} не указана'),
            array(
                'general_area, human_area, kitchen_area, price',
                'numerical',
                'integerOnly' => true,
                'on'          =>  self::SCENARIO_ADD_OBJECT_FIVE,
                'message'     => '{attribute} должно быть числом'),


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
			'fkU' => array(self::BELONGS_TO, 'Users', 'fk_uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'apart_id' => 'ID_apart',
			'type_estate' => 'Тип недвижимости',
			'operations' => 'Тип операции',
			'market' => 'Рынок недвижимости',
			'room' => 'Комнат',
			'general_area' => 'Общая площадь',
			'human_area' => 'Жилая площадь',
			'kitchen_area' => 'Площадь кухни',
			'price' => 'Цена за объект',
            'price_of_m2' => 'Цена за кв.м',
			'plan' => 'Планировка',
			'store' => 'Этаж',
			'balcony' => 'Балкон / Лоджия',
			'place_cars' => 'Машиноместо',
			'parking' => 'Паркинг',
			'covered_space' => 'Закрытая територия',
			'club_type' => 'Клубный тип',
			'mortgage' => 'Ипотека',
			'discount' => 'Акции и скидки',
			'free_sale' => 'Свободная продажа',
			'photos' => 'Фото',
			'ownership' => 'Собственность более 3-х лет',
			'furniture' => 'С мебелью',
			'house_applian' => 'С бытовой техникой',
			'temp_registry' => 'Регистрация',
			'multimedia' => 'Мультимедиа',
			'deadline' => 'Срок сдачи',
			'developer' => 'Застройщик',
            'isolated' => 'Изолированных',
			'fz_214' => 'ФЗ 214',
			'finished' => 'С отделкой',
            'cost_renting' => 'Стоимость аренды',
			'create_data' => 'Дата создания объявления',
			'add_info' => 'Дополнительная информация',
			'currency' => 'Валюта',
			'status' => 'Состояние',
			'sanitare' => 'Санузел',
			'window' => 'Располож. окон',
			'period' => 'На срок (для поиска)',
			'lease' => 'На срок',
			'prepayment' => 'Предоплата',
			'stage' => 'Стадия строит.',
			'fk_uid' => 'Fk Uid',
			'fk_house_id' => 'Fk House',
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

		$criteria->compare('apart_id',$this->apart_id,true);
		$criteria->compare('type_estate',$this->type_estate,true);
		$criteria->compare('operations',$this->operations,true);
		$criteria->compare('market',$this->market,true);
		$criteria->compare('room',$this->room,true);
		$criteria->compare('general_area',$this->general_area,true);
		$criteria->compare('human_area',$this->human_area,true);
		$criteria->compare('kitchen_area',$this->kitchen_area,true);
		$criteria->compare('price',$this->price,true);
        $criteria->compare('price_of_m2',$this->price_of_m2,true);
		$criteria->compare('plan',$this->plan,true);
		$criteria->compare('store',$this->store,true);
		$criteria->compare('balcony',$this->balcony,true);
		$criteria->compare('place_cars',$this->place_cars,true);
		$criteria->compare('parking',$this->parking,true);
		$criteria->compare('covered_space',$this->covered_space,true);
		$criteria->compare('club_type',$this->club_type,true);
		$criteria->compare('mortgage',$this->mortgage,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('free_sale',$this->free_sale,true);
		$criteria->compare('photos',$this->photos,true);
		$criteria->compare('ownership',$this->ownership,true);
		$criteria->compare('furniture',$this->furniture,true);
		$criteria->compare('house_applian',$this->house_applian,true);
		$criteria->compare('temp_registry',$this->temp_registry,true);
		$criteria->compare('multimedia',$this->multimedia,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('developer',$this->developer,true);
        $criteria->compare('isolated',$this->isolated,true);
		$criteria->compare('fz_214',$this->fz_214,true);
		$criteria->compare('finished',$this->finished,true);
        $criteria->compare('cost_renting',$this->cost_renting,true);
		$criteria->compare('create_data',$this->create_data,true);
		$criteria->compare('add_info',$this->add_info,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('sanitare',$this->sanitare,true);
		$criteria->compare('window',$this->window,true);
		$criteria->compare('period',$this->period,true);
		$criteria->compare('lease',$this->lease,true);
		$criteria->compare('prepayment',$this->prepayment,true);
		$criteria->compare('stage',$this->stage,true);
		$criteria->compare('fk_uid',$this->fk_uid,true);
		$criteria->compare('fk_house_id',$this->fk_house_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}