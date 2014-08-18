<?php

function typeEstate($typeEstate){

    switch($typeEstate) {
        case 4 : $typeHouse = "квартира";     break;
        case 3 : $typeHouse = "аппартаменты"; break;
        default: $typeHouse = "дом";          break;
    }
    return $typeHouse;
}

function operations($operations){

    switch($operations) {
        case 1 : $operations = "продать";    break;
        case 2 : $operations = "арендовать"; break;
    }
    return $operations;
}

function market($market){

    switch($market) {
        case 6 : $market = "вторычный рынок";    break;
        case 7 : $market = "строящиеся объекты"; break;
    }
    return $market;
}

function window($window){

    switch($window) {
        case 1 : $window = "двор";         break;
        case 2 : $window = "улица";        break;
        case 3 : $window = "двор + улица"; break;
        default: $window = "";             break;
    }
    return $window;
}

function sanitare($sanitare){

    switch($sanitare) {
        case 1 : $sanitare = "раздельный";  break;
        case 2 : $sanitare = "совмещенный"; break;
        case 3 : $sanitare = " 2+ санузла"; break;
        default: $sanitare = "";            break;
    }
    return $sanitare;
}

function metroWay($metroWay){

    switch($metroWay) {
        case 1 : $metroWay = "пешком";    break;
        case 2 : $metroWay = "на машине"; break;
    }
    return $metroWay;
}

function classHome($classHome) {

    switch($classHome) {
        case 1 : $classHome = "эконом";    break;
        case 2 : $classHome = "бизнес";    break;
        case 3 : $classHome = "элитный";   break;
    }
    return $classHome;
}

function typeAccount($typeAccount){

    switch($typeAccount) {
        case 1 : $typeAccount = "собственник"; break;
        case 2 : $typeAccount = "представитель собственника"; break;
        case 3 : $typeAccount = "риелтор";     break;
    }
    return $typeAccount;
}

function stageName($stageName){

    switch($stageName) {
        case 1 : $stageName = "нулевой цикл";      break;
        case 2 : $stageName = "первые этажи";      break;
        case 3 : $stageName = "средние этажи";     break;
        case 4 : $stageName = "последние этажи";   break;
        case 5 : $stageName = "отделка";           break;
        case 6 : $stageName = "благоустройство";   break;
        case 7 : $stageName = "выдача ключей";     break;
    }
    return $stageName;
}

function typeWall($typeWall){

    switch($typeWall) {
        case 1 : $typeWall = "кирпичный";          break;
        case 2 : $typeWall = "монолитный";         break;
        case 3 : $typeWall = "монолитно-кирпичный";break;
        case 4 : $typeWall = "панельный";          break;
        case 5 : $typeWall = "дерево";             break;
        case 6 : $typeWall = "природный кемень";   break;
    }
    return $typeWall;
}

function district($district) {
    $district = Yii::app()->db->createCommand("SELECT name FROM s_district WHERE fk_district=".$district."")->queryRow();
    return $district['name'];
}

function region($region){
    $region = Yii::app()->db->createCommand("SELECT name FROM s_region WHERE id = ".$region."")->queryRow();
    return $region['name'];
}

function undeground($undeground){
    $undeground = Yii::app()->db->createCommand("SELECT name FROM s_undeground WHERE id = ".$undeground."")->queryRow();
    return $undeground['name'];
}

function photos($photos,$houseID) {
    if($photos!=0) {
        $img = Yii::app()->db->createCommand("SELECT source FROM s_images WHERE fk_house = ".$houseID."")->queryRow();
        if(file_exists('files/'.Yii::app()->user->id.'/'.$houseID.'/'.$img['source'].'')) {
            $photos = "<img width='50' src='/files/".Yii::app()->user->id."/".$houseID."/".$img['source']."'>";
        }
    } else {
            $photos = "<img width='50' src='/img/project-style/settings_img_additional_info.png'>";
    }
    return $photos;
}

function balcony($balcony)           { return ($balcony!=0)?'есть':'нет'; } //балкон
function parking($parking)           { return ($parking!=0)?'есть':'нет'; } //паркинг
function placeCars($placeCars)       { return ($placeCars!=0)?'есть':'нет'; } //машиноместо
function coveredSpace($coveredSpace) { return ($coveredSpace!=0)?'есть':'нет'; } //огороженая територия
function clubType($clubType)         { return ($clubType!=0)?'есть':'нет'; } //клубный тип
function discount($discount)         { return ($discount!=0)?'есть':'нет'; } //акции и скидки
function mortgage($mortgage)         { return ($mortgage!=0)?'есть':'нет'; } // ипотека
function deadline($deadline)         { return ($deadline!=0)?$deadline:'нет'; } // срок сдачи
function developer($developer)       { return ($developer!='')?$developer:'нет';} // застройщик
function fz_214($fz_214)             { return ($fz_214!=0)?'есть':'нет'; } // регистрация нвостройки
function finished($finished)         { return ($finished!=0)?'есть':'нет'; } // с отделкой
function metroTime($metroTime)       { return ($metroTime!=0)?$metroTime:'нет'; } // до метро





#### -- Продать -> Строящаяся -> Квартира и Аппартаменты (Ф-1): 1 - 7 - 4(3)
if(isset($dataProvider) && $act == 1) {

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider,
        'enablePagination' => true,
        'emptyText'=>'Data empty',
        'summaryText' => "",
        'columns'=>array(
            array(
                'name'=>'apartID',
                'header'=> 'ID',
                'value' => '$data["apartID"]',
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>20),
            ),
            array(
                'name'  => 'houseID',
                'header'=> 'Адрес объекта',
                'value' => function($data,$row,$column){
                        return "".photos($data["photos"],$data["houseID"])."<br>".
                                  $data["streetName"]."<br>".
                                  "р-н: ".region($data["region"])."<br>".
                                  "округ: ".district($data["district"])."<br>".
                                  "метро: ".undeground($data["undeground"])."<br>".
                                  "".metroTime($data["metroTime"])." мин. ".metroWay($data["metroWay"])."<br>".
                                  "город: ".$data["cityName"]."<br>".
                                  "Объявление размещено: ". implode('.',array_reverse(explode('-',$data["createData"])));
                },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>200),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Комнат',
                'value' => function($data,$row,$column){
                    return  $data["room"];
                },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Этаж',
                'value' => function($data,$row,$column){
                   return   $data["store"]."/".$data["floors"];
                },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Тип',
                'value' => function($data,$row,$column){
                        return   typeWall($data["typeWall"]);
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Общ., м2',
                'value' => function($data,$row,$column){
                        return   $data["generalArea"];
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Жил.',
                'value' => function($data,$row,$column){
                        return   $data["humanArea"];
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Столовая',
                'value' => function($data,$row,$column){
                        return   $data["kitchenArea"];
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'С/У',
                'value' => function($data,$row,$column){
                        return   sanitare($data["sanitare"]);
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Окна',
                'value' => function($data,$row,$column){
                        return   window($data["window"]);
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Цена, P $ &euro;',
                'value' => function($data,$row,$column){
                        return   $data["price"]." ".$data["currencyName"]."<br>".
                                 $data["priceM2"]." ".$data["currencyName"]." за м2";
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>70),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'Контакты',
                'value' => function($data,$row,$column){
                        return   $data["lastName"]."<br>".
                                 $data["phone"]."<br>";
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
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



#### --- Продать -> Вторичная -> Дом (Ф-2): 1 - 6 - 5
else if(isset($dataProvider) && $act == 2) {

    // Новый виджет для формы 2
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
                'header'=> 'Адрес объекта',
                'value' => function($data,$row,$column){
                        return "".photos($data["photos"],$data["houseID"])."<br>".
                        $data["streetName"]."<br>".
                        "р-н: ".region($data["region"])."<br>".
                        "округ: ".district($data["district"])."<br>".
                        "метро: ".undeground($data["undeground"])."<br>".
                        "".metroTime($data["metroTime"])." мин. ".metroWay($data["metroWay"])."<br>".
                        "город: ".$data["cityName"]."<br>".
                        "Объявление размещено: ". implode('.',array_reverse(explode('-',$data["createData"])));
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>500),
            ),

            array(
                'name'=>'houseID',
                'header'=> 'Характеристика',
                'value' => function($data,$row,$column){
                        return "<b>houseID:</b> ".$data["houseID"]."<br>".
                        "<b>Тип недвижимости:</b> ".typeEstate($data["typeEstate"])."<br>".
                        "<b>Операция:</b> ".operations($data["operations"])."<br>".
                        "<b>Рынок:</b> ".market($data["market"])."<br>".
                        "<b>Валюта:</b> ".$data["currencyName"]."<br>".
                        "<b>Кол-во комнат:</b> ".$data["room"]."<br>".
                        "<b>Общая площадь:</b> ".$data["generalArea"]."<br>".
                        "<b>Цена за м2:</b> ".$data["priceM2"]."<br>".
                        "<b>Цена объекта:</b> ".$data["price"]."<br>".
                        "<b>Тип стен:</b> ".typeWall($data["typeWall"])."<br>".
                        "<b>Стадия строительства:</b> ".stageName($data["stageName"])."<br>".
                        "<b>Email:</b> ".$data["email"]."<br>".
                        "<b>Имя:</b> ".$data["lastName"]."<br>".
                        "<b>Phone:</b> ".$data["phone"]."<br>".
                        "<b>Window:</b> ".window($data["window"])."<br>".
                        "<b>Balcony:</b> ".balcony($data["balcony"])."<br>".
                        "<b>Parking:</b> ".parking($data["parking"])."<br>".
                        "<b>Машиноместо:</b> ".placeCars($data["placeCars"])."<br>".
                        "<b>Закрытая територия:</b> ".coveredSpace($data["coveredSpace"])."<br>".
                        "<b>Клубный тип:</b> ".clubType($data["clubType"])."<br>".
                        "<b>Акции и скидки:</b> ".discount($data["discount"])."<br>".
                        "<b>Ипотека:</b> ".mortgage($data["mortgage"])."<br>".
                        "<b>Санузел:</b> ".sanitare($data["sanitare"])."";

                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>500),
            ),
            array(
                'name'=>'userID',
                'header'=> 'Харктеристики',
                'value' => function($data,$row,$column){

                        return   "<b>Этаж:</b> ".$data["store"]."<br>".
                        "<b>Этажность дома:</b> ".$data["floors"]."<br>".
                        "<b>Срок сдачи:</b> ".deadline($data["deadline"])."<br>".
                        "<b>Застройщик:</b> ".developer($data["developer"])."<br>".
                        "<b>Fz_214:</b> ".fz_214($data["fz_214"])."<br>".
                        "<b>С отделкой:</b> ".finished($data["finished"])."<br>".
                        "<b>Класс дома:</b> ".classHome($data["classHome"])."<br>".
                        "<b>Тип аккаунта:</b> ".typeAccount($data["typeAccount"])."<br>";

                    },
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
    print 2;
}
#### --- Продать -> Вторичная -> Квартира и Аппартаменты (Ф-3): 1 - 6 - 4(3)
else if(isset($dataProvider) && $act == 3) {

    // Новый виджет для формы 3
    print 3;
}
#### --- Аренда -> Вторичная -> Квартира и Аппартаменты (Ф-4): 2 - 6 - 4(3)
else if(isset($dataProvider) && $act == 4) {

    // Новый виджет для формы 4
    print 4;

}
#### --- Аренда -> Вторичная -> Дом (Ф-5): 2 - 6 - 5
else  {

    // Новый виджет для формы 5
    print 5;
}











