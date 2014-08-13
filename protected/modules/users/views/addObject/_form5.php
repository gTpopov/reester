<?php
//Yii::app()->getClientScript()->registerScriptFile( Yii::app()->baseUrl.'/js/lib/jquery.autocomplete.js');
//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/lib/autocomplete.css');
?>


<div id="alert-keeper" class="col-md-13">

    <?php if(Yii::app()->user->hasFlash('failed-add')): ?>
        <div class="col-md-12 alert alert-danger">
            <h4 class="text-center">Произошла ошибка</h4>
            <div class="text-center">
                <?php echo Yii::app()->user->getFlash('failed-add'); ?>
            </div>
        </div>

    <?php endif; ?>
</div>

<div id="add-obj-fl-ap-nw-sale" class="col-md-12">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'add-object',
    'action'=>Yii::app()->createUrl('/users/addObject/four'),
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div id="step-one" class="row">
<h3 id="add-obj-fl-ap-nw-sale-title" class="no-margin col-md-12">
    Шаг 1
    <small>расположение</small>
</h3>
<div class="col-md-12">
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-5">
                        <span id="city-title" class="pull-right title">
                            <?php echo $form->labelEx($modelH,'city'); ?>
                        </span>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="contain-slct">
                            <div id="underground-station" class="select-int">
                                <div class="select">
                                    <a href="javascript:;" class="slct">Укажите город</a>
                                    <ul class="drop" id="listCity">
                                        <li><span data-value="1">Москва</span></li>
                                    </ul>
                                    <?php echo $form->hiddenField($modelH,'city',array('id'=>'selected-city','value'=>'')); ?>
                                    <?php echo $form->error($modelH,'city',array('class'=>'alert alert-danger')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-5">
                        <span id="state-title" class="pull-right title">
                            <?php echo $form->labelEx($modelH,'district'); ?>
                        </span>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="contain-slct">
                            <div id="underground-station" class="select-int">
                                <div class="select">
                                    <a href="javascript:;" class="slct nameDistrict">Укажите округ</a>
                                    <ul class="drop" id="listDistrict"></ul>
                                    <?php echo $form->hiddenField($modelH,'district',array('id'=>'selected-state','value'=>'')); ?>
                                    <?php echo $form->error($modelH,'district',array('class'=>'alert alert-danger')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-5">
                        <span id="state-obj-title" class="pull-right title">
                            <?php echo $form->labelEx($modelH,'region'); ?>
                        </span>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="contain-slct">
                            <div id="underground-station" class="select-int">
                                <div class="select">
                                    <a href="javascript:;" class="slct nameRegion">Укажите район</a>
                                    <ul class="drop" id="listRegion"></ul>
                                    <?php echo $form->hiddenField($modelH,'region',array('id'=>'selected-state-obj-city','value'=>'')); ?>
                                    <?php echo $form->error($modelH,'region',array('class'=>'alert alert-danger')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="row padding-horizontal-10-px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <span id="underground-title" class="pull-left title">
                        <?php echo $form->labelEx($modelH,'undeground'); ?>
                    </span>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="contain-slct">
                            <div id="underground-station" class="select-int">
                                <div class="select">
                                    <a href="javascript:;" class="slct nameMetro">Укажите станцию метро</a>
                                    <ul class="drop" id="listMetro"></ul>
                                    <?php echo $form->hiddenField($modelH,'undeground',array('id'=>'selected-underground-station','value'=>'')); ?>
                                    <?php echo $form->error($modelH,'undeground',array('class'=>'alert alert-danger')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <span id="time-to-underground-title" class="pull-left title">
                         <?php echo $form->labelEx($modelH,'metro_time'); ?>
                    </span>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <?php echo $form->textField($modelH,'metro_time',array('class'=>'form-control','maxlength'=>"2",'placeholder'=>'')); ?>
                                <?php echo $form->error($modelH,'metro_time',array('class'=>'alert alert-danger')); ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row"><small class="pull-left" id="time-to-underground-helper">мин.</small></div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="contain-slct">
                                    <div id="time-to-underground-station" class="select-int">
                                        <div class="select">
                                            <a href="javascript:;" class="slct">Как добраться</a>
                                            <ul class="drop">
                                                <li><span data-value="1">пешком</span></li>
                                                <li><span data-value="2">на машине</span></li>
                                            </ul>
                                            <input type="hidden" id="selected-time-to-underground-station" />
                                            <?php echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>0)); ?>
                                            <?php echo $form->error($modelH,'metro_way',array('class'=>'alert alert-danger')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php echo $form->error($modelH,'metro_time',array('class'=>'alert alert-danger')); ?>
                        <?php echo $form->error($modelH,'metro_time',array('class'=>'alert alert-danger')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-7">
    <div class="row padding-horizontal-10-px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5 text-right">
                    <span id="street-sq-prs-title" class="pull-left col-md-12 title">
                        <?php echo $form->labelEx($modelH,'street'); ?>
                    </span>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <input type="text" id="streetID" class="form-control" placeholder="улица / проспект / площадь Панаса Саксаганского">
                        <?php echo $form->hiddenField($modelH,'street',array('value'=>'')); ?>
                        <?php echo $form->error($modelH,'street',array('class'=>'alert alert-danger')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 text-right">
                        <span id="building-number-title" class="pull-right title">
                            <?php echo $form->labelEx($modelH,'house_number'); ?>
                        </span>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <?php echo $form->textField($modelH,'house_number',array('class'=>'form-control','placeholder'=>'10','maxlength'=>"10")); ?>
                    </div>
                </div>
                <div style="padding-right: 0" class="col-md-12">
                    <?php echo $form->error($modelH,'house_number',array('class'=>'alert alert-danger')); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 text-right">
                        <span id="building-ma-s-pr-number-title" class="pull-right title">
                            <?php echo $form->labelEx($modelH,'structur'); ?>
                        </span>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <?php echo $form->textField($modelH,'structur',array('class'=>'form-control','placeholder'=>'7','maxlength'=>"10")); ?>
                    </div>
                </div>
                <div style="padding-right: 0" class="col-md-12">
                    <?php echo $form->error($modelH,'structur',array('class'=>'alert alert-danger')); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 text-right">
                        <span id="building-corpus-title" class="pull-right title">
                             <?php echo $form->labelEx($modelH,'housing'); ?>
                        </span>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <?php echo $form->textField($modelH,'housing',array('class'=>'form-control','placeholder'=>'12 Б','maxlength'=>"10")); ?>
                    </div>
                </div>
                <div style="padding-right: 0" class="col-md-12">
                    <?php echo $form->error($modelH,'housing',array('class'=>'alert alert-danger')); ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div id="step-two" class="row">
<h3 id="add-obj-fl-ap-nw-sale-title" class="no-margin col-md-12">
    Шаг 2
    <small>технические характеристики</i></small>
</h3>
<div class="col-md-12">
<div class="row">
<div class="col-md-5">
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
                        <span id="rooms-title" class="pull-right title">
                           <?php echo $form->labelEx($modelR,'room'); ?>
                        </span>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="contain-slct">
                    <div id="rooms-number" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct"> 1 </a>
                            <ul class="drop"></ul>
                            <?php echo $form->hiddenField($modelR,'room',array('id'=>'selected-room','value'=>1)); ?>
                            <?php echo $form->error($modelR,'room',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <span id="rooms-title" class="pull-right title">
               <?php echo $form->labelEx($modelR,'isolated'); ?>
            </span>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="contain-slct">
                    <div id="rooms-number" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct">Количество изолированных комнат </a>
                            <ul class="drop"></ul>
                            <?php echo $form->hiddenField($modelR,'isolated',array('id'=>'selected-room','value'=>'')); ?>
                            <?php echo $form->error($modelR,'isolated',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <span id="total-square-price" class="pull-left title">
                <?php echo $form->labelEx($modelR,'general_area'); ?>
            </span>
        </div>
        <div class="col-md-7">
            <div class="row">
                <?php echo $form->textField($modelR,'general_area',array('class'=>'form-control','value'=>'')); ?>
                <?php echo $form->error($modelR,'general_area',array('class'=>'alert alert-danger')); ?>
            </div>
        </div>
        <div class="col-md-1">
            <div class="row sq-m">
                <small>
                    m <sup>2</sup>
                </small>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <span id="living-square-price" class="pull-left title">
                <?php echo $form->labelEx($modelR,'human_area'); ?>
            </span>
        </div>
        <div class="col-md-7">
            <div class="row">
                <?php echo $form->textField($modelR,'human_area',array('class'=>'form-control','value'=>'')); ?>
                <?php echo $form->error($modelR,'human_area',array('class'=>'alert alert-danger')); ?>
            </div>
        </div>
        <div class="col-md-1">
            <div class="row sq-m">
                <small>
                    m <sup>2</sup>
                </small>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <span id="kitchen-square-price" class="pull-left title">
                 <?php echo $form->labelEx($modelR,'kitchen_area'); ?>
            </span>
        </div>
        <div class="col-md-7">
            <div class="row">
                <?php echo $form->textField($modelR,'kitchen_area',array('class'=>'form-control','value'=>'')); ?>
                <?php echo $form->error($modelR,'kitchen_area',array('class'=>'alert alert-danger')); ?>
            </div>
        </div>
        <div class="col-md-1">
            <div class="row sq-m">
                <small>
                    m <sup>2</sup>
                </small>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <span id="kitchen-square-price" class="pull-left title">
                 <?php echo $form->labelEx($modelH,'plot'); ?>
            </span>
        </div>
        <div class="col-md-7">
            <div class="row">
                <?php echo $form->textField($modelH,'plot',array('class'=>'form-control','value'=>'')); ?>
                <?php echo $form->error($modelH,'plot',array('class'=>'alert alert-danger')); ?>
            </div>
        </div>
        <div class="col-md-1">
            <div class="row sq-m">
                <small>
                    m <sup>2</sup>
                </small>
            </div>
        </div>
    </div>
    <div class="row text-left padding-horizontal-10-px">
        <div class="col-md-4">
                <span id="windows-title" class="pull-right title">
                    <?php echo $form->labelEx($modelR,'status'); ?>
                </span>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="contain-slct">
                    <div id="windows-number" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct"> Укажите состояние объекта </a>
                            <ul class="drop">
                                <li><span data-value="1">дизайнпроект</span></li>
                                <li><span data-value="2">отличное состояние</span></li>
                                <li><span data-value="3">свежий ремонт</span></li>
                                <li><span data-value="4">среднее состояние</span></li>
                                <li><span data-value="5">без отделки</span></li>
                                <li><span data-value="6">первичная отделка</span></li>
                                <li><span data-value="7">требует ремонт</span></li>
                                <li><span data-value="8">косметический ремонт</span></li>
                            </ul>
                            <?php echo $form->hiddenField($modelR,'status',array('id'=>'selected-windows','value'=>'')); ?>
                            <?php echo $form->error($modelR,'status',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-left padding-horizontal-10-px">
        <div class="btn-group wc" data-toggle="buttons">
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelH,'water',array('id'=>'second-hand-type','value'=>1)); ?> Вода
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelH,'heating',array('id'=>'second-hand-type','value'=>1)); ?> Отопление
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelH,'gas',array('id'=>'second-hand-type','value'=>1)); ?> Газ
            </label>
        </div>
    </div>
    <div class="row text-left padding-horizontal-10-px">
        <div class="btn-group wc" data-toggle="buttons">
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelH,'electricity',array('id'=>'second-hand-type','value'=>1)); ?> Электричество
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelH,'sewage',array('id'=>'second-hand-type','value'=>1)); ?> Цен. канализация
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelH,'septic',array('id'=>'second-hand-type','value'=>1)); ?> Септик
            </label>
        </div>
    </div>
    <div class="row text-left padding-horizontal-10-px">
        <div class="btn-group dev-balk" data-toggle="buttons">
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelR,'covered_space',array('id'=>'second-hand-type','value'=>1)); ?> Огражденная территория
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelR,'balcony',array('id'=>'second-hand-type','value'=>1)); ?> Балкон / Лоджия
            </label>
        </div>
    </div>

</div>
<div class="col-md-5 col-md-offset-2">


    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
            <span id="wall-material-title" class="pull-right title">
                <?php echo $form->labelEx($modelH,'type_house'); ?>
            </span>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="contain-slct">
                    <div id="wall-material-number" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct"> кирпичный </a>
                            <ul class="drop">
                                <li><span data-value="1">кирпичный</span></li>
                                <li><span data-value="2">монолитный</span></li>
                                <li><span data-value="3">монолитно-кирпичный</span></li>
                                <li><span data-value="4">панельный</span></li>
                                <li><span data-value="5">дерево</span></li>
                                <li><span data-value="6">природный кемень</span></li>
                            </ul>
                            <?php echo $form->hiddenField($modelH,'type_house',array('id'=>'selected-wall-material','value'=>1)); ?>
                            <?php echo $form->error($modelH,'type_house',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row padding-horizontal-10-px">
        <div class="col-md-4">
                        <span id="floors-title" class="pull-right title">
                            <?php echo $form->labelEx($modelH,'floors'); ?>
                        </span>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="contain-slct">
                    <div id="floors-number" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct"> 1 </a>
                            <ul class="drop"></ul>
                            <?php echo $form->hiddenField($modelH,'floors',array('id'=>'selected-floors','value'=>'')); ?>
                            <?php echo $form->error($modelH,'floors',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-left padding-horizontal-10-px">
        <div class="col-md-4">
                        <span id="windows-title" class="pull-right title">
                            <?php echo $form->labelEx($modelR,'window'); ?>
                        </span>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="contain-slct">
                    <div id="windows-number" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct"> двор </a>
                            <ul class="drop">
                                <li><span data-value="1">двор</span></li>
                                <li><span data-value="2">улица</span></li>
                                <li><span data-value="3">двор +улица</span></li>
                            </ul>
                            <?php echo $form->hiddenField($modelH,'window',array('id'=>'selected-windows','value'=>'')); ?>
                            <?php echo $form->error($modelH,'window',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-left padding-horizontal-10-px">
        <div class="col-md-4">
        <span id="windows-title" class="pull-right title">
            <?php echo $form->labelEx($modelH,'class_home'); ?>
        </span>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="contain-slct">
                    <div id="windows-number" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct"> эконом </a>
                            <ul class="drop">
                                <li><span data-value="1">эконом</span></li>
                                <li><span data-value="2">бизнес</span></li>
                                <li><span data-value="3">элитный</span></li>
                            </ul>
                            <?php echo $form->hiddenField($modelH,'class_home',array('id'=>'selected-windows','value'=>1)); ?>
                            <?php echo $form->error($modelH,'class_home',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-left padding-horizontal-10-px">
        <div class="btn-group setts-r" data-toggle="buttons">
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelH,'part_house',array('id'=>'building-type','value'=>1)); ?> Часть дома
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelR,'furniture',array('id'=>'building-type','value'=>1)); ?> С мебелью
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelR,'discount',array('id'=>'building-type','value'=>1)); ?> Акции и скидки
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelR,'mortgage',array('id'=>'building-type','value'=>1)); ?> Ипотека
            </label>
        </div>
    </div>
    <div class="row text-left padding-horizontal-10-px">
        <div class="btn-group wc" data-toggle="buttons">
            <label class="btn btn-primary">
                <input type="radio" name="RealEstat[sanitare]" id="second-hand-type" value="1"> Разд. санузел
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="RealEstat[sanitare]" id="building-type" value="2"> Совмещенный
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="RealEstat[sanitare]" id="second-hand-type" value="3"> 2+ санузла
            </label>
        </div>
    </div>
    <div class="row text-left padding-horizontal-10-px">
        <div class="btn-group park" data-toggle="buttons">
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelR,'parking',array('id'=>'building-type','value'=>1)); ?> Паркинг
            </label>
            <label class="btn btn-primary">
                <?php echo $form->checkBox($modelR,'place_cars',array('id'=>'second-hand-type','value'=>1)); ?> Машиноместо
            </label>
        </div>
        <div class="btn-group plan" data-toggle="buttons">
            <label class="btn btn-primary text-center">
                <input type="radio" name="RealEstat[plan]" id="second-hand-type" value="1"> Своб. план.
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="RealEstat[plan]" id="building-type" value="2"> Студия
            </label>
        </div>
    </div>
    <div class="row text-left padding-horizontal-10-px">
        <?php echo $form->textArea($modelR,'add_info',array('class'=>'form-control', 'cols'=>50,'placeholder'=>'Укажите дополнительную информацию об объекте')); ?>
    </div>
</div>
</div>
</div>
</div>

<div class="row" id="step-three">
    <h3 id="add-obj-fl-ap-nw-rent-title" class="no-margin col-md-12">
        Шаг 3
        <small>условия и контакты</small>
    </h3>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-5">
                <div class="row padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="price-title" class="pull-left title">
                            <?php echo $form->labelEx($modelR,'price'); ?>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <?php echo $form->textField($modelR,'price',array('class'=>'form-control','placeholder'=>'Цена за объект','maxlength'=>"13")); ?>
                            <?php echo $form->error($modelR,'price',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="select">
                                <a href="javascript:;" class="slct"> месяц/сутки </a>
                                <ul class="drop">
                                    <li><span data-value="1">месяц</span></li>
                                    <li><span data-value="2">сутки</span></li>
                                </ul>
                                <?php echo $form->hiddenField($modelR,'cost_renting',array('id'=>'selected-windows','value'=>'')); ?>
                                <?php echo $form->error($modelR,'cost_renting',array('class'=>'alert alert-danger')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="row">
                            <div class="select text-center">
                                <a href="javascript:;" class="slct"> P </a>
                                <ul class="drop">
                                    <li style="padding-left: 0"><span data-value="1">P<span></li>
                                    <li style="padding-left: 0"><span data-value="2">$</span></li>
                                    <li style="padding-left: 0"><span data-value="3">&euro;</span></li>
                                </ul>
                                <?php echo $form->hiddenField($modelR,'currency',array('id'=>'selected-windows','value'=>1)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <?php echo $form->error($modelR,'price',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row padding-horizontal-10-px text-center" style="padding-top: 36px">
                            Укажите информацию об предоплате
                        </div>
                        <div class="row padding-horizontal-10-px">
                            <div class="btn-group wc" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="RealEstat[prepayment]" id="second-hand-type" value="1"> 1 месяц
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="RealEstat[prepayment]" id="second-hand-type" value="2"> 1 + 1 месяц
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="RealEstat[prepayment]" id="second-hand-type" value="3"> 1 + 2 месяца
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row  padding-horizontal-10-px">
                            <div class="btn-group dev-balk" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="RealEstat[lease]" id="second-hand-type" value="2"> Долгосрочно
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="RealEstat[lease]" id="second-hand-type" value="1"> Посуточно
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <div class="row padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="contact-face-title" class="pull-left title">
                            <?php echo $form->labelEx($modelU,'last_name'); ?>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <?php echo $form->textField($modelU,'last_name',array('class'=>'form-control','placeholder'=>'Василий Потапович Пупкин','value'=>$userData['last_name'])); ?>
                            <?php echo $form->error($modelU,'last_name',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
                <div class="row padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="contact-face-title" class="pull-left title">
                            <?php echo $form->labelEx($modelU,'phone'); ?>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <?php echo $form->textField($modelU,'phone',array('class'=>'form-control','placeholder'=>'+380 69 845 77 66','value'=>$userData['phone'])); ?>
                            <?php echo $form->error($modelU,'phone',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="contain-slct">
                                <div id="from-time-number" class="select-int">
                                    <div class="select">
                                        <a href="javascript:;" class="slct"> с </a>
                                        <ul class="drop"></ul>
                                        <?php echo $form->hiddenField($modelU,'call_with',array('id'=>'selected-state','value'=>'00')); ?>
                                        <?php echo $form->error($modelU,'call_with',array('class'=>'alert alert-danger')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="contain-slct">
                                <div id="to-time-number" class="select-int">
                                    <div class="select">
                                        <a href="javascript:;" class="slct"> до </a>
                                        <ul class="drop"></ul>
                                        <?php echo $form->hiddenField($modelU,'call_up',array('id'=>'selected-state','value'=>'00')); ?>
                                        <?php echo $form->error($modelU,'call_up',array('class'=>'alert alert-danger')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="phone-title" class="pull-left title">
                            <?php echo $form->labelEx($modelU,'sub_email'); ?>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <?php echo $form->textField($modelU,'sub_email',array('class'=>'form-control','placeholder'=>'name@example.com','value'=>$userData['sub_email'])); ?>
                            <?php echo $form->error($modelU,'sub_email',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
                <div class="row padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="contact-face-title" class="pull-left title">
                            <?php echo $form->labelEx($modelU,'skype'); ?>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <?php echo $form->textField($modelU,'skype',array('class'=>'form-control','placeholder'=>'Skype nickname','value'=>$userData['skype'])); ?>
                            <?php echo $form->error($modelU,'skype',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;border-top: 1px solid #ebebeb;padding-top: 15px;">
            <div class="col-md-5 photos-container">
                <div class="photo-item col-md-12 padding-horizontal-10-px"><input class="pull-left" type="file" name="photo[]"> <span class="pull-left add-photo-container">+</span></div>

                <div class="col-md-12" style="padding-left: 0;">
                    <div class="col-first col-md-12" style="text-align:left;width:190px;padding-left: 0;">
                        <div class="list-formats padding-horizontal-10-px" style="padding-top: 20px">
                            <b>Допустимые форматы:</b>
                            <img src="/img/project-style/settings_logo_file_formats.png" width="117">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-md-offset-1">
                <div class="row padding-horizontal-10-px">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="row padding-horizontal-10-px">
                            <?php echo CHtml::resetButton('Очитсить форму',array('class'=>'btn btn-danger')); ?>
                            <?php echo CHtml::submitButton('Добавить еще объект',array('class'=>'btn btn-info pull-right')); ?>
                        </div>
                        <div class="row padding-horizontal-10-px">
                            <?php echo CHtml::submitButton('Разместить объект',array('class'=>'btn btn-block btn-success')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>

</div>
