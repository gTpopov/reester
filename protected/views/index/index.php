<?php
    Yii::app()->clientScript->registerCssFile('/css/application/index/index.css')
        ->registerScriptFile('/js/application/index/index.js');
?>

    <div id="add-obj-fl-ap-nw-sale" class="col-sm-12">
        <div class="col-sm-12">
            <div class="row padding-horizontal-10-px" id="top-panel">
                <div class="col-sm-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" id="option1" checked> Купить
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2"> Арендовать
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option3"> Оценить
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" name="options" id="option1" checked> Квартира
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option2"> Апартаменты
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option3"> Дом
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" name="options" id="option1" checked> Вторичная
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option2"> Строящаяся
                            </label>
                        </div>
                        <span style="margin-left: 20px">Искать за</span>
                        <select id="search-period" class="search-select">
                            <option> все время </option>
                            <option> год </option>
                            <option> месяц </option>
                            <option> сегодня </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1 text-right">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2"> с фото
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-sm-12">
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-2">
                    <div class="row" style="margin-top: -7px">
                        <script>
                            (function() {
                                $(function() {
                                    var element, i, _i, _results;
                                    element = $('#select-floors-number');
                                    _results = [];
                                    for (i = _i = 1; _i <= 5; i = ++_i) {
                                        if (i === 5) {
                                            _results.push(element.append("<option value='" + i + "'>" + i + "+</option>"));
                                        } else {
                                            _results.push(element.append("<option value='" + i + "'>" + i + "</option>"));
                                        }
                                    }
                                    return _results;
                                });

                            }).call(this);
                        </script>
                        <span class="text-center col-sm-12"> Укажите кол-во комнат </span>
                        <select id="select-floors-number" class="search-select">
                            <option value="0"> Любое количество </option>
                        </select>
                    </div>
                </div>
                <div style="margin-top: 6px" class="col-sm-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" id="option1" checked> Свободная планировка
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2"> Студия
                        </label>
                    </div>
                </div>
                <div style="margin-top: 6px" class="col-sm-4">
                    <div class="col-sm-3" style="padding-top: 7px" >площадь</div>
                    <div class="col-sm-3"><div class="row"><input type="text" class="form-control" placeholder="от"></div></div>
                    <div class="col-sm-1 text-left" style="padding-left: 4px; padding-top: 15px; color: #999">m<sup>2</sup></div>
                    <div class="col-sm-4"><div class="row"><input type="text" class="form-control" placeholder="до"></div></div>
                    <div class="col-sm-1 text-left" style="padding-left: 4px; padding-top: 15px; color: #999">m<sup>2</sup></div>
                </div>
                <div style="margin-top: 6px" class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-2" style="padding-top: 7px;" >цена</div>
                        <div class="col-sm-4"><div class="row"><input type="text" class="form-control" placeholder="от"></div></div>
                        <div class="col-sm-4"><div class="row"><input style="margin-left: 2px" type="text" class="form-control" placeholder="до"></div></div>
                        <div class="col-sm-1 text-left">
                            <select id="currency-select" style="margin-left: -10px">
                                <option value="1">P</option>
                                <option value="2">$</option>
                                <option value="3">&euro;</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-8">
                    <div class="row">
                        <h5 class="pull-left" style="font-weight: 400; padding-top: 3px">Материал стен</h5>
                        <div class="btn-group" data-toggle="buttons" style="margin-top: 4px; margin-left: 5px">
                            <label class="btn btn-primary active">
                                <input type="checkbox" name="options" id="option1" checked> кирпич
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> монолитный
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> монолитно - кирпичный
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> панельный
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> дерево
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons" style="margin-top: 4px; margin-left: 5px">
                            <label class="btn btn-primary btn-warning">
                                <input type="checkbox" name="options" id="option2"> любой
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row text-right">
                        <div class="btn-group" data-toggle="buttons" style="margin-top: 4px; margin-left: 5px">
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> Окна на улицу
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> Окна во двор
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> Во двор + улица
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-8">
                    <div class="row">
                        <h5 class="pull-left" style="font-weight: 400; padding-top: 3px">Этажность и этаж</h5>
                        <div style="margin-top: 4px" class="col-sm-4">
                            <div class="col-sm-5"><div class="row"><input type="text" class="form-control" placeholder="от"></div></div>
                            <div class="col-sm-6 col-sm-offset-1"><div class="row"><input type="text" class="form-control" placeholder="до"></div></div>
                        </div>
                        <div class="btn-group" data-toggle="buttons" style="margin-top: 4px;">
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> не последний
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> не первый
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons" style="margin-top: 4px; margin-left: 4px">
                            <label class="btn btn-primary btn-warning">
                                <input type="checkbox" name="options" id="option2"> любой
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row" style="margin-top: -10px">
                        <span class="text-center col-sm-12"> Укажите состояние объекта: </span>
                        <select id="state-of-object-select">
                            <option value="0">любое</option>
                            <option value="1">дизайнпроект</option>
                            <option value="2">отличное состояние</option>
                            <option value="3">свежий ремонт</option>
                            <option value="4">среднее состояние</option>
                            <option value="5">без отделки</option>
                            <option value="6">первичная отедлка</option>
                            <option value="7">требует ремонт</option>
                            <option value="8">косметический</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-6">
                    <div class="row">
                        <h5 class="pull-left" style="font-weight: 400; padding-top: 3px">Санузел</h5>
                        <div class="btn-group" data-toggle="buttons" style="margin-top: 4px; margin-left: 82px">
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option2"> раздельный
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option2"> совмещенный
                            </label>
                            <label class="btn btn-primary" style="border-radius: 0 2px 2px 0">
                                <input type="radio" name="options" id="option2"> 2+ санузла
                            </label>
                            <label class="btn btn-primary btn-warning" style="margin-left: 5px; border-radius: 2px">
                                <input type="radio" name="options" id="option2"> любой
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="row">
                        <div class="btn-group" data-toggle="buttons" style="margin-top: 4px;">
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> закрытая територия
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> клубного типа
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> ипотека
                            </label>
                            <label class="btn btn-primary">
                                <input type="checkbox" name="options" id="option2"> акции и скидки
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

