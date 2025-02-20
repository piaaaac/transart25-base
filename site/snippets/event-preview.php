<?php

/**
 * @param $event  - kirby page
 * @param $type   - string
 * */

$tags = $event->eventTags()->split();
$imgUrl = $event->img()->isNotEmpty() ? $event->img()->first()->toFile()->thumb()->url() : "-----";
$category = $event->category()->value();

// Use the isPast method from the EventPage model
$isPast = $event->isPast() ? "yes" : "no";

$dateStr = t23_eventDayNum($event->startDate());
if ($event->hasEndDate()->toBool() && $event->endDate()->isNotEmpty()) {
  $dateStr .= "&ndash;" . t23_eventDayNum($event->endDate());
}

$timeStr = $event->startTime()->toDate("H:i");
if ($event->hasEndTime()->toBool() && $event->endTime()->isNotEmpty()) {
  $timeStr .= "&ndash;" . $event->endTime()->toDate("H:i");
}
?>

<div
  class="event-preview"
  data-is-past="<?= $isPast ?>"
  data-type="<?= $type ?>"
  data-category="<?= $category ?>"
  data-url="<?= $event->url() ?>"
  data-target="_self"
  data-tags="<?= json_encode($tags) ?>">

  <div class="image" style="background-image: url('<?= $imgUrl ?>');">
    <span class="category"><?= $category ?></span>
  </div>

  <div class="texts">
    <div class="titles">
      <span class="event-title"><?= $event->title() ?></span>
      <br class="newline" />
      <span class="event-subtitle"><?= $event->subtitle()->value() ?></span>
    </div>
    <div class="info">
      <div class="date-time">
        <span class="date no-wrap">
          <!-- <?= t23_eventDayWeek($event->startDate()) ?>&nbsp;<?= t23_eventDayNum($event->startDate()) ?> -->
          <?= $dateStr ?>
        </span>
        <br />
        <span class="time no-wrap">
          <!-- h&nbsp;<?= $event->startTime()->toDate("H:i") ?> -->
          <?= $timeStr ?>
        </span>
      </div>
      <div class="arrow-prev weight-900">&larr;</div>
      <div class="arrow-next weight-900">&rarr;</div>
    </div>
  </div>

</div>