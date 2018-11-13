# Udemy-Tutorial: Shopware Template Training Basics

In this repository, the Shopware Udemy tutorial __Shopware Template Training Basics__ (url: https://www.udemy.com/shopware-template-training-basic/) is documented. The commits are ordered according to the ordering of topics covered in the tutorial. The README.md contains instructions and the most important issues and tricks discussed in the videos.

Related GiHub Project is https://github.com/pr-olga/tutorial-shopware-template-advanced  __Shopware Template Training Advanced__ (url: https://www.udemy.com/shopware-template-training-advanced/).

## _Bitnami Installation_

## Development Environment: PHPStorm

### Configuration
- Install Shopware Plugin in PHPStorm
- Uncheck Caching: Cache -> Development Mode
- Uncheck Caching: Cache -> Settings -> HTTP Cache -> Activate HTTP cache
- Uncheck Caching: Theme Manager -> Settings -> Disable compiler caching
- Uncheck Caching: Theme Manager -> Settings -> Create a CSS source map


### Shortcuts
- Ctrl + Alt + S: settings
- Shift + Shift: Plugins -> Browse -> Shopware
- PHPStorm: Ctrl + Shift + N open the file
- Ctrl + N search for the class
- Ctrl + G

## Config.php
- main settings incl. the database

## File-Struktur
- custom: all plugins
- engine: is the core of the software
- media: containes the downloaded data
- themes: themes, (!) always create a custom theme
   - Backend
   - Frontend: Templates der Storefront
      - Bare: Basis Theme, HTML: index -> index.tpl (Basic structure)
      - Bare: home -> index.tpl (Startpage)
      - Responsive: LESS, CSS und JS
- var und web: contain cache and logs

_Quiz_:
1. HTML Templates, die vom Server nicht gecached werden sollen? themes/Frontend/Bare/widgets
2. Welche Datei muss mindestens in einem Shopware Theme vorhanden sein?
Theme.php

## Theme Manager
- do not copy and modify existing themes, create own Theme
- create own theme: Theme Manager -> Create theme:
    - Extension of Responsive
- Inheritance in Theme: Bare -> Responsive -> Custom Theme
- Derivation from Responsive or from Bare
- changes in Responsive, Bare themes are prohibited
- `{extends file='parent:frontend/index/index.tpl'}`: extends the file in the custom theme
- __Blocks__:
       ```html
       {block name="frontend_index_logo"}
            <div class="logo">
                <h1>{$sShopname}</h1>
            </div>
        {/block}
        ```
- it will appeare at the place where the block is defined in Bare Theme

## LESS
- mobile first, no Bootstrap etc.

```less
@phoneLandscapeViewportWidth: 30em;     // 480px
@tabletViewportWidth: 48em;             // 768px
@tabletLandscapeViewportWidth: 64em;    // 1024px
@desktopViewportWidth: 78.75em;         // 1260px
```

- `.unitize()` mixin: translation of px into rem
- parent/child-Relationship: --
- modifier: `&.is--small`
- nesting till __three__ layers
- native UI Components von Shopware: https://developers.shopware.com/styletile/
- Guidelines: https://developers.shopware.com/blog/2016/08/26/css-coding-guidelines/

- images are included in srcset

## Smarty
- available variables: `{debug}`
- smarty modifiers: `{$sCategories | print_r}`
- smarty can have loops, conditionals `{foreach $sCategories as $sCategory}`
- `append / prepend` cause problem with Plugins

- shyim profiler: https://github.com/FriendsOfShopware/FroshProfiler
- shyim profiler must be used in developemnt versions only

- if you modify existing blocks or create your own blocks, you can inherit existing elements from parent `{$smarty.block.parent}`

### Listing
- add custom template in backend: i.e. `custom_listing.tpl:My Custom Listing;`
- this template can be assigned to a certain categorie
- depending on an value of `{$productBoxLayout = "value"}`, it creates a class `box-value`