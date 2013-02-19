<?php
/**
* @copyright Yves `M'vy` Stadler (2013)
* @license MIT License 
* http://opensource.org/licenses/MIT
*
* Application to use with Novius-OS : https://github.com/novius-os/novius-os¬
* http://www.novius-os.org/¬
*/
?>
<div id="lang_widget">
<? if(count($list)) { ?>
    <ul>
    <?  foreach($list as $element) { ?> 
        <li><a href="<?= $element['url'] ?>">
        <?= $element['lang'] ?>" 
        </a></li>
    <? }
} ?>
</ul>
</div>
