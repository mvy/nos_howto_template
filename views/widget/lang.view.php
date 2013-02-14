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
