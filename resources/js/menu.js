$(document).ready(function() {
    $('#kt_header_user_menu_toggle .cursor-pointer').on('click', function(e) {
        e.preventDefault();
        const $submenu = $(this).siblings('.menu-sub'); 
        $submenu.toggle();
        $('.menu-sub').not($submenu).hide();
    });
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#kt_header_user_menu_toggle').length) {
            $('.menu-sub').hide();
        }
    });
});
