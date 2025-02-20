<?php

return [

  // Custom
  "assets" => [
    "version" => "1.0.0",
  ],

  // Kirby
  // 'panel' => [
  //   'css' => 'assets/css/custom-panel.css',
  // ],
  "languages" => true,
  "routes" => require_once 'routes.php',
  "thumbs" => [
    "presets" => [
      "default" => ["width" => 1024, "quality" => 80],
    ],
  ],

  // Vendor plugins
  "schnti.cookie.link" => "privacy",
  'tobimori.seo.canonicalBase' => 'https://www.transart.it',
  'tobimori.seo.sitemap.active' => true,
  'tobimori.seo.robots' => [
    'active' => true,
    'content' => [
      'facebookexternalhit' => ['Disallow' => []],
      'Twitterbot' => ['Disallow' => []],
      'Googlebot' => ['Disallow' => ["/nogooglebot/"]],
    ],
  ],

];
