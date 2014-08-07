<?php

class ResultController extends Controller {

    /*
     *  Обработка переданных данных
     *  вывод результата
     */

    public function actionIndex(){

        $connection = Yii::app()->db;

        //Сохраняем переданные параметры фильтра в сессии
        foreach($_POST as $key => $val) {
            Yii::app()->session[''.$key.''] = $val;
        }

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