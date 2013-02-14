<?php
/**
 * @copyright  Yves `M'vy` Stadler
 * @license    GNU Affero General Public License v3 or (at your option) any
 *             later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://os.yves-stadler.fr/
 * 
 * For use with Novius-OS : https://github.com/novius-os/novius-os
 * http://www.novius-os.org/
 */

/* The widget
 * You must ensure that you copy the flag directory of novius :
 novius-os/static/admin/novius-os/img/flags/ to your application/template static
 directory 
 */
?>
<div id="lang_widget">
<?
/* Call the function */
if(count($list)) { ?>
    <ul>
    <? /* For each link, we display a flag based on the lang */
    foreach($list as $element) { ?> 
        <li><a href="<?= $element['url'] ?>">
        <img src="static/apps/ul_template/img/flags/<?=
            strtolower(substr($element['lang'], -2)) .  '.png' ?>" />
        </a></li>
    <? }
} ?>
</ul>
</div>
