<?php

    Yii::app()->clientScript->registerCssFile('/css/application/sign/up.css');

    $this->pageTitle = Yii::app()->name . ' | Регситрация';

?>
<script type="text/javascript">
    $(function(){

        $('#pre-header')
            .children('div').children('span')
            .children('.pull-right').children('a:nth-child(3)').addClass('active-sub-menu-item');

        $('#registry-form').children('.user-type').children('div').children('label').on('click',function(){
           if($(this).attr('id') != 'realtor-but'){
               $('#enter-name-block').slideUp();
           }else{
               $('#enter-name-block').slideDown();
           }
        });

    });
</script>

    <div id="alert-keeper" class="col-md-5 col-md-offset-4">

        <?php if(Yii::app()->user->hasFlash('success-registration')): ?>
            <div class="col-md-12 alert alert-success">
                <h4 class="text-center">Вы успешно зарегестрированны</h4>
                <div class="text-center">
                    <?php echo Yii::app()->user->getFlash('success-registration'); ?>
                </div>
            </div>

        <?php elseif(Yii::app()->user->hasFlash('failed-registration')): ?>
            <div class="col-md-12 alert alert-danger">
                <h4 class="text-center">Произошла ошибка</h4>
                <div class="text-center">
                    <?php echo Yii::app()->user->getFlash('failed-registration'); ?>
                </div>
            </div>

        <?php endif; ?>
    </div>

    <div id="auth-form" class="form-in col-sm-5 col-sm-offset-4">
        <h3 class="text-center" id="title">Регистрация на <?php echo Yii::app()->name ?></h3>

        <p class="note col-md-12 text-center">Поля отмеченные <span class="required">*</span> обязательны к заполнению.</p>

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'registry-form',
            'action'=>Yii::app()->createUrl('/sign/up'),
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            )
        )); ?>

        <div class="col-md-12">
            <?php echo $form->labelEx($model,'first_name',array('class'=>'title-form col-md-12')); ?>
            <?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>'Имя')); ?>
            <?php echo $form->error($model,'first_name',array('class'=>'alert alert-danger')); ?>
        </div>

        <div class="col-md-12">
            <?php echo $form->labelEx($model,'email',array('class'=>'title-form col-md-12')); ?>
            <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'email@example.com')); ?>
            <?php echo $form->error($model,'email',array('class'=>'alert alert-danger')); ?>
        </div>

        <div class="col-md-12">
            <?php echo $form->labelEx($model,'password',array('class'=>'title-form col-md-12')); ?>
            <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Пароль')); ?>
            <?php echo $form->error($model,'password',array('class'=>'alert alert-danger')); ?>
        </div>

        <div id="user-accept" class="col-md-12 padding-horizontal-10-px text-center">
            <small>
                Регистрируясь, вы автоматически принимаете<br> <a id="" href="#">Пользовательское соглашение</a>
            </small>
        </div>

        <div class="user-type col-md-12">
            <?php echo $form->labelEx($model,'Тип желаемой учетной записи',array('class'=>'title-form col-md-12')); ?>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="Users[type_account]" id="owner" value="1" checked> Собственник
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="Users[type_account]" id="owner-spokesman" value="2"> Частный риелтор
                </label>
                <label class="btn btn-primary" id="realtor-but">
                    <input type="radio" name="Users[type_account]" id="realtor" value="3"> Компания
                </label>
            </div>
        </div>

        <div id="enter-name-block" class="col-md-10 col-md-offset-1 none-display">
            <input type="text" name="Users[company]" placeholder="Название вашей компании ( не обязательно )" class="form-control error">
        </div>

        <div class="col-md-12 padding-horizontal-10-px buttons">
            <?php echo CHtml::submitButton('Подтвердить',array(
                'class' => 'btn btn-success pull-right'
            )); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
    <img id="bottom-shadow" class="col-md-offset-4 col-md-5" src="/img/project-style/shadow-bottom-img.png">