<?php

Yii::app()->clientScript->registerCssFile('/css/application/index/index.css')
    ->registerScriptFile('/js/application/index/index.js');
?>

<div id="add-obj-fl-ap-nw-sale" class="col-sm-12">

<form method="post" action="/result/index">
FORM 1 Купить -> Строящаяся -> Квартира (Аппартаменты)
<div class="col-sm-12">
<div class="row padding-horizontal-10-px" id="select-combination">
<div class="col-sm-12">
    <div class="row" style="border-bottom: 1px solid #DDD; padding-bottom: 10px" id="">
        <div class="col-sm-3 text-left">
            <div class="row">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary active" onclick="redirect(1,'obj-operation')">
                        <input type="radio" name="options" id="option1" value="1" checked> купить
                    </label>
                    <label class="btn btn-primary" onclick="redirect(2,'obj-operation')">
                        <input type="radio" name="options" id="option2" value="2"> снять
                    </label>
                    <label class="btn btn-primary" onclick="redirect(8,'obj-operation')">
                        <input type="radio" name="options" id="option3" value="8"> оценить
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-3 text-left">
            <div class="row">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary active" onclick="redirect(4,'obj-type')">
                        <input type="radio" name="options" id="option1" value="4" checked> квартира
                    </label>
                    <label class="btn btn-primary" onclick="redirect(3,'obj-type')">
                        <input type="radio" name="options" id="option2" value="3"> апартаменты
                    </label>
                    <label class="btn btn-primary" onclick="redirect(5,'obj-type')">
                        <input type="radio" name="options" id="option3" value="5"> дом
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-3 text-left">
            <div class="row">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary" onclick="redirect(6,'obj-market')">
                        <input type="radio" name="options" id="option2" value="6"> вторичная
                    </label>
                    <label class="btn btn-primary active" onclick="redirect(7,'obj-market')">
                        <input type="radio" name="options" id="option3" value="7" checked> строящаяся
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <div class="contain-slct smm-sl">
                    <div id="search-time-advert-settings" class="select-int">
                        <div class="select">
                            <a href="javascript:;" class="slct">Искать за период</a>
                            <ul class="drop">
                                <li><span data-value="1">все время</span></li>
                                <li><span data-value="2">сегодня</span></li>
                                <li><span data-value="3">1 день</span></li>
                                <li><span data-value="4">3 дня</span></li>
                                <li><span data-value="5">неделя</span></li>
                                <li><span data-value="6">месяц</span></li>
                            </ul>
                            <?php //echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>0)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1" style="padding-top: 9px">
            c фото <input type="checkbox">
        </div>
    </div>
</div>
<div class="col-sm-12">
    <div class="row padding-horizontal-10-px">
        <div class="col-sm-3">
            <div class="row">
                <script>
                    (function() {
                        $(function() {
                            var checksContainer, i, _i, _results;
                            checksContainer = $('#checks-rooms-number').children('.row').children('.btn-group');
                            _results = [];
                            for (i = _i = 1; _i < 6; i = ++_i) {
                                if (i === 5) {
                                    _results.push(checksContainer.append("<label class='btn btn-primary'><input type='checkbox' name='floors-" + i + "-num' id='floors-" + i + "-num'>" + i + "+</label>"));
                                } else {
                                    _results.push(checksContainer.append("<label class='btn btn-primary'><input type='checkbox' name='floors-" + i + "-num' id='floors-" + i + "-num'>" + i + "</label>"));
                                }
                            }
                            return _results;
                        });

                    }).call(this);
                </script>
                <div class="col-sm-3 text-left" style="padding-top: 6px; padding-left: 2px">Комнат</div>
                <div id="checks-rooms-number" class="col-sm-8"><div class="row"><div class='btn-group' data-toggle='buttons'></div></div></div>
            </div>
            <div class="row padding-horizontal-10-px">
                <div class="btn-group" style="width: 84%" data-toggle="buttons">
                    <label style="width: 33.5%" class="btn btn-primary" onclick="redirect(6,'obj-market')">
                        <input type="checkbox" name="options" id="option2" value="6">  студия
                    </label>
                    <label style="width: 65%" class="btn btn-primary" onclick="redirect(7,'obj-market')">
                        <input type="checkbox" name="options" id="option3" value="7"> своб. планировка
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-3">
                    <div class="row text-left">
                        <span style="vertical-align: -6px;">площадью</span>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-right: 0">
                    <input class="form-control fm-sm" placeholder="от">
                </div>
                <div class="col-sm-1 text-left">
                    <div class="row">
                        <small style="vertical-align: -10px; margin-left: 5px; color: #999">m<sup>2</sup></small>
                    </div>
                </div>
                <div class="col-sm-3" style="padding: 0">
                    <input class="form-control fm-sm" placeholder="до">
                </div>
                <div class="col-sm-1 text-left">
                    <div class="row">
                        <small style="vertical-align: -10px; margin-left: 5px; color: #999">m<sup>2</sup></small>
                    </div>
                </div>
            </div>
            <div class="row padding-horizontal-10-px" style="padding-top: 6px">
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
                            <?php // echo $form->hiddenField($modelR,'status',array('id'=>'selected-windows','value'=>'')); ?>
                            <?php // echo $form->error($modelR,'status',array('class'=>'alert alert-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" style="padding-left: 0">
            <div class="col-sm-3">
                <div class="row">
                    <div class="contain-slct smm-sl">
                        <div id="search-price-type" class="select-int">
                            <div class="select">
                                <a href="javascript:;" class="slct">цена за объект</a>
                                <ul class="drop">
                                    <li><span data-value="1">цена за объект</span></li>
                                    <li><span data-value="2">цена за м<sup>2</sup></span></li>
                                </ul>
                                <input type="hidden" id="selected-time-to-underground-station" />
                                <?php //echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>0)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div>
                    <input class="form-control fm-sm" placeholder="от">
                </div>
            </div>
            <div class="col-sm-4" style="padding-left: 0">
                <div>
                    <input class="form-control fm-sm" placeholder="до">
                </div>
            </div>
            <div class="col-sm-1 text-left">
                <div class="row">
                    <div class="contain-slct smm-sl">
                        <div id="search-currency-type" class="select-int">
                            <div class="select">
                                <a href="javascript:;" class="slct">P</a>
                                <ul class="drop">
                                    <li><span data-value="1">P</span></li>
                                    <li><span data-value="2">$</span></li>
                                    <li><span data-value="3">&euro;</span></li>
                                </ul>
                                <input type="hidden" id="selected-time-to-underground-station" />
                                <?php //echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>0)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(function(){
                    (function() {
                        for(var i = 2014; i < 2026; i++){
                            $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#select-deadline > div > ul');
                        } delete i;
                    }($));
                })
            </script>
            <div class="col-sm-2 col-sm-offset-1 text-left">
                <div class="row" style="padding-top: 7px">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary" onclick="redirect(6,'obj-market')">
                            <input type="checkbox" name="options" id="option2" value="6"> застройщик
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
                <div class="row padding-horizontal-10-px" style="padding-top: 6px">
                    <div class="contain-slct smm-sl">
                        <div id="select-deadline" class="select-int">
                            <div class="select">
                                <a href="javascript:;" class="slct">Срок сдачи</a>
                                <ul class="drop"></ul>
                                <input type="hidden" id="selected-time-to-underground-station" />
                                <?php //echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>0)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-sm-offset-1 text-left">
                <div class="row" style="padding-top: 7px">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary" onclick="redirect(6,'obj-market')">
                            <input type="checkbox" name="options" id="option2" value="6"> 214 фз
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="col-sm-12" style="margin-top: 10px">
    <div id="dop" class="row padding-horizontal-10-px">
        <div class="col-sm-12">
            <div class="row">
                <h3 class="text-center" style="margin-top: 0; font-weight: 200; border-bottom: 1px solid #DDD; padding-bottom: 10px">
                    <small class="btn btn-info btn-sm" style="font-size: 14px; margin-top: 2px; cursor: pointer"> больше условий <span style="vertical-align: -1px; font-size: 12px" class="glyphicon glyphicon-arrow-down"></span></small>
                </h3>
            </div>
        </div>

        <div class="col-sm-2">
            <h4 class="text-center">материал стен</h4>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-sm btn-primary active">
                    <input type="checkbox" name="options" id="option2"> кирпичный
                </label>
                <label class="btn btn-sm btn-primary">
                    <input type="checkbox" name="options" id="option2"> монолитный
                </label>
                <label class="btn btn-sm btn-primary">
                    <input type="checkbox" name="options" id="option2"> монолитно-кирпичный
                </label>
                <label class="btn btn-sm btn-primary">
                    <input type="checkbox" name="options" id="option2"> панельный
                </label>
            </div>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-sm btn-success">
                    <input type="radio" name="options" id="option2"> любой материал стен
                </label>
            </div>
        </div>

        <div class="col-sm-2">
            <h4 class="text-center">этаж / этажность</h4>
            <div class="row">
                <div class="col-sm-6">
                    <input class="form-control" placeholder="от">
                </div>
                <div class="col-sm-6">
                    <input class="form-control" placeholder="от">
                </div>
            </div>
            <div class="padding-horizontal-10-px" style="padding-top: 0">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Не последний
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Не первый
                    </label>
                </div>
            </div>
            <div class="row text-left" style="margin-top: -12px; font-size: 12px; margin-bottom: 17px">
                <div class="col-md-10 col-sm-offset-1">
                    <div class="row">
                        <div class="contain-slct">
                            <div id="windows-number" class="select-int">
                                <div class="select">
                                    <a href="javascript:;" class="slct"> Укажите стадию строительства </a>
                                    <ul class="drop">
                                        <li><span data-value="1">нулевой цикл</span></li>
                                        <li><span data-value="2">первые этажи</span></li>
                                        <li><span data-value="3">средние этажи</span></li>
                                        <li><span data-value="4">последние этажи</span></li>
                                        <li><span data-value="5">отделка</span></li>
                                        <li><span data-value="6">благоустройство</span></li>
                                        <li><span data-value="7">выдача ключей</span></li>
                                    </ul>
                                    <?php // echo $form->hiddenField($modelR,'stage',array('id'=>'selected-windows','value'=>'')); ?>
                                    <?php // echo $form->error($modelR,'stage',array('class'=>'alert alert-danger')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-sm btn-success">
                    <input type="radio" name="options" id="option2"> любая этажность
                </label>
            </div>
        </div>

        <div class="col-sm-2">
            <h4 class="text-center">санузел</h4>
            <div class="padding-horizontal-10-px" style="padding-top: 0; padding-bottom: 25px">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Раздельный
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Совмещенный
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> 2 + санузла
                    </label>
                </div>
            </div>
            <div class="btn-group" data-toggle="buttons" style="padding-top: 20px">
                <label class="btn btn-sm btn-success">
                    <input type="radio" name="options" id="option2"> любой санузел
                </label>
            </div>
        </div>

        <div class="col-sm-2">
            <h4 class="text-center"><small style="color: #000; font-size: 15px; font-weight: 300">расположение окон</small></h4>
            <div class="padding-horizontal-10-px" style="padding-top: 0">
                <div class="btn-group" style="margin-top: 0" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Улица
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Двор
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Улица + Двор
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Балкон / Лоджия
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Паркинг
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <h4 class="text-center">прочее</h4>
            <div class="row padding-horizontal-10-px" style="padding-top: 0">
                <div class="col-md-10" style="margin-bottom: 3px">
                    <div class="row">
                        <div class="contain-slct">
                            <div id="windows-number" class="select-int">
                                <div class="select">
                                    <a href="javascript:;" class="slct"> Укажите класс дома </a>
                                    <ul class="drop">
                                        <li><span data-value="1">эконом</span></li>
                                        <li><span data-value="2">бизнес</span></li>
                                        <li><span data-value="3">элитный</span></li>
                                    </ul>
                                    <?php // echo $form->hiddenField($modelH,'class_home',array('id'=>'selected-windows','value'=>'')); ?>
                                    <?php // echo $form->error($modelH,'class_home',array('class'=>'alert alert-danger')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group" style="margin-top: 0px" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Закрытая территория
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Клубного типа
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Акции и скидки
                    </label>
                    <label class="btn btn-sm btn-primary">
                        <input type="checkbox" name="options" id="option2"> Ипотека
                    </label>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-sm-12"  style="min-height: 200px">
    <div class="row">
        <div class="col-sm-3">
            <h2 class="text-center">Город</h2>
            <div class="col-sm-12">
                <div class="row">
                    <input class="form-control" placeholder="Укажите город">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <h2 class="text-center">Округ</h2>
            <div class="col-sm-12">
                <div class="row">
                    <input class="form-control" placeholder="Укажите округ">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <h2 class="text-center">Район</h2>
            <div class="col-sm-12">
                <div class="row">
                    <input class="form-control" placeholder="Укажите район">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <h2 class="text-center">Метро</h2>
            <div class="col-sm-12">
                <div class="row">
                    <input class="form-control" placeholder="Укажите метро">
                    <div class="col-md-10" style="padding-top: 10px">
                        <div class="row">
                            <input class="form-control" placeholder="Время до метро">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row"><small class="pull-left"  style="padding-top: 28px; padding-left: 4px">мин.</small></div>
                    </div>
                    <div class="col-md-12" style="padding-top: 10px">
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
                                        <?php // echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>0)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12" style="margin-top: 10px; border-top: 1px solid #DDD; padding-top: 5px">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7 col-sm-offset-1" style="padding-top: 4px">
                    <span style="padding-top: 3px; padding-right: 6px">Источник объявления:</span>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" id="option1" checked> собственник
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2"> представитель собственника
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option3"> хозяин
                        </label>
                    </div>
                </div>
                <div class="col-sm-2 text-left" style="padding-top: 3px">
                    <div class="row">
                        <input type="reset" class="btn btn-danger" value="Очистить">
                        <input type="submit" class="btn btn-success" value="Найти">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

</div>



