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
                    $("#chats").animate({
                        scrollTop: $('#chats')[0].scrollHeight - $('#chats')[0].clientHeight
                      }, 100);                
                }
            });
        });
    });
});


