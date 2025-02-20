<?php

/**
 * @param $event  - kirby page
 * */

$tags = $event->eventTags()->split();
$tagsMarkup = "";
foreach ($tags as $tag) {
  $tagsMarkup .= "#$tag ";
}

$imgUrl = $event->img()->isNotEmpty() ? $event->img()->first()->toFile()->thumb()->url() : "-----";
$category = $event->category()->value();

if (!function_exists("venueName")) {
  function venueName($event)
  {
    $text = "Venue tba";
    $venuePage = $event->place()->toPage();
    if ($venuePage) {
      $text = $venuePage->title();
      // $text .= "<p><a href='". $venuePage->url() ."'>". t("see_location") ."</a>&nbsp;&rarr;</span></p>";
    }
    return $text;
  }
}

// Use the isPast method from the EventPage model
$isPast = $event->isPast() ? "yes" : "no";

$dateStr = t23_eventDayNum($event->startDate());
if ($event->endDate()->isNotEmpty()) {
  $dateStr .= "&ndash;" . t23_eventDayNum($event->endDate());
}

$timeStr = $event->startTime()->toDate("H:i");
if ($event->endTime()->isNotEmpty()) {
  $timeStr .= "&ndash;" . $event->endTime()->toDate("H:i");
}
?>

<div
  class="event-list-item"
  data-is-past="<?= $isPast ?>"
  data-url="<?= $event->url() ?>"
  data-target="_self"
  data-tags="<?= json_encode($tags) ?>">

  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <span class="date"><?= $dateStr ?></span>
        <br />
        <span class="time"><?= $timeStr ?></span>
        <p class="tags"><?= $tagsMarkup ?></p>
      </div>
      <div class="col-9">
        <span class="title"><?= $event->title() ?></span>
        <br />
        <span class="subtitle"><?= $event->subtitle()->value() ?></span>
        <p class="venue"><?= venueName($event) ?></p>
      </div>
    </div>
  </div>
</div>

<!-- 

<div 
  class="event-preview"
  data-type="< ?= $type ?>"
  data-category="< ?= $category ?>"
  data-url="< ?= $event->url() ?>"
  data-target="_self"
  data-tags="< ?= json_encode($tags) ?>"
  >

  <div class="image" style="background-image: url('< ?= $imgUrl ?>');">
    <span class="category">< ?= $category ?></span>
  </div>

  <div class="texts">
    <div class="titles">
      <span class="event-title">< ?= $event->title() ?></span>
      <br class="newline" />
      <span class="event-subtitle">< ?= $event->subtitle()->value() ?></span>
    </div>
    <div class="info">
      <div class="date-time">
        <span class="date">
          < ?= t23_eventDayNum($event->startDate()) ?>
        </span>
        <br />
        <span class="time">
          < ?= $event->startTime()->toDate("H:i") ?>
        </span>
      </div>
      <div class="arrow-prev weight-900">&larr;</div>
      <div class="arrow-next weight-900">&rarr;</div>
    </div>
  </div>

</div>
 -->