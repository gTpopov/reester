<?php
    Yii::app()->clientScript->registerCssFile('/css/application/index/index.css')
        ->registerScriptFile('/js/application/index/index.js');
?>

    <div id="add-obj-fl-ap-nw-sale" class="col-sm-12">

        <div class="col-sm-12">
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-12"><div class="row"><h2 class="text-left" style="margin-top: 0; font-weight: 200; border-bottom: 1px solid #DDD; padding-bottom: 5px">Основные параметры фильтра</h2></div></div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-sm btn-primary active">
                                        <input type="radio" name="options" id="option1" checked> купить
                                    </label>
                                    <label class="btn btn-sm btn-primary">
                                        <input type="radio" name="options" id="option2"> снять
                                    </label>
                                    <label class="btn btn-sm btn-primary">
                                        <input type="radio" name="options" id="option3"> оценить
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-sm btn-primary active">
                                        <input type="radio" name="options" id="option1" checked> квартира
                                    </label>
                                    <label class="btn btn-sm btn-primary">
                                        <input type="radio" name="options" id="option2"> апартаменты
                                    </label>
                                    <label class="btn btn-sm btn-primary">
                                        <input type="radio" name="options" id="option3"> дом
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
                        <div class="col-sm-5">
                            <div class="col-sm-4">
                                <div class="row text-right">
                                    <small style="vertical-align: -3px;">амплитуда площади</small>
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
                    </div>
                </div>



                <div class="col-sm-2">
                    <div class="row padding-horizontal-10-px">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary active">
                                <input type="radio" name="options" id="option2"> вторичная
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="radio" name="options" id="option3"> строящаяся
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row padding-horizontal-10-px">
                        <script>
                            (function() {
                                $(function() {
                                    var checksContainer, i, _i, _results;
                                    checksContainer = $('#checks-rooms-number').children('div');
                                    _results = [];
                                    for (i = _i = 1; _i < 6; i = ++_i) {
                                        if (i === 5) {
                                            _results.push(checksContainer.append("<div class='btn-group' data-toggle='buttons'><label class='btn btn-sm btn-primary'><input type='radio' name='floors-" + i + "-num' id='floors-" + i + "-num'>" + i + "+</label></div> <small style='padding-left: 5px'>комнат</small>"));
                                        } else {
                                            _results.push(checksContainer.append("<div class='btn-group bts-cont-mar-offset' data-toggle='buttons'><label class='btn btn-sm btn-primary'><input type='radio' name='floors-" + i + "-num' id='floors-" + i + "-num'>" + i + "</label></div>"));
                                        }
                                    }
                                    return _results;
                                });

                            }).call(this);
                        </script>
                        <div id="checks-rooms-number" class="col-sm-10"><div class="row"></div></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="row padding-horizontal-10-px">
                        <div class="btn-group" style="width: 100%" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-block active">
                                <input type="radio" name="options" id="option1" checked> только с фотографиями
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="col-sm-4">
                        <div class="row padding-horizontal-10-px">
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
                    <div class="col-sm-3">
                        <div class="padding-horizontal-10-px">
                            <input class="form-control fm-sm" placeholder="от">
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding-left: 0">
                        <div class="padding-horizontal-10-px">
                            <input class="form-control fm-sm" placeholder="до">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="row padding-horizontal-10-px">
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
                </div>
            </div>
        </div>

        <div class="col-sm-12" style="margin-top: 10px">
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-12">
                    <div class="row">
                        <h2 class="text-left" style="margin-top: 0; font-weight: 200; border-bottom: 1px solid #DDD; padding-bottom: 15px">Дополнительные параметры фильтра
                            <small class="pull-right btn btn-info btn-sm" style="font-size: 14px; margin-top: 7px; cursor: pointer"> отобразить <span style="vertical-align: -1px; font-size: 12px" class="glyphicon glyphicon-arrow-down"></span></small>
                        </h2>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3" style="box-shadow: 0 0 13px rgba(68, 83, 101, 0.3); padding-top: 10px; padding-bottom: 10px; border-radius: 4px">
                            <h4 style="margin-top: 0; font-weight: 300" class="text-center">материал стен</h4>
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-primary">
                                    <input type="radio" name="options" id="option3"> панель
                                </label>
                            </div>
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-primary">
                                    <input type="radio" name="options" id="option3"> дерево
                                </label>
                            </div>
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-primary active">
                                    <input type="radio" name="options" id="option1" checked=""> кирпичный
                                </label>
                            </div>
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-primary">
                                    <input type="radio" name="options" id="option2"> монолитный
                                </label>
                            </div>
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-primary">
                                    <input type="radio" name="options" id="option3"> природный кемень
                                </label>
                            </div>
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-primary">
                                    <input type="radio" name="options" id="option3"> кирпично-монолитный
                                </label>
                            </div>
                            <hr style="margin: 2px 0 5px 0; border-color: #ddd">
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-warning">
                                    <input type="radio" name="options" id="option3"> материал либого типа
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-sm-offset-1" style="box-shadow: 0 0 13px rgba(68, 83, 101, 0.3); padding-top: 10px; padding-bottom: 10px; border-radius: 4px">
                            <h4 style="margin-top: 0; font-weight: 300" class="text-center">выбор этажа</h4>
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 50%">
                                    <input type="radio" name="options" id="option3"> не первый
                                </label>
                                <label class="btn btn-sm btn-primary" style="width: 50%">
                                    <input type="radio" name="options" id="option3"> не последний
                                </label>
                            </div>
                            <div>
                                <div class="row"><span style="margin-top: 4px; font-weight: 300; width: 100%; font-size: 13px; margin-bottom: 2px" class="text-center col-sm-12">укажите желаемую этажность</span></div>
                                <input class="form-control fm-sm" placeholder="нап: от 12" style="margin-bottom: 4px; width: 49%; float: left">
                                <input class="form-control fm-sm" placeholder="нап: до 24" style="margin-bottom: 4px; width: 49%; margin-left: 1.8%;  float: left">
                            </div>
                            <div class="contain-slct smm-sl">
                                <div id="search-object-state-settings" class="select-int">
                                    <div class="select">
                                        <a href="javascript:;" class="slct">состояние объекта</a>
                                        <ul class="drop" style="width: 350px">
                                            <li><span data-value="0">любое</span></li>
                                            <li><span data-value="1">дизайнпроект</span></li>
                                            <li><span data-value="2">отличное состояние</span></li>
                                            <li><span data-value="4">среднее состояние</span></li>
                                            <li><span data-value="3">свежий ремонт</span></li>
                                            <li><span data-value="8">косметический ремонт</span></li>
                                            <li><span data-value="6">первичная отделка</span></li>
                                            <li><span data-value="5">без отделки</span></li>
                                            <li><span data-value="7">требует ремонт</span></li>
                                        </ul>
                                        <?php //echo $form->hiddenField($modelH,'metro_way',array('id'=>'selected-underground-station','value'=>0)); ?>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin: 5px 0 8px 0; border-color: #ddd">
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-warning">
                                    <input type="radio" name="options" id="option3"> любая этажность
                                </label>
                            </div>
                            <hr style="margin: 2px 0 6px 0; border-color: #ddd">
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> ипотека
                                </label>
                            </div>
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> акции и скидки
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1" style="box-shadow: 0 0 13px rgba(68, 83, 101, 0.3); padding-top: 10px; padding-bottom: 10px; border-radius: 4px">
                            <h4 style="margin-top: 0; font-weight: 300" class="text-center">санузел</h4>
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> 2 + санузла
                                </label>
                            </div>
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> раздельный
                                </label>
                            </div>
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> совмещенный
                                </label>
                            </div>
                            <hr style="margin: 0 0 3px 0; border-color: #ddd">
                            <div class="btn-group" style="width: 100%; margin-bottom: 5px" data-toggle="buttons">
                                <label class="btn btn-sm btn-block btn-warning">
                                    <input type="radio" name="options" id="option3"> любой санузел
                                </label>
                            </div>
                            <hr style="margin: -1px 0 0 0; border-color: #ddd">
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%; margin-top: 3px" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> закрытая территория
                                </label>
                            </div>
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> клубного типа
                                </label>
                            </div>
                            <div class="btn-group" style="margin-bottom: 5px; width: 100%" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary" style="width: 100%;">
                                    <input type="radio" name="options" id="option3"> балкон / лоджия
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

