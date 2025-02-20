<?php

Kirby::plugin('your/plugin', [
  'tags' => [
    'small' => [
      'html' => function ($tag) {
        return '<span class="font-s">'. $tag->value .'</span>';
      }
    ],
    'tiny' => [
      'html' => function ($tag) {
        return '<span class="font-xxs">'. $tag->value .'</span>';
      }
    ],
    'shwa' => [
      'html' => function ($tag) {
        return '<span class="shwa">e</span>';
      }
    ],
  ]
]);

