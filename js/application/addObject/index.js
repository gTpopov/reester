$(function(){


    $(function(){
        (function() {
            for(var i = 1; i < 6; i++){
                if(i == 5){
                    $('<li><span data-value="'+i+'">'+i+'+</span></li>').appendTo('#rooms-number > div > ul');
                }else{
                    $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#rooms-number > div > ul');
                }
            } delete i;
        }($));


        (function() {
            for(var i = 0; i < 25; i++){
                if(i < 10){
                    i = '0'+i;
                }
                $('<li><span data-value="'+i+'">'+i+':00</span></li>').appendTo('#from-time-number > div > ul');
                $('<li><span data-value="'+i+'">'+i+':00</span></li>').appendTo('#to-time-number > div > ul');
            } delete i;
        }($));

        (function() {
                for(var i = 1; i < 71; i++){
                    $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#floors-number > div > ul');
                    $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#floors-number-house > div > ul');
                } delete i;
        }($));

        (function() {
            for(var i = 2014; i < 2026; i++){
                $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#date-of-end-number > div > ul');
            } delete i;
        }($));


        (function() {
            for(var i = 1890; i < 2026; i++){
                $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#date-of-b-number > div > ul');
            } delete i;
        }($));

    });

    $('.add-photo-container').on('click', function () {
        if($('.photo-item').length < 6){

            $('<div class="photo-item col-md-12 padding-horizontal-10-px"><input class="pull-left" type="file" name="photo[]"></div>').insertAfter($(this).parent('.photo-item'))
            $(this).addClass('deletePhoto');
        }
    });





});


// Ajax request ---

$(function(){

    // Function select districts

    $('#listCity li').click(function(){

        var arrData = {};
        arrData.act = 'district';
        arrData.cityID = $(this).children('span').attr('data-value');

        $.ajax({
            url: "/aj/ajaxPlace.php",
            type: 'get',
            dataType: "json",
            cashe: false,
            data: arrData,
            success: function(data)  {

                if(data.check == 1) {
                    $('.nameDistrict').html(data.nameDistrict);
                    $('#listDistrict').html(data.response);
                } else {
                    $('.nameRegion,.nameMetro').html(data.nameDistrict);
                    $('#listRegion,#listMetro').html('');
                }
            },
            error: function() {
                alert('Error system');
            }
        });
    });
});

// Function select region
function selRegion(id) {

    var arrData = {};
    arrData.act = 'region';
    arrData.districtID = id;

    $.ajax({
        url: "/aj/ajaxPlace.php",
        type: 'get',
        dataType: "json",
        cashe: false,
        data: arrData,
        success: function(data)  {
            if(data.check == 1) {
                $('.nameRegion').html(data.nameRegion);
                $('#listRegion').html(data.response);
            } else {
                $('.nameRegion,.nameMetro').html(data.nameRegion);
                $('#listRegion,#listMetro').html('');
            }

        },
        error: function() {
            alert('Error system');
        }
    });
}

// Function select metro
function selMetro(id) {

    var arrData = {};
    arrData.act = 'metro';
    arrData.metroID = id;

    $.ajax({
        url: "/aj/ajaxPlace.php",
        type: 'get',
        dataType: "json",
        cashe: false,
        data: arrData,
        success: function(data)  {
            //$('.nameMetro').html(data.nameMetro);
            //$('#listMetro').html(data.response);
        },
        error: function() {
            alert('Error system');
        }
    });
}





/*******************************/
/*** select streets ***/
$(function() {

    $("#streetID").autocomplete("/ajfile/street", {
        delay:10,
        minChars:2,
        matchSubset:1,
        autoFill:true,
        matchContains:1,
        cacheLength:1,
        selectFirst:true,
        formatItem:liFormatQuery,
        onItemSelect:fn,
        maxItemsToShow:7
        //width:245,
        //extraParams: {act:"listCity"}
    });

});

function fn(id) {
    //alert(id.extra[1]);
    $("#SHouse_street").attr('value',id.extra[1]);
}

function liFormatQuery (row, i, num) {
    //var result = "<div onclick='fn("+row[2]+")'>"+row[0] + "<br>( <i>р-н. <span class='qnt'>"+row[1]+"</span></i> )</div>";
    var result = row[0] + "<br>( <i>р-н. <span class='qnt'>"+row[1]+"</span></i> )";
    return result;
}









