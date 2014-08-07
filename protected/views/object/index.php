<?php

    Yii::app()->clientScript->registerCssFile('/css/application/object/index.css')
        ->registerScriptFile(CHtml::normalizeUrl('http://api-maps.yandex.ru/2.1/?lang=ru_RU'));

?>

<div id="place-line" class="col-sm-12">
    <div class="col-sm-3 text-center" id="return-container"><a id="return-to-search" href="/index/index">К результатам поиска</a></div>
    <div class="col-sm-4 text-center" id="post-advert-time"><b>Объявление размещено</b><br> 24.03.12 в 13:02</div>
    <div class="col-sm-4 text-center" id="post-seen-times"><b>Просмотренно </b><br> 1302 раз</div>
    <div class="col-sm-1 text-center" id="search-again-container"><div class="glyphicon glyphicon-refresh" data-toggle="tooltip" data-placement="top" title="Новый поиск"></div></div>
    <script type="text/javascript" charset="UTF-8">$(function(){$('#search-again-container').children('.glyphicon').tooltip()})</script>
    <div id="slide-down-full-info" class="mobile-show"><button class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span> Показать все</button></div>
</div>

<div id="user-info" class="col-md-12">
    <h4 id="user-info-title"><span>Контактные данные</span></h4>
    <div id="user-fn" class="col-sm-3">ОченьДлинное Имя</div>
    <div id="user-phone" class="col-sm-3">+7 (964) 791 25 81</div>
    <div id="user-email" class="col-sm-4"><a href="#" data-toggle="tooltip" data-placement="top" title="Написать письмо на почту"><b>vasily-pypkin@example.com</b></a></div>
    <script type="text/javascript" charset="UTF-8">$(function(){$('#user-email').children('a').tooltip()})</script>
    <div id="social-like" class="col-sm-2">
        <a href="#" id="vk"></a>
        <a href="#" id="fb"></a>
        <a href="#" id="tw"></a>
    </div>
</div>

<div style="padding: 0" class="col-md-12">

    <div class="col-md-12">
        <div id="obj-underground-keeper" class="col-md-6">
            <h2 id="address">г. Москва, Электродная ул. 9</h2>
            <img id="underground-marker" src="/img/project-style/underground-marker.png">
            <span id="underground-name">Шоссе Энтузиастов</span>
            <span id="underground-time-to">10 мин. пешком</span>
        </div>
        <div id="object-price" class="col-md-6">
            <div class="col-md-7">
                <h2 id="total-price">150 000 000 <img class="rur" src="/img/project-style/rur_big_sign.png"></h2>
                <h4 id="sq-m-price">15 000 <img class="rur" src="/img/project-style/rur_middle_sign.png"> за м<sup>2</sup></h4>
            </div>
            <div id="exchange" class="col-md-5">
                <button class="btn btn-lg btn-success">Альтернатива</button>
            </div>
        </div>
    </div>

    <div class="col-md-6" id="visual-info-in">

        <div id="map" class="col-md-12"></div>
        <div id="photos-of-object" class="col-md-12">
            <h4 class="title-part">Фотографии объекта</h4>
        </div>
        <div class="sub-functions">
            <span class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Печать</span>
            <span class="btn btn-info">Назаначить осмотр</span>
            <span class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Написать продавцу</span>
        </div>
    </div>

    <div id="object-detailed-info" class="col-md-6">

        <div id="about-params" class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Характеристики</b></div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Изолированных:</td>
                        <td><b>2</b></td>
                    </tr>
                    <tr>
                        <td>Общая площадь</td>
                        <td><b>100 м<sup>2</sup></b></td>
                    </tr>
                    <tr>
                        <td>Жилая площадь</td>
                        <td><b>70 м<sup>2</sup></b></td>
                    </tr>
                    <tr>
                        <td>Площадь кухни:</td>
                        <td><b>12 м<sup>2</sup></b></td>
                    </tr>
                    <tr>
                        <td>Санузел:</td>
                        <td><b>1С + 1С</b></td>
                    </tr>
                    <tr>
                        <td>Балкон:</td>
                        <td><b>1Б + 1Л</b></td>
                    </tr>
                    <tr>
                        <td>Окна:</td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td>Состояние:</td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td>Мебель:</td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td>Машиноместо:</td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td>Год постройки</td>
                        <td><b>2013</b></td>
                    </tr>
                    <tr>
                        <td>Тип дома:</td>
                        <td><b>кирпич</b></td>
                    </tr>
                    <tr>
                        <td>Этажность:</td>
                        <td><b>22</b></td>
                    </tr>
                    <tr>
                        <td>В собственности:</td>
                        <td><b></b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="object-info" class="col-md-12">
            <h4 class="title-part">Дополнительная информация</h4>
            <p>
                It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                letters, as opposed to using 'Content here, content here', making it look like readable English.
                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
            </p>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(function(){
        var myMap;

        ymaps.ready(init);

        function init () {
            myMap = new ymaps.Map('map', {
                center: [55.76, 37.64], // Москва
                zoom: 10
            });

        }
    });
</script>