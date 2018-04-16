<?php
use App\Config;
use App\AppController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <title><?= Config::getSettings('SITE_NAME') ?></title>

    <base href="<?= BASE ?>"/>

</head>
<body>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= BASE ?>"><?=Config::getSettings('SITE_NAME')?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if( AppController::getRouter()->getController() == 'pages' ) {?>class="active"<?php } ?>><a href="pages/">Pages</a></li>
                <li <?php if( AppController::getRouter()->getController() == 'contacts' ) {?>class="active"<?php } ?>><a href="contacts/">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>



<div class="container" style="padding-top: 50px">

    <div class="starter-template">
        <?= $data['content'] ?>
    </div>

</div>


</body>
</html>