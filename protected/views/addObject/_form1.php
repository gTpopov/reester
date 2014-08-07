<?php
    //Yii::app()->getClientScript()->registerScriptFile( Yii::app()->baseUrl.'/js/lib/fusioncharts/fusioncharts.js');
    //Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/users/price/view-price.css');
?>


<div id="add-obj-fl-ap-nw-sale" class="col-md-12">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'registry-form',
    'action'=>Yii::app()->createUrl('/addObject/index'),
    //'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )
)); ?>

<div id="step-one" class="row">
    <h3 id="add-obj-fl-ap-nw-sale-title" class="no-margin col-md-12">
        Шаг 1
        <small>расположение <i>(Комбинация: Строящаяся -> Квартира и Аппартаменты -> Продать)</i></small>
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
                                        <ul class="drop">
                                            <li><span data-value="1">Питер</span></li>
                                            <li><span data-value="2">Казань</span></li>
                                            <li><span data-value="3">Мурманск</span></li>
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
                                        <a href="javascript:;" class="slct">Укажите округ</a>
                                        <ul class="drop">
                                            <li><span data-value="1">Центральный</span></li>
                                            <li><span data-value="2">Северный</span></li>
                                            <li><span data-value="3">Северо-Восточный</span></li>
                                            <li><span data-value="4">Восточный</span></li>
                                            <li><span data-value="5">Юго-Восточный</span></li>
                                        </ul>
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
                                        <a href="javascript:;" class="slct">Укажите район</a>
                                        <ul class="drop">
                                            <li><span data-value="1">Академический</span></li>
                                            <li><span data-value="2">Алексеевский</span></li>
                                            <li><span data-value="3">Алтуфьевский</span></li>
                                            <li><span data-value="4">Арбат</span></li>
                                            <li><span data-value="5">Аэропорт</span></li>
                                        </ul>
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
                                    <a href="javascript:;" class="slct">Укажите станцию метро</a>
                                    <ul class="drop">
                                        <li><span data-value="1">Вокзальная</span></li>
                                        <li><span data-value="2">Хрещатик</span></li>
                                        <li><span data-value="3">Минская</span></li>
                                        <li><span data-value="4">Ясенево</span></li>
                                        <li><span data-value="5">Арбатская</span></li>
                                    </ul>
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
                                <?php echo $form->textField($modelH,'metro_time',array('class'=>'form-control','placeholder'=>'10')); ?>
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
                                            <a href="javascript:;" class="slct">пешком</a>
                                            <ul class="drop">
                                                <li><span data-value="1">пешком</span></li>
                                                <li><span data-value="2">на машине</span></li>
                                            </ul>
                                            <input type="hidden" id="selected-time-to-underground-station" />
                                            <?php echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>1)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"><?php echo $form->error($modelH,'metro_time',array('class'=>'alert alert-danger')); ?></div>
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
                            <?php echo $form->textField($modelH,'street',array('class'=>'form-control','placeholder'=>'улица / проспект / площадь Панаса Саксаганского')); ?>
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
                            <?php echo $form->textField($modelH,'house_number',array('class'=>'form-control','placeholder'=>'10')); ?>
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
                            <?php echo $form->textField($modelH,'structur',array('class'=>'form-control','placeholder'=>'7')); ?>
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
                            <?php echo $form->textField($modelH,'housing',array('class'=>'form-control','placeholder'=>'12 Б')); ?>
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
        <small>технические характеристики</small>
    </h3>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-5">
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
                    <div class="btn-group dev-balk" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'covered_space',array('id'=>'second-hand-type','value'=>1)); ?> Огражденная территория
                        </label>
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'balcony',array('id'=>'second-hand-type','value'=>1)); ?> Балкон / Лоджия
                        </label>
                    </div>
                </div>


                <div class="row text-left padding-horizontal-10-px">
                    <div class="btn-group furnt" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'finished',array('id'=>'building-type','value'=>1)); ?> С отделкой
                        </label>
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'furniture',array('id'=>'building-type','value'=>1)); ?> С мебелью
                        </label>
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'fz_214',array('id'=>'building-type','value'=>1)); ?> ФЗ 214
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-md-5 col-md-offset-1">

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="floors-title" class="pull-right title">
                            <?php echo $form->labelEx($modelR,'store'); ?>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="contain-slct">
                                <div id="floors-number" class="select-int">
                                    <div class="select">
                                        <a href="javascript:;" class="slct"> 1 </a>
                                        <ul class="drop"></ul>
                                        <?php echo $form->hiddenField($modelR,'store',array('id'=>'selected-floors','value'=>1)); ?>
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
                                        <?php echo $form->hiddenField($modelR,'window',array('id'=>'selected-windows','value'=>1)); ?>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-left padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="windows-title" class="pull-right title">
                            <?php echo $form->labelEx($modelR,'deadline'); ?>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="contain-slct">
                                <div id="date-of-end-number" class="select-int">
                                    <div class="select">
                                        <a href="javascript:;" class="slct"> 2014 </a>
                                        <ul class="drop"></ul>
                                        <?php echo $form->hiddenField($modelR,'deadline',array('id'=>'selected-windows','value'=>'2014')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-left padding-horizontal-10-px">
                    <div class="col-md-4">
                        <span id="windows-title" class="pull-right title">
                            <?php echo $form->labelEx($modelR,'stage'); ?>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="contain-slct">
                                <div id="windows-number" class="select-int">
                                    <div class="select">
                                        <a href="javascript:;" class="slct"> нулевой цикл </a>
                                        <ul class="drop">
                                            <li><span data-value="1">нулевой цикл</span></li>
                                            <li><span data-value="2">первые этажи</span></li>
                                            <li><span data-value="3">средние этажи</span></li>
                                            <li><span data-value="4">последние этажи</span></li>
                                            <li><span data-value="5">отделка</span></li>
                                            <li><span data-value="6">благоустройство</span></li>
                                            <li><span data-value="7">выдача ключей</span></li>
                                        </ul>
                                        <?php echo $form->hiddenField($modelR,'stage',array('id'=>'selected-windows','value'=>1)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <div class="btn-group setts-r" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'club_type',array('id'=>'building-type','value'=>1)); ?> Клубный тип
                        </label>
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'discount',array('id'=>'building-type','value'=>1)); ?> Акции и скидки
                        </label>
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'mortgage',array('id'=>'building-type','value'=>1)); ?> Ипотека
                        </label>
                        <label class="btn btn-primary">
                            <?php echo $form->checkBox($modelR,'developer',array('id'=>'building-type','value'=>1)); ?> Застройщик
                        </label>
                    </div>
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
                    <div class="col-md-7">
                        <div class="row">
                            <?php echo $form->textField($modelR,'price',array('class'=>'form-control','placeholder'=>'120')); ?>
                            <?php echo $form->error($modelR,'price',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="row text-center">
                            <small>
                                <img style="vertical-align: -10px" src="/img/project-style/rur_middle_sign.png">
                            </small>
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
                            <?php echo $form->textField($modelU,'sub_email',array('class'=>'form-control','placeholder'=>'name@example.com')); ?>
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
                            <?php echo $form->textField($modelU,'skype',array('class'=>'form-control','placeholder'=>'Skype nickname')); ?>
                            <?php echo $form->error($modelU,'skype',array('class'=>'alert alert-danger')); ?>
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
                            <?php echo $form->textField($modelU,'last_name',array('class'=>'form-control','placeholder'=>'Василий Потапович Пупкин')); ?>
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
                            <?php echo $form->textField($modelU,'phone',array('class'=>'form-control','placeholder'=>'+380 69 845 77 66')); ?>
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
                    </div>
                    <div class="col-md-8">
                        <div class="row padding-horizontal-10-px">
                            <?php echo CHtml::resetButton('Очитсить форму',array('class'=>'btn btn-danger')); ?>
                            <?php echo CHtml::submitButton('Добавить еще объект',array('class'=>'btn btn-info pull-right')); ?>
                        </div>
                        <div class="row padding-horizontal-10-px">
                            <?php echo CHtml::submitButton('Добавить объект',array('class'=>'btn btn-block btn-success')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-right: 0;">
                <?php echo $form->textArea($modelR, 'add_info',array('class'=>'col-md-12 form-control','placeholder'=>'Дополнительное описание вашего объекта')); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'logo-form',
    'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )
)); ?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-2">
            <div class="row text-left padding-horizontal-10-px">
                <?php
                    if(file_exists("files/".Yii::app()->user->id."/logo".Yii::app()->user->id.".jpg")) {
                        echo '<img src="/files/'.Yii::app()->user->id.'/logo'.Yii::app()->user->id.'.jpg?rd='.time().'" width="117">';
                    } else {
                        echo '<img id="prss" src="/img/project-style/settings_img_additional_info.png" width="117">';
                    }
                ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row text-center padding-horizontal-10-px">
                <button class="btn btn-info btn-block" id="addFoto" style="margin-bottom: 10px; width: 200px">Загрузить</button>
                <script>
                    $(function(){
                        if($('#prss').length > 0){
                            $('#addFoto').attr('disabled',true)
                        }
                    });
                </script>
                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                    'id'=>'EAjaxUpload',
                    'config' =>
                        array(
                            'action'=>$this->createUrl('ajfile/upload'),
                            'template'=>'
                                    <div class="qq-uploader">
                                        <div class="qq-upload-drop-area">
                                            <span>Drop files here to upload</span>
                                        </div>
                                        <div style="width: 200px" class="qq-upload-button btn btn-success btn-block">Добавить фото</div>
                                        <div id="progress-bar">
                                            <div class="per-load"></div>
                                        </div>
                                    <ul class="qq-upload-list row" style="margin: 0 !important;"></ul>',
                            'debug'=>false,
                            'allowedExtensions'=>array('jpg','gif','png','jpeg'),
                            'sizeLimit'=>3*1024*1024,// maximum file size in bytes (3M)
                            //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                            'onComplete'=>"js:function(id, fileName, responseJSON){
                                    if(responseJSON.success==true) {
                                        window.location.replace('/addObject/index');
                                    }
                                    else {
                                        $('.qq-upload-list').html('<li>Ошибка загрузки файла.</li>');
                                    }
                                }",
                            'messages'=>array(
                                'typeError'=>"<div class='alert alert-danger'>Файл <b>{file}</b> имеет недопустимое разрешение. Используйте форматы: {extensions}.</div>",
                                'sizeError'=>"<div class='alert alert-danger'>Размер файла <b>{file}</b> превышает допустимый. Максимум: {sizeLimit}.</div>",
                                /*'minSizeError'=>"<li>Размер файл <b>{file}</b> слишком маленький. Минимум: {minSizeLimit}.</li>",*/
                                'emptyError'=>"<div class='alert alert-danger'>Файл <b>{file}</b> пустой. Пожалуйста, выберите другой файл.</div>",
                                /*'onLeave'=>"<li>Файл загружается. Если вы оставите сейчас загрузка будет отменена.</li>"*/
                            ),
                            'showMessage'=>"js:function(message){ $('.qq-upload-list').html(message); }"
                        )
                )); ?>
                <?php if(file_exists("files/".Yii::app()->user->id."/logo".Yii::app()->user->id.".jpg")): ?>
                    <?php echo CHtml::ajaxLink('Удалить',
                        array('ajfile/delete'),
                        array('type'    => 'post',
                            'dataType'=> 'json',
                            'data'    =>  array('id'=>Yii::app()->user->id),
                            'success' => 'js:function(data) {

                                           if(data.response == "success") {

                                              //$("#logoDataEdit,.dl-logoInfo").slideToggle(300);
                                              window.location.replace("/addObject/index");

                                           } else {
                                               alert("Ошибка удаления");
                                           }

                                      }',
                            'error'=>'js:function() { alert("Ошибка сервера. Перезагрузите страницу"); }'
                        ),array( 'class' => "btn btn-warning pull-left",'style'=>'margin-top:10px'));
                    ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-7">
            <?php if(!file_exists("files/".Yii::app()->user->id."/logo".Yii::app()->user->id.".jpg")): ?>
                <div class="col-md-12">
                    <div class="col-first col-md-6" style="text-align:left;width:130px;"></div>
                    <div class="col-second col-md-6">
                        <div class="list-formats padding-horizontal-10-px" style="padding-top: 20px">
                            <b>Допустимые форматы:</b>
                            <img src="/img/project-style/settings_logo_file_formats.png" width="117">
                        </div>
                    </div>
                </div>
            <?php else: ?>

                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="row padding-horizontal-10-px"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">

    $(function(){

        $('#addFoto').click(function(){

            $('#logoDataEdit').slideToggle(100);

        });
    });

</script>

    <?php $this->endWidget(); ?>


