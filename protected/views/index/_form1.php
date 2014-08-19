<?php
Yii::app()->clientScript->registerCssFile('/css/application/index/index.css')
    ->registerScriptFile('/js/application/index/index.js');
?>

<div id="add-obj-fl-ap-nw-sale" class="col-sm-12">

<div class="col-sm-12">
    <div class="row padding-horizontal-10-px" id="select-combination">
        <div class="col-sm-12">
            <div class="row" style="border-bottom: 1px solid #DDD; padding-bottom: 10px" id="">
                <div class="col-sm-3 text-left">
                    <div class="row">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary" onclick="redirect(1,'obj-operation')">
                                <input type="radio" name="options" id="option1" value="1"> купить
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
                            <label class="btn btn-primary" onclick="redirect(4,'obj-type')">
                                <input type="radio" name="options" id="option1" value="4"> квартира
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
                            <label class="btn btn-primary" onclick="redirect(7,'obj-market')">
                                <input type="radio" name="options" id="option3" value="7"> строящаяся
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
       FORM 1 Купить -> Строящаяся -> Квартира (Аппартаменты)
    </div>
</div>
</div>

