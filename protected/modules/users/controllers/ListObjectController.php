<?php

class ListObjectController extends Controller
{
	public function actionIndex()
	{

        $connection = Yii::app()->db;

        $count=$connection->createCommand("SELECT COUNT(apart_id) FROM real_estate WHERE fk_uid = ".Yii::app()->user->id."")->queryScalar();
        $sql="SELECT apart_id,type_estate,operations,market FROM real_estate WHERE fk_uid = ".Yii::app()->user->id."";

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