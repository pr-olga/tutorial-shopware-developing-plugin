<?php return [
  'db' => [
    'host' => '127.0.0.1',
    'port' => '3306',
    'username' => 'bn_shopware',
    'password' => '195c470cf5',
    'dbname' => 'bitnami_shopware',
  ],

  'front' => [
    'throwExceptions' => true,
    'showException' => true
  ],

  'phpsettings' => [
      'display_errors' => 1
  ],

  'template' => [
      'forceCompile' => true
  ],

  'httpcache' => [
      'debug' => true
  ]

];