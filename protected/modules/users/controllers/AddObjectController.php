<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 01.08.14
 * Time: 19:07
 */

class AddObjectController extends Controller {

    public $layout = '/layouts/add-object';

    /*
     * Function convert files into an array
     */
    /*public	function UpdateArrayFILES($r = '')
    {
        if(!$r){ return; }
        if(!is_array($_FILES) || !count($_FILES)){ return; }
        $temp = $_FILES[$r];
        foreach($temp['name'] as $key => $value){
            if(!$temp['name'][$key]){ continue; }
            $RESULT[$key]['name']     = $temp['name'][$key];
            $RESULT[$key]['size']     = $temp['size'][$key];
            $RESULT[$key]['tmp_name'] = $temp['tmp_name'][$key];
            $RESULT[$key]['type']     = $temp['type'][$key];
            $RESULT[$key]['error']    = $temp['error'][$key];
        }
        if(isset($RESULT) && !empty($RESULT)) {
            return $RESULT;
        }
        else { return $RESULT = "";  }
    }*/

    /*
     * Action step one
     */
    public function actionIndex(){


        // Model fot table s_house
        $modelH = new SHouse();
        $modelH->setScenario('addObjectOne');

        // Model fot table real_estate
        $modelR = new RealEstat();
        $modelR->setScenario('addObjectOne');

        // Model fot table user
        $modelU = new Users();
        $modelU->setScenario('addObjectOne');


        // Delete cookie config ---
        if(isset($_GET['reset'])) {
            unset(Yii::app()->request->cookies['object_type']);
            unset(Yii::app()->request->cookies['sale_rent_op']);
            unset(Yii::app()->request->cookies['obj_state']);
        }

        if(isset($_POST['SHouse']) && isset($_POST['RealEstat']) && isset($_POST['Users']))
        {

            $modelH->attributes=$_POST['SHouse'];
            $modelR->attributes=$_POST['RealEstat'];
            $modelU->attributes=$_POST['Users'];

            if($modelH->validate() && $modelR->validate() && $modelU->validate())
            {

                /*
                print '<pre>';
                print_r($_POST['SHouse']);
                print '<hr>';
                print_r($_POST['RealEstat']);
                print '<hr>';
                print_r($_POST['Users']);
                print '<pre>';*/

                $connection = Yii::app()->db;

                $transaction=$connection->beginTransaction();
                try
                {
                    //Add data in table s_house
                    $modelH->city         = (int) $_POST['SHouse']['city']; //+
                    $modelH->district     = (int) $_POST['SHouse']['district']; //+
                    $modelH->region       = (int) $_POST['SHouse']['region']; //+
                    $modelH->undeground   = (int) $_POST['SHouse']['undeground']; //+
                    $modelH->street       = (int) $_POST['SHouse']['street']; //+
                    $modelH->metro_time   = (int) $_POST['SHouse']['metro_time']; //+
                    $modelH->metro_way    = (int) $_POST['SHouse']['metro_way']; //+
                    $modelH->house_number = (string) strip_tags(htmlspecialchars($_POST['SHouse']['house_number'])); //+
                    $modelH->structur     = (string) strip_tags(htmlspecialchars($_POST['SHouse']['structur'])); //+
                    $modelH->housing      = (string) strip_tags(htmlspecialchars($_POST['SHouse']['housing'])); //+
                    $modelH->type_house   = (int) $_POST['SHouse']['type_house']; //++
                    $modelH->class_home   = (int) $_POST['SHouse']['class_home']; //++
                    $modelH->floors       = (int) $_POST['SHouse']['floors']; //++

                    $modelH->save();

                    $IDObject = Yii::app()->db->lastInsertID; //ID s_house table

                    //Add data in table real_estate
                    $modelR->fk_house_id   = $IDObject;
                    $modelR->fk_uid        = Yii::app()->user->id;

                    $modelR->type_estate  = isset(Yii::app()->request->cookies['object_type']->value)?Yii::app()->request->cookies['object_type']:4; //Тип недвижимости
                    $modelR->operations   = isset(Yii::app()->request->cookies['sale_rent_op']->value)?Yii::app()->request->cookies['sale_rent_op']:1; //Тип операции
                    $modelR->market       = isset(Yii::app()->request->cookies['obj_state']->value)?Yii::app()->request->cookies['obj_state']:7; //Рынок недвижимости:

                    $modelR->general_area  = (int) $_POST['RealEstat']['general_area']; //++
                    $modelR->human_area    = (int) $_POST['RealEstat']['human_area']; //++
                    $modelR->kitchen_area  = (int) $_POST['RealEstat']['kitchen_area']; //+
                    $modelR->parking       = (int) $_POST['RealEstat']['parking']; //++
                    $modelR->place_cars    = (int) $_POST['RealEstat']['place_cars']; //++
                    $modelR->plan          = isset($_POST['RealEstat']['plan'])?$_POST['RealEstat']['plan']:0; //++
                    $modelR->covered_space = (int) $_POST['RealEstat']['covered_space']; //++
                    $modelR->balcony       = (int) $_POST['RealEstat']['balcony']; //++
                    $modelR->finished      = (int) $_POST['RealEstat']['finished']; //++
                    //$modelR->furniture     = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['furniture'])); //++
                    $modelR->fz_214        = (int) $_POST['RealEstat']['fz_214']; //++
                    $modelR->room          = (int) $_POST['RealEstat']['room']; //++
                    $modelR->store         = (int) $_POST['RealEstat']['store']; //++
                    $modelR->window        = (int) $_POST['RealEstat']['window']; //++
                    $modelR->deadline      = (int) $_POST['RealEstat']['deadline']; //++
                    $modelR->stage         = (int) $_POST['RealEstat']['stage']; //++
                    $modelR->sanitare      = isset($_POST['RealEstat']['sanitare'])?$_POST['RealEstat']['sanitare']:0; //++
                    $modelR->club_type     = (int) $_POST['RealEstat']['club_type']; //++
                    $modelR->discount      = (int) $_POST['RealEstat']['discount']; //++
                    $modelR->mortgage      = (int) $_POST['RealEstat']['mortgage']; //++
                    $modelR->developer     = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['developer'])); //++
                    $modelR->price         = (int) $_POST['RealEstat']['price']; //++
                    $modelR->currency      = (int) $_POST['RealEstat']['currency']; //++
                    //$modelR->add_info      = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['add_info'])); //++
                    $modelR->create_data   = date('Y-m-d'); //++
                    $modelR->price_of_m2   = (int) $_POST['RealEstat']['price'] / (int) $_POST['RealEstat']['general_area']; //++

                    $modelR->save();

                    //Update data in table users
                    Users::model()->updateByPk(Yii::app()->user->id, array(
                        'sub_email' => (string) $_POST['Users']['sub_email'],
                        'skype'     => (string) $_POST['Users']['skype'],
                        'phone'     => (string) $_POST['Users']['phone'],
                        'last_name' => (string) $_POST['Users']['last_name'],
                        'call_with' => (string) $_POST['Users']['call_with'],
                        'call_up'   => (string) $_POST['Users']['call_up']
                    ));

                    //Create folder for upload images
                    if(!file_exists('files/'.Yii::app()->user->id.'/'.$IDObject.'')) {
                        mkdir('files/'.Yii::app()->user->id.'/'.$IDObject);
                    }

                    #### Script upload files ---
                    if(isset($_FILES['photo']))
                    {
                        if(!Yii::app()->photo->UploadPhoto('photo',$IDObject)) {

                            Yii::app()->user->setFlash('failed-add',"Ошибка загрузи фотографий");

                        }
                    }

                    $transaction->commit();

                    //print 'Yes';
                    $this->redirect('/users/default/index');
                }
                catch(Exception $e){
                    $transaction->rollback();
                }
            }
            else {
                Yii::app()->user->setFlash('failed-add',"Проверьте правильность введенных данных");
            }
        }

        //Yii::app()->user->setFlash('success-add',"Объект успешно добавлен");
        //Yii::app()->user->setFlash('failed-add',"Проверьте правильность введенных данных");

        $this->render('index',array(
            'modelH'  => $modelH,
            'modelR'  => $modelR,
            'modelU'  => $modelU,
        ));
    }


    /*
     * Action step four
     */
    public function actionFour(){

        // Model fot table s_house
        $modelH = new SHouse();
        $modelH->setScenario('addObjectOne');

        // Model fot table real_estate
        $modelR = new RealEstat();

        // Model fot table user
        $modelU = new Users();
        $modelU->setScenario('addObjectOne');

        if(isset($_POST['SHouse']) && isset($_POST['RealEstat']) && isset($_POST['Users']))
        {

        }
    }


















} 