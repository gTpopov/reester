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
        case 1 : $operations = "продажа";    break;
        case 2 : $operations = "аренда"; break;
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

function freeSale($freeSalee) {

    switch($freeSalee) {
        case 1 : $freeSale  = "свободная продажа";  break;
        case 2 : $freeSale  = "альтернатива";       break;
    }
    return $freeSale;
}

function typeAccount($typeAccount){

    switch($typeAccount) {
        case 1 : $typeAccount = "собственник"; break;
        case 2 : $typeAccount = "представитель собственника"; break;
        case 3 : $typeAccount = "риелтор";     break;
    }
    return $typeAccount;
}

function statusAppart($statusAppart){

    switch($statusAppart) {
        case 1 : $statusAppart = "дизайнпроект";        break;
        case 2 : $statusAppart = "отличное состояние";   break;
        case 3 : $statusAppart = "свежий ремонт";        break;
        case 4 : $statusAppart = "среднее состояние";    break;
        case 5 : $statusAppart = "без отделки";          break;
        case 6 : $statusAppart = "первичная отделка";    break;
        case 7 : $statusAppart = "требует ремонт";       break;
        case 8 : $statusAppart = "косметический ремонт"; break;
    }
    return $statusAppart;
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
        $img = Yii::app()->db->createCommand("SELECT i.source AS source, u.uid AS uid
                                              FROM s_images AS i,s_house AS h,real_estate AS r,users AS u
                                              WHERE i.fk_house = ".$houseID." AND h.id = r.fk_house_id AND
                                              r.fk_uid = u.uid")->queryRow();

        if(file_exists('files/'.$img['uid'].'/'.$houseID.'/'.$img['source'].'')) {
            $photos = "<img width='50' src='/files/".$img['uid']."/".$houseID."/".$img['source']."'>";
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
function partHouse($partHouse)       { return ($partHouse!=0)?'да':'нет'; } // часть дома
function ownership($ownership)       { return ($ownership!=0)?'да':'нет'; } // более 3-х лет
function water($water)               { return ($water!=0)?'да':'нет'; } // вода
function heating($heating)           { return ($heating!=0)?'да':'нет'; } // отопление
function gas($gas)                   { return ($gas!=0)?'да':'нет'; } // газ
function electricity($electricity)   { return ($electricity!=0)?'да':'нет'; } // электричество
function sewage($sewage)             { return ($sewage!=0)?'да':'нет'; } // центр. канализация
function septic($septic)             { return ($septic!=0)?'да':'нет'; } // септик



?>

<div style="width: 100%; height: 50px; background: #CCCCDD;border: 1px solid #a6a6a6;padding: 7px;">
    <h4>Изменить параметры поиска</h4>
</div>
<?php
#### -- Продать -> Строящаяся -> Квартира и Аппартаменты (Ф-1): 1 - 7 - 4(3)
if(isset($dataProvider) && $act == 1) {

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider,
        'enablePagination' => true,
        'emptyText'=>'Data empty',
        'summaryText' => "",
        'columns'=> array(
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
                                 $data["priceM2"]." ".$data["currencyName"]." за м2<br><br>".
                                 operations($data["operations"])."<br>".
                                 $data["lastName"]."<br>".
                                 $data["phone"]."<br>";
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
                'htmlOptions' => array('class'=>'test')
            ),


        ),
        'pager'  => array(
            'firstPageLabel'=>'начало',
            'prevPageLabel'=>'&larr;',
            'nextPageLabel'=>'&rarr;',
            'lastPageLabel'=>'&raquo;',
            'maxButtonCount'=>'3',
            'header'=>'',
            'cssFile'=>false,
        ),
        'pagerCssClass'=>'pagination',
        'htmlOptions' => array('style'=>'padding:0;')
    ));
}

#### --- Продать -> Вторичная -> Дом (Ф-2): 1 - 6 - 5
else if(isset($dataProvider) && $act == 2) {

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider,
        'enablePagination' => true,
        'emptyText'=>'Data empty',
        'summaryText' => "",
        'columns'=> array(
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
                        $data["priceM2"]." ".$data["currencyName"]." за м2<br><br>".
                        operations($data["operations"])."<br>".
                        $data["lastName"]."<br>".
                        $data["phone"]."<br>";
                    },
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>50),
                'htmlOptions' => array('class'=>'test')
            ),


        ),
        'pager'  => array(
            'firstPageLabel'=>'начало',
            'prevPageLabel'=>'&larr;',
            'nextPageLabel'=>'&rarr;',
            'lastPageLabel'=>'&raquo;',
            'maxButtonCount'=>'3',
            'header'=>'',
            'cssFile'=>false,
        ),
        'pagerCssClass'=>'pagination',
        'htmlOptions' => array('style'=>'padding:0;')
    ));

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











