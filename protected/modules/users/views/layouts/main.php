<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <?php

            Yii::app()->clientScript->registerPackage('bootstrap')
                ->registerCssFile(CHtml::normalizeUrl('http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=cyrillic-ext,latin-ext'))
                ->registerCssFile('/css/application/default.css')
                ->registerScriptFile('/js/application/default.js');

        ?>
        <title><?= CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <div id="wrapper">
            <div id="pre-header" class="navbar navbar-default">
                <div class="container">
                    <span class="keeper-mobile-help">
                        <span id="flats-size-in">
                            <span class="title">Количество квартир в базе:</span>
                            <span class="result-value"><b>150 325</b></span>
                        </span><br class="mobile-show">
                        <span id="flats-price-from-to-in">
                            <span class="title">Стоимость кв. метра от:</span>
                            <span class="result-value"><b>12 300 <img class="rur" src="../../../img/project-style/rur_sign.png"></b></span>
                            <span class="title">до:</span>
                            <span class="result-value"><b>129 456 <img class="rur" src="../../../img/project-style/rur_sign.png"></b></span>
                        </span>
                        <span class="sign pull-right">
                            <a href="/sign/exit">Выход</a> <span class="mobile-hide">&centerdot;</span>
                        </span>
                    </span>
                </div>
            </div>

            <nav id="main-menu" class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/index/index"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-main">
                        <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'encodeLabel' => false,
                                'items'       => array(
                                    array(
                                        'label'   => 'Аналитика',
                                        'url'     => array('/enter/index'),
                                    ),
                                    array(
                                        'label'   => 'Услуги',
                                        'url'     => array('/enter/index'),
                                    ),
                                    array(
                                        'label'   => 'Тарифы',
                                        'url'     => array('/registration/index'),
                                    ),
                                ),
                                'htmlOptions' => array(
                                    'class' => 'nav navbar-nav navbar-right'
                                ),
                            ));
                        ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container">
                <?php echo $content;  ?>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="rights"><?php echo '&copy; '.date('Y').' '.Yii::app()->name.' All right reserved' ?></div>
                <div class="sub-footer-menu"></div>
            </div>
        </div>

    </body>
</html>
