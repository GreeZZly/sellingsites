$(document).ready(function(){
	// ANCHORS
   $('a[href*=#]').bind("click", function(e){
      var anchor = $(this);
      $('html, body').stop().animate({
         scrollTop: $(anchor.attr('href')).offset().top
      }, 1000);
      e.preventDefault();
   });
   return false;


 
});

   // SCROLL UP
$(document).ready(function(){
$(window).scroll(function () {if ($(this).scrollTop() > 0) {$('#scroller').fadeIn();} else {$('#scroller').fadeOut();}});
$('#scroller').click(function () {$('body,html').animate({scrollTop: 0}, 400); return false;});
});

// validation

$(document).ready(function(){

    $("#order_form").validate({

       rules:{

            name:{
                required: true,
                minlength: 2,
                maxlength: 16,
            },

            email:{
                required: true,
                email: true,
            },

            phone: {
            	required: true,
            	digits:true,
            	minlength: 11,
                
            },

            company: {
            	required: false,
            },
       },

       messages:{

            name:{
                required: "Это поле обязательно для заполнения",
                minlength: "Имя должно быть минимум 2 символа",
                maxlength: "Максимальное число символо - 16",
            },

            email:{
                required: "Это поле обязательно для заполнения",
                email: "Электронный адрес введен неверно",
            },

            phone: {
            	required:"Это поле обязательно для заполнения",
            	digits: "Только цифры",
            	minlength: "Введите 11-числовой формат номера телефона",
            }

       }

    });
 
});

$(document).ready(function(){
  $('.thumbnailss').bxSlider({
    slideWidth: 300,
    minSlides: 2,
    maxSlides: 3,
    moveSlides: 1,
    slideMargin: 10
  });
      var suck_l = $(window).width()/2-200;
      var suck_t = $(window).height()/2-$('#success_block').height()/2;
      console.log(suck_l, suck_t);
      $('#success_block').css({'left':suck_l, 'top':suck_t});
  $(window).resize(function(){
      var suck_l = $(window).width()/2-200;
      var suck_t = $(window).height()/2-$('#success_block').height()/2;
      console.log(suck_l, suck_t);
      $('#success_block').css({'left':suck_l, 'top':suck_t});
  });
 $('#ok_btn').on('click', function(){
    $('#form_suck').fadeOut();
 });
});