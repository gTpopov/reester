<?php



if(isset($dataProvider)) {


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
                           // $data - это объект модель для текущей стройки
                           // $row - это порядковый номер строчки начиная с нуля
                           // $column - объект колонки, объект класса http://www.yiiframework.com/doc/api/1.1/CDataColumn/
                           // $this - объект колонки, объект класса http://www.yiiframework.com/doc/api/1.1/CDataColumn/


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
                    $balcony   = ($data["balcony"]!=0)?'есть':'нет';
                    $parking   = ($data["parking"]!=0)?'есть':'нет';
                    $placeCars = ($data["placeCars"]!=0)?'есть':'нет';
                    $coveredSpace = ($data["coveredSpace"]!=0)?'есть':'нет';


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
                            "<b>Срок сдачи:</b> ".$data["deadline"]."<br>".
                            "<b>Email:</b> ".$data["email"]."<br>".
                            "<b>Email:</b> ".$data["lastName"]."<br>".
                            "<b>Phone:</b> ".$data["phone"]."<br>".
                            "<b>Window:</b> ".$window."<br>".
                            "<b>Balcony:</b> ".$balcony."<br>".
                            "<b>Parking:</b> ".$parking."<br>".
                            "<b>Машиноместо:</b> ".$placeCars."<br>".
                            "<b>Закрытая територия:</b> ".$coveredSpace."<br>".
                            "<b>Photos:</b> ".$data["photos"]."<br>".
                            "<b>City:</b> ".$data["cityName"]."<br>".
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
} else {

    echo 'Error';
}














