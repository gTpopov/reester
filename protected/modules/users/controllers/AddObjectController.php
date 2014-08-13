<?php

class AddObjectController extends Controller {

    public $layout = '/layouts/add-object';


   /*
    * Substitution in attribute STEP 3 (user contact)
    */
    public function substitution() {

        $connection = Yii::app()->db;
        $row = $connection->createCommand("SELECT last_name,sub_email,call_with,call_up,phone,skype
                                           FROM users WHERE uid = ".Yii::app()->user->id."")->queryRow();
        return array(
            'last_name'=> $row['last_name'],
            'sub_email'=> $row['sub_email'],
            'call_with'=> $row['call_with'],
            'call_up'  => $row['call_up'],
            'phone'    => $row['phone'],
            'skype'    => $row['skype']
        );

   }


    /*
     * Action step one (form 1)
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
                print '<pre>';
                */

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
                    $modelH->type_house   = (int) $_POST['SHouse']['type_house']; //+
                    $modelH->class_home   = (int) $_POST['SHouse']['class_home']; //+
                    $modelH->name_complex = (string) strip_tags(htmlspecialchars($_POST['SHouse']['name_complex'])); //+
                    $modelH->floors       = (int) $_POST['SHouse']['floors']; //+

                    $modelH->save();

                    $IDObject = Yii::app()->db->lastInsertID; //ID s_house table

                    //Add data in table real_estate
                    $modelR->fk_house_id   = $IDObject;
                    $modelR->fk_uid        = Yii::app()->user->id;

                    $modelR->type_estate  = isset(Yii::app()->request->cookies['object_type']->value)?Yii::app()->request->cookies['object_type']:4; //Тип недвижимости
                    $modelR->operations   = isset(Yii::app()->request->cookies['sale_rent_op']->value)?Yii::app()->request->cookies['sale_rent_op']:1; //Тип операции
                    $modelR->market       = isset(Yii::app()->request->cookies['obj_state']->value)?Yii::app()->request->cookies['obj_state']:7; //Рынок недвижимости:

                    $modelR->general_area  = (int) $_POST['RealEstat']['general_area']; //+
                    $modelR->human_area    = (int) $_POST['RealEstat']['human_area']; //+
                    $modelR->kitchen_area  = (int) $_POST['RealEstat']['kitchen_area']; //+
                    $modelR->parking       = (int) $_POST['RealEstat']['parking']; //+
                    $modelR->place_cars    = (int) $_POST['RealEstat']['place_cars']; //+
                    $modelR->plan          = isset($_POST['RealEstat']['plan'])?$_POST['RealEstat']['plan']:0; //+
                    $modelR->covered_space = (int) $_POST['RealEstat']['covered_space']; //+
                    $modelR->balcony       = (int) $_POST['RealEstat']['balcony']; //+
                    $modelR->finished      = (int) $_POST['RealEstat']['finished']; //+
                    $modelR->fz_214        = (int) $_POST['RealEstat']['fz_214']; //+
                    $modelR->room          = (int) $_POST['RealEstat']['room']; //+
                    $modelR->store         = (int) $_POST['RealEstat']['store']; //+
                    $modelR->window        = (int) $_POST['RealEstat']['window']; //+
                    $modelR->deadline      = (int) $_POST['RealEstat']['deadline']; //+
                    $modelR->stage         = (int) $_POST['RealEstat']['stage']; //+
                    $modelR->sanitare      = isset($_POST['RealEstat']['sanitare'])?$_POST['RealEstat']['sanitare']:0; //+
                    $modelR->club_type     = (int) $_POST['RealEstat']['club_type']; //+
                    $modelR->discount      = (int) $_POST['RealEstat']['discount']; //+
                    $modelR->mortgage      = (int) $_POST['RealEstat']['mortgage']; //+
                    $modelR->developer     = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['developer'])); //+
                    $modelR->price         = (int) $_POST['RealEstat']['price']; //+
                    $modelR->currency      = (int) $_POST['RealEstat']['currency']; //+
                    $modelR->add_info      = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['add_info'])); //+
                    $modelR->create_data   = date('Y-m-d'); //+
                    $modelR->price_of_m2   = (int) $_POST['RealEstat']['price'] / (int) $_POST['RealEstat']['general_area']; //+

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
                    if(isset($_FILES['photo'])) {
                        if(!Yii::app()->photo->UploadPhoto('photo',$IDObject)) {
                            Yii::app()->user->setFlash('failed-add',"Ошибка загрузи фотографий");
                        }
                    }

                    $transaction->commit();
                    $this->redirect('/users/ListObject/index');
                }
                catch(Exception $e){
                    $transaction->rollback();
                }
            }
            else {
                Yii::app()->user->setFlash('failed-add',"Проверьте правильность введенных данных");
            }
        }


        $this->render('index',array(
            'modelH'  => $modelH,
            'modelR'  => $modelR,
            'modelU'  => $modelU,
            'userData'=> $this->substitution(),
        ));
    }


    /*
    * Action step two (form 2)
    */
    public function actionTwo(){

        // Model fot table s_house
        $modelH = new SHouse();
        $modelH->setScenario('addObjectOne');

        // Model fot table real_estate
        $modelR = new RealEstat();
        $modelR->setScenario('addObjectOne');

        // Model fot table user
        $modelU = new Users();
        $modelU->setScenario('addObjectOne');

        if(isset($_POST['SHouse']) && isset($_POST['RealEstat']) && isset($_POST['Users'])) {



        }


        $this->render('index',array(
            'modelH'  => $modelH,
            'modelR'  => $modelR,
            'modelU'  => $modelU,
            'userData'=> $this->substitution(),
        ));
    }


    /*
    * Action step three (form 3)
    */
    public function actionThree(){

        // Model fot table s_house
        $modelH = new SHouse();
        $modelH->setScenario('addObjectOne');

        // Model fot table real_estate
        $modelR = new RealEstat();
        $modelR->setScenario('addObjectOne');

        // Model fot table user
        $modelU = new Users();
        $modelU->setScenario('addObjectOne');

        if(isset($_POST['SHouse']) && isset($_POST['RealEstat']) && isset($_POST['Users'])) {

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
                print '<pre>';
                */

                $connection = Yii::app()->db;

                $transaction=$connection->beginTransaction();
                try
                {
                    //Add data in table s_house
                    $modelH->city         = (int) $_POST['SHouse']['city']; //+
                    $modelH->district     = (int) $_POST['SHouse']['district']; //+
                    $modelH->region       = (int) $_POST['SHouse']['region']; //+
                    $modelH->undeground   = (int) $_POST['SHouse']['undeground']; //
                    $modelH->street       = (int) $_POST['SHouse']['street']; //+
                    $modelH->metro_time   = (int) $_POST['SHouse']['metro_time']; //+
                    $modelH->metro_way    = (int) $_POST['SHouse']['metro_way']; //+
                    $modelH->house_number = (string) strip_tags(htmlspecialchars($_POST['SHouse']['house_number'])); //+
                    $modelH->structur     = (string) strip_tags(htmlspecialchars($_POST['SHouse']['structur'])); //+
                    $modelH->housing      = (string) strip_tags(htmlspecialchars($_POST['SHouse']['housing'])); //+
                    $modelH->name_complex = (string) strip_tags(htmlspecialchars($_POST['SHouse']['name_complex'])); //+
                    $modelH->type_house   = (int) $_POST['SHouse']['type_house']; //+
                    $modelH->class_home   = (int) $_POST['SHouse']['class_home']; //+
                    $modelH->floors       = (int) $_POST['SHouse']['floors']; //+

                    $modelH->save();

                    $IDObject = Yii::app()->db->lastInsertID; //ID s_house table

                    //Add data in table real_estate
                    $modelR->fk_house_id   = $IDObject; //+
                    $modelR->fk_uid        = Yii::app()->user->id; //+

                    $modelR->type_estate  = isset(Yii::app()->request->cookies['object_type']->value)?Yii::app()->request->cookies['object_type']:4; //Тип недвижимости
                    $modelR->operations   = isset(Yii::app()->request->cookies['sale_rent_op']->value)?Yii::app()->request->cookies['sale_rent_op']:1; //Тип операции
                    $modelR->market       = isset(Yii::app()->request->cookies['obj_state']->value)?Yii::app()->request->cookies['obj_state']:7; //Рынок недвижимости:

                    $modelR->general_area  = (int) $_POST['RealEstat']['general_area']; //+
                    $modelR->human_area    = (int) $_POST['RealEstat']['human_area']; //+
                    $modelR->kitchen_area  = (int) $_POST['RealEstat']['kitchen_area']; //+
                    $modelR->place_cars    = (int) $_POST['RealEstat']['place_cars']; //+
                    $modelR->plan          = isset($_POST['RealEstat']['plan'])?$_POST['RealEstat']['plan']:0; //+
                    $modelR->covered_space = (int) $_POST['RealEstat']['covered_space']; //+
                    $modelR->balcony       = (int) $_POST['RealEstat']['balcony']; //+
                    $modelR->furniture     = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['furniture'])); //+
                    $modelR->room          = (int) $_POST['RealEstat']['room']; //+
                    $modelR->isolated      = (int) $_POST['RealEstat']['isolated']; //+
                    $modelR->multimedia    = (int) $_POST['RealEstat']['multimedia']; //+
                    $modelR->house_applian = (int) $_POST['RealEstat']['house_applian']; //+
                    $modelR->temp_registry = (int) $_POST['RealEstat']['temp_registry']; //+
                    $modelR->window        = (int) $_POST['RealEstat']['window']; //+
                    $modelR->stage         = (int) $_POST['RealEstat']['stage']; //+
                    $modelR->sanitare      = isset($_POST['RealEstat']['sanitare'])?$_POST['RealEstat']['sanitare']:0; //+
                    $modelR->price         = (int) $_POST['RealEstat']['price']; //+
                    $modelR->cost_renting  = (int) $_POST['RealEstat']['cost_renting']; //+
                    $modelR->currency      = (int) $_POST['RealEstat']['currency']; //+
                    $modelR->prepayment    = isset($_POST['RealEstat']['prepayment'])?$_POST['RealEstat']['prepayment']:0; //+
                    $modelR->lease         = isset($_POST['RealEstat']['lease'])?$_POST['RealEstat']['lease']:0; //+
                    $modelR->add_info      = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['add_info'])); //+
                    $modelR->create_data   = date('Y-m-d');
                    $modelR->price_of_m2   = (int) $_POST['RealEstat']['price'] / (int) $_POST['RealEstat']['general_area']; //+

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
                    if(isset($_FILES['photo'])) {
                        if(!Yii::app()->photo->UploadPhoto('photo',$IDObject)) {
                            Yii::app()->user->setFlash('failed-add',"Ошибка загрузи фотографий");
                        }
                    }

                    $transaction->commit();
                    $this->redirect('/users/ListObject/index');
                }
                catch(Exception $e){
                    $transaction->rollback();
                }
            }
            else {
                Yii::app()->user->setFlash('failed-add',"Проверьте правильность введенных данных");
            }

        }


        $this->render('index',array(
            'modelH'  => $modelH,
            'modelR'  => $modelR,
            'modelU'  => $modelU,
            'userData'=> $this->substitution(),
        ));
    }



    /*
     * Action step four (form 4)
     */
    public function actionFour(){

        // Model fot table s_house
        $modelH = new SHouse();
        $modelH->setScenario('addObjectOne');

        // Model fot table real_estate
        $modelR = new RealEstat();
        $modelR->setScenario('addObjectOne');

        // Model fot table user
        $modelU = new Users();
        $modelU->setScenario('addObjectOne');

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
                print '<pre>';
                */

                $connection = Yii::app()->db;

                $transaction=$connection->beginTransaction();
                try
                {
                    //Add data in table s_house
                    $modelH->city         = (int) $_POST['SHouse']['city']; //+
                    $modelH->district     = (int) $_POST['SHouse']['district']; //+
                    $modelH->region       = (int) $_POST['SHouse']['region']; //+
                    $modelH->undeground   = (int) $_POST['SHouse']['undeground']; //
                    $modelH->street       = (int) $_POST['SHouse']['street']; //+
                    $modelH->metro_time   = (int) $_POST['SHouse']['metro_time']; //+
                    $modelH->metro_way    = (int) $_POST['SHouse']['metro_way']; //+
                    $modelH->house_number = (string) strip_tags(htmlspecialchars($_POST['SHouse']['house_number'])); //+
                    $modelH->structur     = (string) strip_tags(htmlspecialchars($_POST['SHouse']['structur'])); //+
                    $modelH->housing      = (string) strip_tags(htmlspecialchars($_POST['SHouse']['housing'])); //+
                    $modelH->name_complex = (string) strip_tags(htmlspecialchars($_POST['SHouse']['name_complex'])); //+
                    $modelH->type_house   = (int) $_POST['SHouse']['type_house']; //+
                    $modelH->class_home   = (int) $_POST['SHouse']['class_home']; //+
                    $modelH->floors       = (int) $_POST['SHouse']['floors']; //+

                    $modelH->save();

                    $IDObject = Yii::app()->db->lastInsertID; //ID s_house table

                    //Add data in table real_estate
                    $modelR->fk_house_id   = $IDObject; //+
                    $modelR->fk_uid        = Yii::app()->user->id; //+

                    $modelR->type_estate  = isset(Yii::app()->request->cookies['object_type']->value)?Yii::app()->request->cookies['object_type']:4; //Тип недвижимости
                    $modelR->operations   = isset(Yii::app()->request->cookies['sale_rent_op']->value)?Yii::app()->request->cookies['sale_rent_op']:1; //Тип операции
                    $modelR->market       = isset(Yii::app()->request->cookies['obj_state']->value)?Yii::app()->request->cookies['obj_state']:7; //Рынок недвижимости:

                    $modelR->general_area  = (int) $_POST['RealEstat']['general_area']; //+
                    $modelR->human_area    = (int) $_POST['RealEstat']['human_area']; //+
                    $modelR->kitchen_area  = (int) $_POST['RealEstat']['kitchen_area']; //+
                    $modelR->place_cars    = (int) $_POST['RealEstat']['place_cars']; //+
                    $modelR->plan          = isset($_POST['RealEstat']['plan'])?$_POST['RealEstat']['plan']:0; //+
                    $modelR->covered_space = (int) $_POST['RealEstat']['covered_space']; //+
                    $modelR->balcony       = (int) $_POST['RealEstat']['balcony']; //+
                    $modelR->furniture     = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['furniture'])); //+
                    $modelR->room          = (int) $_POST['RealEstat']['room']; //+
                    $modelR->isolated      = (int) $_POST['RealEstat']['isolated']; //+
                    $modelR->multimedia    = (int) $_POST['RealEstat']['multimedia']; //+
                    $modelR->house_applian = (int) $_POST['RealEstat']['house_applian']; //+
                    $modelR->temp_registry = (int) $_POST['RealEstat']['temp_registry']; //+
                    $modelR->window        = (int) $_POST['RealEstat']['window']; //+
                    $modelR->stage         = (int) $_POST['RealEstat']['stage']; //+
                    $modelR->sanitare      = isset($_POST['RealEstat']['sanitare'])?$_POST['RealEstat']['sanitare']:0; //+
                    $modelR->price         = (int) $_POST['RealEstat']['price']; //+
                    $modelR->cost_renting  = (int) $_POST['RealEstat']['cost_renting']; //+
                    $modelR->currency      = (int) $_POST['RealEstat']['currency']; //+
                    $modelR->prepayment    = isset($_POST['RealEstat']['prepayment'])?$_POST['RealEstat']['prepayment']:0; //+
                    $modelR->lease         = isset($_POST['RealEstat']['lease'])?$_POST['RealEstat']['lease']:0; //+
                    $modelR->add_info      = (string) strip_tags(htmlspecialchars($_POST['RealEstat']['add_info'])); //+
                    $modelR->create_data   = date('Y-m-d');
                    $modelR->price_of_m2   = (int) $_POST['RealEstat']['price'] / (int) $_POST['RealEstat']['general_area']; //+

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
                    if(isset($_FILES['photo'])) {
                        if(!Yii::app()->photo->UploadPhoto('photo',$IDObject)) {
                            Yii::app()->user->setFlash('failed-add',"Ошибка загрузи фотографий");
                        }
                    }

                    $transaction->commit();
                    $this->redirect('/users/ListObject/index');
                }
                catch(Exception $e){
                    $transaction->rollback();
                }
            }
            else {
                Yii::app()->user->setFlash('failed-add',"Проверьте правильность введенных данных");
            }
        }

        $this->render('index',array(
            'modelH'  => $modelH,
            'modelR'  => $modelR,
            'modelU'  => $modelU,
            'userData'=> $this->substitution(),
        ));
    }



    /*
    * Action step five (form 5)
    */
    public function actionFive(){

        // Model fot table s_house
        $modelH = new SHouse();
        $modelH->setScenario('addObjectFive');

        // Model fot table real_estate
        $modelR = new RealEstat();
        $modelR->setScenario('addObjectFive');

        // Model fot table user
        $modelU = new Users();
        $modelU->setScenario('addObjectFive');


        if(isset($_POST['SHouse']) && isset($_POST['RealEstat']) && isset($_POST['Users'])) {

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
                print '<pre>';
                */
            }
            else {
                Yii::app()->user->setFlash('failed-add',"Проверьте правильность введенных данных");
            }

        }


        $this->render('index',array(
            'modelH'  => $modelH,
            'modelR'  => $modelR,
            'modelU'  => $modelU,
            'userData'=> $this->substitution(),
        ));
    }





    /**
     * @return array action filters
     */

    public function filters()
    {
        return array( 'accessControl');
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(

            array('allow',
                'actions'=>array('index', 'two', 'three', 'four', 'five'),
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }





}