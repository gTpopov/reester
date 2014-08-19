<?php
    Yii::app()->clientScript
        ->registerCssFile('http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css')
        ->registerCssFile('/css/application/addObject/index.css');

?>

<script type="text/javascript">



    /*
     * операция + рынок + тип недвижимости
     *
     * _form1
     * 1 - 7 - 4 - Продать -> Строящаяся -> Квартира
     * 1 - 7 - 3 - Продать -> Строящаяся -> Аппартаменты
     *
     * _form2
     * 1 - 6 - 5 - Продать -> Вторичная -> Дом
     *
     * _form3
     * 1 - 6 - 4 - Продать -> Вторичная -> Квартира
     * 1 - 6 - 3 - Продать -> Вторичная -> Аппартаменты
     *
     * _form4
     * 2 - 6 - 4 - Аренда -> Вторичная -> Квартира
     * 2 - 6 - 3 - Аренда -> Вторичная -> Аппартаменты
     *
     * _form5
     * 2 - 6 - 5 - Аренда -> Вторичная -> Дом
     *
     *
     *  @param sale_rent_op - (Арендовать:2,Продать:1)
     *  @param object_type  - (Вторичная:6,Строящаяся:7)
     *  @param obj_state    - (Аппартаменты:3,Квартира:4,Дом:5)
     */

    function redirect(val,item) {

        if(item==='obj-operation') { $.cookie('obj_operation',val,{ expires:0, path: '/'}); }
        else if(item==='obj-type') { $.cookie('obj_type',val,{ expires:0, path: '/'}); }
        else { $.cookie('obj_market',val,{ expires:0, path: '/'}); }

        var param = $.cookie('obj_operation')+'.'+$.cookie('obj_market')+'.'+$.cookie('obj_type');

        if(param=='1.7.4' || param=='1.7.3') {
            //alert(param);
            window.location.replace('/index?act=1');
        }
        else if(param=='1.6.5') {
            //alert(param);
            window.location.replace('/index/two?act=2');
        }
        else if(param=='1.6.4' || param=='1.6.3') {
            //alert(param);
            window.location.replace('/index/three?act=3');
        }
        else if(param=='2.6.4' || param=='2.6.3') {
            //alert(param);
            window.location.replace('/index/four?act=4');
        }
        else if(param=='2.6.5') {
            //alert(param);
            window.location.replace('/index/five?act=5');
        }
        else {
            //window.location.replace('/index?act=1');
            //alert(param + ' Default');
        }
    }

    if($.cookie('obj_operation')==null && $.cookie('obj_type')==null && $.cookie('obj_market')==null) {
        $.cookie('obj_operation',1,{ expires:0, path: '/'});
        $.cookie('obj_type',4,{ expires:0, path: '/'});
        $.cookie('obj_market',7,{ expires:0, path: '/'});
    }

    //Active select config ---
    $(function(){
        var obj_operation   = $.cookie('obj_operation');
        var obj_type        = $.cookie('obj_type');
        var obj_market      = $.cookie('obj_market');

        $('#select-combination :radio').each(function(){
            var elem = $(this).val();
            if(obj_operation==elem || obj_type==elem || obj_market==elem) {
                $(this).attr('checked','checked').parent('label').addClass('active');
            }
        });
    });
</script>

<?php
    // Include block management forms --

    if(isset($_GET['act'])) {

        switch($_GET['act']) {

            // Комбинация: Вторичная -> Дом -> Аренда
            case 5    : $this->renderPartial('_form5',array(
                'modelH'     => $modelH,
                'modelR'     => $modelR,
                'modelU'     => $modelU,
                'userData'   => $userData,
                'undeground' => $undeground,
            )); break;

            // Комбинация: Вторичная -> Квартиры и Аппартаменты -> Аренда
            case 4    : $this->renderPartial('_form4',array(
                'modelH'     => $modelH,
                'modelR'     => $modelR,
                'modelU'     => $modelU,
                'userData'   => $userData,
                'undeground' => $undeground,
            )); break;

            // Комбинация: Вторичная -> Квартиры и Аппартаменты -> Продажа
            case 3    : $this->renderPartial('_form3',array(
                'modelH'     => $modelH,
                'modelR'     => $modelR,
                'modelU'     => $modelU,
                'userData'   => $userData,
                'undeground' => $undeground,
            )); break;

            // Комбинация: Комбинация: Вторичная -> Дом -> Продать
            case 2    : $this->renderPartial('_form2',array(
                'modelH'     => $modelH,
                'modelR'     => $modelR,
                'modelU'     => $modelU,
                'userData'   => $userData,
                'undeground' => $undeground,
            )); break;

            // Комбинация: Строящаяся -> Квартира и Аппартаменты -> Продать
            default   : $this->renderPartial('_form1',array(
                'modelH'    => $modelH,
                'modelR'    => $modelR,
                'modelU'    => $modelU,
                'userData'  => $userData,
                'undeground'=> $undeground,
            )); break;
        }
    }
    else {
        $this->renderPartial('_form1',array(
            'modelH'    => $modelH,
            'modelR'    => $modelR,
            'modelU'    => $modelU,
            'userData'  => $userData,
            'undeground'=> $undeground,
        ));
    }

?>