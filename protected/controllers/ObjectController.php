<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 01.08.14
 * Time: 15:40
 */

class ObjectController extends Controller {

    public $layour = '//layouts/main';

    public function actionIndex(){


        $model = new SHouse();


        

        $this->render('index',array(
            'model' => $model,
        ));
    }

} 