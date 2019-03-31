$(function(){
    $(".nav-item").hover(function() {
        follow(this);
    })
});

function follow(element) {
    var elementPos = $(element).position();
    var elementWidth = $(element).css("width");
    var elementHeight = $(element).css("height");
    $("#follower").stop(true,false).show("slow").animate({left:elementPos.left, width:elementWidth, height:elementHeight}, 300);          
};

// $("body, html:not('.nav-item')").mouseover(function() {
//     $( "#follower" ).hide( "slow", function() {
//     //   alert( "Animation complete." );
//     });
//   });

  $(document).on("mouseleave", ":not('.nav-item')", function(){
    $("#follower").stop(true,false).show("slow").animate({left:'240px', width:'60px', height:'40px'}, 300);
    $( "#follower" ).hide( "slow", function() {
        //   alert( "Animation complete." );
        });
});