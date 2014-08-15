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
                        <select class="search-select">
                            <option> Выберите период поиска </option>
                            <option> за все время </option>
                            <option> за год </option>
                            <option> за месяц </option>
                            <option> за сегодня </option>
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

        <div class="col-sm-12">
            <div class="row padding-horizontal-10-px">
                <div class="col-sm-2">
                    <div class="row padding-horizontal-10-px">
                        <script>
                         (function() {
                             $(function() {
                                 var element, i, _i, _results;
                                 element = $('#select-floors-size');
                                 _results = [];
                                 for (i = _i = 0; _i <= 5; i = ++_i) {
                                     if (i === 5) {
                                         _results.push(element.append("<option>" + i + "+</option>"));
                                     } else {
                                         _results.push(element.append("<option>" + i + "</option>"));
                                     }
                                 }
                                 return _results;
                             });

                         }).call(this);
                        </script>
                        <select id="select-floors-size" class="search-select">
                            <option> Укажите кол-во комнат </option>
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
                    <div class="col-sm-3" style="padding-top: 6px" >площадь</div>
                    <div class="col-sm-3"><div class="row"><input type="text" class="form-control" placeholder="от"></div></div>
                    <div class="col-sm-1 text-left" style="padding-left: 0; padding-top: 16px; color: #999">m<sup>2</sup></div>
                    <div class="col-sm-4"><div class="row"><input type="text" class="form-control" placeholder="до"></div></div>
                    <div class="col-sm-1 text-left" style="padding-left: 0; padding-top: 16px; color: #999">m<sup>2</sup></div>
                </div>
                <div style="margin-top: 6px" class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-2" style="padding-top: 6px" >цена</div>
                        <div class="col-sm-4"><div class="row"><input type="text" class="form-control" placeholder="от"></div></div>
                        <div class="col-sm-4"><div class="row"><input style="margin-left: 2px" type="text" class="form-control" placeholder="до"></div></div>
                        <div class="col-sm-1 text-left" style="margin-top: 6px">
                            <select style="margin-left: -10px">
                                <option>P</option>
                                <option>$</option>
                                <option>&euro;</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

