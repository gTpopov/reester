<?php

/**
 * This is the model class for table "s_house".
 *
 * The followings are the available columns in table 's_house':
 * @property string $id
 * @property string $house_number
 * @property string $structur
 * @property string $housing
 * @property string $name_complex
 * @property string $year_commis
 * @property string $floors
 * @property string $metro_time
 * @property string $metro_way
 * @property string $year_built
 * @property string $part_house
 * @property string $water
 * @property string $heating
 * @property string $gas
 * @property string $electricity
 * @property string $sewage
 * @property string $septic
 * @property string $plot
 * @property string $class_home
 * @property string $city
 * @property string $district
 * @property string $region
 * @property string $street
 * @property string $undeground
 * @property string $type_house
 */

class SHouse extends CActiveRecord
{

    // Scenario for _form 1 add objetc
    const SCENARIO_ADD_OBJECT_ONE   = 'addObjectOne';

    // Scenario for _form 2 add objetc
    const SCENARIO_ADD_OBJECT_TWO   = 'addObjectTwo';

    // Scenario for _form 3 add objetc
    const SCENARIO_ADD_OBJECT_THREE   = 'addObjectThree';

    // Scenario for _form 4 add objetc
    const SCENARIO_ADD_OBJECT_FOUR   = 'addObjectFour';

    // Scenario for _form 5 add objetc
    const SCENARIO_ADD_OBJECT_FIVE   = 'addObjectFive';

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SHouse the static model class
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
		return 's_house';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		return array(

            // ADD OBJECT FORM 1 ---
			array(
                'city, street, house_number, floors, type_house', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_ONE,
                'message' => '{attribute} не заполнен(а)'
            ),
            array(
                'metro_time',
                'numerical',
                'on'         =>  self::SCENARIO_ADD_OBJECT_ONE,
                'integerOnly'=> true,
                'message'    => '{attribute} должно быть числом'),

            // ADD OBJECT FORM 4 ---
            array(
                'city, street, house_number, floors, type_house', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_FOUR,
                'message' => '{attribute} не заполнен(а)'
            ),
            array(
                'metro_time', 'numerical',
                'on'         =>  self::SCENARIO_ADD_OBJECT_FOUR,
                'integerOnly'=> true,
                'message'    => '{attribute} должно быть числом'
            ),

            // ADD OBJECT FORM 5 ---
            array(
                'city, street, house_number, floors, type_house, plot', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_FIVE,
                'message' => '{attribute} не заполнен(а)'
            ),
            array(
                'metro_time',
                'numerical',
                'on'         =>  self::SCENARIO_ADD_OBJECT_FIVE,
                'integerOnly'=> true,
                'message'    => '{attribute} должно быть числом'
            ),

            // ADD OBJECT FORM 2 ---
            array(
                'city, street, house_number, floors, type_house', 'required',
                'on'      =>  self::SCENARIO_ADD_OBJECT_TWO,
                'message' => '{attribute} не заполнен(а)'
            ),
            array(
                'metro_time',
                'numerical',
                'on'         =>  self::SCENARIO_ADD_OBJECT_TWO,
                'integerOnly'=> true,
                'message'    => '{attribute} должно быть числом'),




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
			'house_number' => 'Дом №',
			'structur' => 'Строение',
			'housing' => 'Корпус',
			'name_complex' => 'Жилой комплекс',
			'year_commis' => 'Эксплуатация',
			'floors' => 'Этажность',
			'metro_time' => 'До метро',
			'metro_way' => 'Способ добраться до метро',
			'year_built' => 'Год постройки',
            'part_house' => 'Полдома',
            'water' => 'Вода',
            'heating' => 'Отопление',
            'gas' => 'Газ',
            'electricity' => 'Электричество',
            'sewage' => 'Канализация',
            'septic' => 'Септик',
            'plot' => 'Площадь участ.',
			'class_home' => 'Класс дома',
			'city' => 'Город',
			'district' => 'Округ',
			'region' => 'Район',
			'street' => 'Улица / проспект / площадь',
			'undeground' => 'Станция метро',
			'type_house' => 'Материал стен',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('house_number',$this->house_number,true);
		$criteria->compare('structur',$this->structur,true);
		$criteria->compare('housing',$this->housing,true);
		$criteria->compare('name_complex',$this->name_complex,true);
		$criteria->compare('year_commis',$this->year_commis,true);
		$criteria->compare('floors',$this->floors,true);
		$criteria->compare('metro_time',$this->metro_time,true);
		$criteria->compare('metro_way',$this->metro_way,true);
		$criteria->compare('year_built',$this->year_built,true);
        $criteria->compare('part_house',$this->part_house,true);
        $criteria->compare('water',$this->water,true);
        $criteria->compare('heating',$this->heating,true);
        $criteria->compare('gas',$this->gas,true);
        $criteria->compare('electricity',$this->electricity,true);
        $criteria->compare('sewage',$this->sewage,true);
        $criteria->compare('septic',$this->septic,true);
        $criteria->compare('plot',$this->plot,true);
		$criteria->compare('class_home',$this->class_home,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('undeground',$this->undeground,true);
		$criteria->compare('type_house',$this->type_house,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}