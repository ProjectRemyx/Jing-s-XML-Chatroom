$(document).ready(function(){
    $(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'chatroom.php',
                data: $('form').serialize(),
                success: function () {
                    $('#message').val('');
                }
            });
        });
    });
});


