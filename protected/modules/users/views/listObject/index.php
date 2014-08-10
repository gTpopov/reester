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
                'value' => '"<img src=\"/files/4/2/06d3bc740e8ba0c8f64427649f537269.jpg \" width=\"55\">"',
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'type_estate',
                'header'=> 'Тип недвижимости',
                'value' => '$data["type_estate"]',
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'operations',
                'header'=> 'Тип операции',
                'value' => '$data["operations"]',
                'type' =>  'raw',
                //'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'market',
                'header'=> 'Рынок недвижимости',
                'value' => '$data["market"]',
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
        'pagerCssClass'=>'pagination',
    ));
}
?>

