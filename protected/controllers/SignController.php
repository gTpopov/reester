<?php

class SignController extends Controller {

    /*
     * Authorization user
     */
    public function actionIn(){

        $model = new LoginForm();

        if(isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            if($model->validate())
            {
                //Check locking user
                $ac_u = Users::model()->findBySql('SELECT uid, access_user, locking_user FROM users WHERE email = :email',array('email'=>$_POST['LoginForm']['email']));
                if($ac_u->locking_user == 0)
                {
                    //Check access user
                    if($ac_u->access_user == 0) {
                        Yii::app()->user->setFlash('failed-enter',"Ваш аккаунт еще не подтвержден");
                    }
                    else {

                        if($model->login()) {
                            $this->redirect('/users/default/index');
                        }
                    }
                }
                else {
                    Yii::app()->user->setFlash('failed-enter',"Ваш аккаунт заблокирован");
                }
            }
            else {
                Yii::app()->user->setFlash('failed-enter',"Некорректный логин или пароль");
            }
        }

        $this->render('in',array('model' => $model));
    }


    /*
     * Repair password user
     */
    public function actionRepair(){

        $model = new RepairForm;

        if(isset($_POST['RepairForm']))
        {
            $model->attributes = $_POST['RepairForm'];
            if($model->validate())
            {
                $password_new = $this->make_password(10);

                $email = (string) mb_strtolower(str_replace(" ","",$_POST['RepairForm']['email']),'utf-8');
                $password  = (string) md5('reester_2014'.$password_new);

                if(Users::model()->updateAll(array('password'=>''.$password.''),'email="'.$email.'"'))
                {

                    //Send letter on email
                    $message = '<p>Приветсвуем на Reester.ru!<br>
                                Для входа в систему используйте новый пароль: '.$password_new.'</p>';

                    Yii::app()->mailer->From = "admin@reester.ru";
                    Yii::app()->mailer->FromName = "[Reester.ru]";
                    Yii::app()->mailer->AddAddress("".$email."", 'Имя');
                    Yii::app()->mailer->IsHTML(true);
                    Yii::app()->mailer->Subject = "Востановление пароля на Reester.ru";
                    Yii::app()->mailer->Body = $message;

                    if(!Yii::app()->mailer->Send()) {
                        Yii::app()->user->setFlash('failed-repair','Ошибка отправки сообщения');
                    }
                    else {
                        Yii::app()->user->setFlash('success-repair','На ваш email отправлен новый пароль');
                    }

                } else {
                    Yii::app()->user->setFlash('failed-repair','Email некорректен');
                }
            }
        }

        $this->render('repair',array('model' => $model));
    }

    /*
     * Registry user
     */
    public function actionUp(){

        $model=new Users();

        $model->setScenario('registration');

        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];

            if($model->validate())
            {
                $connection = Yii::app()->db;

                $email      = (string) mb_strtolower(str_replace(" ","",$_POST['Users']['email']));
                $password   = (string) md5('reester_2014'.$_POST['Users']['password']);
                $type_account  = $_POST['Users']['type_account'];
                $first_name = (string) strip_tags(htmlspecialchars($_POST['Users']['first_name']));
                $company = !empty($_POST['Users']['company'])?$_POST['Users']['company']:'';
                $sign_datetime = date('Y-m-d');

                $sql = "INSERT INTO users (type_account, company, first_name, email, password, sign_datetime)
                        VALUES (".$type_account.", '".$company."', '".$first_name."','".$email."','".$password."','".$sign_datetime."')";

                $connection->createCommand($sql)->execute();
                $user_id   = (int) Yii::app()->db->lastInsertID;


                //Create folder for user
                if(!file_exists('files/'.$user_id.'')) {
                    mkdir('files/'.$user_id.'');
                    copy('files/index.html','files/'.$user_id.'/index.html');
                }


                //Send letter on email
                $message = '
                    <p>
                        <b>'.$_POST['Users']['first_name'].'!</b>
                        <br> Подтвердите свою регистрацию перейдя по
                        <a href="'.Yii::app()->request->hostInfo.'/sign/act?_ukey='.$password.'&uid='.$user_id.'&__utime='.time().'">ссылке
                        </a> или скопируйте '.Yii::app()->request->hostInfo.'/sign/act?_ukey='.$password.'&uid='.$user_id.'&__utime='.time().'
                    </p>';

                Yii::app()->mailer->From = "admin@reester.ru";
                Yii::app()->mailer->FromName = "[Reester.ru]";
                Yii::app()->mailer->AddAddress("".$email."", 'Имя');
                Yii::app()->mailer->IsHTML(true);
                Yii::app()->mailer->Subject = "Reester.ru - верификация аккаунта";
                Yii::app()->mailer->Body = $message;

                if(!Yii::app()->mailer->Send()) {
                    Yii::app()->user->setFlash('failed-registration','registrationPage','Ошибка отправки сообщения');
                }
                else {
                    Yii::app()->user->setFlash('success-registration','На вашу электропочту было отправленно письмо с дальнейшими инструкциями');
                }
            }
            else {
                Yii::app()->user->setFlash('failed-registration','По определенным причинам вы не были зарегистрированны, повторите попытку позже, или обратитесь в службу поддержки');
            }
        }

        $this->render('up',array('model' => $model));
    }

    /**
     * Function activation account from mail
     */
    public function actionAct()
    {

        if(isset($_GET['_ukey']))
        {
            //$model = new Users();
            $uid = intval($_GET['uid']);
            $str = Users::model()->findByPk($uid);
            $key = $str->password;

            if($key === $_GET['_ukey'] && $str->access_user === '0')
            {
                $cookieID = new CHttpCookie('__utId',$uid);
                Yii::app()->request->cookies['__utId']  = $cookieID;

                $model_auto_login = new LoginForm();
                $_POST['LoginForm']['email'] = $str->email;
                $_POST['LoginForm']['password'] = $str->password;

                $model_auto_login->attributes = $_POST['LoginForm'];

                if($model_auto_login->login())
                {
                    unset(Yii::app()->request->cookies['__utId']);

                    if(Users::model()->updateByPk($uid,array('access_user'=>'1')))
                    {
                        //print 'success';
                        $this->redirect('/users/');
                    }
                    else {
                        //print 1;
                        $this->redirect('/');
                    }
                }
                else {
                    //print 2;
                    $this->redirect("/");
                }
            }
            else {
                //print 3;
                $this->redirect("/");
            }
        }

    }

    //Generator password
    public function make_password($num_chars) {

        if(is_numeric($num_chars) && $num_chars>0 && (!is_null($num_chars)))
        {
            $password = '';
            $accepted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()+';
            srand(((int)((double)microtime()*1000003)));
            for($i=0;$i<=$num_chars;$i++){
                $random_number = rand(0,(strlen($accepted_chars)-1));
                $password.=$accepted_chars[$random_number];
            }
            return $password;
        }

    }

    /*
     * Logout user
     */
    public function actionExit()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }


} 