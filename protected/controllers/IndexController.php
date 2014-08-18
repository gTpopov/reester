<?php

class IndexController extends Controller {


    /*
     * Form -1
     */

    public function actionIndex(){

        $this->render('index',array(
            'act' => 1,
        ));
    }

    /*
     * Form -2
     */
    public function actionTwo(){

        $this->render('index',array(
            'act' => 2,
        ));
    }

    /*
     * Form -3
     */
    public function actionThree(){

        $this->render('index',array(
            'act' => 3,
        ));
    }

    /*
     * Form -4
     */
    public function actionFour(){

        $this->render('index',array(
            'act' => 4,
        ));
    }

    /*
     * Form -5
     */
    public function actionFive(){

        $this->render('index',array(
            'act' => 5,
        ));
    }


} 