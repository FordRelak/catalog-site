<!doctype html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
    <link rel="stylesheet" href="<? echo substr(__DIR__, 0, strrpos(__DIR__, '/app')) ?>/app/static/css/main.css" type="text/css">
    <title>Catalog-site
        <?php if (isset($title) and !empty($title)) {
            echo ' | ' . $title;
        } ?>
    </title>
</head>
<body>

<a href="/"><img src="<? echo substr(__DIR__, 0, strrpos(__DIR__, '/app'))?>/app/static/img/home.svg" alt="Home"></a>
<?php echo $content['index'];?>

</body>
</html>