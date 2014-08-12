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
     *  @param sale_rent_op - (Арендовать:2,Продать:1)
     *  @param object_type  - (Вторичная:6,   Строящаяся:7)
     *  @param obj_state    - (Аппартаменты:3,Квартира:4,Дом:5)
     */

    function redirect() {

         var object_type  = $('#app-fl-hs-btg label').children(':radio:checked').val(); // Аппартаменты, квартира, дом
         var obj_state    = $('#sch-budng-btg label').children(':radio:checked').val(); // Вторичная, строящиеся
         var sale_rent_op = $('#sale-rent-btg label').children(':radio:checked').val(); // Арендовать, Продать

         $.cookie('object_type',object_type,{ expires:0, path: '/'});
         $.cookie('obj_state',obj_state,{ expires:0, path: '/'});
         $.cookie('sale_rent_op',sale_rent_op,{ expires:0, path: '/'});

         var param = sale_rent_op+'.'+obj_state+'.'+object_type;

         //alert(param);

         if(param=='1.7.4' || param=='1.7.3') {
             window.location.replace('/users/addObject/index?act=1');
         }
         else if(param=='1.6.5') {
             window.location.replace('/users/addObject/two?act=2');
         }
         else if(param=='1.6.4' || param=='1.6.3') {
             window.location.replace('/users/addObject/three?act=3');
         }
         else if(param=='2.6.4' || param=='2.6.3') {
             window.location.replace('/users/addObject/four?act=4');
         }
         else {
             window.location.replace('/users/addObject/index?act=1');
         }
     }

</script>


<?php
    // Include block management forms --

    if(isset($_GET['act'])) {

        switch($_GET['act']) {

            // Комбинация: Вторичная -> Квартиры и Аппартаменты -> Аренда
            case 4    : $this->renderPartial('_form4',array('modelH' => $modelH, 'modelR'=>$modelR, 'modelU'=>$modelU, 'userData'=>$userData)); break;

            // Комбинация: Вторичная -> Квартиры и Аппартаменты -> Продажа
            case 3    : $this->renderPartial('_form3',array('modelH' => $modelH, 'modelR'=>$modelR, 'modelU'=>$modelU, 'userData'=>$userData)); break;

            // Комбинация: Комбинация: Вторичная -> Дом -> Продать
            case 2    : $this->renderPartial('_form2',array('modelH' => $modelH, 'modelR'=>$modelR, 'modelU'=>$modelU, 'userData'=>$userData)); break;

            // Комбинация: Строящаяся -> Квартира и Аппартаменты -> Продать
            default   : $this->renderPartial('_form1',array('modelH' => $modelH, 'modelR'=>$modelR, 'modelU'=>$modelU, 'userData'=>$userData)); break;
        }
    }
    else {
        $this->renderPartial('_form1',array('modelH' => $modelH, 'modelR'=>$modelR, 'modelU'=>$modelU, 'userData'=>$userData));
    }

?>