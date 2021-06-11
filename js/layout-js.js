$('.bannerbox').hide();
$('.bannerbtn').click(function(){
    // $('.bannerbox').toggle("slow");
    $('.bannerbox').slideToggle("normal");
    $('.addbox i').toggleClass("rotatei");
})