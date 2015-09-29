function xyz_em_verify_fields(){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var address = document.subscription.xyz_em_email.value;
    if(reg.test(address) == false) {
        alert('Please check whether the email is correct.');
        return false;
    }else{
        return true;
    }
}
(function($){
    $(function(){
        $('.dropdown-toggle').dropdown();
        $('#myCarousel').carousel({
            interval: 10000
        });
        $('.carousel .item2').each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            if (next.next().length>0) {
                next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
        $('.carousel').carousel();
        
        $(function(){
            $(".navbar .dropdown").hover(            
                function() {
                    $(this).next('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                },
                function() {
                    $(this).next('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
            });
			
			
			$(window).scroll(function () {
            if ($(window).scrollTop() > 500) {
                $('#invis_box').css({top:'10px', position: 'fixed'});
				 
            }else{
                $('#invis_box').removeAttr('style');
            }
        });

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
        });
    });
})(jQuery);