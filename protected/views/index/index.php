<?php
    Yii::app()->clientScript->registerCssFile('/css/application/index/index.css')
        ->registerScriptFile('/js/application/index/index.js');
?>

    <div id="add-obj-fl-ap-nw-sale" class="col-sm-12">

        <div class="col-sm-12">
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-12"><div class="row"><h3 class="text-left" style="margin-top: 0; font-weight: 200; border-bottom: 1px solid #DDD; padding-bottom: 5px">Основные параметры фильтра</h3></div></div>
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
            <div id="dop" class="row padding-horizontal-10-px">
                <div class="col-sm-12">
                    <div class="row">
                        <h3 class="text-left" style="margin-top: 0; font-weight: 200; border-bottom: 1px solid #DDD; padding-bottom: 10px">Дополнительные параметры фильтра
                            <small class="pull-right btn btn-info btn-sm" style="font-size: 14px; margin-top: 2px; cursor: pointer"> отобразить <span style="vertical-align: -1px; font-size: 12px" class="glyphicon glyphicon-arrow-down"></span></small>
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
                        <label class="btn btn-sm btn-primary">
                            <input type="checkbox" name="options" id="option2"> дерево
                        </label>
                        <label class="btn btn-sm btn-primary">
                            <input type="checkbox" name="options" id="option2"> природный камень
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-sm btn-success">
                            <input type="radio" name="options" id="option2"> любой материал стен
                        </label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <h4 class="text-center">выбор этажа</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="от">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="от">
                        </div>
                    </div>
                    <div class="padding-horizontal-10-px">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Не последний
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Не первый
                            </label>
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
                    <div class="padding-horizontal-10-px" style="padding-top: 0">
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
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-sm btn-success">
                            <input type="radio" name="options" id="option2"> любой санузел
                        </label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <h4 class="text-center">окона</h4>
                    <div class="padding-horizontal-10-px" style="padding-top: 0">
                        <div class="btn-group" style="margin-top: 0px" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Улица
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Двор
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Улица + Двор
                            </label>
                        </div>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-sm btn-success">
                            <input type="radio" name="options" id="option2"> любое расположение
                        </label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <h4 class="text-center">разное</h4>
                    <div class="row padding-horizontal-10-px" style="padding-top: 0">
                        <div class="btn-group" style="margin-top: 0px" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Балкон / Лоджия
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Закрытая территория
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Акции и скидки
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Ипотека
                            </label>
                            <label class="btn btn-sm btn-primary">
                                <input type="checkbox" name="options" id="option2"> Клубного типа
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

