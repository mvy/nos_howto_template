<?php
/**
* @copyright Yves `M'vy` Stadler (2013)
* @license GNU Affero General Public License v3 or (at your option) any later
*   version http://www.gnu.org/licenses/agpl-3.0.html
* @link http://os.yves-stadler.fr/
*
* For use with Novius-OS : https://github.com/novius-os/novius-os¬
* http://www.novius-os.org/¬
*/?>
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

    <?=\ViewModel::forge('HowTo\Templates\Basic\View_Lang');?>
</body>
</html>
