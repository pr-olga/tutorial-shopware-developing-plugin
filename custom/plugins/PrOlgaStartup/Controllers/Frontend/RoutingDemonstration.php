<?php

class Shopware_Controllers_Frontend_RoutingDemonstration extends Enlight_Controller_Action{

    // register a directory
    public function preDispatch () {

        $this -> view -> addTemplateDir(__DIR__ . '/../../Resources/views');

    }


    // set url frontend/routingDemonstration

    public function indexAction () {


    }

}