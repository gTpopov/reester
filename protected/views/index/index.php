<?php
Yii::app()->clientScript
    ->registerScriptFile('/js/lib/jquery.cookie.js')
    ->registerCssFile('http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css')
    ->registerCssFile('/css/application/addObject/index.css');

?>

    <script type="text/javascript">

        /*
         * операция + рынок + тип недвижимости
         *
         * _form1
         * 1 - 7 - 4 - Купить -> Строящаяся -> Квартира
         * 1 - 7 - 3 - Купить -> Строящаяся -> Аппартаменты
         *
         * _form2
         * 1 - 6 - 5 - Купить -> Вторичная -> Дом
         *
         * _form3
         * 1 - 6 - 4 - Купить -> Вторичная -> Квартира
         * 1 - 6 - 3 - Купить -> Вторичная -> Аппартаменты
         *
         * _form4
         * 2 - 6 - 4 - Снять -> Вторичная -> Квартира
         * 2 - 6 - 3 - Снять -> Вторичная -> Аппартаменты
         *
         * _form5
         * 2 - 6 - 5 - Снять -> Вторичная -> Дом
         *
         *
         *  @param obj_operation - (Снять:2,Купить:1)
         *  @param obj_market    - (Вторичная:6,Строящаяся:7)
         *  @param obj_type      - (Аппартаменты:3,Квартира:4,Дом:5)
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
        case 5    : $this->renderPartial('_form5',array()); break;

        // Комбинация: Вторичная -> Квартиры и Аппартаменты -> Аренда
        case 4    : $this->renderPartial('_form4',array()); break;

        // Комбинация: Вторичная -> Квартиры и Аппартаменты -> Продажа
        case 3    : $this->renderPartial('_form3',array()); break;

        // Комбинация: Вторичная -> Дом -> Продать
        case 2    : $this->renderPartial('_form2',array()); break;

        // Комбинация: Строящаяся -> Квартира и Аппартаменты -> Продать
        default   : $this->renderPartial('_form1',array()); break;
    }
}
else {
    $this->renderPartial('_form1',array());
}

?>