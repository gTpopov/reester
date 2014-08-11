<?php
/* @var $this ListObjectController */

$this->breadcrumbs=array(
	'List Object',
);
?>
<h1>СПИСОК ДОБАВЛЕНЫХ ОБЪЕКТОВ ПОЛЬЗОВАТЕЛЕМ</h1>

<?php

if(isset($dataProvider)) {


    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider,
        'enablePagination' => true,
        'emptyText'=>'',
        'summaryText' => "",
        'columns'=>array(
            array(
                'name'=>'apart_id',
                'header'=> '#',
                'value' => '$data["apart_id"]',
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'type_estate',
                'header'=> 'Фото',
                'value' => '"<img src=\"/img/project-style/settings_img_additional_info.png\" width=\"75\">"',
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'type_estate',
                'header'=>'Тип недвижимости',
                'value' => function($data,$row,$column){
                        // $data - это объект модель для текущей стройки
                        // $row - это порядковый номер строчки начиная с нуля
                        // $column - объект колонки, объект класса http://www.yiiframework.com/doc/api/1.1/CDataColumn/
                        // $this - объект колонки, объект класса http://www.yiiframework.com/doc/api/1.1/CDataColumn/
                        if($data["type_estate"]=="4") { return "квартира"; }
                        else if ($data["type_estate"]=="3"){ return "аппартаменты"; }
                        else { return "дом"; }
                    },
                'type' => 'raw',
                //'cssClassExpression' =>'"td".$data["config_id"]',
                //'htmlOptions' =>array('class'=>'$data[config_id]'),
                //'headerHtmlOptions'=>array('width'=>150),
            ),
            array(
                'name'=>'operations',
                'header'=> 'Тип операции',
                'value' => function($data,$row,$column){
                        if($data["operations"]=="1") { return "продать"; }
                        else { return "арендовать"; }
                    },
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'market',
                'header'=> 'Рынок недвижимости',
                'value' => function($data,$row,$column){
                        if($data["market"]=="6") { return "вторичный рынок"; }
                        else { return "строящиеся рынок"; }
                    },
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'market',
                'header'=> 'Редактировать',
                'value' => '"<a href=\"#\">Редактировать:</a> ".$data["market"]',
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
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
        //'pagerCssClass'=>'pagination',
    ));
}
?>
