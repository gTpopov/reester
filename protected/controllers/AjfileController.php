<?php

class AjfileController extends Controller {

    public function filters() {
        return array(
            'ajaxOnly + upload, delete',
        );
    }

    /**
     * Upload logo user
     */
    public function actionUpload() {

        if(Yii::app()->request->isAjaxRequest)
        {
            Yii::import("ext.EAjaxUpload.qqFileUploader");

            $folder='files/'.Yii::app()->user->id.'/';
            $allowedExtensions = array('jpg','gif','png','jpeg');
            $sizeLimit = 3 * 1024 * 1024;
            // третий параметр свидетельствует о загрузке и преобразовании граф. файла в формат "jpg"
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit, Yii::app()->user->id);
            $result = $uploader->handleUpload($folder);
            echo json_encode($result);

            Yii::app()->end();
        }
    }

    /**
     * Delete logo user
     */
    public function actionDelete() {

        if(Yii::app()->request->isAjaxRequest)
        {
            $dir_id = $_POST['id'];

            if(file_exists("files/".$dir_id."/logo".$dir_id.".jpg")) {

                if(unlink('files/'.$dir_id.'/logo'.$dir_id.'.jpg')) {
                    echo json_encode(array('response'=>'success'));
                } else {
                    echo json_encode(array('response'=>'error'));
                }
            }

            Yii::app()->end();
        }
    }

    /**
     * Return list cities
     */
    public function actionStreet() {

        if(Yii::app()->request->isAjaxRequest)
        {
            $q = Yii::app()->request->getQuery('q');

            $connection = Yii::app()->db;

            $result = $connection->createCommand("
                        SELECT s_street.name AS n, s_region.name AS r
                    	FROM s_street,s_region
						WHERE s_street.name LIKE '".$q."%' AND
						      s_street.fk_region = s_region.id
						ORDER BY s_street.name ASC")->queryAll();

            foreach($result as $val) {
                echo $val['n']."|".$val['r']."\r\n";
            }

            Yii::app()->end();
        }
    }
} 