$(function(){
    $(".nav-item").mouseenter(function() {
        follow(this);
    })
});

function follow(element) {
    var elementPos = $(element).position();
    var elementWidth = $(element).css("width");
    var elementHeight = $(element).css("height");
    $("#follower").stop(true,false).show("slow").animate({left:elementPos.left, width:elementWidth, height:elementHeight}, 300);          
};

$(function(){
    $(".nav-item").mouseleave(function() {
        leave(this);
    })
});

function leave(element) {
    $("#follower").animate({left:'240px', width:'0px', height:'40px'}, 800),
    $( "#follower" ).hide( "slow");
};