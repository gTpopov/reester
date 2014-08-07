<?php
/**
 * User: Greg
 * Date: 31.07.14
 * Time: 16:10
 */
 /* @var $this SiteController */
 /* @var $error array */

    $this->pageTitle = Yii::app()->name . ' - Error';

    $this->breadcrumbs = array(
        'Error',
    );


?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
    <?php echo CHtml::encode($message); ?>
</div>