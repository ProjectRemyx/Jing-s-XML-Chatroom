<?php
include 'header.php';
?>

<body>
    <main>
        <div class="card">
            <div class="center-align">
                <img class="activator" src="img/Wave.png" id="card-graphic">
            </div>
            <div class="card-content center-align">
                <span class="card-title activator grey-text text-darken-4">See below for a list of available chatrooms!<i
                        class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Jing's Chatroom Rules:<i
                        class="material-icons right">close</i></span>
                <p>1. No profanity or inappropriate speach/behavior</p>
                <p>2. Have fun!</p>
            </div>
        </div>
        <?php
        include 'chatroomList.php';
        ?>
    </main>
</body>
<?php
include 'footer.php';
?>