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
