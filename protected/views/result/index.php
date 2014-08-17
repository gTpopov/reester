<?php



if(isset($dataProvider) && $act == 1) {


    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider,
        'enablePagination' => true,
        'emptyText'=>'Data empty',
        'summaryText' => "",
        'columns'=>array(
            array(
                'name'=>'apartID',
                'header'=> 'apartID',
                'value' => '$data["apartID"]',
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Характеристика',
                'value' => function($data,$row,$column){

                    $connection = Yii::app()->db;

                    switch($data["typeEstate"]) {
                         case 4 : $typeHouse = "квартира";     break;
                         case 3 : $typeHouse = "аппартаменты"; break;
                         default: $typeHouse = "дом";          break;
                    }
                    switch($data["operations"]) {
                        case 1 : $operations = "продать";    break;
                        case 2 : $operations = "арендовать"; break;
                    }
                    switch($data["market"]) {
                        case 6 : $market = "вторычный рынок";    break;
                        case 7 : $market = "строящиеся объекты"; break;
                    }
                    switch($data["window"]) {
                        case 1 : $window = "двор";         break;
                        case 2 : $window = "улица";        break;
                        case 3 : $window = "двор + улица"; break;
                        default: $window = "";             break;
                    }
                    switch($data["sanitare"]) {
                        case 1 : $sanitare = "раздельный";  break;
                        case 2 : $sanitare = "совмещенный"; break;
                        case 3 : $sanitare = " 2+ санузла"; break;
                        default: $sanitare = "";            break;
                    }
                    switch($data["metroWay"]) {
                        case 1 : $metroWay = "пешком";    break;
                        case 2 : $metroWay = "на машине"; break;
                    }
                    switch($data["classHome"]) {
                        case 1 : $classHome = "эконом";    break;
                        case 2 : $classHome = "бизнес";    break;
                        case 3 : $classHome = "элитный";   break;
                    }
                    switch($data["typeAccount"]) {
                        case 1 : $typeAccount = "собственник";    break;
                        case 2 : $typeAccount = "представитель собственника"; break;
                        case 3 : $typeAccount = "риелтор";   break;
                    }


                    $district = $connection->createCommand("
                        SELECT name FROM s_district WHERE fk_district = ".$data["district"]."")->queryRow();

                    $region = $connection->createCommand("
                        SELECT name FROM s_region WHERE id = ".$data["region"]."")->queryRow();

                    $undeground = $connection->createCommand("
                        SELECT name FROM s_undeground WHERE id = ".$data["undeground"]."")->queryRow();

                    $balcony   = ($data["balcony"]!=0)?'есть':'нет'; //балкон
                    $parking   = ($data["parking"]!=0)?'есть':'нет'; //паркинг
                    $placeCars = ($data["placeCars"]!=0)?'есть':'нет'; //машиноместо
                    $coveredSpace = ($data["coveredSpace"]!=0)?'есть':'нет'; //огороженая територия
                    $clubType  = ($data["clubType"]!=0)?'есть':'нет'; //клубный тип
                    $discount  = ($data["discount"]!=0)?'есть':'нет'; //акции и скидки
                    $mortgage  = ($data["mortgage"]!=0)?'есть':'нет'; // ипотека
                    $deadline  = ($data["deadline"]!=0)?$data["deadline"]:'нет'; // срок сдачи
                    $developer = ($data["developer"]!='0')?$data["developer"]:'нет'; // застройщик
                    $fz_214    = ($data["fz_214"]!=0)?'есть':'нет'; // регистрация нвостройки
                    $finished  = ($data["finished"]!=0)?'есть':'нет'; // с отделкой
                    $photos    = ($data["photos"]!=0)?'есть':'нет'; // с фото
                    $metroTime = ($data["metroTime"]!=0)?$data["metroTime"]:'нет'; // до метро


                    return "<b>Тип недвижимости:</b> ".$typeHouse."<br>".
                            "<b>Операция:</b> ".$operations."<br>".
                            "<b>Рынок:</b> ".$market."<br>".
                            "<b>Валюта:</b> ".$data["currencyName"]."<br>".
                            "<b>Кол-во комнат:</b> ".$data["room"]."<br>".
                            "<b>Общая площадь:</b> ".$data["generalArea"]."<br>".
                            "<b>Цена за м2:</b> ".$data["priceM2"]."<br>".
                            "<b>Цена объекта:</b> ".$data["price"]."<br>".
                            "<b>Тип стен:</b> ".$data["typeHouse"]."<br>".
                            "<b>Стадия строительства:</b> ".$data["stageName"]."<br>".
                            "<b>Email:</b> ".$data["email"]."<br>".
                            "<b>Имя:</b> ".$data["lastName"]."<br>".
                            "<b>Phone:</b> ".$data["phone"]."<br>".
                            "<b>Window:</b> ".$window."<br>".
                            "<b>Balcony:</b> ".$balcony."<br>".
                            "<b>Parking:</b> ".$parking."<br>".
                            "<b>Машиноместо:</b> ".$placeCars."<br>".
                            "<b>Закрытая територия:</b> ".$coveredSpace."<br>".
                            "<b>Клубный тип:</b> ".$clubType."<br>".
                            "<b>Акции и скидки:</b> ".$discount."<br>".
                            "<b>Ипотека:</b> ".$mortgage."<br>".
                            "<b>Санузел:</b> ".$sanitare."<br>".
                            "<b>Дата создания:</b> ".$data["createData"]."<br>".
                            "<b>Срок сдачи:</b> ".$deadline."<br>".
                            "<b>Застройщик:</b> ".$developer."<br>".
                            "<b>Fz_214:</b> ".$fz_214."<br>".
                            "<b>С отделкой:</b> ".$finished."<br>".
                            "<b>Photos:</b> ".$photos."<br>".

                            "<b>Этажность дома:</b> ".$data["floors"]."<br>".
                            "<b>Город:</b> ".$data["cityName"]."<br>".
                            "<b>Округ:</b> ".$district['name']."<br>".
                            "<b>Регион:</b> ".$region['name']."<br>".
                            "<b>Метро:</b> ".$undeground['name']."<br>".
                            "<b>До метро:</b> ".$metroTime." мин.<br>".
                            "<b>Как добраться до метро:</b> ".$metroWay."<br>".
                            "<b>Класс дома:</b> ".$classHome."<br>".
                            "<b>Тип аккаунта:</b> ".$typeAccount."<br>".
                            "<b>Street:</b> ".$data["streetName"]."<br>";

                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>500),
            ),
            array(
                'name'=>'userID',
                'header'=> 'userID',
                'value' => '$data["userID"]',
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>400),
            ),
        ),
        'pager' => array(
            'firstPageLabel'=>'начало',
            'prevPageLabel'=>'&larr;',
            'nextPageLabel'=>'&rarr;',
            'lastPageLabel'=>'&raquo;',
            'maxButtonCount'=>'3',
            'header'=>'',
            'cssFile'=>false,
        ),
        'pagerCssClass'=>'pagination',
    ));
}
else if(isset($dataProvider) && $act == 2) {

    // Новый виджет для формы 2
    print 2;
}
else if(isset($dataProvider) && $act == 3) {

    // Новый виджет для формы 3
    print 3;
}
else if(isset($dataProvider) && $act == 4) {

    // Новый виджет для формы 4
    print 4;

}
else  {

    // Новый виджет для формы 5
    print 5;
}











