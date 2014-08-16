<?php

class ResultController extends Controller {

    /*
     *  Обработка переданных данных
     *  вывод результата
     */

    public function actionIndex(){

        $connection = Yii::app()->db;

        foreach(Yii::app()->session as $key=>$value) {
            unset(Yii::app()->session[''.$key.'']);
        }


        #### -- DATA PARAM --- ###
        #### -- Продать -> Строящаяся -> Квартира и Аппартаменты (Ф-1): 1 - 7 - 4(3)

        // Criteria Realty, Operation, Market
        $_POST['type_estate'] = 3; // Тип недвижимости: 4 - квартира 3 - аппартаменты 5 - дом
        $_POST['operations']  = 1; // Тип операции: 1 - продать 2 - арендовать
        $_POST['market']      = 7; // Рынок недвижимости: 6 - вторычный рынок 7 - строящиеся объекты

        $_POST['room']         = 3;    // кол-во комнат
        $_POST['general_area_from'] = 20;   // общая площадь min ++
        $_POST['general_area_to']   = 150;   // общая площадь max ++
        $_POST['price_of_m2_from']  = 2000;// стоимость за 1 м2 min ++
        $_POST['price_of_m2_to']    = 8000;// стоимость за 1 м2 max ++
        $_POST['price_from']        = 200000;// стоимость объекта min ++
        $_POST['price_to']          = 500000;// стоимость объекта max ++
        $_POST['currency']     = 2;    // валюта (1-руб, 2-доллар, 3-евро) ++
        $_POST['plan'][0]      = 1;    // студия - 2, своб.план - 1 +
        $_POST['plan'][1]      = 2;    // студия - 2, своб.план - 1 +
        //$_POST['level']        = 1;    // любой этаж +
        $_POST['level_from']   = 1;    // этаж квартиры от +
        $_POST['level_to']     = 10;   // этаж квартиры до +
        $_POST['level_last']   = 1;    // Не последний этаж +
        $_POST['level_first']  = 1;    // Кроме 1-го этажа (не первый) +
        $_POST['stage']        = 3;    // стадия строительства (1-нулевой цикл, 2-первые этажи, 3-средние этажи, 4-последние этажи, 5-отделка, 6-благоустройство, 7-выдача ключей +
        $_POST['window']       = 2;    // 1-двор  2-улица 3-двор +улица +
        $_POST['balcony']      = 1;    // 1-лоджия или балкон +
        $_POST['parking']      = 1;    // 1-паркинг +
        $_POST['place_cars']   = 1;    // 1-машиноместо +
        $_POST['covered_space']= 1;    // 1-закрытая (огражденная) територия
        $_POST['club_type']    = 1;    // 1-клубного типа
        $_POST['discount']     = 1;    // 1-акции и скидки
        $_POST['mortgage']     = 1;    // 1-для ипотеки
        $_POST['sanitare']     = 2;    // 1-раздельный 2-совмещенный 3-2+ санузла
        $_POST['create_data']  = '2014-08-14'; // Искать за (все время,сегодня,1 день,3 дня,неделя,месяц
        $_POST['deadline']     = 2017; // срок сдачи (н/р 2017)
        $_POST['developer']    = 'LTD House Big'; // застройщик
        $_POST['fz_214']       = 1;    // регистрация новостройки
        $_POST['finished']     = 1;    // с отделкой
        $_POST['photos']       = 1;    // 1-с фото, 0-отсутствие фото
        $_POST['floors']          = 15;   // этажность дома
        $_POST['city']            = 1;    // город
        $_POST['district']        = 7;    // округ
        $_POST['region']          = 11;   // регион
        $_POST['street']          = 1001; // улица
        $_POST['undeground']      = 9;    // метро
        $_POST['metro_time']      = 15;   // до метро
        $_POST['metro_way']       = 1;    // 1-пешком, 2-транспортом
        $_POST['class_home']      = 1;    // 1-эконом 2-бизнес 3-элитный
        $_POST['type_house']      = 1;    // 1-кирпичный 2-монолитный 3-монолитно-кирпичный 4-панельный 5-дерево 6-природный кемень
        $_POST['type_account']    = 1;    // 1-Собственник 2-Представитель собственника 3-Риелтор

        ### --- END --- ###



        //Сохраняем переданные параметры фильтра в сессии
        foreach($_POST as $key => $val) {
            Yii::app()->session[''.$key.''] = $val;
        }


        $condition = '';

        ### - BEGIN CONDITION SQL ---

        // Тип недвижимости +
        if(isset(Yii::app()->session['type_estate'])){
            $condition .= "r.type_estate = ".(int) Yii::app()->session['type_estate']."";
        }
        // Тип операции +
        if(isset(Yii::app()->session['operations'])){
            $condition .= " AND r.operations = ".(int) Yii::app()->session['operations']."";
        }
        // Тип рынка +
        if(isset(Yii::app()->session['market'])){
            $condition .= " AND r.market = ".(int) Yii::app()->session['market']."";
        }
        // Кол-во комнат +
        if(isset(Yii::app()->session['room'])){
            $condition .= " AND r.room = ".(int) Yii::app()->session['room']."";
        }
        // Валюта +
        if(isset(Yii::app()->session['currency'])){
            $condition .= " AND r.currency = ".(int) Yii::app()->session['currency']."";
        }

        // Общая площадь +
        if(!empty(Yii::app()->session['general_area_from']) || !empty(Yii::app()->session['general_area_to']))
        {
            if(!empty(Yii::app()->session['general_area_from']) && !empty(Yii::app()->session['general_area_to']))
            {
                $general_area_from   = intval(Yii::app()->session['general_area_from']);
                $general_area_to     = intval(Yii::app()->session['general_area_to']);
                $condition .= " AND r.general_area BETWEEN ".$general_area_from." AND ".$general_area_to."";
                //print 'general_area_from && general_area_to';
            }
            else if(!empty(Yii::app()->session['general_area_from']) && empty(Yii::app()->session['general_area_to']))
            {
                $general_area_from = intval(Yii::app()->session['general_area_from']);
                $condition .= " AND r.general_area >= ".$general_area_from."";
                //print 'general_area_from - '.$general_area_from;
            }
            if(empty(Yii::app()->session['general_area_from']) && !empty(Yii::app()->session['general_area_to']))
            {
                $general_area_to = intval(Yii::app()->session['general_area_to']);
                $condition .= " AND r.general_area <=".$general_area_to."";
                //print 'general_area_to';
            }
        }


        // Цена за 1м2 +
        if(!empty(Yii::app()->session['price_of_m2_from']) || !empty(Yii::app()->session['price_of_m2_to']))
        {
            if(!empty(Yii::app()->session['price_of_m2_from']) && !empty(Yii::app()->session['price_of_m2_to']))
            {
                $price_of_m2_from    = intval(Yii::app()->session['price_of_m2_from']);
                $price_of_m2_to      = intval(Yii::app()->session['price_of_m2_to']);
                $condition .= " AND r.price_of_m2 BETWEEN ".$price_of_m2_from." AND ".$price_of_m2_to."";
            }
            else if(!empty(Yii::app()->session['price_of_m2_from']) && empty(Yii::app()->session['price_of_m2_to']))
            {
                $price_of_m2_from = intval(Yii::app()->session['price_of_m2_from']);
                $condition .= " AND r.price_of_m2 >= ".$price_of_m2_from."";
            }
            if(empty(Yii::app()->session['price_of_m2_from']) && !empty(Yii::app()->session['price_of_m2_to']))
            {
                $price_of_m2_to = intval(Yii::app()->session['price_of_m2_to']);
                $condition .= " AND r.price_of_m2 <=".$price_of_m2_to."";
            }
        }


        // Цена за объект +
        if(!empty(Yii::app()->session['price_from']) || !empty(Yii::app()->session['price_to']))
        {
            if(!empty(Yii::app()->session['price_from']) && !empty(Yii::app()->session['price_to']))
            {
                $price_from    = intval(Yii::app()->session['price_from']);
                $price_to      = intval(Yii::app()->session['price_to']);
                $condition .= " AND r.price BETWEEN ".$price_from." AND ".$price_to."";
            }
            else if(!empty(Yii::app()->session['price_from']) && empty(Yii::app()->session['price_to']))
            {
                $price_from = intval(Yii::app()->session['price_from']);
                $condition .= " AND r.price >= ".$price_from."";
            }
            if(empty(Yii::app()->session['price_from']) && !empty(Yii::app()->session['price_to']))
            {
                $price_to = intval(Yii::app()->session['price_to']);
                $condition .= " AND r.price <=".$price_to."";
            }
        }

        // Свободная планировка, студия
        if(isset(Yii::app()->session['plan'])) {

            $plan = '';
            foreach(Yii::app()->session['plan'] as $val_plan) {
                $plan .= trim($val_plan.',');
            }
            $plan = substr($plan,0,strlen($plan)-1);
            $condition .= " AND r.plan IN (".$plan.")";
        }

        // Окна +
        if(isset(Yii::app()->session['window'])){
            $condition .= " AND r.window = ".(int) Yii::app()->session['window']."";
        }

        // Балкон или лоджия +
        if(isset(Yii::app()->session['balcony'])){
            $condition .= " AND r.balcony = ".(int) Yii::app()->session['balcony']."";
        }

        // Паркинг +
        if(isset(Yii::app()->session['parking'])){
            $condition .= " AND r.parking = ".(int) Yii::app()->session['parking']."";
        }

        // Машиноместо +
        if(isset(Yii::app()->session['place_cars'])){
            $condition .= " AND r.place_cars = ".(int) Yii::app()->session['place_cars']."";
        }

        // Машиноместо +
        if(isset(Yii::app()->session['covered_space'])){
            $condition .= " AND r.covered_space = ".(int) Yii::app()->session['covered_space']."";
        }


        //ЭТАЖНОСТЬ КВАРТИРЫ
        if(!isset(Yii::app()->session['level']) && (
                !empty(Yii::app()->session['level_to']) ||
                !empty(Yii::app()->session['level_from']) ||
                isset(Yii::app()->session['level_last']) ||
                isset(Yii::app()->session['level_first'])))
        {

            // если отмечено в полях ДО - ОТ
            if(!empty(Yii::app()->session['level_to']) || !empty(Yii::app()->session['level_from']))
            {
                if(!empty(Yii::app()->session['level_to']) && !empty(Yii::app()->session['level_from']))
                {
                    $level_to   = intval(Yii::app()->session['level_to']);
                    $level_from = intval(Yii::app()->session['level_from']);
                    $condition .= " AND r.store BETWEEN ".$level_from." AND ".$level_to."";
                    //print 'level_to && level_from';
                }
                else if(!empty(Yii::app()->session['level_to']) && empty(Yii::app()->session['level_from']))
                {
                    $level_to   = intval(Yii::app()->session['level_to']);
                    $condition .= " AND r.store <= ".$level_to."";
                    //print 'level_to';
                }
                else if(empty(Yii::app()->session['level_to']) && !empty(Yii::app()->session['level_from']))
                {
                    $level_from   = intval(Yii::app()->session['level_from']);
                    $condition .= " AND r.store >= ".$level_from."";
                    //print 'level_from';
                }
            }
            else {
                // НЕ ПОСЛЕДНИЙ ЭТАЖ
                if(isset(Yii::app()->session['level_last']) && !isset(Yii::app()->session['level_first']))
                {
                    $condition .= " AND r.store < (SELECT MAX(store)
                                                   FROM real_estate
                                                   WHERE type_estate = ".(int) Yii::app()->session['type_estate']." AND
                                                         operations  = ".(int) Yii::app()->session['operations']."  AND
                                                         market      = ".(int) Yii::app()->session['market'].")";
                }
                //КРОМЕ 1-ГО ЭТАЖА
                else if(isset(Yii::app()->session['level_first']) && !isset(Yii::app()->session['level_last']))
                {
                    $condition .= " AND r.store > 1";
                }
                else {
                    $condition .= " AND r.store > 1 AND r.store < (SELECT MAX(store)
                                                                   FROM real_estate
                                                                   WHERE type_estate = ".(int) Yii::app()->session['type_estate']." AND
                                                                         operations  = ".(int) Yii::app()->session['operations']."  AND
                                                                         market      = ".(int) Yii::app()->session['market'].")";
                }
            }
        }


        #### -- Продать -> Строящаяся -> Квартира и Аппартаменты (Ф-1): 1 - 7 - 4(3)
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 4 || Yii::app()->session['type_estate'] == 3)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 1) &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 7))
        {
          $sql = "SELECT
                    r.apart_id     AS apartID,
                    r.type_estate  AS typeEstate,
                    r.operations   AS operations,
                    r.market       AS market,
                    r.room         AS room,
                    r.general_area AS generalArea,
                    r.human_area   AS humanArea,
                    r.kitchen_area AS kitchenArea,
                    r.price_of_m2  AS priceM2,
                    r.price        AS price,
                    r.create_data  AS createData,
                    r.store        AS store,
                    r.deadline     AS deadline,
                    r.photos       AS photos,
                    r.window       AS window,
                    r.balcony      AS balcony,
                    r.parking      AS parking,
                    r.place_cars   AS placeCars,
                    r.covered_space AS coveredSpace,

                    h.id           AS houseID,
                    h.house_number AS houseNumber,
                    h.floors       AS floors,

                    u.uid          AS userID,
                    u.sub_email    AS email,
                    u.last_name    AS lastName,
                    u.phone        AS phone,

                    stage.name     AS stageName,
                    currency.name  AS currencyName,
                    thouse.name    AS typeHouse,
                    city.name      AS cityName,
                    street.name    AS streetName


              FROM real_estate AS r
              INNER JOIN s_house AS h            ON h.id = r.fk_house_id
              INNER JOIN users AS u              ON r.fk_uid = u.uid
              INNER JOIN s_currency AS currency  ON r.currency = currency.id
              INNER JOIN s_stage  AS stage       ON r.stage = stage.id
              INNER JOIN s_type_house AS thouse  ON h.type_house = thouse.id
              INNER JOIN s_city  AS city         ON h.city = city.id
              INNER JOIN s_street  AS street     ON h.street = street.id

              WHERE ".$condition."
              ORDER BY r.apart_id DESC";

        }

        //
        // window.name    AS windowName
        //
        // INNER JOIN s_window AS window     ON r.window = window.id

        #### --- Продать -> Вторичная -> Дом (Ф-2): 1 - 6 - 5
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 5)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 1)   &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
        }


        #### --- Продать -> Вторичная -> Квартира и Аппартаменты (Ф-3): 1 - 6 - 4(3)
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 4 || Yii::app()->session['type_estate'] == 3)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 1) &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
        }



        #### --- Аренда -> Вторичная -> Квартира и Аппартаменты (Ф-4): 2 - 6 - 4(3)
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 4 || Yii::app()->session['type_estate'] == 3)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 2) &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
        }


        #### --- Аренда -> Вторичная -> Дом (Ф-5): 2 - 6 - 5
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 5)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 2)   &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
        }




        $count=$connection->createCommand("SELECT COUNT(r.apart_id) FROM real_estate AS r WHERE ".$condition."")->queryScalar();
        $dataProvider = new CSqlDataProvider($sql, array(
            'keyField'=>'apartID',
            'totalItemCount'=>$count,
            'sort'=>array(
                //'attributes'=>array('price','brend'),
                //'defaultOrder'=>'price ASC',
            ),
            'pagination'=>array(
                'pageSize'=>5,
            ),
        ));

        //echo '<pre>';
        //print_r($_SESSION);
        //echo '</pre>';



        $this->render('index',array(
            'dataProvider'=>!empty($dataProvider)?$dataProvider:null,
        ));
    }

} 