# How-to build a NOS template

## Start

The first step is to create the repository where we are gonna put our code. It
will be placed in our Novius-OS (NOS) directory, in `local/application`. Let's
create the `howto_template` repository. 

## Create the application configuration

First of all, it's mandatory to make NOS know about our new application. This
can be done by adding the file called `config/metadata.config.php` in our
application directory. 

It contains some php, so don't forget the script opening tag here. We will then
have to customise the returned value (an array describing the application).
Please notice the following important fields: `name` is the name of your
application which will appear in the application mangager. `namespace` will be
used in subsequent pages of the template.  `template` describes the template we
are going to build. 

We define only one template, identified by the `howto_first` key. This key name
does not matter. The `file` key points toward the main view of our template. We
chose `howto_template::main`. The `title` provide an name which will be displayed
in the page template selection box on the admin page. Leave alone `cols` and
`rows` and the `layout` property, we won't change this.

    <?php
    return array(
        'name'    => 'How-To template appllication',
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

## The main page

So we define the application metadata, we can now install it in the application
manager. This will allow for choosing the template in the page edition module. 
However, a page with our template cannot be rendered on site (front end). We
need to define the underlying HTML/CSS code. If you try to visualise the page,
you will get the `The template howto_template::main cannot be found.` error.

The metadata points toward `howto_template::main`, so let create it. Open
`views/main.view.php`. Let's put some basic stuff in it.

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
        <div id="sitebox">
            <div id="pagecontent">
            <h1 class="title noverticalmargin"><?= $title ?></h1>

            <?= $wysiwyg['content'] ?>
            </div>
        </div>
    </body>
    </html>

This should be able to display the content stored in your page. To edit it,
simply use the WYSIWYG editor.

## Getting deeper


vim:ft=markdown spl=en spell: 
