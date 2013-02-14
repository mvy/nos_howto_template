<?php

namespace Howto\Templates\Basic;

class View_Lang extends \ViewModel {

    protected $_view = 'hwoto_template::widget/lang';

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
