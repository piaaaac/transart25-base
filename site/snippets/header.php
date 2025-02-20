<?php
$invert = isset($invertedColors) && $invertedColors == true;
$opening = ($page->template()->name() === "home") ? "opening-home-videos" : "opening-page-default";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="content-language" content="en">
  <?php snippet("favicon") ?>

  <!-- style, js -->
  <?= css(['assets/css/bootstrap-custom.css?v=' . option('assets.version')]) ?>
  <?= css(['assets/fonts/fontello-da79c711/css/fontello.css']) ?>
  <?= css(['assets/css/index.css?v=' . option('assets.version')]) ?>
  <?= js(['assets/js/functions-polyfills.js?v=' . option('assets.version')]) ?>

  <!-- jQuery -->
  <script src="<?= $kirby->url('assets') ?>/lib/jquery-3.7.0.min.js"></script>

  <!-- keen slider -->
  <link rel="stylesheet" href="<?= $kirby->url('assets') ?>/lib/keen-slider/keen-slider.min.css" />
  <script type="text/javascript" src="<?= $kirby->url('assets') ?>/lib/keen-slider/keen-slider.js"></script>

  <!-- conditional -->
  <?php if ($page->template()->name() === "venues") : ?>
    <link rel="stylesheet" href="<?= $kirby->url('assets') ?>/lib/mapbox/mapbox-gl-js.v2.15.0.css" />
    <script type="text/javascript" src="<?= $kirby->url('assets') ?>/lib/mapbox/mapbox-gl-js.v2.15.0.js"></script>
  <?php endif ?>
  <?php if ($page->template()->name() === "home") : ?>
    <?= js(['assets/js/hp.js']) ?>
  <?php endif ?>

  <!-- Google tag (gtag.js) - Google Analytics - Transart via Lucia Rosa Buffa 4/7/23 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RJ6VRWE8ED"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-RJ6VRWE8ED');
    window.currentTemplate = '<?= $page->template() ?>';
  </script>
</head>

<body data-template="<?= $page->template() ?>" data-inverted-colors="<?= $invert ? "yes" : "no" ?>">
  <div id="body-background"></div>
  <main>
    <?php snippet("menu") ?>
    <?php snippet($opening); ?>
    <?php if ($page->intro()->isNotEmpty()): ?>
      <section class="page-intro">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 kt colored-bold pt-1 pb-3">
              <?= $page->intro()->kt() ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif ?>