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
                'headerHtmlOptions'=>array('width'=>400),
            ),
            array(
                'name'=>'houseID',
                'header'=> 'houseID',
                'value' => '$data["houseID"]',
                'type' =>  'raw',
                'headerHtmlOptions'=>array('width'=>400),
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














