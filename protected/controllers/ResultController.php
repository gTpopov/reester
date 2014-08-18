<?php

class ResultController extends Controller {

    /*
     *  Обработка переданных данных
     *  вывод результата
     */

    public function actionIndex(){

        $connection = Yii::app()->db;

        // Clear session criteria
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
        //$_POST['level']        = 1;  // любой этаж +
        $_POST['level_from']   = 1;    // этаж квартиры от +
        $_POST['level_to']     = 15;   // этаж квартиры до +
        $_POST['level_last']   = 1;    // Не последний этаж +
        $_POST['level_first']  = 1;    // Кроме 1-го этажа (не первый) +
        $_POST['stage'][0]     = 1;    // стадия строительства (1-нулевой цикл, 2-первые этажи, 3-средние этажи, 4-последние этажи, 5-отделка, 6-благоустройство, 7-выдача ключей +
        $_POST['stage'][1]     = 2;
        $_POST['stage'][2]     = 3;
        $_POST['window'][0]    = 1;    // 1-двор  2-улица 3-двор +улица +
        $_POST['window'][1]    = 2;
        $_POST['window'][2]    = 3;
        $_POST['balcony']      = 1;    // 1-лоджия или балкон +
        $_POST['parking']      = 1;    // 1-паркинг +
        $_POST['place_cars']   = 1;    // 1-машиноместо +
        $_POST['covered_space']= 1;    // 1-закрытая (огражденная) територия +
        $_POST['club_type']    = 1;    // 1-клубного типа +
        $_POST['discount']     = 1;    // 1-акции и скидки +
        $_POST['mortgage']     = 1;    // 1-для ипотеки +
        $_POST['sanitare'][0]  = 1;    // 1-раздельный 2-совмещенный 3-2+ санузла +
        $_POST['sanitare'][1]  = 2;
        $_POST['sanitare'][2]  = 3;
        $_POST['create_data']  = 4;    // Искать за (все время - 0, сегодня (1 день), 3 дня, неделя, месяц +
        $_POST['deadline']     = 2017; // срок сдачи (н/р 2017) +
        $_POST['developer']    = 1;    // застройщик +
        $_POST['fz_214']       = 1;    // регистрация новостройки +
        $_POST['finished']     = 1;    // с отделкой +
        //$_POST['photos']       = 1;    // 1-с фото, 0-отсутствие фото +
        $_POST['city']            = 1;    // город +
        $_POST['district'][0]     = 98;   // округ +
        $_POST['district'][1]     = 97;
        $_POST['district'][2]     = 96;
        $_POST['region'][0]       = 73;   // регион +
        $_POST['region'][1]       = 74;
        $_POST['region'][2]       = 75;
        $_POST['region'][3]       = 18;
        $_POST['street'][0]       = 1001; // улица +
        $_POST['street'][1]       = 1800;
        $_POST['street'][2]       = 1801;
        $_POST['undeground'][0]   = 9;    // метро +
        $_POST['undeground'][1]   = 10;
        $_POST['undeground'][2]   = 11;
        $_POST['undeground'][3]   = 23;
        $_POST['metro_time']      = 15;   // до метро +
        $_POST['metro_way'][0]    = 1;    // 1-пешком, 2-транспортом +
        $_POST['metro_way'][1]    = 2;
        $_POST['class_home'][0]   = 1;    // 1-эконом 2-бизнес 3-элитный +
        $_POST['class_home'][1]   = 2;
        $_POST['class_home'][3]   = 3;
        $_POST['type_house'][0]   = 1;    // 1-кирпичный 2-монолитный 3-монолитно-кирпичный 4-панельный 5-дерево 6-природный кемень +
        $_POST['type_house'][1]   = 2;
        $_POST['type_house'][2]   = 3;
        $_POST['type_account'][0] = 1;    // 1-Собственник 2-Представитель собственника 3-Риелтор +
        $_POST['type_account'][2] = 2;
        $_POST['type_account'][3] = 3;

        ### --- END --- ###

        // Сохраняем переданные параметры фильтра в сессии
        foreach($_POST as $key => $val) {
            Yii::app()->session[''.$key.''] = $val;
        }

        //echo '<pre>';
        //print_r($_SESSION);
        //echo '</pre>';

        ### - BEGIN CONDITION SQL ---

        $condition = '';

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

        //ЭТАЖНОСТЬ КВАРТИРЫ
        if(!isset(Yii::app()->session['level']) && (
                !empty(Yii::app()->session['level_to'])   ||
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
                    $condition .= " AND r.store < h.floors";
                }
                //КРОМЕ 1-ГО ЭТАЖА
                else if(isset(Yii::app()->session['level_first']) && !isset(Yii::app()->session['level_last']))
                {
                    $condition .= " AND r.store > 1";
                }
                else {
                    $condition .= " AND r.store > 1 AND r.store < h.floors";
                }
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

            $window = '';
            foreach(Yii::app()->session['window'] as $val_window) {
                $window .= trim($val_window.',');
            }
            $window = substr($window,0,strlen($window)-1);
            $condition .= " AND r.window IN (".$window.")";

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

        // Огороженая територия +
        if(isset(Yii::app()->session['covered_space'])){
            $condition .= " AND r.covered_space = ".(int) Yii::app()->session['covered_space']."";
        }

        // Клубный тип +
        if(isset(Yii::app()->session['club_type'])){
            $condition .= " AND r.club_type = ".(int) Yii::app()->session['club_type']."";
        }

        // Акции и скидки +
        if(isset(Yii::app()->session['discount'])){
            $condition .= " AND r.discount = ".(int) Yii::app()->session['discount']."";
        }

        //  Ипотека +
        if(isset(Yii::app()->session['mortgage'])){
            $condition .= " AND r.mortgage = ".(int) Yii::app()->session['mortgage']."";
        }

        // Санузел
        if(isset(Yii::app()->session['sanitare'])) {

            $sanitare = '';
            foreach(Yii::app()->session['sanitare'] as $val_sanitare) {
                $sanitare .= trim($val_sanitare.',');
            }
            $sanitare = substr($sanitare,0,strlen($sanitare)-1);
            $condition .= " AND r.sanitare IN (".$sanitare.")";
        }

        // ИСКАТЬ ЗА ПЕРИОД +
        if(isset(Yii::app()->session['create_data']) && Yii::app()->session['create_data']!=0)
        {
            $data = intval(Yii::app()->session['create_data']);
            switch ($data)
            {
                case 1://за день (сегодня)
                    $period = 1;
                    break;
                case 2://за 3 дня
                    $period = 3;
                    break;
                case 3://за неделю
                    $period = 7;
                    break;
                case 4://за месяц
                    $period = 30;
                    break;
                default:$period = 30;
            }

            $condition .= ' AND r.create_data >=NOW()-INTERVAL '.$period.' DAY';
        }

        //  Срок сдачи +
        if(isset(Yii::app()->session['deadline'])){
            $condition .= " AND r.deadline = ".(int) Yii::app()->session['deadline']."";
        }

        //  Застройщик +
        if(isset(Yii::app()->session['developer'])){
            $condition .= " AND r.developer != '0'";
        }

        //  Регистрация нвостройки +
        if(isset(Yii::app()->session['fz_214'])){
            $condition .= " AND r.fz_214 = ".(int) Yii::app()->session['fz_214']."";
        }

        //  С отделкой +
        if(isset(Yii::app()->session['finished'])){
            $condition .= " AND r.finished = ".(int) Yii::app()->session['finished']."";
        }

        //  С фото +
        if(isset(Yii::app()->session['photos'])){
            $condition .= " AND r.photos = ".(int) Yii::app()->session['photos']."";
        }

        //  Этажность дома +
        if(isset(Yii::app()->session['floors'])){
            $condition .= " AND h.floors = ".(int) Yii::app()->session['floors']."";
        }

        //  Стадия строительства +
        if(isset(Yii::app()->session['stage'])){

            $stage_house = '';
            foreach(Yii::app()->session['stage'] as $val_stage)
            {
                $stage_house .= trim($val_stage.',');
            }
            $stage_house = substr($stage_house,0,strlen($stage_house)-1);
            $condition .= " AND r.stage IN (".$stage_house.")";
        }

        //  Округ +
        if(isset(Yii::app()->session['district'])){

            $district_house = '';
            foreach(Yii::app()->session['district'] as $val_district)
            {
                $district_house .= trim($val_district.',');
            }
            $district_house = substr($district_house,0,strlen($district_house)-1);
            $condition .= " AND h.district IN (".$district_house.")";
        }

        //  Регион +
        if(isset(Yii::app()->session['region'])){

            $region_house = '';
            foreach(Yii::app()->session['region'] as $val_region)
            {
                $region_house .= trim($val_region.',');
            }
            $region_house = substr($region_house,0,strlen($region_house)-1);
            $condition .= " AND h.region IN (".$region_house.")";

        }

        //  Метро +
        if(isset(Yii::app()->session['undeground'])){

            $metro_under = '';
            foreach(Yii::app()->session['undeground'] as $val_under)
            {
                $metro_under .= trim($val_under.',');
            }
            $metro_under = substr($metro_under,0,strlen($metro_under)-1);
            $condition .= " AND h.undeground IN (".$metro_under.")";

        }

        //  Улица +
        if(isset(Yii::app()->session['street'])){

            $list_street = '';
            foreach(Yii::app()->session['street'] as $val_street)
            {
                $list_street .= trim($val_street.',');
            }
            $list_street = substr($list_street,0,strlen($list_street)-1);
            $condition .= " AND h.street IN (".$list_street.")";

        }

        //  До метро +
        if(isset(Yii::app()->session['metro_time'])){

            $metro_to = intval(Yii::app()->session['metro_time']);
            $condition .= " AND h.metro_time <=".$metro_to."";
        }

        // Пешком или транспортом до метро
        if(isset(Yii::app()->session['metro_way'])) {

            $metro_way = '';
            foreach(Yii::app()->session['metro_way'] as $val_metro_way) {
                $metro_way .= trim($val_metro_way.',');
            }
            $metro_way = substr($metro_way,0,strlen($metro_way)-1);
            $condition .= " AND h.metro_way IN (".$metro_way.")";
        }


        // Класс дома
        if(isset(Yii::app()->session['class_home'])) {

            $class_home = '';
            foreach(Yii::app()->session['class_home'] as $val_class_home) {
                $class_home .= trim($val_class_home.',');
            }
            $class_home = substr($class_home,0,strlen($class_home)-1);
            $condition .= " AND h.class_home IN (".$class_home.")";
        }

        // Тип стен дома
        if(isset(Yii::app()->session['type_house'])) {

            $type_house = '';
            foreach(Yii::app()->session['type_house'] as $val_type_house) {
                $type_house .= trim($val_type_house.',');
            }
            $type_house = substr($type_house,0,strlen($type_house)-1);
            $condition .= " AND h.type_house IN (".$type_house.")";
        }


        // Тип желаемой учетной записи
        if(isset(Yii::app()->session['type_account'])) {

            $type_account = '';
            foreach(Yii::app()->session['type_account'] as $val_type_account) {
                $type_account .= trim($val_type_account.',');
            }
            $type_account = substr($type_account,0,strlen($type_account)-1);
            $condition .= " AND u.type_account IN (".$type_account.")";
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
                    r.club_type    AS clubType,
                    r.discount     AS discount,
                    r.mortgage     AS mortgage,
                    r.sanitare     AS sanitare,
                    r.create_data  AS createData,
                    r.deadline     AS deadline,
                    r.developer    AS developer,
                    r.fz_214       AS fz_214,
                    r.finished     AS finished,
                    r.photos       AS photos,
                    r.stage        AS stageName,
                    h.id           AS houseID,
                    h.house_number AS houseNumber,
                    h.floors       AS floors,
                    h.district     AS district,
                    h.region       AS region,
                    h.undeground   AS undeground,
                    h.metro_time   AS metroTime,
                    h.metro_way    AS metroWay,
                    h.class_home   AS classHome,
                    h.type_house   AS typeWall,
                    u.uid          AS userID,
                    u.sub_email    AS email,
                    u.last_name    AS lastName,
                    u.phone        AS phone,
                    u.type_account AS typeAccount,
                    currency.name  AS currencyName,
                    city.name      AS cityName,
                    street.name    AS streetName
              FROM real_estate AS r
              INNER JOIN s_house AS h            ON h.id = r.fk_house_id
              INNER JOIN users AS u              ON r.fk_uid = u.uid
              INNER JOIN s_currency AS currency  ON r.currency = currency.id
              INNER JOIN s_city  AS city         ON h.city = city.id
              INNER JOIN s_street  AS street     ON h.street = street.id
              WHERE ".$condition."
              ORDER BY r.apart_id DESC";

            $act = 1; // признак выбора виджета

        }


        #### --- Продать -> Вторичная -> Дом (Ф-2): 1 - 6 - 5
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 5)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 1)   &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
            $sql = "SELECT * FROM real_estate";

            $act = 2; // признак выбора виджета
        }


        #### --- Продать -> Вторичная -> Квартира и Аппартаменты (Ф-3): 1 - 6 - 4(3)
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 4 || Yii::app()->session['type_estate'] == 3)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 1) &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
            $sql = "SELECT * FROM real_estate";

            $act = 3; // признак выбора виджета
        }



        #### --- Аренда -> Вторичная -> Квартира и Аппартаменты (Ф-4): 2 - 6 - 4(3)
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 4 || Yii::app()->session['type_estate'] == 3)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 2) &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
            $sql = "SELECT * FROM real_estate";

            $act = 4; // признак выбора виджета
        }


        #### --- Аренда -> Вторичная -> Дом (Ф-5): 2 - 6 - 5
        if((isset(Yii::app()->session['type_estate']) && (Yii::app()->session['type_estate'] == 5)) &&
           (isset(Yii::app()->session['operations'])  &&  Yii::app()->session['operations'] == 2)   &&
           (isset(Yii::app()->session['market'])      &&  Yii::app()->session['market'] == 6))
        {
            // Новый SQL запрос
            $sql = "SELECT * FROM real_estate";

            $act = 5; // признак выбора виджета
        }


        $count=$connection->createCommand("SELECT COUNT(r.apart_id)
                                           FROM real_estate AS r
                                           INNER JOIN s_house AS h ON h.id = r.fk_house_id
                                           INNER JOIN users AS u   ON r.fk_uid = u.uid
                                           WHERE ".$condition."")->queryScalar();

        $dataProvider = new CSqlDataProvider($sql, array(
            'keyField'=>'apartID',
            'totalItemCount'=>$count,
            'sort'=>array(
                //'attributes'=>array('price','brend'),
                //'defaultOrder'=>'price ASC',
            ),
            'pagination'=>array(
                'pageSize'=>2,
            ),
        ));

        $this->render('index',array(
            'dataProvider'=>!empty($dataProvider)?$dataProvider:null,
            'act' => $act,

        ));
    }

} 