<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Blackbook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Blackbook</a>
        <?php View::inject('front.' . $version . '.navbar') ?>
    </div>
</nav>
<div class="container">
    <?php View::inject('front.' . $version . '.content') ?>
</div>
</body>
</html>
