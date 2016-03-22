<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Blackbook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <?php View::inject('front.' . $version . '.navbar') ?>
    </div>
</nav>
<div class="container">
    <?php View::inject('front.' . $version . '.content', ['people' => $people]) ?>
</div>
<!-- Scripts -->
<script src="js/app.js"></script>
</body>
</html>
