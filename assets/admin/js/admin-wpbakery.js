jQuery(document).ready(function($){

    /* WPbakery Custom Element Tabs */
    $("body").on( "click", ".wpbakery-element-minitabs > div", function() {
        $(this).closest(".vc_edit-form-tab").find(".wpbakery-element-tab").addClass( "wpbakery-element-tab-hidden" );
        $(this).closest(".vc_edit-form-tab").find(".wpbakery-element-tab-" + $(this).attr( "data-id" ) ).removeClass( "wpbakery-element-tab-hidden" );

        $(this).parent().find("div").removeClass( "active" );
        $(this).addClass( "active" );
    });


    /* Templates */
    $(".sh-categories-container li").on("click", function() {
        $(".sh-categories-container li").removeClass("active");
        $(this).addClass("active");

        if( $(this).attr("data-sort") == "all" ) {
            $(".sh-templates-container .sh-template").css("display", "block");
        } else {
            $(".sh-templates-container .sh-template").css("display", "none");
            $(".sh-templates-container").find( ".sh-template." + $(this).attr("data-sort") ).css("display", "block");
        }
    });

    $(".sh-template-add").on( "click", function() {
        $(this).closest(".sh-template-container").find(".sh-template-loading").addClass( "active" );
    });

    $(window).load(function() {
        $(".vc_templates-panel").bind("DOMSubtreeModified", function(e) {
            $(".vc_templates-panel .sh-template-loading.active").removeClass("active");
            $("#vc_templates_name_filter").focus();
        });
    });

});
