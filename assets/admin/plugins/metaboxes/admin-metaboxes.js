/*
** Shufflehound Metaboxes
*/
jQuery(document).ready( function($) {
    "use strict";



    /*
    ** Metaboxes - Image Browsw
    */
    // Gallery window
    var meta_gallery_frame;
    $('body').on( 'click', '.sh-metaboxes-field-media-upload[data-type="gallery"]', function(e) {
        var meta_prefix = $(this).attr( 'data-prefix' );
        var meta_image_preview = $(this).parent().parent().children('.sh-metaboxes-field-media-preview');
        var meta_image_remove = $(this).closest('.sh-metaboxes-field-media').find('.sh-metaboxes-field-media-remove');
        var meta_image_gallery = $(this).parent().parent().children('.sh-metaboxes-field-media-gallery');
        e.preventDefault();

        // Check if frame exists
        if( meta_gallery_frame ) {
            meta_gallery_frame.open();
            return;
        }

        // Create new media library frame
        meta_gallery_frame = wp.media.frames.meta_gallery_frame = wp.media({
            title: 'Gallery',
            button: {
                text: 'Select'
            },
            library: {
               type: 'image'
            },
            multiple: true,
        });

        // When image is selected
        meta_gallery_frame.on('select', function () {
            // Get image data
            var media_attachments = meta_gallery_frame.state().get('selection').toJSON();

            // Set new images to HTMl
            meta_image_gallery.html( '' );
            $.each( media_attachments, function( index, item ) {
                meta_image_gallery.append('\
                <div class="sh-metaboxes-field-media-preview active">\
                    <img src="' + item.sizes.thumbnail.url + '">\
                    <input type="hidden" name="' + meta_prefix + '" value="' + item.id + '" class="sh-metaboxes-field-media-value">\
                </div>');
            });
            meta_image_preview.addClass( 'active' );
            meta_image_remove.addClass( 'active-button' );
        })

        // Open media library frame
        meta_gallery_frame.open();
    });


    // Single image window
    var meta_image_frame;
    $('body').on( 'click', '.sh-metaboxes-field-media-upload[data-type="media"]', function(e) {
        var meta_image = $(this).parent().children('.sh-metaboxes-field-media-value');
        var meta_image_preview = $(this).parent().parent().children('.sh-metaboxes-field-media-preview');
        var meta_image_remove = $(this).closest('.sh-metaboxes-field-media').find('.sh-metaboxes-field-media-remove');
        var meta_images_only = ( $(this).attr( 'data-images-only' ) == 'off' ) ? "[ 'video', 'image', 'audio' ]" : 'image';
        e.preventDefault();

        // Check if frame exists
        if( meta_image_frame ) {
            meta_image_frame.open();
            return;
        }

        // Create new media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: 'Media',
            button: {
                text: 'Select'
            },
            library: {
               type: meta_images_only
            },
            multiple: false,
        });

        // When image is selected
        meta_image_frame.on('select', function () {
            // Get image data
            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

            // Save to field inputs
            meta_image.val( media_attachment.id ).trigger('change');

            // Add image
            if( "sizes" in media_attachment ) {
                meta_image_preview.children('img').attr( 'src', media_attachment.sizes.thumbnail.url );
            }

            meta_image_preview.addClass( 'active' );
            meta_image_remove.addClass( 'active-button' );
        })

        // Open media library frame
        meta_image_frame.open();
    });


    // Remove image
    $('body').on( 'click', '.sh-metaboxes-field-media-remove', function() {
        $(this).closest('.sh-metaboxes-field-media').find('.sh-metaboxes-field-media-gallery').html( '' );
        $(this).closest('.sh-metaboxes-field-media').find('.sh-metaboxes-field-media-preview').slideDown().removeClass('active');
        $(this).closest('.sh-metaboxes-field-media').find('.sh-metaboxes-field-media-value').val( '' );
        $(this).removeClass( 'active-button' );
    });




    /*
    ** Metaboxes
    */
    $('.sh-metaboxes-sidebar-item').on( 'click', function() {
        $('.sh-metaboxes-sidebar-item').removeClass('active');
        $(this).addClass('active');

        $(this).parent().parent().find( '.sh-metaboxes-section' ).removeClass('active');
        $(this).parent().parent().find( '.sh-metaboxes-section[data-id=' + $(this).attr( 'data-id' )  +']' ).addClass('active');

        return false;
    });


    /*
    ** Metaboxes Field - Multi Text
    */
    $('.sh-metaboxes-field-multi_text-add').on( 'click', function() {
        var data_prefix = $(this).attr( 'data-prefix' );
        $(this).parent().find( '.sh-metaboxes-field-multi_text-content' ).append( '\
        <div class="sh-metaboxes-field-multi_text-item">\
            <input name="' + data_prefix + '" class="sh-metaboxes-field-multi_text-input" type="text" />\
            <span class="sh-metaboxes-field-multi_text-delete">\
                <i class="dashicons dashicons-dismiss"></i>\
            </span>\
        </div>' );
        $(this).parent().find( '.sh-metaboxes-field-multi_text-content .sh-metaboxes-field-multi_text-item:last-child input' ).focus();

        // Remove input placeholder
        var metaboxes_data = $(this).closest('.sh-metaboxes-data').find('.sh-metaboxes-placeholder-input').remove();
    });

    $('.sh-metaboxes').on( 'click', '.sh-metaboxes-field-multi_text-delete', function() {
        // Set input placholder var
        var metaboxes_data = $(this).closest('.sh-metaboxes-data');

        $(this).parent().remove();

        // Add input placeholder if needed
        if( !metaboxes_data.find('input').length ) {
            metaboxes_data.append( '<input type="hidden" class="sh-metaboxes-placeholder-input" name="'+ metaboxes_data.attr( 'data-field-name' ) +'" />' );
        }
    });


    /*
    ** Metaboxes Field - Repeater
    */
    if( $('.sh-metaboxes-field, .jevelin_page_jevelin-theme-settings').length ) {
        var icons = {
            'Simple Line': [
                'icon-user', 'icon-people', 'icon-user-female', 'icon-user-follow', 'icon-user-following', 'icon-user-unfollow', 'icon-login', 'icon-logout', 'icon-emotsmile', 'icon-phone', 'icon-call-end', 'icon-call-in', 'icon-call-out', 'icon-map', 'icon-location-pin', 'icon-direction', 'icon-directions', 'icon-compass', 'icon-layers', 'icon-menu', 'icon-list', 'icon-options-vertical', 'icon-options', 'icon-arrow-down', 'icon-arrow-left', 'icon-arrow-right', 'icon-arrow-up', 'icon-arrow-up-circle', 'icon-arrow-left-circle', 'icon-arrow-right-circle', 'icon-arrow-down-circle', 'icon-check', 'icon-clock', 'icon-plus', 'icon-minus', 'icon-close', 'icon-event', 'icon-exclamation', 'icon-organization', 'icon-trophy', 'icon-screen-smartphone', 'icon-screen-desktop', 'icon-plane', 'icon-notebook', 'icon-mustache', 'icon-mouse', 'icon-magnet', 'icon-energy', 'icon-disc', 'icon-cursor', 'icon-cursor-move', 'icon-crop', 'icon-chemistry', 'icon-speedometer', 'icon-shield', 'icon-screen-tablet', 'icon-magic-wand', 'icon-hourglass', 'icon-graduation', 'icon-ghost', 'icon-game-controller', 'icon-fire', 'icon-eyeglass', 'icon-envelope-open', 'icon-envelope-letter', 'icon-bell', 'icon-badge', 'icon-anchor', 'icon-wallet', 'icon-vector', 'icon-speech', 'icon-puzzle', 'icon-printer', 'icon-present', 'icon-playlist', 'icon-pin', 'icon-picture', 'icon-handbag', 'icon-globe-alt', 'icon-globe', 'icon-folder-alt', 'icon-folder', 'icon-film', 'icon-feed', 'icon-drop', 'icon-drawer', 'icon-docs', 'icon-doc', 'icon-diamond', 'icon-cup', 'icon-calculator', 'icon-bubbles', 'icon-briefcase', 'icon-book-open', 'icon-basket-loaded', 'icon-basket', 'icon-bag', 'icon-action-undo', 'icon-action-redo', 'icon-wrench', 'icon-umbrella', 'icon-trash', 'icon-tag', 'icon-support', 'icon-frame', 'icon-size-fullscreen', 'icon-size-actual', 'icon-shuffle', 'icon-share-alt', 'icon-share', 'icon-rocket', 'icon-question', 'icon-pie-chart', 'icon-pencil', 'icon-note', 'icon-loop', 'icon-home', 'icon-grid', 'icon-graph', 'icon-microphone', 'icon-music-tone-alt', 'icon-music-tone', 'icon-earphones-alt', 'icon-earphones', 'icon-equalizer', 'icon-like', 'icon-dislike', 'icon-control-start', 'icon-control-rewind', 'icon-control-play', 'icon-control-pause', 'icon-control-forward', 'icon-control-end', 'icon-volume-1', 'icon-volume-2', 'icon-volume-off', 'icon-calendar', 'icon-bulb', 'icon-chart', 'icon-ban', 'icon-bubble', 'icon-camrecorder', 'icon-camera', 'icon-cloud-download', 'icon-cloud-upload', 'icon-envelope', 'icon-eye', 'icon-flag', 'icon-heart', 'icon-info', 'icon-key', 'icon-link', 'icon-lock', 'icon-lock-open', 'icon-magnifier', 'icon-magnifier-add', 'icon-magnifier-remove', 'icon-paper-clip', 'icon-paper-plane', 'icon-power', 'icon-refresh', 'icon-reload', 'icon-settings', 'icon-star', 'icon-symbol-female', 'icon-symbol-male', 'icon-target', 'icon-credit-card', 'icon-paypal', 'icon-social-tumblr', 'icon-social-twitter', 'icon-social-facebook', 'icon-social-instagram', 'icon-social-linkedin', 'icon-social-pinterest', 'icon-social-github', 'icon-social-google', 'icon-social-reddit', 'icon-social-skype', 'icon-social-dribbble', 'icon-social-behance', 'icon-social-foursqare', 'icon-social-soundcloud', 'icon-social-spotify', 'icon-social-stumbleupon', 'icon-social-youtube', 'icon-social-dropbox', 'icon-social-vkontakte', 'icon-social-steam',
            ],
            'Themify Icons': [
                'ti-arrow-up', 'ti-arrow-right', 'ti-arrow-left', 'ti-arrow-down', 'ti-arrows-vertical', 'ti-arrows-horizontal', 'ti-angle-up', 'ti-angle-right', 'ti-angle-left', 'ti-angle-down', 'ti-angle-double-up', 'ti-angle-double-right', 'ti-angle-double-left', 'ti-angle-double-down', 'ti-move', 'ti-fullscreen', 'ti-arrow-top-right', 'ti-arrow-top-left', 'ti-arrow-circle-up', 'ti-arrow-circle-right', 'ti-arrow-circle-left', 'ti-arrow-circle-down', 'ti-arrows-corner', 'ti-split-v', 'ti-split-v-alt', 'ti-split-h', 'ti-hand-point-up', 'ti-hand-point-right', 'ti-hand-point-left', 'ti-hand-point-down', 'ti-back-right', 'ti-back-left', 'ti-exchange-vertical', 'ti-wand', 'ti-save', 'ti-save-alt', 'ti-direction', 'ti-direction-alt', 'ti-user', 'ti-link', 'ti-unlink', 'ti-trash', 'ti-target', 'ti-tag', 'ti-desktop', 'ti-tablet', 'ti-mobile', 'ti-email', 'ti-star', 'ti-spray', 'ti-signal', 'ti-shopping-cart', 'ti-shopping-cart-full', 'ti-settings', 'ti-search', 'ti-zoom-in', 'ti-zoom-out', 'ti-cut', 'ti-ruler', 'ti-ruler-alt-2', 'ti-ruler-pencil', 'ti-ruler-alt', 'ti-bookmark', 'ti-bookmark-alt', 'ti-reload', 'ti-plus', 'ti-minus', 'ti-close', 'ti-pin', 'ti-pencil', 'ti-pencil-alt', 'ti-paint-roller', 'ti-paint-bucket', 'ti-na', 'ti-medall', 'ti-medall-alt', 'ti-marker', 'ti-marker-alt', 'ti-lock', 'ti-unlock', 'ti-location-arrow', 'ti-layout', 'ti-layers', 'ti-layers-alt', 'ti-key', 'ti-image', 'ti-heart', 'ti-heart-broken', 'ti-hand-stop', 'ti-hand-open', 'ti-hand-drag', 'ti-flag', 'ti-flag-alt', 'ti-flag-alt-2', 'ti-eye', 'ti-import', 'ti-export', 'ti-cup', 'ti-crown', 'ti-comments', 'ti-comment', 'ti-comment-alt', 'ti-thought', 'ti-clip', 'ti-check', 'ti-check-box', 'ti-camera', 'ti-announcement', 'ti-brush', 'ti-brush-alt', 'ti-palette', 'ti-briefcase', 'ti-bolt', 'ti-bolt-alt', 'ti-blackboard', 'ti-bag', 'ti-world', 'ti-wheelchair', 'ti-car', 'ti-truck', 'ti-timer', 'ti-ticket', 'ti-thumb-up', 'ti-thumb-down', 'ti-stats-up', 'ti-stats-down', 'ti-shine', 'ti-shift-right', 'ti-shift-left', 'ti-shift-right-alt', 'ti-shift-left-alt', 'ti-shield', 'ti-notepad', 'ti-server', 'ti-pulse', 'ti-printer', 'ti-power-off', 'ti-plug', 'ti-pie-chart', 'ti-panel', 'ti-package', 'ti-music', 'ti-music-alt', 'ti-mouse', 'ti-mouse-alt', 'ti-money', 'ti-microphone', 'ti-menu', 'ti-menu-alt', 'ti-map', 'ti-map-alt', 'ti-location-pin', 'ti-light-bulb', 'ti-info', 'ti-infinite', 'ti-id-badge', 'ti-hummer', 'ti-home', 'ti-help', 'ti-headphone', 'ti-harddrives', 'ti-harddrive', 'ti-gift', 'ti-game', 'ti-filter', 'ti-files', 'ti-file', 'ti-zip', 'ti-folder', 'ti-envelope', 'ti-dashboard', 'ti-cloud', 'ti-cloud-up', 'ti-cloud-down', 'ti-clipboard', 'ti-calendar', 'ti-book', 'ti-bell', 'ti-basketball', 'ti-bar-chart', 'ti-bar-chart-alt', 'ti-archive', 'ti-anchor', 'ti-alert', 'ti-alarm-clock', 'ti-agenda', 'ti-write', 'ti-wallet', 'ti-video-clapper', 'ti-video-camera', 'ti-vector', 'ti-support', 'ti-stamp', 'ti-slice', 'ti-shortcode', 'ti-receipt', 'ti-pin2', 'ti-pin-alt', 'ti-pencil-alt2', 'ti-eraser', 'ti-more', 'ti-more-alt', 'ti-microphone-alt', 'ti-magnet', 'ti-line-double', 'ti-line-dotted', 'ti-line-dashed', 'ti-ink-pen', 'ti-info-alt', 'ti-help-alt', 'ti-headphone-alt', 'ti-gallery', 'ti-face-smile', 'ti-face-sad', 'ti-credit-card', 'ti-comments-smiley', 'ti-time', 'ti-share', 'ti-share-alt', 'ti-rocket', 'ti-new-window', 'ti-rss', 'ti-rss-alt', 'ti-control-stop', 'ti-control-shuffle', 'ti-control-play', 'ti-control-pause', 'ti-control-forward', 'ti-control-backward', 'ti-volume', 'ti-control-skip-forward', 'ti-control-skip-backward', 'ti-control-record', 'ti-control-eject', 'ti-paragraph', 'ti-uppercase', 'ti-underline', 'ti-text', 'ti-Italic', 'ti-smallcap', 'ti-list', 'ti-list-ol', 'ti-align-right', 'ti-align-left', 'ti-align-justify', 'ti-align-center', 'ti-quote-right', 'ti-quote-left', 'ti-layout-width-full', 'ti-layout-width-default', 'ti-layout-width-default-alt', 'ti-layout-tab', 'ti-layout-tab-window', 'ti-layout-tab-v', 'ti-layout-tab-min', 'ti-layout-slider', 'ti-layout-slider-alt', 'ti-layout-sidebar-right', 'ti-layout-sidebar-none', 'ti-layout-sidebar-left', 'ti-layout-placeholder', 'ti-layout-menu', 'ti-layout-menu-v', 'ti-layout-menu-separated', 'ti-layout-menu-full', 'ti-layout-media-right', 'ti-layout-media-right-alt', 'ti-layout-media-overlay', 'ti-layout-media-overlay-alt', 'ti-layout-media-overlay-alt-2', 'ti-layout-media-left', 'ti-layout-media-left-alt', 'ti-layout-media-center', 'ti-layout-media-center-alt', 'ti-layout-list-thumb', 'ti-layout-list-thumb-alt', 'ti-layout-list-post', 'ti-layout-list-large-image', 'ti-layout-line-solid', 'ti-layout-grid4', 'ti-layout-grid3', 'ti-layout-grid2', 'ti-layout-grid2-thumb', 'ti-layout-cta-right', 'ti-layout-cta-left', 'ti-layout-cta-center', 'ti-layout-cta-btn-right', 'ti-layout-cta-btn-left', 'ti-layout-column4', 'ti-layout-column3', 'ti-layout-column2', 'ti-layout-accordion-separated', 'ti-layout-accordion-merged', 'ti-layout-accordion-list', 'ti-widgetized', 'ti-widget', 'ti-widget-alt', 'ti-view-list', 'ti-view-list-alt', 'ti-view-grid', 'ti-upload', 'ti-download', 'ti-loop', 'ti-layout-sidebar-2', 'ti-layout-grid4-alt', 'ti-layout-grid3-alt', 'ti-layout-grid2-alt', 'ti-layout-column4-alt', 'ti-layout-column3-alt', 'ti-layout-column2-alt', 'ti-flickr', 'ti-flickr-alt', 'ti-instagram', 'ti-google', 'ti-github', 'ti-facebook', 'ti-dropbox', 'ti-dropbox-alt', 'ti-dribbble', 'ti-apple', 'ti-android', 'ti-yahoo', 'ti-trello', 'ti-stack-overflow', 'ti-soundcloud', 'ti-sharethis', 'ti-sharethis-alt', 'ti-reddit', 'ti-microsoft', 'ti-microsoft-alt', 'ti-linux', 'ti-jsfiddle', 'ti-joomla', 'ti-html5', 'ti-css3', 'ti-drupal', 'ti-wordpress', 'ti-tumblr', 'ti-tumblr-alt', 'ti-skype', 'ti-youtube', 'ti-vimeo', 'ti-vimeo-alt', 'ti-twitter', 'ti-twitter-alt', 'ti-linkedin', 'ti-pinterest', 'ti-pinterest-alt', 'ti-themify-logo', 'ti-themify-favicon', 'ti-themify-favicon-alt',
            ],
            'Pixeden Icons': [
                'pe-7s-album', 'pe-7s-arc', 'pe-7s-back-2', 'pe-7s-bandaid', 'pe-7s-car', 'pe-7s-diamond', 'pe-7s-door-lock', 'pe-7s-eyedropper', 'pe-7s-female', 'pe-7s-gym', 'pe-7s-hammer', 'pe-7s-headphones', 'pe-7s-helm', 'pe-7s-hourglass', 'pe-7s-leaf', 'pe-7s-magic-wand', 'pe-7s-male', 'pe-7s-map-2', 'pe-7s-next-2', 'pe-7s-paint-bucket', 'pe-7s-pendrive', 'pe-7s-photo', 'pe-7s-piggy', 'pe-7s-plugin', 'pe-7s-refresh-2', 'pe-7s-rocket', 'pe-7s-settings', 'pe-7s-shield', 'pe-7s-smile', 'pe-7s-usb', 'pe-7s-vector', 'pe-7s-wine', 'pe-7s-cloud-upload', 'pe-7s-cash', 'pe-7s-close', 'pe-7s-bluetooth', 'pe-7s-cloud-download', 'pe-7s-way', 'pe-7s-close-circle', 'pe-7s-id', 'pe-7s-angle-up', 'pe-7s-wristwatch', 'pe-7s-angle-up-circle', 'pe-7s-world', 'pe-7s-angle-right', 'pe-7s-volume', 'pe-7s-angle-right-circle', 'pe-7s-users', 'pe-7s-angle-left', 'pe-7s-user-female', 'pe-7s-angle-left-circle', 'pe-7s-up-arrow', 'pe-7s-angle-down', 'pe-7s-switch', 'pe-7s-angle-down-circle', 'pe-7s-scissors', 'pe-7s-wallet', 'pe-7s-safe', 'pe-7s-volume2', 'pe-7s-volume1', 'pe-7s-voicemail', 'pe-7s-video', 'pe-7s-user', 'pe-7s-upload', 'pe-7s-unlock', 'pe-7s-umbrella', 'pe-7s-trash', 'pe-7s-tools', 'pe-7s-timer', 'pe-7s-ticket', 'pe-7s-target', 'pe-7s-sun', 'pe-7s-study', 'pe-7s-stopwatch', 'pe-7s-star', 'pe-7s-speaker', 'pe-7s-signal', 'pe-7s-shuffle', 'pe-7s-shopbag', 'pe-7s-share', 'pe-7s-server', 'pe-7s-search', 'pe-7s-film', 'pe-7s-science', 'pe-7s-disk', 'pe-7s-ribbon', 'pe-7s-repeat', 'pe-7s-refresh', 'pe-7s-add-user', 'pe-7s-refresh-cloud', 'pe-7s-paperclip', 'pe-7s-radio', 'pe-7s-note2', 'pe-7s-print', 'pe-7s-network', 'pe-7s-prev', 'pe-7s-mute', 'pe-7s-power', 'pe-7s-medal', 'pe-7s-portfolio', 'pe-7s-like2', 'pe-7s-plus', 'pe-7s-left-arrow', 'pe-7s-play', 'pe-7s-key', 'pe-7s-plane', 'pe-7s-joy', 'pe-7s-photo-gallery', 'pe-7s-pin', 'pe-7s-phone', 'pe-7s-plug', 'pe-7s-pen', 'pe-7s-right-arrow', 'pe-7s-paper-plane', 'pe-7s-delete-user', 'pe-7s-paint', 'pe-7s-bottom-arrow', 'pe-7s-notebook', 'pe-7s-note', 'pe-7s-next', 'pe-7s-news-paper', 'pe-7s-musiclist', 'pe-7s-music', 'pe-7s-mouse', 'pe-7s-more', 'pe-7s-moon', 'pe-7s-monitor', 'pe-7s-micro', 'pe-7s-menu', 'pe-7s-map', 'pe-7s-map-marker', 'pe-7s-mail', 'pe-7s-mail-open', 'pe-7s-mail-open-file', 'pe-7s-magnet', 'pe-7s-loop', 'pe-7s-look', 'pe-7s-lock', 'pe-7s-lintern', 'pe-7s-link', 'pe-7s-like', 'pe-7s-light', 'pe-7s-less', 'pe-7s-keypad', 'pe-7s-junk', 'pe-7s-info', 'pe-7s-home', 'pe-7s-help2', 'pe-7s-help1', 'pe-7s-graph3', 'pe-7s-graph2', 'pe-7s-graph1', 'pe-7s-graph', 'pe-7s-global', 'pe-7s-gleam', 'pe-7s-glasses', 'pe-7s-gift', 'pe-7s-folder', 'pe-7s-flag', 'pe-7s-filter', 'pe-7s-file', 'pe-7s-expand1', 'pe-7s-exapnd2', 'pe-7s-edit', 'pe-7s-drop', 'pe-7s-drawer', 'pe-7s-download', 'pe-7s-display2', 'pe-7s-display1', 'pe-7s-diskette', 'pe-7s-date', 'pe-7s-cup', 'pe-7s-culture', 'pe-7s-crop', 'pe-7s-credit', 'pe-7s-copy-file', 'pe-7s-config', 'pe-7s-compass', 'pe-7s-comment', 'pe-7s-coffee', 'pe-7s-cloud', 'pe-7s-clock', 'pe-7s-check', 'pe-7s-chat', 'pe-7s-cart', 'pe-7s-camera', 'pe-7s-call', 'pe-7s-calculator', 'pe-7s-browser', 'pe-7s-box2', 'pe-7s-box1', 'pe-7s-bookmarks', 'pe-7s-bicycle', 'pe-7s-bell', 'pe-7s-battery', 'pe-7s-ball', 'pe-7s-back', 'pe-7s-attention', 'pe-7s-anchor', 'pe-7s-albums', 'pe-7s-alarm', 'pe-7s-airplay',
            ],
            'Font Awesome': [
                'fa fa-handshake-o', 'fa fa-envelope-open', 'fa fa-envelope-open-o', 'fa fa-linode', 'fa fa-address-book', 'fa fa-address-book-o', 'fa fa-address-card', 'fa fa-address-card-o', 'fa fa-user-circle', 'fa fa-user-circle-o', 'fa fa-user-o', 'fa fa-id-badge', 'fa fa-id-card', 'fa fa-id-card-o', 'fa fa-quora', 'fa fa-free-code-camp', 'fa fa-telegram', 'fa fa-thermometer-full', 'fa fa-thermometer-three-quarters', 'fa fa-thermometer-half', 'fa fa-thermometer-quarter', 'fa fa-thermometer-empty', 'fa fa-shower', 'fa fa-bath', 'fa fa-podcast', 'fa fa-window-maximize', 'fa fa-window-minimize', 'fa fa-window-restore', 'fa fa-window-close', 'fa fa-window-close-o', 'fa fa-bandcamp', 'fa fa-grav', 'fa fa-etsy', 'fa fa-imdb', 'fa fa-ravelry', 'fa fa-eercast', 'fa fa-microchip', 'fa fa-snowflake-o', 'fa fa-superpowers', 'fa fa-wpexplorer', 'fa fa-meetup', 'fa fa-glass', 'fa fa-music', 'fa fa-search', 'fa fa-envelope-o', 'fa fa-heart', 'fa fa-star', 'fa fa-star-o', 'fa fa-user', 'fa fa-film', 'fa fa-check', 'fa fa-times', 'fa fa-search-plus', 'fa fa-search-minus', 'fa fa-power-off', 'fa fa-signal', 'fa fa-cog', 'fa fa-trash-o', 'fa fa-home', 'fa fa-clock-o', 'fa fa-road', 'fa fa-download', 'fa fa-inbox', 'fa fa-refresh', 'fa fa-lock', 'fa fa-flag', 'fa fa-headphones', 'fa fa-volume-off', 'fa fa-volume-down', 'fa fa-volume-up', 'fa fa-qrcode', 'fa fa-barcode', 'fa fa-tag', 'fa fa-tags', 'fa fa-book', 'fa fa-bookmark', 'fa fa-print', 'fa fa-camera', 'fa fa-video-camera', 'fa fa-picture-o', 'fa fa-pencil', 'fa fa-map-marker', 'fa fa-adjust', 'fa fa-tint', 'fa fa-pencil-square-o', 'fa fa-share-square-o', 'fa fa-check-square-o', 'fa fa-arrows', 'fa fa-plus-circle', 'fa fa-minus-circle', 'fa fa-times-circle', 'fa fa-check-circle', 'fa fa-question-circle', 'fa fa-info-circle', 'fa fa-crosshairs', 'fa fa-times-circle-o', 'fa fa-check-circle-o', 'fa fa-ban', 'fa fa-share', 'fa fa-plus', 'fa fa-minus', 'fa fa-asterisk', 'fa fa-exclamation-circle', 'fa fa-gift', 'fa fa-leaf', 'fa fa-fire', 'fa fa-eye', 'fa fa-eye-slash', 'fa fa-exclamation-triangle', 'fa fa-plane', 'fa fa-calendar', 'fa fa-random', 'fa fa-comment', 'fa fa-magnet', 'fa fa-retweet', 'fa fa-shopping-cart', 'fa fa-folder', 'fa fa-folder-open', 'fa fa-arrows-v', 'fa fa-arrows-h', 'fa fa-bar-chart', 'fa fa-camera-retro', 'fa fa-key', 'fa fa-cogs', 'fa fa-comments', 'fa fa-thumbs-o-up', 'fa fa-thumbs-o-down', 'fa fa-star-half', 'fa fa-heart-o', 'fa fa-sign-out', 'fa fa-thumb-tack', 'fa fa-external-link', 'fa fa-sign-in', 'fa fa-trophy', 'fa fa-upload', 'fa fa-lemon-o', 'fa fa-phone', 'fa fa-square-o', 'fa fa-bookmark-o', 'fa fa-phone-square', 'fa fa-unlock', 'fa fa-credit-card', 'fa fa-rss', 'fa fa-hdd-o', 'fa fa-bullhorn', 'fa fa-bell', 'fa fa-certificate', 'fa fa-globe', 'fa fa-wrench', 'fa fa-tasks', 'fa fa-filter', 'fa fa-briefcase', 'fa fa-users', 'fa fa-cloud', 'fa fa-flask', 'fa fa-square', 'fa fa-bars', 'fa fa-magic', 'fa fa-truck', 'fa fa-money', 'fa fa-sort', 'fa fa-sort-desc', 'fa fa-sort-asc', 'fa fa-envelope', 'fa fa-gavel', 'fa fa-tachometer', 'fa fa-comment-o', 'fa fa-comments-o', 'fa fa-bolt', 'fa fa-sitemap', 'fa fa-umbrella', 'fa fa-lightbulb-o', 'fa fa-exchange', 'fa fa-cloud-download', 'fa fa-cloud-upload', 'fa fa-suitcase', 'fa fa-bell-o', 'fa fa-coffee', 'fa fa-cutlery', 'fa fa-building-o', 'fa fa-fighter-jet', 'fa fa-beer', 'fa fa-plus-square', 'fa fa-desktop', 'fa fa-laptop', 'fa fa-tablet', 'fa fa-mobile', 'fa fa-circle-o', 'fa fa-quote-left', 'fa fa-quote-right', 'fa fa-spinner', 'fa fa-circle', 'fa fa-reply', 'fa fa-folder-o', 'fa fa-folder-open-o', 'fa fa-smile-o', 'fa fa-frown-o', 'fa fa-meh-o', 'fa fa-gamepad', 'fa fa-keyboard-o', 'fa fa-flag-o', 'fa fa-flag-checkered', 'fa fa-terminal', 'fa fa-code', 'fa fa-reply-all', 'fa fa-star-half-o', 'fa fa-location-arrow', 'fa fa-crop', 'fa fa-code-fork', 'fa fa-question', 'fa fa-info', 'fa fa-exclamation', 'fa fa-eraser', 'fa fa-puzzle-piece', 'fa fa-microphone', 'fa fa-microphone-slash', 'fa fa-shield', 'fa fa-calendar-o', 'fa fa-fire-extinguisher', 'fa fa-rocket', 'fa fa-anchor', 'fa fa-unlock-alt', 'fa fa-bullseye', 'fa fa-ellipsis-h', 'fa fa-ellipsis-v', 'fa fa-rss-square', 'fa fa-ticket', 'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-level-up', 'fa fa-level-down', 'fa fa-check-square', 'fa fa-pencil-square', 'fa fa-external-link-square', 'fa fa-share-square', 'fa fa-compass', 'fa fa-caret-square-o-down', 'fa fa-caret-square-o-up', 'fa fa-caret-square-o-right', 'fa fa-sort-alpha-asc', 'fa fa-sort-alpha-desc', 'fa fa-sort-amount-asc', 'fa fa-sort-amount-desc', 'fa fa-sort-numeric-asc', 'fa fa-sort-numeric-desc', 'fa fa-thumbs-up', 'fa fa-thumbs-down', 'fa fa-female', 'fa fa-male', 'fa fa-sun-o', 'fa fa-moon-o', 'fa fa-archive', 'fa fa-bug', 'fa fa-caret-square-o-left', 'fa fa-dot-circle-o', 'fa fa-wheelchair', 'fa fa-plus-square-o', 'fa fa-space-shuttle', 'fa fa-envelope-square', 'fa fa-university', 'fa fa-graduation-cap', 'fa fa-language', 'fa fa-fax', 'fa fa-building', 'fa fa-child', 'fa fa-paw', 'fa fa-spoon', 'fa fa-cube', 'fa fa-cubes', 'fa fa-recycle', 'fa fa-car', 'fa fa-taxi', 'fa fa-tree', 'fa fa-database', 'fa fa-file-pdf-o', 'fa fa-file-word-o', 'fa fa-file-excel-o', 'fa fa-file-powerpoint-o', 'fa fa-file-image-o', 'fa fa-file-archive-o', 'fa fa-file-audio-o', 'fa fa-file-video-o', 'fa fa-file-code-o', 'fa fa-life-ring', 'fa fa-circle-o-notch', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-history', 'fa fa-circle-thin', 'fa fa-sliders', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-bomb', 'fa fa-futbol-o', 'fa fa-tty', 'fa fa-binoculars', 'fa fa-plug', 'fa fa-newspaper-o', 'fa fa-wifi', 'fa fa-calculator', 'fa fa-bell-slash', 'fa fa-bell-slash-o', 'fa fa-trash', 'fa fa-copyright', 'fa fa-at', 'fa fa-eyedropper', 'fa fa-paint-brush', 'fa fa-birthday-cake', 'fa fa-area-chart', 'fa fa-pie-chart', 'fa fa-line-chart', 'fa fa-toggle-off', 'fa fa-toggle-on', 'fa fa-bicycle', 'fa fa-bus', 'fa fa-cc', 'fa fa-cart-plus', 'fa fa-cart-arrow-down', 'fa fa-diamond', 'fa fa-ship', 'fa fa-user-secret', 'fa fa-motorcycle', 'fa fa-street-view', 'fa fa-heartbeat', 'fa fa-server', 'fa fa-user-plus', 'fa fa-user-times', 'fa fa-bed', 'fa fa-battery-full', 'fa fa-battery-three-quarters', 'fa fa-battery-half', 'fa fa-battery-quarter', 'fa fa-battery-empty', 'fa fa-mouse-pointer', 'fa fa-i-cursor', 'fa fa-object-group', 'fa fa-object-ungroup', 'fa fa-sticky-note', 'fa fa-sticky-note-o', 'fa fa-clone', 'fa fa-balance-scale', 'fa fa-hourglass-o', 'fa fa-hourglass-start', 'fa fa-hourglass-half', 'fa fa-hourglass-end', 'fa fa-hourglass', 'fa fa-hand-rock-o', 'fa fa-hand-paper-o', 'fa fa-hand-scissors-o', 'fa fa-hand-lizard-o', 'fa fa-hand-spock-o', 'fa fa-hand-pointer-o', 'fa fa-hand-peace-o', 'fa fa-trademark', 'fa fa-registered', 'fa fa-creative-commons', 'fa fa-television', 'fa fa-calendar-plus-o', 'fa fa-calendar-minus-o', 'fa fa-calendar-times-o', 'fa fa-calendar-check-o', 'fa fa-industry', 'fa fa-map-pin', 'fa fa-map-signs', 'fa fa-map-o', 'fa fa-map', 'fa fa-commenting', 'fa fa-commenting-o', 'fa fa-credit-card-alt', 'fa fa-shopping-bag', 'fa fa-shopping-basket', 'fa fa-hashtag', 'fa fa-bluetooth', 'fa fa-bluetooth-b', 'fa fa-percent', 'fa fa-universal-access', 'fa fa-wheelchair-alt', 'fa fa-question-circle-o', 'fa fa-blind', 'fa fa-audio-description', 'fa fa-volume-control-phone', 'fa fa-braille', 'fa fa-assistive-listening-systems', 'fa fa-american-sign-language-interpreting', 'fa fa-deaf', 'fa fa-sign-language', 'fa fa-low-vision', 'fa fa-handshake-o', 'fa fa-envelope-open', 'fa fa-envelope-open-o', 'fa fa-address-book', 'fa fa-address-book-o', 'fa fa-address-card', 'fa fa-address-card-o', 'fa fa-user-circle', 'fa fa-user-circle-o', 'fa fa-user-o', 'fa fa-id-badge', 'fa fa-id-card', 'fa fa-id-card-o', 'fa fa-thermometer-full', 'fa fa-thermometer-three-quarters', 'fa fa-thermometer-half', 'fa fa-thermometer-quarter', 'fa fa-thermometer-empty', 'fa fa-shower', 'fa fa-bath', 'fa fa-podcast', 'fa fa-window-maximize', 'fa fa-window-minimize', 'fa fa-window-restore', 'fa fa-window-close', 'fa fa-window-close-o', 'fa fa-microchip', 'fa fa-snowflake-o', 'fa fa-heart', 'fa fa-heart-o', 'fa fa-user-md', 'fa fa-stethoscope', 'fa fa-hospital-o', 'fa fa-ambulance', 'fa fa-medkit', 'fa fa-h-square', 'fa fa-plus-square', 'fa fa-wheelchair', 'fa fa-heartbeat', 'fa fa-wheelchair-alt', 'fa fa-th-large', 'fa fa-th', 'fa fa-th-list', 'fa fa-file-o', 'fa fa-repeat', 'fa fa-list-alt', 'fa fa-font', 'fa fa-bold', 'fa fa-italic', 'fa fa-text-height', 'fa fa-text-width', 'fa fa-align-left', 'fa fa-align-center', 'fa fa-align-right', 'fa fa-align-justify', 'fa fa-list', 'fa fa-outdent', 'fa fa-indent', 'fa fa-link', 'fa fa-scissors', 'fa fa-files-o', 'fa fa-paperclip', 'fa fa-floppy-o', 'fa fa-list-ul', 'fa fa-list-ol', 'fa fa-strikethrough', 'fa fa-underline', 'fa fa-table', 'fa fa-columns', 'fa fa-undo', 'fa fa-clipboard', 'fa fa-file-text-o', 'fa fa-chain-broken', 'fa fa-superscript', 'fa fa-subscript', 'fa fa-eraser', 'fa fa-file', 'fa fa-file-text', 'fa fa-header', 'fa fa-paragraph', 'fa fa-cog', 'fa fa-refresh', 'fa fa-spinner', 'fa fa-circle-o-notch', 'fa fa-file-o', 'fa fa-file-text-o', 'fa fa-file', 'fa fa-file-text', 'fa fa-file-pdf-o', 'fa fa-file-word-o', 'fa fa-file-excel-o', 'fa fa-file-powerpoint-o', 'fa fa-file-image-o', 'fa fa-file-archive-o', 'fa fa-file-audio-o', 'fa fa-file-video-o', 'fa fa-file-code-o', 'fa fa-arrow-circle-o-down', 'fa fa-arrow-circle-o-up', 'fa fa-arrows', 'fa fa-chevron-left', 'fa fa-chevron-right', 'fa fa-arrow-left', 'fa fa-arrow-right', 'fa fa-arrow-up', 'fa fa-arrow-down', 'fa fa-chevron-up', 'fa fa-chevron-down', 'fa fa-arrows-v', 'fa fa-arrows-h', 'fa fa-hand-o-right', 'fa fa-hand-o-left', 'fa fa-hand-o-up', 'fa fa-hand-o-down', 'fa fa-arrow-circle-left', 'fa fa-arrow-circle-right', 'fa fa-arrow-circle-up', 'fa fa-arrow-circle-down', 'fa fa-arrows-alt', 'fa fa-caret-down', 'fa fa-caret-up', 'fa fa-caret-left', 'fa fa-caret-right', 'fa fa-exchange', 'fa fa-angle-double-left', 'fa fa-angle-double-right', 'fa fa-angle-double-up', 'fa fa-angle-double-down', 'fa fa-angle-left', 'fa fa-angle-right', 'fa fa-angle-up', 'fa fa-angle-down', 'fa fa-chevron-circle-left', 'fa fa-chevron-circle-right', 'fa fa-chevron-circle-up', 'fa fa-chevron-circle-down', 'fa fa-caret-square-o-down', 'fa fa-caret-square-o-up', 'fa fa-caret-square-o-right', 'fa fa-long-arrow-down', 'fa fa-long-arrow-up', 'fa fa-long-arrow-left', 'fa fa-long-arrow-right', 'fa fa-arrow-circle-o-right', 'fa fa-arrow-circle-o-left', 'fa fa-caret-square-o-left', 'fa fa-play-circle-o', 'fa fa-step-backward', 'fa fa-fast-backward', 'fa fa-backward', 'fa fa-play', 'fa fa-pause', 'fa fa-stop', 'fa fa-forward', 'fa fa-fast-forward', 'fa fa-step-forward', 'fa fa-eject', 'fa fa-expand', 'fa fa-compress', 'fa fa-random', 'fa fa-arrows-alt', 'fa fa-play-circle', 'fa fa-youtube-play', 'fa fa-pause-circle', 'fa fa-pause-circle-o', 'fa fa-stop-circle', 'fa fa-stop-circle-o', 'fa fa-check-square-o', 'fa fa-square-o', 'fa fa-square', 'fa fa-plus-square', 'fa fa-circle-o', 'fa fa-circle', 'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-check-square', 'fa fa-dot-circle-o', 'fa fa-plus-square-o', 'fa fa-plane', 'fa fa-truck', 'fa fa-ambulance', 'fa fa-fighter-jet', 'fa fa-rocket', 'fa fa-wheelchair', 'fa fa-space-shuttle', 'fa fa-car', 'fa fa-taxi', 'fa fa-bicycle', 'fa fa-bus', 'fa fa-ship', 'fa fa-motorcycle', 'fa fa-train', 'fa fa-subway', 'fa fa-wheelchair-alt', 'fa fa-bar-chart', 'fa fa-area-chart', 'fa fa-pie-chart', 'fa fa-line-chart', 'fa fa-twitter-square', 'fa fa-facebook-square', 'fa fa-linkedin-square', 'fa fa-github-square', 'fa fa-twitter', 'fa fa-facebook', 'fa fa-github', 'fa fa-pinterest', 'fa fa-pinterest-square', 'fa fa-google-plus-square', 'fa fa-google-plus', 'fa fa-linkedin', 'fa fa-github-alt', 'fa fa-maxcdn', 'fa fa-html5', 'fa fa-css3', 'fa fa-btc', 'fa fa-youtube-square', 'fa fa-youtube', 'fa fa-xing', 'fa fa-xing-square', 'fa fa-youtube-play', 'fa fa-dropbox', 'fa fa-stack-overflow', 'fa fa-instagram', 'fa fa-flickr', 'fa fa-adn', 'fa fa-bitbucket', 'fa fa-bitbucket-square', 'fa fa-tumblr', 'fa fa-tumblr-square', 'fa fa-apple', 'fa fa-windows', 'fa fa-android', 'fa fa-linux', 'fa fa-dribbble', 'fa fa-skype', 'fa fa-foursquare', 'fa fa-trello', 'fa fa-gratipay', 'fa fa-vk', 'fa fa-weibo', 'fa fa-renren', 'fa fa-pagelines', 'fa fa-stack-exchange', 'fa fa-vimeo-square', 'fa fa-slack', 'fa fa-wordpress', 'fa fa-openid', 'fa fa-yahoo', 'fa fa-google', 'fa fa-reddit', 'fa fa-reddit-square', 'fa fa-stumbleupon-circle', 'fa fa-stumbleupon', 'fa fa-delicious', 'fa fa-digg', 'fa fa-pied-piper-pp', 'fa fa-pied-piper-alt', 'fa fa-drupal', 'fa fa-joomla', 'fa fa-behance', 'fa fa-behance-square', 'fa fa-steam', 'fa fa-steam-square', 'fa fa-spotify', 'fa fa-deviantart', 'fa fa-soundcloud', 'fa fa-vine', 'fa fa-codepen', 'fa fa-jsfiddle', 'fa fa-rebel', 'fa fa-empire', 'fa fa-git-square', 'fa fa-git', 'fa fa-hacker-news', 'fa fa-tencent-weibo', 'fa fa-qq', 'fa fa-weixin', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-slideshare', 'fa fa-twitch', 'fa fa-yelp', 'fa fa-paypal', 'fa fa-google-wallet', 'fa fa-cc-visa', 'fa fa-cc-mastercard', 'fa fa-cc-discover', 'fa fa-cc-amex', 'fa fa-cc-paypal', 'fa fa-cc-stripe', 'fa fa-lastfm', 'fa fa-lastfm-square', 'fa fa-ioxhost', 'fa fa-angellist', 'fa fa-meanpath', 'fa fa-buysellads', 'fa fa-connectdevelop', 'fa fa-dashcube', 'fa fa-forumbee', 'fa fa-leanpub', 'fa fa-sellsy', 'fa fa-shirtsinbulk', 'fa fa-simplybuilt', 'fa fa-skyatlas', 'fa fa-facebook-official', 'fa fa-pinterest-p', 'fa fa-whatsapp', 'fa fa-viacoin', 'fa fa-medium', 'fa fa-y-combinator', 'fa fa-optin-monster', 'fa fa-opencart', 'fa fa-expeditedssl', 'fa fa-cc-jcb', 'fa fa-cc-diners-club', 'fa fa-gg', 'fa fa-gg-circle', 'fa fa-tripadvisor', 'fa fa-odnoklassniki', 'fa fa-odnoklassniki-square', 'fa fa-get-pocket', 'fa fa-wikipedia-w', 'fa fa-safari', 'fa fa-chrome', 'fa fa-firefox', 'fa fa-opera', 'fa fa-internet-explorer', 'fa fa-contao', 'fa fa-500px', 'fa fa-amazon', 'fa fa-houzz', 'fa fa-vimeo', 'fa fa-black-tie', 'fa fa-fonticons', 'fa fa-reddit-alien', 'fa fa-edge', 'fa fa-codiepie', 'fa fa-modx', 'fa fa-fort-awesome', 'fa fa-usb', 'fa fa-product-hunt', 'fa fa-mixcloud', 'fa fa-scribd', 'fa fa-bluetooth', 'fa fa-bluetooth-b', 'fa fa-gitlab', 'fa fa-wpbeginner', 'fa fa-wpforms', 'fa fa-envira', 'fa fa-glide', 'fa fa-glide-g', 'fa fa-viadeo', 'fa fa-viadeo-square', 'fa fa-snapchat', 'fa fa-snapchat-ghost', 'fa fa-snapchat-square', 'fa fa-pied-piper', 'fa fa-first-order', 'fa fa-yoast', 'fa fa-themeisle', 'fa fa-google-plus-official', 'fa fa-font-awesome', 'fa fa-linode', 'fa fa-quora', 'fa fa-free-code-camp', 'fa fa-telegram', 'fa fa-bandcamp', 'fa fa-grav', 'fa fa-etsy', 'fa fa-imdb', 'fa fa-ravelry', 'fa fa-eercast', 'fa fa-superpowers', 'fa fa-wpexplorer', 'fa fa-meetup', 'fa fa-thumbs-o-up', 'fa fa-thumbs-o-down', 'fa fa-hand-o-right', 'fa fa-hand-o-left', 'fa fa-hand-o-up', 'fa fa-hand-o-down', 'fa fa-thumbs-up', 'fa fa-thumbs-down', 'fa fa-hand-rock-o', 'fa fa-hand-paper-o', 'fa fa-hand-scissors-o', 'fa fa-hand-lizard-o', 'fa fa-hand-spock-o', 'fa fa-hand-pointer-o', 'fa fa-hand-peace-o', 'fa fa-credit-card', 'fa fa-paypal', 'fa fa-google-wallet', 'fa fa-cc-visa', 'fa fa-cc-mastercard', 'fa fa-cc-discover', 'fa fa-cc-amex', 'fa fa-cc-paypal', 'fa fa-cc-stripe', 'fa fa-cc-jcb', 'fa fa-cc-diners-club', 'fa fa-credit-card-alt', 'fa fa-money', 'fa fa-eur', 'fa fa-gbp', 'fa fa-usd', 'fa fa-inr', 'fa fa-jpy', 'fa fa-rub', 'fa fa-krw', 'fa fa-btc', 'fa fa-try', 'fa fa-ils', 'fa fa-gg', 'fa fa-gg-circle', 'fa fa-wheelchair', 'fa fa-tty', 'fa fa-cc', 'fa fa-universal-access', 'fa fa-wheelchair-alt', 'fa fa-question-circle-o', 'fa fa-blind', 'fa fa-audio-description', 'fa fa-volume-control-phone', 'fa fa-braille', 'fa fa-assistive-listening-systems', 'fa fa-american-sign-language-interpreting', 'fa fa-deaf', 'fa fa-sign-language', 'fa fa-low-vision', 'fa fa-venus', 'fa fa-mars', 'fa fa-mercury', 'fa fa-transgender', 'fa fa-transgender-alt', 'fa fa-venus-double', 'fa fa-mars-double', 'fa fa-venus-mars', 'fa fa-mars-stroke', 'fa fa-mars-stroke-v', 'fa fa-mars-stroke-h', 'fa fa-neuter', 'fa fa-genderless',
            ],
        };

        // Set repeater title
        /*$('.sh-metaboxes-repeater-item-container').each( function() {
            $(this).find( '.sh-metaboxes-repeater-header-title' ).html( $(this).find( 'input' ).val() );
        });*/

        // Open repeater
        $('body').on( 'click', '.sh-metaboxes-repeater-header', function() {
            $(this).closest( '.sh-metaboxes-repeater-item-container' ).toggleClass( 'open' );
            $(this).find( '.sh-metaboxes-repeater-header-title' ).html( $(this).parent().find( 'input' ).val() );
        });

        // Delete repeater
        $('body').on( 'click', '.sh-metaboxes-field-repeater-delete', function() {
            // Set input placholder var
            var metaboxes_data = $(this).closest('.sh-metaboxes-data');

            $(this).closest('.sh-metaboxes-repeater-item').remove();

            // Add input placeholder if needed
            if( !metaboxes_data.find('input').length ) {
                metaboxes_data.append( '<input type="hidden" class="sh-metaboxes-placeholder-input" name="'+ metaboxes_data.attr( 'data-field-name' ) +'" />' );
            }
        });

        // Add repeater
        $('body').on( 'click', '.sh-metaboxes-field-repeater-add', function() {
            var next_number = parseInt( $(this).attr( 'data-next-number' ) );
            var data_prefix = $(this).attr( 'data-prefix' );
            var fields_data = $(this).attr( 'data-fields' );
            var fields = '';
            fields_data = JSON.parse( fields_data );


            // Remove input placeholder
            var metaboxes_data = $(this).closest('.sh-metaboxes-data').find('.sh-metaboxes-placeholder-input').remove();


            // Get fields
            $.each( fields_data, function( key, field ) {
                console.log( field );
                fields = fields + '\
                <div class="sh-metaboxes-repeater-field-item ' + field.class + '">\
                    <label>\
                        ' + field.title + '\
                        <input name="' + data_prefix + '['+next_number+']['+ field.id +']" class="sh-metaboxes-field-repeater-field-input" value="" type="text">\
                    </label>\
                </div>';
            });


            // Show block
            $(this).parent().find( '.sh-metaboxes-field-repeater-content' ).append( '\
            <div class="sh-metaboxes-repeater-item">\
                <div class="sh-metaboxes-repeater-item-container open">\
                    <div class="sh-metaboxes-repeater-header">\
                        <div class="sh-metaboxes-repeater-header-title"></div>\
                        <div class="sh-metaboxes-repeater-header-controls">\
                            <span class="sh-metaboxes-field-repeater-delete">\
                                <i class="dashicons dashicons-dismiss"></i>\
                            </span>\
                        </div>\
                    </div>\
                    <div class="sh-metaboxes-repeater-item-content">'+ fields +'</div>\
                </div>\
            </div>' );
            $(this).parent().find( '.sh-metaboxes-field-multi_text-content .sh-metaboxes-field-multi_text-item:last-child input' ).focus();
            $(this).attr( 'data-next-number', ( next_number + 1 ) );
            $(this).parent().find( '.sh-metaboxes-repeater-item:last-child .sh-metaboxes-repeater-header' ).trigger( 'click' ).trigger( 'click' );
        });




        /*
        ** Metaboxes Field - Icon
        */
        $('body').on( 'click', '.sh-metaboxes-repeater-header, .sh-mega-menu-icon-trigger', function() {
            var self = $(this).parent();
            if( $(this).parent().find('.sh-metaboxes-field-icon').length ) {

                var container = $(this).parent().find('.sh-metaboxes-field-icon');
                container.find('> div ').remove();
                container.append( '<div class="sh-metaboxes-field-icon-content"><div class="sh-metaboxes-field-icon-categories"></div><div class="sh-metaboxes-field-icon-categories"><select></select></div><div class="sh-metaboxes-field-icon-list"></div></div>' );
                var content = container.find('.sh-metaboxes-field-icon-content');
                var input = container.find('input').val();


                // Current Icon Pack
                var current_pack = 'Simple Line';
                if( input ) {
                    if( input.substring( 0, 3 ) == 'fa ' ) {
                        current_pack = 'Font Awesome';
                    } else if( input.substring( 0, 3 ) == 'ti-' ) {
                        current_pack = 'Themify Icons';
                    } else if( input.substring( 0, 3 ) == 'pe-' ) {
                        current_pack = 'Pixeden Icons';
                    }
                }


                // Add icon packs to dropdown
                $.each( icons, function( index, value ) {
                    if( index == current_pack ) {
                        self.find('select').append( '<option value="' + index + '" selected>' + index + '</i>' );
                    }  else {
                        self.find('select').append( '<option value="' + index + '">' + index + '</i>' );
                    }
                });


                // Add icons
                $.each( icons[current_pack], function( index, value ) {
                    if( value == input ) {
                        self.find('.sh-metaboxes-field-icon-list').append( '<i class="' + value + ' active"></i>' );
                    } else {
                        self.find('.sh-metaboxes-field-icon-list').append( '<i class="' + value + '"></i>' );
                    }
                });
            }
        });


        // Metaboxes Field - Select Icon Pack
        $('body').on( 'click', '.sh-metaboxes-field-icon-list i', function() {
            $(this).parent().find( 'i.active' ).removeClass( 'active' );
            $(this).closest( '.sh-metaboxes-field-icon' ).find('input').val( $(this).attr('class') );
            $(this).addClass( 'active' );
        });


        // Metaboxes Field - Add Icons
        $('body').on( 'change', '.sh-metaboxes-field-icon select', function() {
            var self = $(this).closest( '.sh-metaboxes-field-icon' );
            var input = self.find('input').val();
            var current = $(this).find( 'option:selected' ).text();
            self.find('.sh-metaboxes-field-icon-list').html( '' );
            $.each( icons[current], function( index, value ) {
                if( value == input ) {
                    self.find('.sh-metaboxes-field-icon-list').append( '<i class="' + value + ' active"></i>' );
                } else {
                    self.find('.sh-metaboxes-field-icon-list').append( '<i class="' + value + '"></i>' );
                }
            });
        });
    }


    /*
    ** Metaboxes Field - Color
    */
    $('.sh-metaboxes-field-color input').wpColorPicker();
});




/* Page Loaded */
window.addEventListener( 'load', function() {
    jQuery( function($) {

        /*
        ** Metaboxes - Post Formats
        */
        if( $('body.block-editor-page').length ) {
            var post_format = $('.editor-post-format .editor-post-format__content select option:selected').val();
            $('.sh-metaboxes-post-format-'+post_format).css('display', 'flex');

            $('body').on( 'change', '.editor-post-format .editor-post-format__content select', function() {
                var post_format_change = $(this).find('option:selected').val();
                $('.sh-metaboxes-post-format').hide();
                $('.sh-metaboxes-post-format-'+ post_format_change ).css('display', 'flex');
            });
        } else {
            var post_format = $('input[name=post_format]:checked', '#post-formats-select').val();
            $('.sh-metaboxes-post-format-'+post_format).css('display', 'flex');

            $('input[name=post_format]').on( 'change', function() {
                var post_format_change = $(this).val();
                $('.sh-metaboxes-post-format').hide();
                $('.sh-metaboxes-post-format-'+ post_format_change ).css('display', 'flex');
            });
        }



        /*
        ** Redux - Custom Social Media - Icon picker
        */
        $('fieldset#jevelin_options-social_custom ul#social_custom-ul > li:nth-child(1)').each( function() {
            $(this).html( '<div class="sh-mega-menu-icon-trigger"></div><div class="sh-metaboxes-field-icon">' + $(this).html() + '</div>' );
            $(this).find('.sh-mega-menu-icon-trigger').trigger( 'click' );
        });
    });
});
