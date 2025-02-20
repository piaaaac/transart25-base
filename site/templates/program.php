<?php

use Kirby\Cms\Pages;

$view     = param('view', 'grid');
$category = param('category', '');
$tag      = param('tag', '');

$events = $page->children()->listed()->filterBy("archived", false);
if ($category != "") {
  $events = $events->filterBy("category", $category);
}
$tagsForButtons = [];
foreach ($events as $event) {
  foreach ($event->eventTags()->split() as $t) {
    if (!in_array($t, $tagsForButtons)) {
      $tagsForButtons[] = $t;
    }
  }
}

if ($tag != "") {
  $events = $events->filterBy('eventTags', $tag, ',');
}

$eventsPast = new Pages();
$eventsFuture = new Pages();
foreach ($events as $event) {
  if ($event->isPast()) {
    $eventsPast->add($event);
  } else {
    $eventsFuture->add($event);
  }
}
?>

<?php
$headerProps = [
  "invertedColors" => $category === "experiences",
];
snippet("header", $headerProps);
?>

<div class="program">

  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <?php
        $params = [
          "view" => $view,
          "category" => $category,
          "tag" => $tag,
          "tagsForButtons" => $tagsForButtons,
        ];
        snippet("program-filters", $params);
        ?>
      </div>
    </div>
  </div>

  <!-- Grid view -->
  <?php if ($view === "grid") : ?>
    <div class="container-fluid my-5 pb-3">
      <div class="row">
        <!-- Future events -->
        <?php foreach ($eventsFuture as $event) : ?>
          <div class="col-6 col-lg-4">
            <?php snippet("event-preview", ["event" => $event, "type" => "program-grid"]) ?>
          </div>
        <?php endforeach ?>
        <!-- Past events -->
        <?php if ($eventsPast->count() > 0) : ?>
          <div class="col-12">
            <h1 class="weight-900 mt-5 mb-3">Past events</h1>
          </div>
          <?php foreach ($eventsPast as $event) : ?>
            <div class="col-6 col-lg-4">
              <?php snippet("event-preview", ["event" => $event, "type" => "program-grid"]) ?>
            </div>
          <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  <?php endif ?>

  <!-- List view -->
  <?php if ($view === "list") : ?>
    <!-- Future events -->
    <div class="mt-5">
      <?php foreach ($eventsFuture as $event) : ?>
        <?php snippet("event-list-item", ["event" => $event]) ?>
      <?php endforeach ?>
    </div>
    <!-- Past events -->
    <?php if ($eventsPast->count() > 0) : ?>
      <div class="mt-5">
        <div class="container-fluid pt-5 pb-2">
          <div class="row">
            <div class="col-12">
              <h1 class="weight-900 mt-5 mb-3">Past events</h1>
            </div>
          </div>
        </div>
        <?php foreach ($eventsPast as $event) : ?>
          <?php snippet("event-list-item", ["event" => $event]) ?>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    <div class="py-5"></div>
  <?php endif ?>

</div>

<?php snippet("footer") ?>