$('.bannerbox').hide();
$('.bannerbtn').click(function(){
    // $('.bannerbox').toggle("slow");
    $('.bannerbox').slideToggle("normal");
    $('.addbox i').toggleClass("class-rotatei");
})
$('.friendbox').hide();
$('.friendbtn').click(function(){
    // $('.bannerbox').toggle("slow");
    $('.friendbox').slideToggle("normal");
    $('.addfriend i').toggleClass("friend-rotatei");
})