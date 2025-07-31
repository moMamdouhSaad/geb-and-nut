(function ($) {
jQuery(document).ready( function( $ ) {
    $('body').on('click', '.travelfic-media-btn.upload-btn', function (e) {
        var $this = $(this);
        frame = wp.media({
            title: "Select Image",
            button: {
                text: "Insert Image"
            },
            multiple: false
        });
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            $(".travelfic-media-url").val(attachment.url);
            $(".travelfic-media-url-preview").val(attachment.url);
        });
        frame.open();
        return false;
    });
    $('body').on('click', '.travelfic-media-btn.remove-btn', function (e) {
        e.preventDefault();
        var attachment_url = '';
        $(".travelfic-media-url").val(attachment_url);
        $(".travelfic-media-url-preview").val(attachment_url);
    });
});

// Travelfic Toolkit Installation
jQuery(document).on('click', '.travelfic-toolkit-installation', function (e) {
    e.preventDefault();

    var current = $(this);
    var plugin_slug = current.attr("data-plugin-slug");

    current.addClass('installation-ongoing').text(travelfic_script_params.installing);
    var data = {
        action: 'travelfic_ajax_install_plugin',
        _ajax_nonce: travelfic_script_params.travelfic_theme_nonce,
        slug: plugin_slug,
    };
    // Installing Function
    jQuery.post(travelfic_script_params.ajax_url, data, function (response) {
        if(response){
            current.text(travelfic_script_params.activating);
            Travelfic_Activation(plugin_slug);
        }
    })

});

// Activation Functions
const Travelfic_Activation = (plugin_slug) => {
    $.ajax({
        type: 'post',
        url: travelfic_script_params.ajax_url,
        data: {
            action: 'travelfic_ajax_active_plugin',
            _ajax_nonce: travelfic_script_params.travelfic_theme_nonce,
            slug: plugin_slug,
        },
        success: function(response1) {
            window.location.replace(travelfic_script_params.redirect_url);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

})(jQuery);