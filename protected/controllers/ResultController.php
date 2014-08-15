<?php

class ResultController extends Controller {

    /*
     *  Обработка переданных данных
     *  вывод результата
     */

    public function actionIndex(){

        $connection = Yii::app()->db;


        #### -- DATA PARAM --- ###
        #### -- Продать -> Строящаяся -> Квартира и Аппартаменты (Ф-1) ---

        $_POST['RealEstat']['room']         = 3;    // кол-во комнат
        $_POST['RealEstat']['general_area'] = 150;  // общая площадь
        $_POST['RealEstat']['currency']     = 2;    // валюта (1-руб, 2-долларб 3-евро)
        $_POST['RealEstat']['price_of_m2']  = 4550; // стоимость за 1 м2
        $_POST['RealEstat']['plan']         = 1;    // студия - 2, своб.план - 1
        $_POST['RealEstat']['store']        = 5;    // этаж квартиры или аппартаментов
        $_POST['RealEstat']['stage']        = 3;    // стадия строительства (1-нулевой цикл, 2-первые этажи, 3-средние этажи, 4-последние этажи, 5-отделка, 6-благоустройство, 7-выдача ключей
        $_POST['RealEstat']['window']       = 3;    // 1-двор  2-улица 3-двор +улица
        $_POST['RealEstat']['balcony']      = 1;    // 1-лоджия или балкон
        $_POST['RealEstat']['parking']      = 1;    // 1-паркинг
        $_POST['RealEstat']['place_cars']   = 1;    // 1-машиноместо
        $_POST['RealEstat']['covered_space']= 1;    // 1-закрытая (огражденная) територия
        $_POST['RealEstat']['club_type']    = 1;    // 1-клубного типа
        $_POST['RealEstat']['discount']     = 1;    // 1-акции и скидки
        $_POST['RealEstat']['mortgage']     = 1;    // 1-для ипотеки
        $_POST['RealEstat']['sanitare']     = 2;    // 1-раздельный 2-совмещенный 3-2+ санузла
        $_POST['RealEstat']['create_data']  = '2014-08-14'; // Искать за (все время,сегодня,1 день,3 дня,неделя,месяц

        $_POST['SHouse']['floors']          = 15;   // этажность дома
        $_POST['SHouse']['city']            = 1;    // город
        $_POST['SHouse']['district']        = 7;    // округ
        $_POST['SHouse']['region']          = 11;   // регион
        $_POST['SHouse']['street']          = 1001; // улица
        $_POST['SHouse']['undeground']      = 9;    // метро
        $_POST['SHouse']['metro_time']      = 15;   // до метро
        $_POST['SHouse']['metro_way']       = 1;    // 1-пешком, 2-транспортом





        ### --- END --- ###




        //Сохраняем переданные параметры фильтра в сессии
        foreach($_POST as $key => $val) {
            Yii::app()->session[''.$key.''] = $val;
        }

       //print Yii::app()->session['RealEstat']['room'];

        $condition = ''; //накапливаются критерии выборки


        $count=$connection->createCommand("SELECT COUNT(apart_id) FROM real_estate")->queryScalar();
        $sql="SELECT * FROM real_estate";

        $dataProvider = new CSqlDataProvider($sql, array(
            'keyField'=>'apart_id',
            'totalItemCount'=>$count,
            'sort'=>array(
                //'attributes'=>array('price','brend'),
                //'defaultOrder'=>'price ASC',
            ),
            'pagination'=>array(
                'pageSize'=>3,
            ),
        ));



        $this->render('index',array(
            'dataProvider'=>!empty($dataProvider)?$dataProvider:null,
        ));
    }

} 