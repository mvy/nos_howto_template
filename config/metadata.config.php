<?php
return array(
    'name'    => 'How To template application',
    'version' => '0.1',
    'provider' => array(
        'name' => 'Yves Stadler',
    ),
    'namespace' => 'HowTo\Templates\Basic',
    'launchers' => array(
    ),
    'enhancers' => array(
        ),
    'templates' => array(
        'howto_first' => array(
            'file' => 'howto_template::main',
            'title' => 'How-to template',
            'cols' => 1,
            'rows' => 1,
            'layout' => array(
                'content' => '0,0,1,1',
            ),
            'module' => '',
        ),
    ),
);
