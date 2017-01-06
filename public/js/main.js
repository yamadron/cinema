$(document).ready(function () {


    $('.delete-btn').on('click', function (e) {
        e.preventDefault();

        var className = $(this).parent().prop('className');

        $('#submit-btn').click(function () {
            $("." + className).submit();
        });
    });


});