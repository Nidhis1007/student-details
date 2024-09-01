console.clear();

$(document).ready(function() {
    $('#login').on('click', function() {
        var $parent = $(this).parent().parent();
        if (!$parent.hasClass('slide-up')) {
            $parent.addClass('slide-up');
        } else {
            $('#signup').parent().addClass('slide-up');
            $parent.removeClass('slide-up');
        }
    });

    $('#signup').on('click', function() {
        var $parent = $(this).parent();
        if (!$parent.hasClass('slide-up')) {
            $parent.addClass('slide-up');
        } else {
            $('#login').parent().parent().addClass('slide-up');
            $parent.removeClass('slide-up');
        }
    });
});