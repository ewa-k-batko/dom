<?php
if ($this instanceof Manager_Controller) {
    $this->config('common/config/ajax');
    
    
    $event = new Manager_Event();
    $event->setName('ajax')->setClass('Projection_Module_Svg');
    $this->add($event);  
    
    
} else {
    throw new Manager_Config_Exception('błąd konfiguracji dla strony głównej');
}