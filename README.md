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

### Subviews

The main view is defined, here we can put all the static HTML/CSS code we want.
It is possible to include subviews. To do this, we use the
`\View::forge('howto_template::subwiews/header');` php line. This function comes
from the FuelPHP framework. You can search the documentation for more details
(like passing parameters). 

Our header is simple enough not to require this. We add the header code in
`views/subviews/header.view.php` : 

    <div id="headline" >
        <div id="logo">
            <a href="/">
                <img src="static/apps/howto_template/img/howto.png">
            </a>
        </div>
    </div>

Do not forget to put your `howto.png` in `static/img/` and update the
application via the manager if you created the `static` directory after
installing the application. This will trigger the creation of a symbolic link
between `static/apps/howto_template/` and
`local/applications/howto_template/static`. 

Remember that, to fit with the Model View Controller pattern, the view should
only work with pure data. Avoid putting function unrelated to any kind of data
formatting like database call, content parsing and so on. If you need more, you
should look for a View Model.

## View Models

View models will help us develop more dynamic content. In this section, we will
try to generate some HTML code allowing the user to switch between page contexts
(languages) when they are available. A full example can be found in one of my
git repository.

As we need to look into the database for context availability, we won't call the
view right away. Instead, we call a view model. 

    <?=\ViewModel::forge('HowTo\Templates\Basic\View_Lang'); ?>

This instruction will look for a class located at `classes/view/lang.php` name
`View_Lang`. This class must extend `\ViewModel`, set the view to be called by
defining `protected $_view = 'howto_template::widget/lang';` and implement a
`public function view()`. 

This is the basic setup : 

    <?php

    namespace HowTo\Templates\Basic;

    class View_Lang extends \ViewModel {

        protected $_view = 'howto_template::widget/lang';

        public function view() {
        }
    }

We can add some code in function now. To do what we need, we first call upon the
main controller which can give us the current page and look for other context.
We then extract the URL and context name from the returned array and we return a
list of `(lang, url)` couples.

In the view function, all affectations like `$this->name = something` will
create a `$name` variable filled with `something` content in the view.

    <?php

    namespace HowTo\Templates\Basic;

        protected $_view = 'howto_template::widget/lang';

        protected function find_langs() {
            $pages = \Nos\Nos::main_controller()->getPage()->find_context('all');

            $result = array();

            /* URL extraction */
            if(count($pages)) {
                foreach($pages as $page) {
                    $new = array(
                            'lang' => $page['page_context'],
                            'url' => $page->url(),
                            );

                    array_push($result, $new);
                }
            }
            return $result;
        }

        public function view() {
            $this->list = $this->find_langs();
        }
    }

The view is the file we set up in `$_view`, i.e. `views/widget/lang.view.php`.
Here is an example of the view : 

    <div id="lang_widget">
    <? if(count($list)) { ?>
        <ul>
        <? foreach($list as $element) { ?> 
            <li><a href="<?= $element['url'] ?>">
            <?= $element['lang'] ?>
            </a></li>
        <? }
    } ?>
    </ul>
    </div>

##### vim specific
vim:ft=markdown spl=en spell: 
