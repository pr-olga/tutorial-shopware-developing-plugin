<?php

namespace PrOlgaStartup;

use Shopware\Components\Plugin;

class PrOlgaStartup extends Plugin{

    public static function getSubscribedEvents(){

        return [
            'Enlight_Controller_Action_PreDispatch_Frontend_RoutingDemonstration' => 'onPreDispatch',
        ];
    }

    public function onPreDispatch(\Enlight_Event_EventArgs $args){
        $subject = $args->getSubject();
        $subject->View()->addTemplateDir(__DIR__ . '/Resources/views');
    }
}
