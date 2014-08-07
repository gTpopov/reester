<?php

    Yii::app()->clientScript->registerCssFile('/css/application/sign/in.css');

    $this->pageTitle = Yii::app()->name . ' | Вход';

?>
<script type="text/javascript">
    $(function(){

        $('#pre-header').children('div').children('span').children('.pull-right').children('a:nth-child(1)').addClass('active-sub-menu-item');

    });
</script>


    <div id="alert-keeper" class="col-md-5 col-md-offset-4">
        <?php if(Yii::app()->user->hasFlash('failed-enter')): ?>
            <div class="col-md-12 alert alert-danger">
                <h4 class="text-center">Произошла ошибка</h4>
                <div class="text-center">
                    <?php echo Yii::app()->user->getFlash('failed-enter'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div id="auth-form" class="form-in col-sm-5 col-sm-offset-4">
        <h3 class="text-center" id="title">Вход в личный кабинет</h3>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <p class="note col-md-12 text-center">Поля отмеченные <span class="required">*</span> обязательны к заполнению.</p>

            <div class="col-md-12">
                <?php echo $form->labelEx($model,'email',array('class'=>'title-form col-md-12')); ?>
                <?php echo $form->emailField($model,'email',array('class'=>'form-control','placeholder'=>'example@domain.com')); ?>
                <?php echo $form->error($model,'email',array('class'=>'alert alert-danger')); ?>
            </div>

            <div class="col-md-12">
                <?php echo $form->labelEx($model,'password',array('class'=>'title-form col-md-12')); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'ваш пароль')); ?>
                <?php echo $form->error($model,'password',array('class'=>'alert alert-danger')); ?>
            </div>


            <div class="col-md-12 buttons">
                <div class="pull-left remember-me">
                    <?php echo $form->checkBox($model,'remember_me',array('checked'=>'true')); ?>
                    <?php echo $form->label($model,'remember_me'); ?>
                </div>
                <a href="/sign/repair" id="remind-password">Забыл пароль</a>
                <?php echo CHtml::submitButton('Войти',array(
                    'class' => 'btn btn-success pull-right'
                )); ?>
            </div>
        <?php $this->endWidget(); ?>

    </div>
    <img id="bottom-shadow" class="col-sm-offset-4 col-sm-5" src="/img/project-style/shadow-bottom-img.png">