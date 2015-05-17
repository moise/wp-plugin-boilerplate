(function ($) {
    'use strict';

    //show video metabox

    var boxVideo = $('#home-page-video'),
        form = $('#post'),
        pageTemplate = $('#page_template');

    var val = pageTemplate.val();

    if (val == 'page-templates/front.php') {
        console.log('c');
        boxVideo.css({
            'height' : 'auto',
            'display': 'block'
        })
    }


    pageTemplate.on('change', function (e) {

        val = $(this).val();

        if (val == 'page-templates/front.php') {
            console.log('a');
            boxVideo.css({
                'height' : 'auto',
                'display': 'block'
            })
        } else {
            console.log('b');
            boxVideo.css({
                'height': '0',
                'display': 'none'
            })
        }

    });


})(jQuery);
