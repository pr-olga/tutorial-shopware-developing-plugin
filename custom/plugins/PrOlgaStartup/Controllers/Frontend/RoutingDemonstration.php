<?php

class Shopware_Controllers_Frontend_RoutingDemonstration extends Enlight_Controller_Action{

    // register a directory
    public function preDispatch () {

        if( $this->Request()->getActionName() === 'index' &&  !$this->get('session')->get('sUserId')){

        //redirect: either url or array with parameters

        $this->redirect([
        'controller' => 'account',
        'action' => 'login',
        'sTarget' => 'RoutingDemonstration',
        'sTargetAction' => 'index'
        ]);

        }

    }


    // set url frontend/routingDemonstration

    public function indexAction() {
        // link to other action
        $this->view->assign('nextAction', 'foo');
    }


    public function fooAction() {
        // link to other action
        $this->view->assign('nextAction', 'index');
    }

    //get called after each action
    public function postDispatch() {
        // actions name
        $currentAction = $this->Request()->getActionName();

        // assign view a variable with a cetain value
        $this->view->assign('currentAction', $currentAction);
    }


}