jQuery(function($){
    $(window).scroll(function(){
        var bottomOffset = 2000;
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        if( $(document).scrollTop() > ($(document).height() - bottomOffset) && !$('body').hasClass('loading')){
            $.ajax({
                url:ajaxurl,
                data:data,
                type:'POST',
                beforeSend: function( xhr){
                    $('body').addClass('loading');
                },
                success:function(data){
                    if (data) {
                        $(".blog_posts .row").append(data);
                        $('body').removeClass('loading');
                        current_page++;
                    }
                    else {
                        $('body').removeClass('loading');
                    }
                }
            });
        }
    });
});

