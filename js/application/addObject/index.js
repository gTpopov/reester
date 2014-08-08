$(function(){

    $('#SHouse_metro_time').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g) || this.value.length > 2) {
            this.value = this.value.replace(/[^0-9]/g, '');
            this.value = this.value.substr(0,2);
        }
    });

    $('#SHouse_house_number, #SHouse_structur,#RealEstat_general_area,#RealEstat_human_area,#RealEstat_kitchen_area').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g) || this.value.length > 4) {
            this.value = this.value.replace(/[^0-9]/g, '');
            this.value = this.value.substr(0,4);
        }
    });
    $('#RealEstat_price').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g) || this.value.length > 20) {
            this.value = this.value.replace(/[^0-9]/g, '');
            this.value = this.value.substr(0,20);
        }
    });


    $(function(){
        (function() {
            for(var i = 0; i < 6; i++){
                if(i == 5){
                    i = i+'+';
                }
                $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#rooms-number > div > ul');
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
                for(var i = 0; i < 71; i++){
                    $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#floors-number > div > ul');
                } delete i;
        }($));

        (function() {
            for(var i = 2014; i < 2026; i++){
                $('<li><span data-value="'+i+'">'+i+'</span></li>').appendTo('#date-of-end-number > div > ul');
            } delete i;
        }($));

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
                $('.nameDistrict').html(data.nameDistrict);
                $('#listDistrict').html(data.response);
                //$('#listDistrict li').on('click',function(){ selRegion() });
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
            $('.nameRegion').html(data.nameDistrict);
            $('#listRegion').html(data.response);
        },
        error: function() {
            alert('Error system');
        }
    });
}

/*******************************/
/*** include cod at files js ***/
$(function(){

    $("#streetID").autocomplete("/ajfile/street", {
        delay:10,
        minChars:2,
        matchSubset:1,
        autoFill:true,
        matchContains:1,
        cacheLength:1,
        selectFirst:true,
        formatItem:liFormatQuery,
        maxItemsToShow:5
    });

});

function liFormatQuery (row, i, num) {

    //var result = row[0] + "<br>(<span class='qnt'>"+row[1]+"</span>)";
    var result = row[0]+' '+row[1];
    return result;
}









