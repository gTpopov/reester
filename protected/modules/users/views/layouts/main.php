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
                            <span class="result-value"><b>12 300 <img class="rur" src="/img/project-style/rur_sign.png"></b></span>
                            <span class="title">до:</span>
                            <span class="result-value"><b>129 456 <img class="rur" src="/img/project-style/rur_sign.png"></b></span>
                        </span>
                        <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'encodeLabel' => false,
                                'items'       => array(
                                    array(
                                        'label'   => 'Вход',
                                        'url'     => array('/sign/in'),
                                        'linkOptions' => array('id'=>'enter'),
                                        'visible' => Yii::app()->user->isGuest
                                    ),
                                    array(
                                        'label'   => 'Регистрация',
                                        'url'     => array('/sign/up'),
                                        'linkOptions' => array('id'=>'signup'),
                                        'visible' => Yii::app()->user->isGuest
                                    ),
                                    array(
                                        'label'   => 'Выход',
                                        'url'     => array('/sign/exit'),
                                        'linkOptions' => array('id'=>'exit'),
                                        'visible' => !Yii::app()->user->isGuest
                                    ),
                                ),
                                'htmlOptions' => array(
                                    'class' => 'sign navbar-nav navbar-right pull-right',
                                    'id'    => 'enter-reg-exit'
                                ),
                            ));
                        ?>
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
                        <a class="navbar-brand" href="/index/index"><?php print Yii::app()->name; ?><br><small>Жилая недвижимость</small></a>
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
                                    array(
                                        'label'   => '+ Добавить объект',
                                        'url'     => array('/users/addObject/index?act=1&reset=1'),
                                        'linkOptions' => array('id'=>'add-advert')
                                    ),
                                ),
                                'htmlOptions' => array(
                                    'class' => 'nav navbar-nav navbar-right',
                                    'id'    => 'tool-top-menu'
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

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/application/jquery.nicescroll.js"></script>
        <script type="text/javascript">
            $(function(){
                $("html,.drop").niceScroll({
                    cursoropacitymin:0,
                    cursoropacitymax:1,
                    touchbehavior:false,
                    cursorwidth:"5px",
                    cursorcolor:"#454648",
                    cursorborder:"1px solid #454648",
                    cursorborderradius:"5px"
                });
            });
        </script>

    </body>
</html>
