<?php

Kirby::plugin('transart23/t23-blocks', [
  // 'blueprints' => [
  //   'blocks/t22_3colsList' => __DIR__ . '/blueprints/blocks/t22_3colsList.yml'
  // ],
  'snippets' => [
    // 'blocks/threeColsList'    => __DIR__ . '/snippets/blocks/threeColsList.php',
    'blocks/multicolumns'       => __DIR__ . '/snippets/blocks/multicolumns.php',
    'blocks/textImgCta'         => __DIR__ . '/snippets/blocks/textImgCta.php',
    'blocks/buttonBling'        => __DIR__ . '/snippets/blocks/buttonBling.php',
    'blocks/accordion'          => __DIR__ . '/snippets/blocks/accordion.php',
    'blocks/tr_space'              => __DIR__ . '/snippets/blocks/tr_space.php',
    'blocks/tr_slider'             => __DIR__ . '/snippets/blocks/tr_slider.pp',
  ]
]);
