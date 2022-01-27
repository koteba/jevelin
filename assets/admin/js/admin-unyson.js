jQuery( document ).ready(function( $ ) {

    $(window).on( 'click', function() {
        $('body').removeClass( 'sh-adminbody-loading' );
    });

    if ( $.cookie( "sh-theme-options" ) ) {
        //console.log( $.cookie( "sh-theme-options" ) );
        if( $(".nav-tab[href='"+ $.cookie( "sh-theme-options" ) +"']").length ) {
            $(".nav-tab[href='"+ $.cookie( "sh-theme-options" ) +"']")[0].click();
            setTimeout(function() {
                window.scrollTo(0, 0);
            }, 1);
        } else {
            $.cookie( "sh-theme-options", '' );
        }
    }

    $(".nav-tab.fw-wp-link").on( "click", function() {
        $.cookie( "sh-theme-options", $(this).attr("href") );
    });


    /*
    ** Import Theme Settings
    */
    $('#wpbody').on( 'click', '.sh-theme-settings-import-submit', function() {
        /* Stop and focus on textarea if blank value */
        if( !$('.sh-theme-settings-import-textarea').val() ) {
            $('.sh-theme-settings-import-textarea').focus();
            return false;
        }


        /* Ask if user wants to start importing */
        if( confirm( 'Your current options will be replaced with the values of this import. Would you like to proceed?' ) ) {

            $('.fw-modal.fw-sole-modal').remove();
            $('body').append('<div class="fw-modal fw-sole-modal fw-modal-open" style="display: none;">    <div class="media-modal wp-core-ui" style="width: 350px; height: 200px;">        <div class="media-modal-content" style="min-height: 200px;">            <button type="button" class="button-link media-modal-close" style="display: none;"><span class="media-modal-icon"></span></button>            <table width="100%" height="100%"><tbody><tr>                <td valign="middle" class="fw-sole-modal-content fw-text-center"><h2 class="fw-text-muted"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAAAAACo4kLRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAnRSTlMA/1uRIrUAAAACYktHRADdUu+NWwAAAAd0SU1FB+EKCgYABDchIukAAACZelRYdFJhdyBwcm9maWxlIHR5cGUgZ2lmOnhtcCBkYXRheG1wAAAImU2NMQ5CMQxD957iHyGNnaTlNkVtEQMSAwPHJx8WHMleXuxyu+/L+/E85niNzHJ85b1gRwvx6vCrWxCGBkdNF1WVaD5DODkx2H0Fgkmv5I2dxFQ9mRKiy3seMdBZCZ4lnUqjQYj/GRW3LPm95w42VvkACzYml9QYNjwAAACjSURBVBjTfZChDoNAEETfbZpgVqJPXHIO0w+hCZYPxJKUD6mpIzmBPrmmigoQcCSM2eRlszM7buWqxzbSd8Y0NgEAtwJ5WvYd39Y7TKOB7xkW0C6AQB4N6KuqB2zMIDDZ0cQmENJ2b8i/AYAl4db3pwj0fAlzmXJGsBIagl4/kitShFjCiNCUsEEI/sx8QKA9WWkLAnV3oNrVN9VtJZtyKrnUH9vgMmhlXVedAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE3LTEwLTEwVDA2OjAwOjA0LTA3OjAw4kWx4AAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNy0xMC0xMFQwNjowMDowNC0wNzowMJMYCVwAAAAASUVORK5CYII=" alt="Loading" class="wp-spinner"> Importing</h2><p class="fw-text-muted"><em>We are currently importing your theme settings.<br>This may take a few moments.</em></p></td>            </tr></tbody><tbody></tbody></table>        </div>    </div>    <div class="media-modal-backdrop"></div></div>');
            $('.fw-modal.fw-sole-modal').css('display', 'block').addClass( 'fw-modal-opening' );

            $admin_url = $(this).attr( 'data-url' );
            $new_settings = $('.sh-theme-settings-import-textarea').val();

            $.ajax({
                type: "POST",
                url: $admin_url+"admin-ajax.php",
                data : {
                    action : 'import_unyson_theme_settings',
                    settings : $new_settings
                },
                success: function( response ) {
                    location.reload();
                }
            });

        }
    });

});
