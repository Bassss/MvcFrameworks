<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MVC dinges</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{ stylesheet_link("css/style.css") }}

</head>
<body>
<div class="container">
    {{ content() }}
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<footer>
    <?php echo $this->tag->linkTo(["index", "Index"]); ?>
    |
    <?php echo $this->tag->linkTo(["cards", "Cards"]); ?>
    |
    <?php echo $this->tag->linkTo(["user", "User"]); ?>
    <p>
        <?php
            if ($this->session->has("username"))
        {
            $name = $this->session->get("username");
            $rank = $this->session->get("rank");
            echo "Hello $name,";
            echo "  you are logged in as $rank";
        }
        ?>
    </p>

    <p>
        <?php
        if ($this->session->has("username"))
        { ?>
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        <?php
            echo $this->tag->linkTo(["login/logout", "Logout"]);
        ?> | <?php

        } else {
            echo $this->tag->linkTo(["login", "Login"]);
        }
        ?>
    </p>
</footer>
</body>
</html>