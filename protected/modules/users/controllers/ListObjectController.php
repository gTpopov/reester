<?php

class ListObjectController extends Controller
{
	public function actionIndex()
	{

        $connection = Yii::app()->db;
        $count=$connection->createCommand("SELECT COUNT(apart_id) FROM real_estate WHERE fk_uid = ".Yii::app()->user->id."")->queryScalar();
        $sql="SELECT
                r.apart_id,
                r.type_estate,
                r.operations,
                r.market,
                img.source,
                h.id
              FROM  real_estate AS r
              INNER JOIN s_house  AS h   ON h.id = r.apart_id
              INNER JOIN s_images AS img ON (h.id = img.fk_house OR h.id != img.fk_house)
              WHERE r.fk_uid = ".Yii::app()->user->id."
              GROUP BY r.apart_id
              ORDER BY r.apart_id DESC";

        $dataProvider = new CSqlDataProvider($sql, array(
            'keyField'=>'apart_id',
            'totalItemCount'=>$count,
            'sort'=>array(
                //'attributes'=>array('price','brend'),
                //'defaultOrder'=>'price ASC',
            ),
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));



        $this->render('index',array(
            'dataProvider'=>!empty($dataProvider)?$dataProvider:null,
        ));


	}


}