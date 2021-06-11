$(".main-help").hover(function() {
    $(this).children().stop().slideToggle();
})
$(".index-login").hover(function() {
    $(this).children().stop().slideToggle();
})
// banner
var banner_index = 0;
var time=setInterval(move,3000);
var banner_len = $('.banner').children().length;
function move(){
    banner_index++;
    if(banner_index == banner_len){
        banner_index=0
    }
    $(".banner-img li").eq(banner_index).stop().fadeIn(1000).siblings().stop().fadeOut(1000);
    $('.banner-under li').eq(banner_index).addClass('under-active').siblings().removeClass("under-active");
}
$('.banner-img li').hover(function(){
    clearInterval(time);
},function () {
    time=setInterval(move,5000);
})
$('.banner-radio img:first-child').click(function(){
    banner_index--;
    if(banner_index == -1){
        banner_index=1
    }
    $(".banner-img li").eq(banner_index).stop().fadeIn(1000).siblings().stop().fadeOut(2000);
    $('.banner-under li').eq(banner_index).addClass('under-active').siblings().removeClass("under-active");
})
$('.banner-radio img:last-child').click(function(){
    banner_index++;
    if(banner_index == banner_len){
        banner_index=0
    }
    $(".banner-img li").eq(banner_index).stop().fadeIn(1000).siblings().stop().fadeOut(2000);
    $('.banner-under li').eq(banner_index).addClass('under-active').siblings().removeClass("under-active");
})
$('.banner-under li').click(function(){
    $(this).addClass('under-active').siblings().removeClass('under-active');
    banner_index=$(this).index();
    $(".banner-img li").eq(banner_index).stop().fadeIn(1000).siblings().stop().fadeOut(2000);
})
$('.banner-under li').hover(function(){
    clearInterval(time);
},function () {
    time=setInterval(move,5000);
})
$('.banner-radio img').hover(function(){
    clearInterval(time);
},function () {
    time=setInterval(move,5000);
})
$('.banner-img').mouseover(function(){
    $('.banner-radio').css('display','inline');
})
$('.banner').mouseout(function(){
    $('.banner-radio').css('display','none');
})