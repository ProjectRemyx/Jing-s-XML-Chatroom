<header>
    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo"><img src="img/trident_logo.png"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php
            session_start();
            if(isset($_SESSION['user']))
            {
                echo "<li class='brand-logo center'>" . "Welcome, " . $_SESSION['user'] . "</li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
            else
            {
                echo "<li><a href='index.php'>Login</a></li>";
            }
            ?>
            </ul>
        </div>
    </nav>
</header>