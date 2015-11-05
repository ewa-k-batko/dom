<?php

class Projection_Module_Svg extends Module_Abstract {

    function execute() {

        $path = 'projection/view/partial/svg/';

        $this->in['s'] = $this->request->get('s');

        switch ($this->in['s']) {
            case 'parter-inwent':
                $template = $path . 'parter-inwent.phtml';
                break;
            case 'poddasze-inwent':
                $template = $path . 'poddasze-inwent.phtml';
                break;
            case 'piwnica':
                $template = $path . 'piwnica.phtml';
                break;
            case 'polnoc-inwent':
                $template = $path . 'polnoc-inwent.phtml';
                break;
            case 'poludnie-inwent':
                $template = $path . 'poludnie-inwent.phtml';
                break;
            case 'zachod-inwent':
                $template = $path . 'zachod-inwent.phtml';
                break;
            case 'wschod-inwent':
                $template = $path . 'wschod-inwent.phtml';
                break;





            case 'poddasze-nowy':
                $template = $path . 'poddasze-new.phtml';
                break;
            case 'polnoc-nowy':
                $template = $path . 'polnoc-new.phtml';
                break;
            case 'poludnie-nowy':
                $template = $path . 'poludnie-new.phtml';
                break;
            case 'wschod-nowy':
                $template = $path . 'wschod-new.phtml';
                break;
            case 'zachod-nowy':
                $template = $path . 'zachod-new.phtml';
                break;

            case 'parter-nowy':
            default:
                $template = $path . 'parter-new.phtml';
                break;
        }

        $this->template = 'common/view/ajax.phtml';
        $this->out['ajax'] = array('html' => $this->getView()->getContent($template), 'res' => 1);
        parent::execute();
    }

}
