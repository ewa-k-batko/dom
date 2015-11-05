<?php
if ($this instanceof Manager_Controller) {
    $_SERVER['APPLICATION_ENV'] = 'production';
    $this->layout = 'common/view/layout-ajax.phtml';
    self::$orderEvent = array('ajax');     
} else {
    throw new Manager_Config_Exception('błąd konfiguracji dla podtawowych elementow strony');
}