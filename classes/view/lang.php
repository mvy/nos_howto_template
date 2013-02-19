<?php
/**
* @copyright Yves `M'vy` Stadler (2013)
* @license MIT License 
* http://opensource.org/licenses/MIT
*
* Application to use with Novius-OS : https://github.com/novius-os/novius-os¬
* http://www.novius-os.org/¬
*/

namespace Howto\Templates\Basic;

class View_Lang extends \ViewModel {

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
