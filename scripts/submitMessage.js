$(document).ready(function(){
    $(function () {
        $('#submitMessageForm').on('submit', function (e) {
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


