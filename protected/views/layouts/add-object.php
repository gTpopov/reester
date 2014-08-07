<?php /* @var $this Controller */ ?>
    <?php

    Yii::app()->clientScript
        ->registerScriptFile('/js/application/addObject/index.js')
        ->registerScriptFile('/js/lib/jquery.autocomplete.js')
        ->registerScriptFile('/js/lib/jquery.cookie.js')
        ->registerCssFile('/js/lib/autocomplete.css');

    ?>
    <?php $this->beginContent('//layouts/main'); ?>
    <div id="o-a-title" class="col-md-12">
        <div class="row">
            <h2 class="pull-left">Добавление объекта</h2>
            <div id="sale-rent-btg" class="btn-group pull-right" data-toggle="buttons" style="margin-left: 5px;">
                <input type="button" class="btn" value="Применить" onclick="redirect()">
            </div>
            <div id="sch-budng-btg" class="btn-group pull-right" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="radio" name="market" id="second-hand-type" value="6"> Вторичная
                </label>
                <label class="btn btn-primary active">
                    <input type="radio" name="market" id="building-type" value="7" checked> Строящаяся
                </label>
            </div>
            <div id="app-fl-hs-btg" class="btn-group pull-right" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="radio" name="estate" id="appart-type" value="3"> Аппартаменты
                </label>
                <label class="btn btn-primary active">
                    <input type="radio" name="estate" id="flat-type" value="4" checked> Квартира
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="estate" id="house-type" value="5"> Дом
                </label>
            </div>
            <div id="sale-rent-btg" class="btn-group pull-right" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="operation" id="sale-option" value="1" checked> Продать
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="operation" id="rent-option" value="2"> Арендовать
                </label>
            </div>
        </div>

    </div>
    <div id="tot-con-o-a" class="col-md-12">
         <?php echo $content; ?>
    </div>
<?php $this->endContent(); ?>