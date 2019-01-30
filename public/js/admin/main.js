$(document).ready(function () {
    // Sublist Sidebar

    $("#txtEditor").Editor();
    $(".Editor-editor").keydown(function () {
        $("#txtEditorContent").val($("#txtEditor").Editor('getText'));
    });
    try {
        var arrow = $('.js-arrow');
        arrow.each(function () {
            var that = $(this);
            that.on('click', function (e) {
                e.preventDefault();
                that.find(".arrow").toggleClass("up");
                that.toggleClass("open");
                that.parent().find('.js-sub-list').slideToggle("250");
            });
        });

    } catch (error) {
        console.log(error);
    }

    // Dropdown
    try {
        var menu = $('.js-item-menu');
        var sub_menu_is_showed = -1;

        for (var i = 0; i < menu.length; i++) {
            $(menu[i]).on('click', function (e) {
                e.preventDefault();
                $('.js-right-sidebar').removeClass("show-sidebar");
                if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
                    $(this).toggleClass('show-dropdown');
                    sub_menu_is_showed = -1;
                }
                else {
                    for (var i = 0; i < menu.length; i++) {
                        $(menu[i]).removeClass("show-dropdown");
                    }
                    $(this).toggleClass('show-dropdown');
                    sub_menu_is_showed = jQuery.inArray(this, menu);
                }
            });
        }
        $(".js-item-menu, .js-dropdown").click(function (event) {
            event.stopPropagation();
        });

        $("body,html").on("click", function () {
            for (var i = 0; i < menu.length; i++) {
                menu[i].classList.remove("show-dropdown");
            }
            sub_menu_is_showed = -1;
        });

    } catch (error) {
        console.log(error);
    }

    $('.checkbox').on("change",function () {
        if ($('.div-hide-social').hasClass('hidden')){
            $('.div-hide-social').removeClass('hidden')
        }
        else $('.div-hide-social').addClass('hidden');
    });
    $('#role').on("change",function () {
        if($(this).val() == 1){
            $('.div-hide-role').removeClass('hidden')
        }
        else $('.div-hide-role').addClass('hidden')
    });




});