<?php

    Yii::app()->clientScript->registerCssFile('/css/application/sign/in.css');

    $this->pageTitle = Yii::app()->name . ' | Вход';

?>

    <div id="alert-keeper" class="col-md-5 col-md-offset-4">
        <?php if(Yii::app()->user->hasFlash('success-repair')): ?>
            <div class="col-md-12 alert alert-success">
                <p class="alert-message"><?php echo Yii::app()->user->getFlash('success-repair'); ?></p>
            </div>

        <?php elseif(Yii::app()->user->hasFlash('failed-repair')): ?>
            <div class="col-md-12 alert alert-danger">
                <p class="alert-message"><?php echo Yii::app()->user->getFlash('failed-repair'); ?></p>
            </div>
        <?php endif; ?>
    </div>

    <div id="auth-form" class="form-in col-sm-5 col-sm-offset-4">
        <h3 class="text-center" id="title">Восстановить пароль</h3>

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'enter-form',
            'action'=>Yii::app()->createUrl('/sign/repair'),
            'enableAjaxValidation'=>false,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            )
        )); ?>

        <div class="col-md-12">
            <?php echo $form->labelEx($model,'Электропочта вашей учетной записи *',array('class'=>'title-form col-md-12')); ?>
            <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'email@example.com')); ?>
            <?php echo $form->error($model,'email',array('class'=>'alert alert-danger')); ?>
        </div>

        <div class="col-md-12 buttons">
            <a href="/sign/up" id="sign-up-password">Присоединиться!</a>
            <?php echo CHtml::submitButton('Восстановить пароль',array(
                'class' => 'btn btn-success pull-right'
            )); ?>
        </div>
        <?php $this->endWidget(); ?>

    </div>