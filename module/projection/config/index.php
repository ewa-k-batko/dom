<?php

if ($this instanceof Manager_Controller) {
    $this->config('common/config/basic');
    $this->storage->scripts->setCss('/css/projection.css');
    $this->storage->pageId = 'projection-page';
    $this->storage->metatags->setTitle('Rzuty projektu adaptacji - ');
    $this->storage->metatags->setDescription('rzuty w svg');
    $this->storage->metatags->setKeywords('projekt');
    $link = new Model_Link_Container();
    $link->setTitle('Rzuty projektu remontu i adapcji domu')->setRoot();
    $this->storage->breadcrumbs->set(0, $link);
    
    
    $event = new Manager_Event();
    $event->setName('fluid')->setClass('Projection_Module_Image');
    $this->add($event);
    
    
    /* nawigacja */
    
    $url = '/rzut,k,';

    $nav = new Model_Collection();

    $link = new Model_Link_Container();
    $link->setId(1)->setUrl($url . 'parter-inwent')->setTitle('Parter')->setClass('parter-inwent')
            ->setAjax(array('url'=>'/ajaxsvg,s,parter-inwent', 'box' => 'svg-screen'));
    $nav->append($link);

    $link = new Model_Link_Container();
    $link->setId(2)->setUrl($url . 'poddasze-inwent')->setTitle('Strych')->setClass('poddasze-inwent')
            ->setAjax(array('url'=>'/ajaxsvg,s,poddasze-inwent', 'box' => 'svg-screen'));
    $nav->append($link);

    $link = new Model_Link_Container();
    $link->setId(3)->setUrl($url . 'piwnica')->setTitle('Piwnica')->setClass('piwnica')
            ->setAjax(array('url'=>'/ajaxsvg,s,piwnica', 'box' => 'svg-screen'));
    $nav->append($link); 

    $link = new Model_Link_Container();
    $link->setId(4)->setUrl($url . 'polnoc-inwent' )->setTitle('Północ')->setClass('polnoc-inwent')
            ->setAjax(array('url'=>'/ajaxsvg,s,polnoc-inwent', 'box' => 'svg-screen'));
    $nav->append($link);
    
    $link = new Model_Link_Container();
    $link->setId(5)->setUrl($url . 'poludnie-inwent' )->setTitle('Południe')->setClass('poludnie-inwent')
            ->setAjax(array('url'=>'/ajaxsvg,s,poludnie-inwent', 'box' => 'svg-screen'));
    $nav->append($link);
    
    $link = new Model_Link_Container();
    $link->setId(6)->setUrl($url . 'wschod-inwent' )->setTitle('Wschód')->setClass('wschod-inwent')
            ->setAjax(array('url'=>'/ajaxsvg,s,wschod-inwent', 'box' => 'svg-screen'));
    $nav->append($link);
    
     $link = new Model_Link_Container();
    $link->setId(7)->setUrl($url . 'zachod-inwent')->setTitle('Zachód')->setClass('zachod-inwent')
            ->setAjax(array('url'=>'/ajaxsvg,s,zachod-inwent', 'box' => 'svg-screen'));
    $nav->append($link);
    
    
    $link = new Model_Link_Container();
    $link->setId(8)->setUrl($url . 'parter-nowy')->setTitle('Parter projekt')->setClass('parter-proj')
             ->setAjax(array('url'=>'/ajaxsvg,s,parter-nowy', 'box' => 'svg-screen'));
    $nav->append($link);
    
    $link = new Model_Link_Container();
    $link->setId(9)->setUrl($url . 'poddasze-nowy')->setTitle('Strych projekt')->setClass('poddasze-proj')
             ->setAjax(array('url'=>'/ajaxsvg,s,poddasze-nowy', 'box' => 'svg-screen'));
    $nav->append($link);
    
    $link = new Model_Link_Container();
    $link->setId(10)->setUrl($url . 'polnoc-nowy')->setTitle('Północ projekt')->setClass('polnoc-proj')
             ->setAjax(array('url'=>'/ajaxsvg,s,polnoc-nowy', 'box' => 'svg-screen'));
    $nav->append($link);
    
    $link = new Model_Link_Container();
    $link->setId(11)->setUrl($url . 'poludnie-nowy')->setTitle('Południe projekt')->setClass('poludnie-proj')
             ->setAjax(array('url'=>'/ajaxsvg,s,poludnie-nowy', 'box' => 'svg-screen'));
    $nav->append($link);
    
    $link = new Model_Link_Container();
    $link->setId(12)->setUrl($url . 'wschod-nowy')->setTitle('Wschód projekt')->setClass('wschod-proj')
             ->setAjax(array('url'=>'/ajaxsvg,s,wschod-nowy', 'box' => 'svg-screen'));
    $nav->append($link);
    
    $link = new Model_Link_Container();
    $link->setId(13)->setUrl($url . 'zachod-nowy')->setTitle('Zachód projekt')->setClass('zachod-proj')
             ->setAjax(array('url'=>'/ajaxsvg,s,zachod-nowy', 'box' => 'svg-screen'));
    $nav->append($link);
    

    $this->storage->setParam('list-nav', $nav);
    
    
    
} else {
    throw new Manager_Config_Exception('błąd konfiguracji dla strony głównej');
}