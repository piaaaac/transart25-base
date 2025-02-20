<?php

Kirby::plugin('transart23/t23-blocks', [
  // 'blueprints' => [
  //   'blocks/t22_3colsList' => __DIR__ . '/blueprints/blocks/t22_3colsList.yml'
  // ],
  'snippets' => [
    // 'blocks/t22_threeColsList'    => __DIR__ . '/snippets/blocks/t22_threeColsList.php',
    'blocks/t23_multicolumns'       => __DIR__ . '/snippets/blocks/t23_multicolumns.php',
    'blocks/t23_textImgCta'         => __DIR__ . '/snippets/blocks/t23_textImgCta.php',
    'blocks/t23_buttonBling'        => __DIR__ . '/snippets/blocks/t23_buttonBling.php',
    'blocks/t23_accordion'          => __DIR__ . '/snippets/blocks/t23_accordion.php',
    'blocks/t23_space'              => __DIR__ . '/snippets/blocks/t23_space.php',
    'blocks/t24_slider'             => __DIR__ . '/snippets/blocks/t24_slider.pp',
  ]
]);