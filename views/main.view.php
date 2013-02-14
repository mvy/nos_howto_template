<!DOCTYPE html>
<html> 
<head>
    <!-- META -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSS -->
    <link rel="shortcut icon" href="static/favicon.ico" />
</head>

<body>
    <?=\View::forge('howto_template::subviews/header'); ?>
    <div id="pagecontent">
    <h1 class="title noverticalmargin"><?= $title ?></h1>

    <?= $wysiwyg['content'] ?>
    </div>
</body>
</html>
