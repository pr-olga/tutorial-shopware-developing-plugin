# Tutorial: Shopware Developing Plugins

Commands
```
sw:plugin:list
sw:plugin:refresh
sw:plugin:uninstall
sw:plugin:install PrOlgaStartup --activate
```

## Plugin Configuration

plugin.xml
Resources/congig.xml

## First Controller

- engine/Shopware/Controllers/Frontend
- the file contains actions
- each action is a method that shows a page
- frontend/account/login : Module/Controller/Action

## Templates of plugin
- action waits for a template
- templates are in Resources/views
- preDispatch
- method will be executed bevore the action

## Variables, Links and Snippets

- each action needs ein template with the same name
`indexAction = index.tpl`
- smarty modifier in Shopware creates urls. One has to write a controller and action name

```
<a href="{url controller='RoutingDemonstration' action=$nextAction}">next page</a>
```

This command takes the code from the parent
```
{$smarty.block.parent}
```


__Snippets__

{s name="GoToNextPage"}next page{/s}

- snippets are placed in the ini-file
- namespace of the ini-file must be the same

## Widgets
- they must be always up-to-date
- the whole part can be cached
- example for a widget controller: `{action module='widgets' controller='listing' action='topSeller'}`


## Quiz 1

1. url frontend/session_info/user
2. info about userId

__Solution__

```php
<?php

class Shopware_Controllers_Frontend_SessionInfo extends Enlight_Controller_Action
{
    public function userAction () {

       $userId = $this->get('session')->get('sUserId');
       $this->view->assign('userId', $userId);
    }
}
```


## Events and Hooks

Event Categories

1. Global: during or after an event
    - Dispatcher
    - PostDispatchSecure
2. Application Events
3. Hooks

- Event action: separate method, it is possible to activate it for the whole plugin (post in root directory)
- if you post it in Test.php in the root directory, there is no need to register it in sevices.xml
- Depending on the event action, it will listen to the certain domains on the site
- e.g. `Enlight_Controller_Action_PreDispatch_Frontend` the callback will be executed on each site in Frontend
- e.g. `Enlight_Controller_Action_PreDispatch_Frontend_Detail` the callback will be executed on each _detail_-page in Frontend

## Quiz 2: PostDispatch Event Controller
s
```php
<?php

namespace EventPlugin;

use Shopware\Components\Plugin;
use Enlight_Controller_ActionEventArgs as ActionEventArgs;

class EventPlugin extends Plugin
{

  public static function getSubscribedEvents(){

        return [
            'Enlight_Controller_Action_PostDispatch_Frontend' => 'onPostDispatch'
        ];
    }

    public function onPostDispatch(\Enlight_Controller_ActionEventArgs $args){
        $subject = $args->getSubject();
        $subject->View()->addTemplateDir(__DIR__ . '/Resources/views');
    }

}
```

## Dependency Injection

- subscriber methods

## Attribute Service
- apply existend service

## Product Service
- write own service