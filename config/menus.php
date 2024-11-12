<?php

if (!defined('ABSPATH')) {
  exit();
}

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [
  'wp_kirk_slug_menu' => [
    "page_title" => "WP Kirk Cron",
    "menu_title" => "WP Kirk Cron",
    'capability' => 'read',
    'icon' => 'wpbones-logo-menu.png',
    'items' => [
      [
        "page_title" => "Cron Example",
        "menu_title" => "Cron Example",
        'capability' => 'read',
        'route' => [
          'get' => 'Examples\CronController@index'
        ],
      ],
    ]
  ]
];
