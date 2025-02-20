<?php

return [

  // --------------------------------------------------------------
  // User defined
  // --------------------------------------------------------------

  "assets" => [
    "version" => "0.0.2",
  ],

  // --------------------------------------------------------------
  // Kirby
  // --------------------------------------------------------------

  'panel' => [
    'css' => 'assets/css/custom-panel.css',
  ],

  "languages" => true,

  "routes" => require_once 'routes.php',

  // "hooks" => require_once "hooks.php", // currently []

  "thumbs" => [
    "presets" => [
      "default" => ["width" => 1024, "quality" => 80],
    ],
  ],

  // --------------------------------------------------------------
  // vendor plugins
  // --------------------------------------------------------------

  "schnti.cookie.link" => "privacy",

  "pedroborges.meta-tags.default" => function ($page, $site) {

    // default
    $socialTitle = $site->title();
    $socialDesc = $site->description();

    $socialImgUrl = "";
    if ($site->socialImage()->isNotEmpty()) {
      $socialImgUrl = $site->socialImage()->toFile()->url();
    }

    return [
      'title'         => $site->title() . " | " . $page->title(),
      'meta' => [
        'description' => $socialDesc,
      ],
      'link' => [
        'canonical'   => $page->url()
      ],
      'og' => [
        'type'        => 'website',
        'title'       => $socialTitle,
        'site_name'   => $socialTitle,
        'image'       => $socialImgUrl,
        'url'         => $page->url(),
        'description' => $socialDesc,
      ],
      'twitter' => [
        'card' => 'summary_large_image', // summary - summary_large_image
        'site' => "",
        'title' => $socialTitle,
        'namespace:image' => $socialImgUrl,
      ],
    ];
  }

];
