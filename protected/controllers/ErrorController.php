<?php
/**
 * User: Greg
 * Date: 31.07.14
 * Time: 16:09
 */

class ErrorController extends Controller {

    public function actionIndex(){

        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('index', $error);
        }
    }

} 