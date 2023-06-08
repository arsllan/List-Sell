$(document).ready(function() {
    "use strict";
    // compare car
    $(".addtocompare").click(function(){
        $(this).html('<span><i class="fa fa-spinner fa-spin"></i> Loading</span>');
        $.ajax({
            type: "POST",
            url: "/compare-car-store",
            data:{ id: $(this).closest("span").attr('data-listingid'),"_token": $('meta[name="_token"]').attr('content') },
            context: this,
            success: function(data) {
                $(this).html('<span>Add To Compare</span>');
                if(data[0] == 'error'){
                    $.notify(data[1], "error");
                }else{
                    $.notify(data[1], "success");
                }
                
            }
        });
    });
});

$(document).ready(function() {
    "use strict";
    // compare car
    $(".add-to-fav").click(function(){
        $(this).html('<span><i class="fa fa-spinner fa-spin"></i></span>');
        $.ajax({
            type: "POST",
            url: "/listing-fav-store",
            data:{ id: $(this).closest("div").attr('data-listingid'),"_token": $('meta[name="_token"]').attr('content') },
            context: this,
            success: function(data) {
                if(data[0] == 'error'){
                    $(this).html('<img class="img-fluid" src="https://cars.alliftech.com/public/front/images/heart-svgrepo-com.svg" alt="icon">');
                    $.notify(data[1], "error");
                }else{
                    $(this).html('<img class="img-fluid" src="https://cars.alliftech.com/public/front/images/heart-svgrepo-com.svg" alt="icon">');
                    $(".favcounter").html(data[2]);
                    $.notify(data[1], "success");
                }
                
            }
        });
    });
});

    $(document).on('click', '.fav-remove', function(){
        $.ajax({
            type: "POST",
            url: "/listing-fav-remove",
            data:{ id: $(this).closest("div").attr('data-listingid'),"_token": $('meta[name="_token"]').attr('content') },
            context: this,
            success: function(data) {
                if(data[0] == 'error'){
                    $.notify("something went wrong", "error");
                }else{
                    $(this).parent().parent().remove();
                    $(".favcounter").html(data[2]);
                    $.notify(data[1], "success");
                }
                
            }
        });
    });


// ====================
$(function() {
    $("#increase").on("click", function() {
        var o = $("#number"),
            n = parseInt(o.val());
        isNaN(n) || o.val(n + 1)
    }), $("#decrease").on("click", function() {
        var o = $("#number"),
            n = parseInt(o.val());
        !isNaN(n) && n > 0 && o.val(n - 1)
    })
}), 
$(function() {
    CloudZoom.quickStart()
}), 
$(window).on("scroll", function() {
    $(this).scrollTop() > 600 ? $(".back-to-top").fadeIn(200) : $(".back-to-top").fadeOut(200)
}), $(".back-to-top").on("click", function(o) {
    o.preventDefault(), $("html, body").animate({
        scrollTop: 0
    }, 1500)
}), $(".mainmenu").mouseover(function() {
    $("#testdropenu").css("display", "block")
}), $("#testdropenu").mouseover(function() {
    $("#testdropenu").css("display", "block")
}), $("#testdropenu").mouseout(function() {
    $("#testdropenu").css("display", "none")
}), $(".mainmenu").mouseout(function() {
    $("#testdropenu").css("display", "none")
});




